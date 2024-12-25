@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="row w-100">
            <!-- Danh sách Sản phẩm -->
            <div class="col-md-8 mx-auto">
                <h2 class="text-center mb-4">Danh sách Sản phẩm</h2>
                <a href="{{ route('products.create') }}" class="btn btn-primary">Thêm sản phẩm mới</a>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên sản phẩm</th>
                            <th>Mô tả</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ number_format($product->price, 2) }} VNĐ</td>
                                <td>{{ $product->quantity }}</td>
                                <td>
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
