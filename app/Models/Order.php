<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function orderDetails()
    {
        return $this->hasMany(Order_detail::class);
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    // Mối quan hệ n-n: Một đơn hàng có nhiều sản phẩm qua bảng chi tiết đơn hàng
    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_details')
                    ->withPivot('quantity') // Thêm trường phụ (pivot field)
                    ->withTimestamps();
    }
}
