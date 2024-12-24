<?php

// app/Http/Controllers/OrderController.php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Hiển thị danh sách đơn hàng
    public function index()
    {
        $orders = Order::with('customer')->get();
        return view('orders.index', compact('orders'));
    }

    // Hiển thị form thêm mới đơn hàng
    public function create()
    {
        $customers = Customer::all();
        $products = Product::all();
        return view('orders.create', compact('customers', 'products'));
    }

    // Lưu trữ đơn hàng mới
    public function store(Request $request)
    {
        // Validate dữ liệu đầu vào
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'order_date' => 'required|date',
            'status' => 'required|boolean',
            'products' => 'required|array',  // Kiểm tra xem có sản phẩm nào được chọn
            'products.*' => 'required|integer|min:1',  // Kiểm tra số lượng sản phẩm
        ]);

        // Tạo đơn hàng mới
        $order = Order::create([
            'customer_id' => $request->customer_id,
            'order_date' => $request->order_date,
            'status' => $request->status,
        ]);

        // Lưu các chi tiết đơn hàng (sản phẩm và số lượng)
        foreach ($request->products as $productId => $quantity) {
            $order->products()->attach($productId, ['quantity' => $quantity]);
        }

        // Sau khi tạo thành công, chuyển hướng về trang danh sách đơn hàng và hiển thị thông báo
        return redirect()->route('orders.index')->with('success', 'Đơn hàng đã được tạo thành công!');
    }

    // Hiển thị chi tiết đơn hàng
    public function show(Order $order)
    {
        $order->load('customer', 'products');
        return view('orders.show', compact('order'));
    }

    // Hiển thị form chỉnh sửa đơn hàng
    public function edit(Order $order)
    {
        $customers = Customer::all();
        $products = Product::all();
        $order->load('products');
        return view('orders.edit', compact('order', 'customers', 'products'));
    }

    // Cập nhật đơn hàng
    public function update(Request $request, Order $order)
    {
        // Validate dữ liệu
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'order_date' => 'required|date',
            'status' => 'required|boolean',
        ]);

        // Cập nhật đơn hàng
        $order->update([
            'customer_id' => $request->customer_id,
            'order_date' => $request->order_date,
            'status' => $request->status,
        ]);

        // Cập nhật chi tiết đơn hàng (sản phẩm và số lượng)
        $order->products()->sync($request->products);

        return redirect()->route('orders.index')->with('success', 'Đơn hàng đã được cập nhật thành công!');
    }

    // Xóa đơn hàng
    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Đơn hàng đã được xóa thành công!');
    }
    public function history(Customer $customer)
{
    // Lấy các đơn hàng của khách hàng
    $orders = $customer->orders()->with('products')->get();

    // Trả về view lịch sử đơn hàng của khách
    return view('orders.history', compact('orders', 'customer'));
}
}
