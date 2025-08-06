<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customers = [
            [
                'name' => 'Supermarket Maju Jaya',
                'email' => 'purchasing@majujaya.com',
                'phone' => '+62-21-123-4567',
                'address' => 'Jl. Sudirman No. 45, Jakarta Pusat',
                'customer_type' => 'wholesale',
                'credit_limit' => 50000000,
                'notes' => 'Long-term wholesale customer, monthly payment terms',
                'status' => 'active',
            ],
            [
                'name' => 'Toko Berkah Sejahtera',
                'email' => 'owner@berkahsejahtera.id',
                'phone' => '+62-21-234-5678',
                'address' => 'Jl. Raya Depok No. 123, Depok',
                'customer_type' => 'wholesale',
                'credit_limit' => 25000000,
                'notes' => 'Regular wholesale customer, weekly orders',
                'status' => 'active',
            ],
            [
                'name' => 'Restaurant Nusantara',
                'email' => 'kitchen@nusantararesto.com',
                'phone' => '+62-21-345-6789',
                'address' => 'Jl. Kemang Raya No. 78, Jakarta Selatan',
                'customer_type' => 'retail',
                'credit_limit' => 10000000,
                'notes' => 'Restaurant chain, focus on fresh produce',
                'status' => 'active',
            ],
            [
                'name' => 'Cafe Corner 88',
                'email' => 'manager@cafecorner88.com',
                'phone' => '+62-21-456-7890',
                'address' => 'Jl. Thamrin No. 88, Jakarta Pusat',
                'customer_type' => 'retail',
                'credit_limit' => 5000000,
                'notes' => 'Small cafe, regular beverage and dairy orders',
                'status' => 'active',
            ],
            [
                'name' => 'Warung Pak Budi',
                'email' => 'pakbudi@gmail.com',
                'phone' => '+62-812-345-6789',
                'address' => 'Jl. Kebon Jeruk No. 15, Jakarta Barat',
                'customer_type' => 'retail',
                'credit_limit' => 2000000,
                'notes' => 'Small warung, cash payment preferred',
                'status' => 'active',
            ],
            [
                'name' => 'Hotel Grand Plaza',
                'email' => 'procurement@grandplaza.hotel',
                'phone' => '+62-21-567-8901',
                'address' => 'Jl. MH Thamrin No. 1, Jakarta Pusat',
                'customer_type' => 'wholesale',
                'credit_limit' => 75000000,
                'notes' => 'Luxury hotel, high volume orders for restaurants',
                'status' => 'active',
            ],
        ];

        foreach ($customers as $customer) {
            Customer::create($customer);
        }
    }
}