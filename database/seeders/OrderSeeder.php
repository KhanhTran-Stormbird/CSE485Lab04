<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('orders')->insert([
                'customer_id' => rand(1, 10), // ID khách hàng ngẫu nhiên (giả sử có 10 khách hàng)
                'order_date' => now()->subDays(rand(1, 30)), // Ngày đặt hàng trong 30 ngày qua
                'status' => rand(0, 1), // Trạng thái đơn hàng (0 hoặc 1)
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
