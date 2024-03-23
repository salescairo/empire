<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductSale;
use App\Models\Sale;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductSale>
 */
class ProductSaleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model>
     */
    protected $model = ProductSale::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'quantity' => fake()->numberBetween(0,10000),
            'value' => fake()->numberBetween(0,10000),
            'sale_id' => Sale::factory()->create()->id,
            'product_id' => Product::factory()->create()->id,
        ];
    }
}
