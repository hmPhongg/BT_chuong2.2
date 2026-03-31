@extends('layouts.app')

@section('content')
<div class="card p-4 shadow col-md-6 mx-auto">
    <h3>Đăng ký môn học</h3>
    @if(session('error')) <div class="alert alert-danger">{{ session('error') }}</div> @endif

    <form action="{{ route('enrollments.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Chọn Sinh Viên</label>
            <select name="student_id" class="form-select">
                @foreach($students as $s) <option value="{{ $s->id }}">{{ $s->name }}</option> @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Chọn Môn Học</label>
            <select name="course_id" class="form-select">
                @foreach($courses as $c) <option value="{{ $c->id }}">{{ $c->name }} ({{ $c->credits }} tín)</option> @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success w-100">Xác nhận đăng ký</button>
        <a href="{{ route('enrollments.index') }}" class="btn btn-link w-100 mt-2">Quay lại</a>
    </form>
</div>
@endsection