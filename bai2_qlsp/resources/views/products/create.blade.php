@extends('layouts.app')

@section('content')
<div class="card shadow p-4 col-md-6 mx-auto">
    <h4 class="mb-4 text-center">Thêm Sản Phẩm Mới</h4>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Tên sản phẩm</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Giá</label>
            <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Số lượng</label>
            <input type="number" name="quantity" class="form-control @error('quantity') is-invalid @enderror" value="{{ old('quantity') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Danh mục</label>
            <input type="text" name="category" class="form-control @error('category') is-invalid @enderror" value="{{ old('category') }}">
        </div>
        <button type="submit" class="btn btn-primary w-100">Lưu sản phẩm</button>
        <a href="{{ route('products.index') }}" class="btn btn-link w-100 mt-2 text-secondary text-decoration-none">Quay lại</a>
    </form>
</div>
@endsection