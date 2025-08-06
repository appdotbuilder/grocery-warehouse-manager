<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductStock;
use App\Models\WarehouseLocation;
use Illuminate\Database\Seeder;

class ProductStockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::all();
        $locations = WarehouseLocation::all();

        // Create stock records for products
        $stocks = [
            // Red Apples - Low stock scenario
            [
                'product_id' => $products->where('sku', 'FP-APP-RED-001')->first()->id,
                'warehouse_location_id' => $locations->where('code', 'FTR-001')->first()->id,
                'quantity' => 5,
                'batch_number' => 'APP2024001',
                'expiry_date' => now()->addDays(10), // Expiring soon
                'received_date' => now()->subDays(4),
                'purchase_price' => 25000,
            ],

            // Bananas
            [
                'product_id' => $products->where('sku', 'FP-BAN-YEL-001')->first()->id,
                'warehouse_location_id' => $locations->where('code', 'FTR-001')->first()->id,
                'quantity' => 15,
                'batch_number' => 'BAN2024001',
                'expiry_date' => now()->addDays(5), // Expiring soon
                'received_date' => now()->subDays(2),
                'purchase_price' => 15000,
            ],
            [
                'product_id' => $products->where('sku', 'FP-BAN-YEL-001')->first()->id,
                'warehouse_location_id' => $locations->where('code', 'FTR-001')->first()->id,
                'quantity' => 10,
                'batch_number' => 'BAN2024002',
                'expiry_date' => now()->addDays(8),
                'received_date' => now()->subDays(1),
                'purchase_price' => 15000,
            ],

            // Carrots - Low stock scenario
            [
                'product_id' => $products->where('sku', 'FP-CAR-ORG-001')->first()->id,
                'warehouse_location_id' => $locations->where('code', 'VR-001')->first()->id,
                'quantity' => 8,
                'batch_number' => 'CAR2024001',
                'expiry_date' => now()->addDays(18),
                'received_date' => now()->subDays(3),
                'purchase_price' => 12000,
            ],

            // Fresh Milk
            [
                'product_id' => $products->where('sku', 'DP-MLK-FR-1L')->first()->id,
                'warehouse_location_id' => $locations->where('code', 'DS-A1')->first()->id,
                'quantity' => 30,
                'batch_number' => 'MLK2024001',
                'expiry_date' => now()->addDays(3), // Expiring very soon
                'received_date' => now()->subDays(2),
                'purchase_price' => 18000,
            ],
            [
                'product_id' => $products->where('sku', 'DP-MLK-FR-1L')->first()->id,
                'warehouse_location_id' => $locations->where('code', 'DS-A1')->first()->id,
                'quantity' => 15,
                'batch_number' => 'MLK2024002',
                'expiry_date' => now()->addDays(5), // Expiring soon
                'received_date' => now()->subDays(1),
                'purchase_price' => 18000,
            ],

            // Greek Yogurt
            [
                'product_id' => $products->where('sku', 'DP-YOG-GR-500')->first()->id,
                'warehouse_location_id' => $locations->where('code', 'DS-A1')->first()->id,
                'quantity' => 12,
                'batch_number' => 'YOG2024001',
                'expiry_date' => now()->addDays(12),
                'received_date' => now()->subDays(2),
                'purchase_price' => 32000,
            ],

            // Jasmine Rice
            [
                'product_id' => $products->where('sku', 'PS-RIC-JAS-5K')->first()->id,
                'warehouse_location_id' => $locations->where('code', 'PR-001')->first()->id,
                'quantity' => 75,
                'batch_number' => 'RIC2024001',
                'expiry_date' => null,
                'received_date' => now()->subDays(7),
                'purchase_price' => 85000,
            ],
            [
                'product_id' => $products->where('sku', 'PS-RIC-JAS-5K')->first()->id,
                'warehouse_location_id' => $locations->where('code', 'PR-001')->first()->id,
                'quantity' => 50,
                'batch_number' => 'RIC2024002',
                'expiry_date' => null,
                'received_date' => now()->subDays(3),
                'purchase_price' => 85000,
            ],

            // Olive Oil
            [
                'product_id' => $products->where('sku', 'PS-OIL-OL-500')->first()->id,
                'warehouse_location_id' => $locations->where('code', 'PR-002')->first()->id,
                'quantity' => 15,
                'batch_number' => 'OIL2024001',
                'expiry_date' => now()->addDays(700),
                'received_date' => now()->subDays(30),
                'purchase_price' => 65000,
            ],

            // Orange Juice
            [
                'product_id' => $products->where('sku', 'BV-JUI-OR-1L')->first()->id,
                'warehouse_location_id' => $locations->where('code', 'BVR-001')->first()->id,
                'quantity' => 22,
                'batch_number' => 'OJ2024001',
                'expiry_date' => now()->addDays(5), // Expiring soon
                'received_date' => now()->subDays(2),
                'purchase_price' => 28000,
            ],

            // Mineral Water - Low stock scenario
            [
                'product_id' => $products->where('sku', 'BV-WAT-MIN-1.5L')->first()->id,
                'warehouse_location_id' => $locations->where('code', 'WS-001')->first()->id,
                'quantity' => 45,
                'batch_number' => 'WAT2024001',
                'expiry_date' => now()->addDays(350),
                'received_date' => now()->subDays(15),
                'purchase_price' => 3500,
            ],
            [
                'product_id' => $products->where('sku', 'BV-WAT-MIN-1.5L')->first()->id,
                'warehouse_location_id' => $locations->where('code', 'WS-001')->first()->id,
                'quantity' => 40,
                'batch_number' => 'WAT2024002',
                'expiry_date' => now()->addDays(360),
                'received_date' => now()->subDays(5),
                'purchase_price' => 3500,
            ],

            // Frozen French Fries
            [
                'product_id' => $products->where('sku', 'FF-FRI-FR-1K')->first()->id,
                'warehouse_location_id' => $locations->where('code', 'FR-001')->first()->id,
                'quantity' => 18,
                'batch_number' => 'FF2024001',
                'expiry_date' => now()->addDays(330),
                'received_date' => now()->subDays(35),
                'purchase_price' => 45000,
            ],
        ];

        foreach ($stocks as $stock) {
            ProductStock::create($stock);
        }
    }
}