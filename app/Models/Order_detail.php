<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Mối quan hệ 1-n: Một chi tiết đơn hàng thuộc về một sản phẩm
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
