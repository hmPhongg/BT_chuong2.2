@extends('layouts.app')

@section('content')
<div class="card shadow p-4 col-md-6 mx-auto">
    <h4 class="mb-4 text-center text-info">Cập Nhật Tồn Kho</h4>
    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label class="form-label font-weight-bold">Sản phẩm: {{ $product->name }}</label>
        </div>
        <div class="mb-3">
            <label class="form-label">Cập nhật số lượng mới</label>
            <input type="number" name="quantity" class="form-control" value="{{ $product->quantity }}">
        </div>
        <button type="submit" class="btn btn-info text-white w-100">Cập nhật kho</button>
        <a href="{{ route('products.index') }}" class="btn btn-link w-100 mt-2 text-secondary text-decoration-none">Hủy bỏ</a>
    </form>
</div>
@endsection