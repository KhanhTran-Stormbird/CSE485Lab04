<!-- resources/views/orders/history.blade.php -->

@extends('layouts.app')

@section('content')
    <h2>Lịch Sử Mua Hàng Của Khách Hàng: {{ $customer->name }}</h2>

    <table class="table">
        <thead>
            <tr>
                <th>ID Đơn Hàng</th>
                <th>Ngày Đặt Hàng</th>
                <th>Sản Phẩm</th>
                <th>Số Lượng</th>
                <th>Trạng Thái</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->order_date }}</td>
                    <td>
                        @foreach ($order->products as $product)
                            {{ $product->name }} ({{ $product->pivot->quantity }}), 
                        @endforeach
                    </td>
                    <td>{{ $order->status == 0 ? 'Chưa hoàn thành' : 'Hoàn thành' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
