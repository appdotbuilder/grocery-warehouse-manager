<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Issuing>
 */
class IssuingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'issuing_number' => 'ISS-' . fake()->unique()->regexify('[0-9]{8}'),
            'customer_id' => Customer::factory(),
            'issued_date' => fake()->dateTimeBetween('-30 days', 'now'),
            'order_number' => fake()->optional()->regexify('ORD-[0-9]{6}'),
            'total_amount' => fake()->randomFloat(2, 100000, 10000000),
            'status' => fake()->randomElement(['pending', 'partial', 'completed']),
            'notes' => fake()->optional()->sentence(),
            'created_by' => User::factory(),
        ];
    }
}