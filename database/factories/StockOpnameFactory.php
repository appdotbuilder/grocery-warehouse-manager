<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\WarehouseLocation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StockOpname>
 */
class StockOpnameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'opname_number' => 'OPN-' . fake()->unique()->regexify('[0-9]{8}'),
            'name' => 'Stock Taking ' . fake()->words(2, true),
            'opname_date' => fake()->dateTimeBetween('-30 days', '+30 days'),
            'warehouse_location_id' => fake()->optional()->randomElement(WarehouseLocation::factory()),
            'status' => fake()->randomElement(['pending', 'in_progress', 'completed']),
            'notes' => fake()->optional()->sentence(),
            'created_by' => User::factory(),
            'completed_at' => fake()->optional(0.3)->dateTimeBetween('-30 days', 'now'),
        ];
    }
}