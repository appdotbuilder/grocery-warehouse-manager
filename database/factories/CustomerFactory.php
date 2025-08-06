<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->company(),
            'email' => fake()->companyEmail(),
            'phone' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'customer_type' => fake()->randomElement(['retail', 'wholesale']),
            'credit_limit' => fake()->randomFloat(2, 1000000, 100000000),
            'notes' => fake()->sentence(),
            'status' => fake()->randomElement(['active', 'inactive']),
        ];
    }
}