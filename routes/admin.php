<?php

use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\clients\HomeController;
use Illuminate\Support\Facades\Route;

// Route::prefix('admin')->group(function () {
//     Route::get('/dashboard', function () {
//         return view('admin.pages.dashboard');
//     });
// });

Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});


