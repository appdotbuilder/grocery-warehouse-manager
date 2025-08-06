<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Receiving;
use App\Models\WarehouseLocation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ReceivingItem>
 */
class ReceivingItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $quantity = fake()->numberBetween(1, 100);
        $unitPrice = fake()->randomFloat(2, 5000, 100000);
        $totalPrice = $quantity * $unitPrice;

        return [
            'receiving_id' => Receiving::factory(),
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