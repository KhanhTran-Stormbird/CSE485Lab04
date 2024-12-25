{{-- resources/views/orders/show.blade.php --}}
@extends('layouts.app')

@section('content')
    <h2>Chi Tiết Đơn Hàng #{{ $order->id }}</h2>

    <p><strong>Khách Hàng:</strong> {{ $order->customer->name }}</p>
    <p><strong>Ngày Đặt Hàng:</strong> {{ $order->order_date }}</p>
    <p><strong>Trạng Thái:</strong> {{ $order->status == 0 ? 'Chưa hoàn thành' : 'Hoàn thành' }}</p>

    <h3>Sản Phẩm</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Tên Sản Phẩm</th>
                <th>Số Lượng</th>
                <th>Giá</th>
                <th>Tổng</th>
            </tr>
        </thead>
        <tbody>
            {{-- Kiểm tra xem có chi tiết đơn hàng hay không --}}
            @if ($order->orderDetails->isNotEmpty())
                @foreach ($order->orderDetails as $detail)
                    <tr>
                        <td>{{ $detail->product->name }}</td>
                        <td>{{ $detail->quantity }}</td>
                        <td>{{ number_format($detail->product->price, 2) }} VNĐ</td>
                        <td>{{ number_format($detail->quantity * $detail->product->price, 2) }} VNĐ</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4">Không có sản phẩm trong đơn hàng này.</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
