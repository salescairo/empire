<?php

namespace Tests\Unit\Services;

use App\Infra\Repositories\ProductInputRepository;
use App\Infra\Repositories\ProductRepository;
use App\Models\Product;
use App\Models\ProductInput;
use App\Models\User;
use App\Services\ProductInputService;
use PHPUnit\Framework\MockObject\Exception;
use Tests\TestCase;

class ProductInputServiceTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function setUp(): void
    {
        $this->service = (new ProductInputService(
            app(ProductInputRepository::class),
            app(ProductRepository::class)
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

        ProductInput::factory()->count(2)->create();
        $response = $this->service->findPaginate($data);

        $this->assertEquals(
            expected: $expected_count,
            actual: $response->total()
        );
    }

    public function testGetItem_WithValidId_ShouldExpectedResponse(): void
    {
        $object = ProductInput::factory()->create();
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
        $expected_quantity = 2;
        $expected_value = 100.00;
        $data = [
            'value' => $expected_value,
            'quantity' => $expected_quantity,
            'product_id' => Product::factory()->create()->id
        ];

        $this->actingAs(User::factory()->create());
        $response = $this->service->save($data);

        $this->assertEquals(
            expected: $expected_quantity,
            actual: $response->quantity
        );
        $this->assertEquals(
            expected: $expected_value,
            actual: $response->value
        );
    }

    public function testUpdate_WithValidData_ShouldExpectedSuccessfulResponse(): void
    {
        $expected_quantity = 15;
        $data = [
            'quantity' => $expected_quantity
        ];

        $model = ProductInput::factory()->create(['quantity' => 10]);
        $response = $this->service->update($model->id, $data);

        $this->assertEquals(
            expected: $expected_quantity,
            actual: $response->quantity
        );
    }

    public function testDelete_WhenValidObject_ShouldExpectedSuccessfulResponse(): void
    {
        $model = ProductInput::factory()->create();
        $response = $this->service->delete($model->id);

        $this->assertTrue($response);
        $this->assertEmpty($this->service->findPaginate([]));
    }
}