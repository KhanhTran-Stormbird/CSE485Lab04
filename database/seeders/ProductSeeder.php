<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('products')->insert([
                'name' => 'Product ' . $i,
                'description' => 'Description for product ' . $i,
                'price' => rand(10, 500), // Giá ngẫu nhiên từ 10 đến 500
                'quantity' => rand(1, 100), // Số lượng ngẫu nhiên từ 1 đến 100
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
