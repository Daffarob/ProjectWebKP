<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\PromoController;
use App\Http\Controllers\Admin\AdminPromoController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\User\ArticleController as UserArticleController;
use App\Http\Controllers\ProfileController;


// ========================
// 💡 DEFAULT & USER SECTION
// ========================

// Halaman utama (welcome)
Route::view('/', 'welcome')->name('home');

// Dashboard & profile (sementara tanpa auth)
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/profile', [ProfileController::class, 'index'])->name('User.profile.index');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('User.profile.edit');
Route::put('/profile/update', [ProfileController::class, 'update'])->name('User.profile.update');

// Halaman promo untuk user
Route::get('/promo', [PromoController::class, 'index'])->name('promo.index');
Route::get('/promo/{promo}', [PromoController::class, 'show'])->name('promo.show');

// Artikel user
Route::get('/artikel', [UserArticleController::class, 'index'])->name('article.index');
Route::get('/artikel/{id}', [UserArticleController::class, 'show'])->name('article.show');


// ========================
// 🔒 ADMIN SECTION (tanpa middleware dulu)
// ========================
Route::prefix('admin')->group(function () {

    // Dashboard Admin
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::post('/dashboard', [AdminDashboardController::class, 'store'])->name('admin.dashboard.store');
    Route::delete('/dashboard/{id}', [AdminDashboardController::class, 'destroy'])->name('admin.dashboard.destroy');

    // Promo Admin
    Route::prefix('promos')->name('admin.promos.')->group(function () {
        Route::get('/', [AdminPromoController::class, 'index'])->name('index');
        Route::get('/create', [AdminPromoController::class, 'create'])->name('create');
        Route::post('/', [AdminPromoController::class, 'store'])->name('store');
        Route::get('/{promo}/edit', [AdminPromoController::class, 'edit'])->name('edit');
        Route::put('/{promo}', [AdminPromoController::class, 'update'])->name('update');
        Route::delete('/{promo}', [AdminPromoController::class, 'destroy'])->name('destroy');
    });

    // Artikel Admin
    Route::resource('articles', AdminArticleController::class)->names('admin.articles');

    // Halaman statis: Hubungi Kami
    Route::view('/contact', 'admin.contact')->name('admin.contact');
});


// ========================
// 🔐 AUTH (Laravel Breeze/Jetstream/etc.)
// ========================
require __DIR__.'/auth.php';
