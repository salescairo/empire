<?php

namespace Tests\Unit\Services;

use App\Infra\Repositories\CustomerRepository;
use App\Models\Customer;
use App\Services\CustomerService;
use PHPUnit\Framework\MockObject\Exception;
use Tests\TestCase;

class CustomerServiceTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function setUp(): void
    {
        $this->service = (new CustomerService(app(CustomerRepository::class)));
        parent::setUp();
    }

    public function testGetData_WhenDataNotFound_ShouldExpectedEmptyResponse(): void
    {
        $data = [];
        $response = $this->service->findPaginate($data);
        $this->assertEmpty($response);
    }

    public function testGetData_WithData_ShouldExpectedTwoItemsResponse(): void
    {
        $expected_count = 2;
        $data = [];

        Customer::factory()->count(2)->create();
        $response = $this->service->findPaginate($data);

        $this->assertEquals(
            expected: $expected_count,
            actual: $response->total()
        );
    }

    public function testGetAll_WithoutFilters_ShouldExpectedCount(): void
    {
        $expected_count = 2;
        $data = [];

        Customer::factory()->count(2)->create();
        $response = $this->service->findAll($data);

        $this->assertCount(
            expectedCount: $expected_count,
            haystack: $response
        );
    }

    public function testGetItem_WithValidId_ShouldExpectedResponse(): void
    {
        $object = Customer::factory()->create();
        $response = $this->service->findById($object->id);

        $this->assertEquals(
            expected: $object->name,
            actual: $response->name
        );
    }

    public function testStore_WithValidData_ShouldExpectedSuccessfulResponse(): void
    {
        $expected_name = 'MARCOS JORGE DE OLIVEIRA';
        $data = [
            'name' => $expected_name,
            'document' => '122.124.124-09',
            'email' => 'margos.oliver@gmail.com',
            'phone' => '(88) 9 8144-0998',
        ];

        $response = $this->service->save($data);

        $this->assertEquals(
            expected: $expected_name,
            actual: $response->name
        );
    }

    public function testUpdate_WithValidData_ShouldExpectedSuccessfulResponse(): void
    {
        $expected_name = 'MARCOS JORGE DE OLIVEIRA';
        $data = [
            'name' => $expected_name,
        ];

        $model = Customer::factory()->create(['name' => 'MARCOS JOSÉ DE OLIVEIRA']);
        $response = $this->service->update($model->id, $data);

        $this->assertEquals(
            expected: $expected_name,
            actual: $response->name
        );
    }

    public function testDelete_WhenValidObject_ShouldExpectedSuccessfulResponse(): void
    {
        $model = Customer::factory()->create();
        $response = $this->service->delete($model->id);

        $this->assertTrue($response);
        $this->assertEmpty($this->service->findPaginate([]));
    }
}