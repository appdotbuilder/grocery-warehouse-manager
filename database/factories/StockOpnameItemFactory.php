<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\StockOpname;
use App\Models\User;
use App\Models\WarehouseLocation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StockOpnameItem>
 */
class StockOpnameItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $systemQuantity = fake()->numberBetween(0, 100);
        $hasPhysicalCount = fake()->boolean(80); // 80% chance of having physical count
        $physicalQuantity = $hasPhysicalCount ? fake()->numberBetween(0, 120) : null;
        $variance = $hasPhysicalCount && $physicalQuantity !== null ? $physicalQuantity - $systemQuantity : null;

        return [
            'stock_opname_id' => StockOpname::factory(),
            'product_id' => Product::factory(),
            'warehouse_location_id' => WarehouseLocation::factory(),
            'batch_number' => fake()->optional()->regexify('[A-Z]{3}[0-9]{7}'),
            'expiry_date' => fake()->optional(0.7)->dateTimeBetween('now', '+2 years'),
            'system_quantity' => $systemQuantity,
            'physical_quantity' => $physicalQuantity,
            'variance' => $variance,
            'notes' => fake()->optional()->sentence(),
            'counted' => $hasPhysicalCount,
            'counted_at' => $hasPhysicalCount ? fake()->dateTimeBetween('-30 days', 'now') : null,
            'counted_by' => $hasPhysicalCount ? User::factory() : null,
        ];
    }
}