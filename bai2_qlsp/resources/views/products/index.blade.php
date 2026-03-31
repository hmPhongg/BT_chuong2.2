@extends('layouts.app')

@section('content')
<div class="card shadow p-4">
    <div class="d-flex justify-content-between mb-3">
        <h3 class="text-primary">Quản Lý Kho</h3>
        <a href="{{ route('products.create') }}" class="btn btn-success">Thêm Sản Phẩm</a>
    </div>

    <form action="{{ route('products.index') }}" method="GET" class="row g-2 mb-4">
        <div class="col-md-10">
            <input type="text" name="search" class="form-control" placeholder="Tìm kiếm theo tên sản phẩm..." value="{{ request('search') }}">
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary w-100">Tìm kiếm</button>
        </div>
    </form>

    <table class="table table-hover border">
        <thead class="table-dark">
            <tr>
                <th>Tên</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Danh mục</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $p)
            <tr>
                <td>{{ $p->name }}</td>
                <td>{{ number_format($p->price) }} VNĐ</td>
                <td>{{ $p->quantity }}</td>
                <td>{{ $p->category }}</td>
                <td>
                    @if($p->quantity == 0)
                        <span class="badge bg-danger">Hết hàng</span>
                    @elseif($p->quantity < 5)
                        <span class="badge bg-warning text-dark">Sắp hết hàng</span>
                    @else
                        <span class="badge bg-success">Còn hàng</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('products.edit', $p->id) }}" class="btn btn-sm btn-info text-white">Sửa kho</a>
                    <form action="{{ route('products.destroy', $p->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Xóa sản phẩm này?')">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <div class="mt-3">
        {{ $products->appends(request()->query())->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection