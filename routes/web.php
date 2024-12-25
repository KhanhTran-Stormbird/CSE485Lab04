<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;

// Trang chính (hiển thị danh sách sản phẩm và khách hàng)
Route::get('/', function () {
    $products = App\Models\Product::all(); // Lấy tất cả sản phẩm
    $customers = App\Models\Customer::all(); // Lấy tất cả khách hàng
    return view('home', compact('products', 'customers')); // Hiển thị trang chủ
})->name('home');
Route::get('orders/history/{customer}', [OrderController::class, 'history'])->name('orders.history');
// routes/web.php

// Route danh sách đơn hàng
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');

// Các route cho quản lý sản phẩm
Route::resource('products', ProductController::class);

// Các route cho quản lý khách hàng
Route::resource('customers', CustomerController::class);

// Các route cho quản lý đơn hàng
Route::resource('orders', OrderController::class);
// Route để thêm mới khách hàng
Route::post('customers', [CustomerController::class, 'store'])->name('customers.store');

// Route để cập nhật khách hàng
Route::put('customers/{customer}', [CustomerController::class, 'update'])->name('customers.update');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
