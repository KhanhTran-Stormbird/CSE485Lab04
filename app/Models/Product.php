<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'price', 'quantity'];
    public $timestamps = false; // Tắt timestamps
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_details')
                    ->withPivot('quantity') // Thêm trường phụ (pivot field)
                    ->withTimestamps();
    }

}