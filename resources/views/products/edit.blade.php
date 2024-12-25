@extends('layouts.app')

@section('content')
    <h2>Sửa sản phẩm</h2>

    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Tên sản phẩm</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Mô tả</label>
            <textarea class="form-control" id="description" name="description" required>{{ $product->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Giá</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}" required>
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Số lượng tồn</label>
            <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $product->quantity }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật sản phẩm</button>
    </form>
@endsection
