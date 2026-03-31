<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller {
    public function index(Request $request) {
        $query = Student::query();

        // Tìm kiếm theo tên
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Sắp xếp theo tên
        $sortOrder = $request->get('sort', 'asc');
        $query->orderBy('name', $sortOrder);

        // Phân trang 5 sinh viên/trang
        $students = $query->paginate(5);

        return view('students.index', compact('students'));
    }

    public function create() {
        return view('students.create');
    }

    public function store(Request $request) {
        // Validation dữ liệu
        $request->validate([
            'name'  => 'required|min:2',
            'major' => 'required',
            'email' => 'required|email|unique:students,email',
        ], [
            'email.unique' => 'Email này đã tồn tại!'
        ]);

        Student::create($request->all());
        return redirect()->route('students.index')->with('success', 'Thêm thành công!');
    }
}