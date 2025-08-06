<?php

namespace Database\Factories;

use App\Models\Issuing;
use App\Models\Product;
use App\Models\WarehouseLocation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\IssuingItem>
 */
class IssuingItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $quantity = fake()->numberBetween(1, 50);
        $unitPrice = fake()->randomFloat(2, 10000, 200000);
        $totalPrice = $quantity * $unitPrice;

        return [
            'issuing_id' => Issuing::factory(),
            'product_id' => Product::factory(),
            'warehouse_location_id' => WarehouseLocation::factory(),
            'quantity' => $quantity,
            'unit_price' => $unitPrice,
            'total_price' => $totalPrice,
            'batch_number' => fake()->optional()->regexify('[A-Z]{3}[0-9]{7}'),
            'expiry_date' => fake()->optional(0.7)->dateTimeBetween('now', '+2 years'),
            'notes' => fake()->optional()->sentence(),
        ];
    }
}