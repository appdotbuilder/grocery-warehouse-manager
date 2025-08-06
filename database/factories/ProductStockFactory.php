<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\WarehouseLocation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductStock>
 */
class ProductStockFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => Product::factory(),
            'warehouse_location_id' => WarehouseLocation::factory(),
            'quantity' => fake()->numberBetween(0, 100),
            'batch_number' => fake()->optional()->regexify('[A-Z]{3}[0-9]{7}'),
            'expiry_date' => fake()->optional(0.7)->dateTimeBetween('now', '+2 years'),
            'received_date' => fake()->dateTimeBetween('-30 days', 'now'),
            'purchase_price' => fake()->randomFloat(2, 5000, 100000),
        ];
    }
}