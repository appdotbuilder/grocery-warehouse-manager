<?php

namespace Database\Factories;

use App\Models\Supplier;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Receiving>
 */
class ReceivingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'receiving_number' => 'RCV-' . fake()->unique()->regexify('[0-9]{8}'),
            'supplier_id' => Supplier::factory(),
            'received_date' => fake()->dateTimeBetween('-30 days', 'now'),
            'invoice_number' => fake()->optional()->regexify('INV-[0-9]{6}'),
            'total_amount' => fake()->randomFloat(2, 100000, 10000000),
            'status' => fake()->randomElement(['pending', 'partial', 'completed']),
            'notes' => fake()->optional()->sentence(),
            'created_by' => User::factory(),
        ];
    }
}