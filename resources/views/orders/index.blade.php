<!-- resources/views/orders/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h2>Danh Sách Đơn Hàng</h2>

    <a href="{{ route('orders.create') }}" class="btn btn-success mb-3">Tạo Đơn Hàng Mới</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Khách Hàng</th>
                <th>Ngày Đặt Hàng</th>
                <th>Trạng Thái</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->customer->name }}</td>
                    <td>{{ $order->order_date }}</td>
                    <td>{{ $order->status == 0 ? 'Chưa hoàn thành' : 'Hoàn thành' }}</td>
                    <td>
                        <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info">Xem Chi Tiết</a>
                        <!-- Thêm nút Xem Lịch Sử Mua Hàng -->
                        <a href="{{ route('orders.history', $order->customer->id) }}" class="btn btn-secondary">Lịch sử Mua Hàng</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
