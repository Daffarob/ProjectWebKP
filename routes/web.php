<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\KatalogController;

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

#customer memilih katalog setelah login
Route::get('/pilih-mesin', [ProductTypeController::class, 'index'])->name('pilih.mesin');
Route::get('/katalog-produk/{jenis}', [ProductTypeController::class, 'show'])->name('katalog.produk');

#Customer katalog setelah login
#katalog-Digital Labels & Packaging
Route::get('/katalog', function () {
    return view('customer.katalog-Digital Labels & Packaging');
})->name('customer.katalog');
#Digital Commercial Printing
Route::get('/katalog2', function () {
    return view('customer.katalog-Digital Commercial Printing');
})->name('customer.katalog2');
#Finishing Digital & Label Printing
Route::get('/katalog3', function () {
    return view('customer.katalog-Finishing Digital & Label Printing');
})->name('customer.katalog3');
#3D Printer
Route::get('/katalog4', function () {
    return view('customer.katalog-3D Printer');
})->name('customer.katalog4');
#Garment Textile
Route::get('/katalog5', function () {
    return view('customer.katalog-Garment Textile');
})->name('customer.katalog5');
#Large Format Printing
Route::get('/katalog6', function () {
    return view('customer.katalog-Large Format Printing');
})->name('customer.katalog6');
#UV Print
Route::get('/katalog7', function () {
    return view('customer.katalog-UV Print');
})->name('customer.katalog7');
#Cutting & Finishing
Route::get('/katalog8', function () {
    return view('customer.katalog-UV Print');
})->name('customer.katalog8');
#Office & Retail
Route::get('/katalog9', function () {
    return view('customer.katalog-Office & Retail');
})->name('customer.katalog9');
#POS & PDT
Route::get('/katalog10', function () {
    return view('customer.katalog-POS & PDT');
})->name('customer.katalog10');
#Sports & Wellnes
Route::get('/katalog11', function () {
    return view('customer.katalog-Sports & Wellnes');
})->name('customer.katalog11');
#Medical
Route::get('/katalog12', function () {
    return view('customer.katalog-Medical');
})->name('customer.katalog12');



#admin katalog
Route::get('/katalogadmin', function () {
    return view('Admin.katalog-admin');
})->name('admin.katalog');
// routes/web.php
// Detail katalog berdasarkan jenis
Route::get('/admin/katalog/{jenis}', [KatalogController::class, 'index'])->name('katalog.index');

// Form create
Route::get('/admin/katalog/{jenis}/create', [KatalogController::class, 'create'])->name('katalog.create');

// Store katalog
Route::post('/admin/katalog/{jenis}', [KatalogController::class, 'store'])->name('katalog.store');

// Form edit
Route::get('/admin/katalog/{id}/edit', [KatalogController::class, 'edit'])->name('katalog.edit');

// Update katalog
Route::put('/admin/katalog/{id}', [KatalogController::class, 'update'])->name('katalog.update');

// Hapus katalog
Route::delete('/admin/katalog/{id}', [KatalogController::class, 'destroy'])->name('katalog.destroy');
