<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WarehouseLocation>
 */
class WarehouseLocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->words(3, true),
            'code' => fake()->unique()->regexify('[A-Z]{2}-[A-Z0-9]{3}'),
            'type' => fake()->randomElement(['area', 'rack', 'shelf', 'bin']),
            'description' => fake()->sentence(),
            'capacity' => fake()->numberBetween(50, 500),
            'status' => fake()->randomElement(['active', 'inactive']),
        ];
    }
}