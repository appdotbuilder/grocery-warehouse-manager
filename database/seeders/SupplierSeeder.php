<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $suppliers = [
            [
                'name' => 'Fresh Farm Produce Ltd.',
                'email' => 'orders@freshfarm.com',
                'phone' => '+62-21-555-0101',
                'address' => 'Jl. Raya Bogor KM 35, Cibinong, Bogor',
                'contact_person' => 'Budi Santoso',
                'notes' => 'Reliable supplier for fresh fruits and vegetables',
                'status' => 'active',
            ],
            [
                'name' => 'Dairy Best Indonesia',
                'email' => 'supply@dairybest.co.id',
                'phone' => '+62-21-555-0202',
                'address' => 'Kawasan Industri Pulogadung, Jakarta Timur',
                'contact_person' => 'Sari Dewi',
                'notes' => 'Premium dairy products supplier',
                'status' => 'active',
            ],
            [
                'name' => 'Ocean Fresh Seafood',
                'email' => 'orders@oceanfresh.id',
                'phone' => '+62-21-555-0303',
                'address' => 'Pelabuhan Muara Baru, Jakarta Utara',
                'contact_person' => 'Ahmad Rizki',
                'notes' => 'Daily fresh seafood deliveries',
                'status' => 'active',
            ],
            [
                'name' => 'Golden Bakery Supplies',
                'email' => 'wholesale@goldenbakery.com',
                'phone' => '+62-21-555-0404',
                'address' => 'Jl. Industri Raya No. 15, Tangerang',
                'contact_person' => 'Linda Wijaya',
                'notes' => 'Bakery products and ingredients',
                'status' => 'active',
            ],
            [
                'name' => 'Pantry Essentials Co.',
                'email' => 'sales@pantryessentials.co.id',
                'phone' => '+62-21-555-0505',
                'address' => 'Jl. Gatot Subroto KM 8, Jakarta Selatan',
                'contact_person' => 'Rudi Hartono',
                'notes' => 'Bulk supplier for pantry staples',
                'status' => 'active',
            ],
        ];

        foreach ($suppliers as $supplier) {
            Supplier::create($supplier);
        }
    }
}