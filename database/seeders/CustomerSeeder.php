<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('customers')->insert([
                'name' => 'Customer ' . $i,
                'address' => 'Address for customer ' . $i,
                'phone' => '012345678' . $i, // Số điện thoại giả
                'email' => 'customer' . $i . '@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
