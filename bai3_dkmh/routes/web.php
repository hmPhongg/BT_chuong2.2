<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnrollmentController;

// Đưa trang danh sách đăng ký làm trang chủ
Route::get('/', [EnrollmentController::class, 'index'])->name('enrollments.index');

// Các route chức năng
Route::get('/create', [EnrollmentController::class, 'create'])->name('enrollments.create');
Route::post('/store', [EnrollmentController::class, 'store'])->name('enrollments.store');

// Route bổ trợ để thêm dữ liệu mẫu (SV, Môn học)
Route::post('/add-master', [EnrollmentController::class, 'addMasterData'])->name('master.store');

// XÓA HOẶC COMMENT ĐOẠN DƯỚI NÀY ĐI
// Route::get('/', function () {
//     return view('welcome');
// });