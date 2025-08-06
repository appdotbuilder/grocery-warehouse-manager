<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use App\Models\WarehouseLocation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StockMovement>
 */
class StockMovementFactory extends Factory
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
        $totalValue = $quantity * $unitPrice;

        return [
            'movement_number' => 'MOV-' . fake()->unique()->regexify('[A-Z]{3}-[0-9]{8}'),
            'type' => fake()->randomElement(['in', 'out', 'transfer', 'adjustment', 'opname']),
            'product_id' => Product::factory(),
            'from_location_id' => fake()->optional()->randomElement(WarehouseLocation::factory()),
            'to_location_id' => fake()->optional()->randomElement(WarehouseLocation::factory()),
            'quantity' => $quantity,
            'batch_number' => fake()->optional()->regexify('[A-Z]{3}[0-9]{7}'),
            'expiry_date' => fake()->optional(0.7)->dateTimeBetween('now', '+2 years'),
            'unit_price' => $unitPrice,
            'total_value' => $totalValue,
            'reference_type' => fake()->optional()->randomElement(['receiving', 'issuing', 'transfer', 'opname']),
            'reference_id' => fake()->optional()->numberBetween(1, 100),
            'notes' => fake()->optional()->sentence(),
            'created_by' => User::factory(),
        ];
    }
}