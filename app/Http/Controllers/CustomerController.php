<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // Hiển thị danh sách khách hàng
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    // Hiển thị form thêm mới khách hàng
    public function create()
    {
        return view('customers.create');
    }
    // Lưu trữ khách hàng mới
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'address' => 'required',
        'phone' => 'required|numeric',
        'email' => 'required|email',
    ]);

    // Tạo khách hàng mới
    Customer::create($request->all());

    return redirect()->route('customers.index')->with('success', 'Customer created successfully.');
}

    // Hiển thị chi tiết khách hàng
    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }

    // Hiển thị form chỉnh sửa khách hàng
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    // Cập nhật khách hàng
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required|numeric',
            'email' => 'required|email',
        ]);

        $customer->update($request->all());

        return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
    }

    // Xóa khách hàng
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
    }
}
