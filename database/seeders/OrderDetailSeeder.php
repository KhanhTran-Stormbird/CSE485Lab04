<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class OrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('order_details')->insert([
                'order_id' => rand(1, 10), // ID đơn hàng ngẫu nhiên (giả sử có 10 đơn hàng)
                'product_id' => rand(1, 10), // ID sản phẩm ngẫu nhiên (giả sử có 10 sản phẩm)
                'quantity' => rand(1, 5), // Số lượng sản phẩm ngẫu nhiên từ 1 đến 5
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
