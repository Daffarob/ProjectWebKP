<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProductTypeController;

Route::get('/view/welcome', function () {
    return view('welcome');
});

#login page
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/lupa-password', function () {
    return 'Halaman lupa password belum dibuat.';
})->name('password.request');

#register page
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

#customer katalog setelah login
Route::get('/katalog', function () {
    return view('customer.katalog');
})->name('customer.katalog');

#customer memilih katalog setelah login
Route::get('/pilih-mesin', [ProductTypeController::class, 'index'])->name('pilih.mesin');
Route::get('/katalog-produk/{jenis}', [ProductTypeController::class, 'show'])->name('katalog.produk');
