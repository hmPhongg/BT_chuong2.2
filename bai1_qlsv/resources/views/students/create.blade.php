@extends('layouts.app')

@section('content')
<div class="card p-4 shadow col-md-6 mx-auto">
    <h2 class="mb-4">Thêm sinh viên mới</h2>
    <form action="{{ route('students.store') }}" method="POST">
        @csrf <div class="mb-3">
            <label class="form-label">Họ và tên</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Ngành học</label>
            <input type="text" name="major" class="form-control @error('major') is-invalid @enderror" value="{{ old('major') }}">
            @error('major') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <button type="submit" class="btn btn-primary">Lưu</button>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection