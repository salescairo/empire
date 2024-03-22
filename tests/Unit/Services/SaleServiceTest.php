<?php

namespace Tests\Unit\Services;

use App\Infra\Repositories\CustomerRepository;
use App\Infra\Repositories\SaleRepository;
use App\Infra\Repositories\UserRepository;
use App\Models\Customer;
use App\Models\Sale;
use App\Models\User;
use App\Services\SeleService;
use PHPUnit\Framework\MockObject\Exception;
use Tests\TestCase;

class SaleServiceTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function setUp(): void
    {
        $this->service = (new SeleService(
            app(SaleRepository::class),
            app(CustomerRepository::class),
            app(UserRepository::class),
        ));
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

        Sale::factory()->count(2)->create();
        $response = $this->service->findPaginate($data);

        $this->assertEquals(
            expected: $expected_count,
            actual: $response->total()
        );
    }

    public function testGetItem_WithValidId_ShouldExpectedResponse(): void
    {
        $object = Sale::factory()->create();
        $response = $this->service->findById($object->id);

        $this->assertEquals(
            expected: $object->product_id,
            actual: $response->product_id
        );
        $this->assertEquals(
            expected: $object->value,
            actual: $response->value
        );
    }

    public function testStore_WithValidData_ShouldExpectedSuccessfulResponse(): void
    {
        $expected_installments = 2;
        $expected_mode = Sale::CREDIT_MODE;
        $data = [
            'installments' => $expected_installments,
            'payment_mode' => $expected_mode,
            'customer_id' => Customer::factory()->create()->id,
            'user_id' => User::factory()->create()->id
        ];

        $this->actingAs(User::factory()->create());
        $response = $this->service->save($data);

        $this->assertEquals(
            expected: $expected_installments,
            actual: $response->installments
        );
        $this->assertEquals(
            expected: $expected_installments,
            actual: $response->installments
        );
    }

    public function testUpdate_WithValidData_ShouldExpectedSuccessfulResponse(): void
    {
        $expected_installments = 15;
        $data = [
            'installments' => $expected_installments
        ];

        $model = Sale::factory()->create(['installments' => 10]);
        $response = $this->service->update($model->id, $data);

        $this->assertEquals(
            expected: $expected_installments,
            actual: $response->installments
        );
    }

    public function testDelete_WhenValidObject_ShouldExpectedSuccessfulResponse(): void
    {
        $model = Sale::factory()->create();
        $response = $this->service->delete($model->id);

        $this->assertTrue($response);
        $this->assertEmpty($this->service->findPaginate([]));
    }
}