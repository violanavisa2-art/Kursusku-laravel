<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// ===== Halaman publik (navigasi tetap bisa diakses) =====
Route::get('/', [HomeController::class, 'index'])->name('home');

// Ajax cek ketersediaan kursi (Pertemuan 9, dipindah ke database di Pertemuan 10-12)
Route::get('/courses/{course}/availability', [CourseController::class, 'availability'])
    ->name('courses.availability');

// CRUD Course (Pertemuan 10-11) + search/filter/pagination (Pertemuan 13)
Route::resource('courses', CourseController::class);

// Enrollment (Pertemuan 12)
Route::resource('enrollments', EnrollmentController::class)
    ->only(['index', 'create', 'store']);

// ===== Halaman setelah login (UAS Pertemuan 14) =====
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ===== Logout KursusKu: setelah keluar, arahkan ke halaman login =====
// Nama dan URL sengaja beda dari bawaan Breeze (logout) supaya tidak bentrok
Route::post('/keluar', function (Request $request) {
    Auth::guard('web')->logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/login');
})->middleware('auth')->name('keluar');

require __DIR__.'/auth.php';