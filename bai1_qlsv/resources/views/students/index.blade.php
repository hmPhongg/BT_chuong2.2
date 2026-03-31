@extends('layouts.app')

@section('content')
<div class="card p-4 shadow">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary">Danh sách sinh viên</h2>
        <a href="{{ route('students.create') }}" class="btn btn-success">Thêm sinh viên</a>
    </div>

    <form action="{{ route('students.index') }}" method="GET" class="row g-2 mb-3">
        <div class="col-md-6">
            <input type="text" name="search" class="form-control" placeholder="Tìm theo tên..." value="{{ request('search') }}">
        </div>
        <div class="col-md-4">
            <select name="sort" class="form-select">
                <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>Tên: A - Z</option>
                <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Tên: Z - A</option>
            </select>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary w-100">Lọc</button>
        </div>
    </form>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Ngành</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $sv)
            <tr>
                <td>{{ $sv->id }}</td>
                <td>{{ $sv->name }}</td>
                <td>{{ $sv->major }}</td>
                <td>{{ $sv->email }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $students->appends(request()->query())->links('pagination::bootstrap-5') }}
</div>
@endsection