<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\StockMovement;
use App\Models\User;
use App\Models\WarehouseLocation;
use Illuminate\Database\Seeder;

class StockMovementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get first user as the creator
        $user = User::first();
        if (!$user) {
            return; // Skip if no users exist
        }

        $products = Product::all();
        $locations = WarehouseLocation::all();

        $movements = [
            // Recent stock IN movements (receiving)
            [
                'movement_number' => 'MOV-IN-' . date('Ymd') . '-001',
                'type' => 'in',
                'product_id' => $products->where('sku', 'FP-APP-RED-001')->first()->id,
                'from_location_id' => null,
                'to_location_id' => $locations->where('code', 'FTR-001')->first()->id,
                'quantity' => 5,
                'batch_number' => 'APP2024001',
                'expiry_date' => now()->addDays(10),
                'unit_price' => 25000,
                'total_value' => 125000,
                'reference_type' => 'receiving',
                'reference_id' => 1,
                'notes' => 'Received from Fresh Farm Produce Ltd.',
                'created_by' => $user->id,
                'created_at' => now()->subHours(2),
            ],
            [
                'movement_number' => 'MOV-IN-' . date('Ymd') . '-002',
                'type' => 'in',
                'product_id' => $products->where('sku', 'DP-MLK-FR-1L')->first()->id,
                'from_location_id' => null,
                'to_location_id' => $locations->where('code', 'DS-A1')->first()->id,
                'quantity' => 15,
                'batch_number' => 'MLK2024002',
                'expiry_date' => now()->addDays(5),
                'unit_price' => 18000,
                'total_value' => 270000,
                'reference_type' => 'receiving',
                'reference_id' => 2,
                'notes' => 'Fresh milk delivery from Dairy Best Indonesia',
                'created_by' => $user->id,
                'created_at' => now()->subHours(1),
            ],

            // Stock OUT movements (issuing)
            [
                'movement_number' => 'MOV-OUT-' . date('Ymd') . '-001',
                'type' => 'out',
                'product_id' => $products->where('sku', 'PS-RIC-JAS-5K')->first()->id,
                'from_location_id' => $locations->where('code', 'PR-001')->first()->id,
                'to_location_id' => null,
                'quantity' => 25,
                'batch_number' => 'RIC2024001',
                'expiry_date' => null,
                'unit_price' => 110000,
                'total_value' => 2750000,
                'reference_type' => 'issuing',
                'reference_id' => 1,
                'notes' => 'Issued to Supermarket Maju Jaya',
                'created_by' => $user->id,
                'created_at' => now()->subHours(3),
            ],

            // Transfer movements
            [
                'movement_number' => 'MOV-TRF-' . date('Ymd') . '-001',
                'type' => 'transfer',
                'product_id' => $products->where('sku', 'BV-WAT-MIN-1.5L')->first()->id,
                'from_location_id' => $locations->where('code', 'WS-001')->first()->id,
                'to_location_id' => $locations->where('code', 'BVR-001')->first()->id,
                'quantity' => 15,
                'batch_number' => 'WAT2024001',
                'expiry_date' => now()->addDays(350),
                'unit_price' => 3500,
                'total_value' => 52500,
                'reference_type' => 'transfer',
                'reference_id' => 1,
                'notes' => 'Internal transfer for better accessibility',
                'created_by' => $user->id,
                'created_at' => now()->subHours(4),
            ],

            // Adjustment movements
            [
                'movement_number' => 'MOV-ADJ-' . date('Ymd') . '-001',
                'type' => 'adjustment',
                'product_id' => $products->where('sku', 'FP-CAR-ORG-001')->first()->id,
                'from_location_id' => null,
                'to_location_id' => $locations->where('code', 'VR-001')->first()->id,
                'quantity' => 2, // Adjustment to correct stock levels
                'batch_number' => 'CAR2024001',
                'expiry_date' => now()->addDays(18),
                'unit_price' => 12000,
                'total_value' => 24000,
                'reference_type' => 'adjustment',
                'reference_id' => 1,
                'notes' => 'Stock adjustment after physical count',
                'created_by' => $user->id,
                'created_at' => now()->subHours(6),
            ],

            // More recent stock movements for demo
            [
                'movement_number' => 'MOV-OUT-' . date('Ymd') . '-002',
                'type' => 'out',
                'product_id' => $products->where('sku', 'BV-JUI-OR-1L')->first()->id,
                'from_location_id' => $locations->where('code', 'BVR-001')->first()->id,
                'to_location_id' => null,
                'quantity' => 8,
                'batch_number' => 'OJ2024001',
                'expiry_date' => now()->addDays(5),
                'unit_price' => 38000,
                'total_value' => 304000,
                'reference_type' => 'issuing',
                'reference_id' => 2,
                'notes' => 'Sold to Restaurant Nusantara',
                'created_by' => $user->id,
                'created_at' => now()->subMinutes(30),
            ],

            [
                'movement_number' => 'MOV-IN-' . date('Ymd') . '-003',
                'type' => 'in',
                'product_id' => $products->where('sku', 'FF-FRI-FR-1K')->first()->id,
                'from_location_id' => null,
                'to_location_id' => $locations->where('code', 'FR-001')->first()->id,
                'quantity' => 18,
                'batch_number' => 'FF2024001',
                'expiry_date' => now()->addDays(330),
                'unit_price' => 45000,
                'total_value' => 810000,
                'reference_type' => 'receiving',
                'reference_id' => 3,
                'notes' => 'Frozen foods delivery',
                'created_by' => $user->id,
                'created_at' => now()->subMinutes(45),
            ],
        ];

        foreach ($movements as $movement) {
            StockMovement::create($movement);
        }
    }
}