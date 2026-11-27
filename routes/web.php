<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Ajax cek ketersediaan kursi (Pertemuan 9, dipindah ke database di Pertemuan 10-12)
Route::get('/courses/{course}/availability', [CourseController::class, 'availability'])
    ->name('courses.availability');

// CRUD Course (Pertemuan 10-11) + search/filter/pagination (Pertemuan 13)
Route::resource('courses', CourseController::class);

// Enrollment (Pertemuan 12)
Route::resource('enrollments', EnrollmentController::class)
    ->only(['index', 'create', 'store']);
