@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card p-3 mb-3">
            <h5>Thêm SV/Môn học</h5>
            <form action="{{ route('master.store') }}" method="POST" class="mb-2">
                @csrf <input type="hidden" name="type" value="student">
                <input type="text" name="name" placeholder="Tên SV" class="form-control mb-1">
                <button class="btn btn-sm btn-secondary w-100">Thêm SV</button>
            </form>
            <form action="{{ route('master.store') }}" method="POST">
                @csrf <input type="hidden" name="type" value="course">
                <input type="text" name="name" placeholder="Tên môn" class="form-control mb-1">
                <input type="number" name="credits" placeholder="Số tín" class="form-control mb-1">
                <button class="btn btn-sm btn-secondary w-100">Thêm Môn</button>
            </form>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card p-4 shadow">
            <div class="d-flex justify-content-between mb-3">
                <h4>Tổng hợp tín chỉ SV</h4>
                <a href="{{ route('enrollments.create') }}" class="btn btn-primary">Đăng ký môn học</a>
            </div>
            
            @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif

            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr><th>Tên Sinh Viên</th><th>Tổng Tín Chỉ</th><th>Trạng thái</th></tr>
                </thead>
                <tbody>
                    @foreach($students as $s)
                    @php $total = $s->courses->sum('credits'); @endphp
                    <tr>
                        <td>{{ $s->name }}</td>
                        <td><strong>{{ $total }}</strong> / 18</td>
                        <td>
                            <div class="progress">
                                <div class="progress-bar" style="width: {{ ($total/18)*100 }}%"></div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection