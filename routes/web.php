<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\PromoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminPromoController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;

// Halaman utama (welcome)
Route::view('/', 'welcome')->name('home');

// ========================
// 💡 USER SECTION
// ========================

// Dashboard & profile tanpa middleware auth (sementara)
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

// Halaman promo untuk user
Route::get('/promo', [PromoController::class, 'index'])->name('promo.index');

// ========================
// 🔒 ADMIN SECTION (dengan middleware)
// ========================
// Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
//     Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
//     Route::post('/dashboard', [AdminDashboardController::class, 'store'])->name('admin.dashboard.store');
//     Route::delete('/dashboard/{id}', [AdminDashboardController::class, 'destroy'])->name('admin.dashboard.destroy');

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::post('/dashboard', [AdminDashboardController::class, 'store'])->name('admin.dashboard.store');
    Route::delete('/dashboard/{id}', [AdminDashboardController::class, 'destroy'])->name('admin.dashboard.destroy');
//});
    // Promo Admin
    Route::resource('promos', AdminPromoController::class);
});

// Auth bawaan Laravel Breeze, Jetstream, dll
require __DIR__.'/auth.php';
