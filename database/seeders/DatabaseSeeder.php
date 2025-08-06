<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create test user first
        User::factory()->create([
            'name' => 'Warehouse Manager',
            'email' => 'manager@warehouse.com',
        ]);

        // Run warehouse-specific seeders
        $this->call([
            CategorySeeder::class,
            SupplierSeeder::class,
            CustomerSeeder::class,
            WarehouseLocationSeeder::class,
            ProductSeeder::class,
            ProductStockSeeder::class,
            StockMovementSeeder::class,
        ]);
    }
}
