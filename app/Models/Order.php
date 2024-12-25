<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['customer_id', 'order_date', 'status'];
    public $timestamps = false; // Tắt timestamps
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
    public function products(): BelongsToMany
{
    return $this->belongsToMany(Product::class, 'order_details')
                ->withPivot('quantity'); // Thêm `price` nếu cần
}
    public function orderDetails(): HasMany
    {
        return $this->hasMany(Order_detail::class);
    }
    
}