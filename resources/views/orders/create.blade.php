{{-- resources/views/orders/create.blade.php --}}
@extends('layouts.app')

@section('content')
    <h2>Tạo Đơn Hàng Mới</h2>

    {{-- Hiển thị thông báo thành công --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="customer_id">Chọn Khách Hàng</label>
            <select name="customer_id" id="customer_id" class="form-control">
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mt-3">
            <label for="products">Chọn Sản Phẩm và Số Lượng</label>
            <div id="product-list">
                @foreach($products as $product)
                    <div class="form-check">
                        <input type="number" name="products[{{ $product->id }}]" class="form-control" 
                               placeholder="Số lượng cho {{ $product->name }}" min="1" />
                    </div>
                @endforeach
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Tạo Đơn Hàng</button>
    </form>
@endsection
