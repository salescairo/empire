<?php

namespace Tests\Unit\Services;

use App\Infra\Repositories\ServiceRepository;
use App\Models\Service;
use App\Services\ServiceService;
use PHPUnit\Framework\MockObject\Exception;
use Tests\TestCase;

class ServiceServiceTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function setUp(): void
    {
        $this->service = (new ServiceService(app(ServiceRepository::class)));
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

        Service::factory()->count(2)->create();
        $response = $this->service->findPaginate($data);

        $this->assertEquals(
            expected: $expected_count,
            actual: $response->total()
        );
    }

    public function testStore_WithValidData_ShouldExpectedSuccessfulResponse(): void
    {
        $expected_name = 'DELL';
        $data = [
            'name' => $expected_name,
            'active' => true
        ];

        $response = $this->service->save($data);

        $this->assertEquals(
            expected: $expected_name,
            actual: $response->name
        );
    }

    public function testUpdate_WithValidData_ShouldExpectedSuccessfulResponse(): void
    {
        $expected_name = 'DELL';
        $data = [
            'name' => $expected_name,
        ];

        $model = Service::factory()->create(['name' => 'HP']);
        $response = $this->service->update($model->id, $data);

        $this->assertEquals(
            expected: $expected_name,
            actual: $response->name
        );
    }

    public function testDelete_WhenValidObject_ShouldExpectedSuccessfulResponse(): void
    {
        $model = Service::factory()->create();
        $response = $this->service->delete($model->id);

        $this->assertTrue($response);
        $this->assertEmpty($this->service->findPaginate([]));
    }
}