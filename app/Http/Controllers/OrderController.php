<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Hiển thị danh sách đơn hàng với phân trang
    public function index()
    {
        $orders = Order::with('customer')->paginate(10); // Thêm phân trang
        return view('orders.index', compact('orders'));
    }

    // Hiển thị form thêm mới đơn hàng
    public function create()
    {
        $customers = Customer::all(); // Lấy danh sách khách hàng
        $products = Product::all(); // Lấy danh sách sản phẩm
        return view('orders.create', compact('customers', 'products'));
    }

    // Lưu trữ đơn hàng mới
    public function store(Request $request)
    {
        // Validate dữ liệu đầu vào
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'order_date' => 'required|date',
            'products' => 'required|array|min:1', // Đảm bảo có ít nhất 1 sản phẩm
            'products.*.id' => 'required|exists:products,id', // Kiểm tra ID sản phẩm tồn tại
            'products.*.quantity' => 'required|integer|min:1', // Số lượng tối thiểu là 1
        ]);

        // Tạo đơn hàng
        $order = Order::create([
            'customer_id' => $request->customer_id,
            'order_date' => $request->order_date,
            'status' => $request->status ?? 'pending', // Giá trị mặc định là 'pending'
        ]);

        // Thêm chi tiết đơn hàng
        foreach ($request->products as $product) {
            $order->orderDetails()->create([
                'product_id' => $product['id'],
                'quantity' => $product['quantity'],
            ]);
        }

        // Chuyển hướng về danh sách đơn hàng với thông báo thành công
        return redirect()->route('orders.index')->with('success', 'Đơn hàng đã được tạo thành công!');
    }

    // Hiển thị chi tiết đơn hàng
    public function show(Order $order)
    {
        $order->load('customer', 'orderDetails.product'); // Nạp thêm thông tin chi tiết đơn hàng
        return view('orders.show', compact('order'));
    }

    // Hiển thị form chỉnh sửa đơn hàng
    public function edit(Order $order)
    {
        $customers = Customer::all();
        $products = Product::all();
        $order->load('orderDetails.product'); // Nạp thông tin sản phẩm trong đơn hàng
        return view('orders.edit', compact('order', 'customers', 'products'));
    }

    // Cập nhật đơn hàng
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'order_date' => 'required|date',
            'status' => 'required|in:pending,processing,completed,cancelled',
            'products' => 'required|array|min:1',
            'products.*.id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
        ]);

        // Cập nhật thông tin đơn hàng
        $order->update([
            'customer_id' => $request->customer_id,
            'order_date' => $request->order_date,
            'status' => $request->status,
        ]);

        // Cập nhật chi tiết đơn hàng
        $order->orderDetails()->delete(); // Xóa các chi tiết cũ
        foreach ($request->products as $product) {
            $order->orderDetails()->create([
                'product_id' => $product['id'],
                'quantity' => $product['quantity'],
            ]);
        }

        return redirect()->route('orders.show', $order)->with('success', 'Đơn hàng đã được cập nhật thành công!');
    }

    // Xóa đơn hàng
    public function destroy(Order $order)
    {
        $order->orderDetails()->delete(); // Xóa các chi tiết liên quan
        $order->delete(); // Xóa đơn hàng

        return redirect()->route('orders.index')->with('success', 'Đơn hàng đã được xóa thành công!');
    }
}
