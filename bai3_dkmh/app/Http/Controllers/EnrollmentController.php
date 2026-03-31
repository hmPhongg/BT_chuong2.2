<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function index()
    {
        // Lấy danh sách sinh viên kèm theo tổng tín chỉ
        $students = Student::with('courses')->get();
        $enrollments = Enrollment::with(['student', 'course'])->latest()->get();
        
        return view('enrollments.index', compact('students', 'enrollments'));
    }

    public function create()
    {
        $students = Student::all();
        $courses = Course::all();
        return view('enrollments.create', compact('students', 'courses'));
    }

    public function store(Request $request)
    {
        $studentId = $request->student_id;
        $courseId = $request->course_id;

        // 1. Kiểm tra đăng ký trùng
        $exists = Enrollment::where('student_id', $studentId)
                            ->where('course_id', $courseId)
                            ->exists();
        if ($exists) {
            return redirect()->back()->with('error', 'Sinh viên này đã đăng ký môn học này rồi!');
        }

        // 2. Tính tổng số tín chỉ hiện tại + tín chỉ môn mới
        $student = Student::find($studentId);
        $currentCredits = $student->courses()->sum('credits');
        $newCourse = Course::find($courseId);

        if (($currentCredits + $newCourse->credits) > 18) {
            return redirect()->back()->with('error', 'Vượt quá giới hạn 18 tín chỉ (Hiện có: '.$currentCredits.')');
        }

        // 3. Lưu đăng ký
        Enrollment::create($request->all());
        return redirect()->route('enrollments.index')->with('success', 'Đăng ký thành công!');
    }

    /**
     * Hàm thêm nhanh SV và Môn học để test bài
     * Đã gộp và thêm Validation chống lỗi Null
     */
    public function addMasterData(Request $request) 
    {
        // Kiểm tra dữ liệu đầu vào
        $request->validate([
            'name' => 'required',
        ]);

        if($request->type == 'student') {
            Student::create(['name' => $request->name]);
        } else {
            Course::create([
                'name' => $request->name, 
                'credits' => $request->credits ?? 0
            ]);
        }

        return redirect()->back()->with('success', 'Thêm dữ liệu thành công!');
    }
}