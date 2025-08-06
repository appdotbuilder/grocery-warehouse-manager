<?php

namespace Database\Seeders;

use App\Models\WarehouseLocation;
use Illuminate\Database\Seeder;

class WarehouseLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locations = [
            // Cold Storage Area
            [
                'name' => 'Cold Storage Area A',
                'code' => 'CS-A001',
                'type' => 'area',
                'description' => 'Main cold storage area for dairy and frozen goods',
                'capacity' => 500,
                'status' => 'active',
            ],
            [
                'name' => 'Freezer Rack 1',
                'code' => 'FR-001',
                'type' => 'rack',
                'description' => 'Freezer rack for frozen foods',
                'capacity' => 100,
                'status' => 'active',
            ],
            [
                'name' => 'Dairy Shelf A1',
                'code' => 'DS-A1',
                'type' => 'shelf',
                'description' => 'Shelf for dairy products',
                'capacity' => 50,
                'status' => 'active',
            ],

            // Dry Storage Area
            [
                'name' => 'Dry Storage Area B',
                'code' => 'DS-B001',
                'type' => 'area',
                'description' => 'Main dry storage area for pantry items',
                'capacity' => 1000,
                'status' => 'active',
            ],
            [
                'name' => 'Pantry Rack 1',
                'code' => 'PR-001',
                'type' => 'rack',
                'description' => 'Rack for rice, pasta, and grains',
                'capacity' => 200,
                'status' => 'active',
            ],
            [
                'name' => 'Pantry Rack 2',
                'code' => 'PR-002',
                'type' => 'rack',
                'description' => 'Rack for canned goods and spices',
                'capacity' => 200,
                'status' => 'active',
            ],

            // Fresh Produce Area
            [
                'name' => 'Fresh Produce Area C',
                'code' => 'FP-C001',
                'type' => 'area',
                'description' => 'Temperature controlled area for fresh produce',
                'capacity' => 300,
                'status' => 'active',
            ],
            [
                'name' => 'Fruit Rack 1',
                'code' => 'FTR-001',
                'type' => 'rack',
                'description' => 'Rack for fresh fruits',
                'capacity' => 75,
                'status' => 'active',
            ],
            [
                'name' => 'Vegetable Rack 1',
                'code' => 'VR-001',
                'type' => 'rack',
                'description' => 'Rack for fresh vegetables',
                'capacity' => 75,
                'status' => 'active',
            ],

            // Beverage Area
            [
                'name' => 'Beverage Storage Area D',
                'code' => 'BV-D001',
                'type' => 'area',
                'description' => 'Storage area for beverages',
                'capacity' => 400,
                'status' => 'active',
            ],
            [
                'name' => 'Beverage Rack 1',
                'code' => 'BVR-001',
                'type' => 'rack',
                'description' => 'Rack for soft drinks and juices',
                'capacity' => 150,
                'status' => 'active',
            ],
            [
                'name' => 'Water Storage Bin',
                'code' => 'WS-001',
                'type' => 'bin',
                'description' => 'Storage bin for bottled water',
                'capacity' => 100,
                'status' => 'active',
            ],
        ];

        foreach ($locations as $location) {
            WarehouseLocation::create($location);
        }
    }
}