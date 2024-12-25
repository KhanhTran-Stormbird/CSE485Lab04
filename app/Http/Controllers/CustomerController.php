<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = customer::paginate(20);
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers',
            // ... other validations ...
        ]);

        Customer::create($request->all());

        return redirect()->route('customers.index')->with('success', 'Customer created successfully!');
    }

    // ... other methods (show, edit, update, destroy) ...
    public function edit($id)
    {
        // Tìm khách hàng theo ID
        $customer = Customer::findOrFail($id);

        // Trả về view chỉnh sửa
        return view('customers.edit', compact('customer'));
    } 
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'nullable|email', // Email có thể null, nhưng nếu có thì phải đúng định dạng
            'phone' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/', // Validate số điện thoại (tùy chỉnh regex nếu cần)
            // Thêm các rule validate khác nếu cần
        ]);

        $customer->update($request->all());

        return redirect()->route('customers.index')->with('success', 'Cập nhật khách hàng thành công.');
    }
}
