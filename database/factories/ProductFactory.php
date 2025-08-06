<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $purchasePrice = fake()->randomFloat(2, 5000, 100000);
        $sellingPrice = $purchasePrice * fake()->randomFloat(2, 1.2, 2.0);
        
        return [
            'name' => fake()->words(3, true),
            'sku' => fake()->unique()->regexify('[A-Z]{2}-[A-Z]{3}-[0-9]{3}'),
            'category_id' => Category::factory(),
            'description' => fake()->sentence(),
            'unit' => fake()->randomElement(['pcs', 'kg', 'liter', 'box', 'pack']),
            'purchase_price' => $purchasePrice,
            'selling_price' => $sellingPrice,
            'minimum_stock' => fake()->numberBetween(5, 50),
            'maximum_stock' => fake()->numberBetween(100, 500),
            'current_stock' => fake()->numberBetween(0, 100),
            'has_expiry' => fake()->boolean(70),
            'shelf_life_days' => fake()->optional(0.7)->numberBetween(7, 365),
            'status' => fake()->randomElement(['active', 'inactive']),
        ];
    }
}