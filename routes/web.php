<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;

Route::get('/', function () {
    return view('welcome');
});

// Authentication routes
Route::get('categories', function () {
    return view('customer.categories');
});

Route::get('categories/{nama_kategori}', function ($nama_kategori) {
    return view('customer.category_show', ['nama_kategori' => $nama_kategori]);
})->name('category.show')->where('nama_kategori', '.*'); // Assuming nama_kategori is numeric
Route::get('admin/categories/{nama_kategori}', function ($nama_kategori) {
    return view('admin.category.show', ['nama_kategori' => $nama_kategori]);
})->name('category.show')->where('nama_kategori', '.*'); // Assuming nama_kategori is numeric

// Route::middleware('auth')->group(function () {
// Protected routes that require authentication
Route::get('admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('admin/categories', [AdminController::class, 'manageCategories']);
Route::get('admin/categories/{nama_kategori}', [AdminController::class, 'showCategories'])->name('admin.categories.show');
Route::get('admin/products/create', [ProductController::class, 'create'])->name('admin.products.create');
Route::post('admin/products', [ProductController::class, 'store'])->name('admin.products.store');

// Additional authenticated routes can be added here
// });

// Routing for Products
Route::get('products', [ProductController::class, 'index'])->name('products.index');
Route::get('products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::put('products/{id}/edit', [ProductController::class, 'update'])->name('products.update');
Route::delete('products/{id}/delete', [ProductController::class, 'destroy'])->name('products.destroy');

// Routing for Categories
Route::get('categories', [CategoriesController::class, 'index'])->name('categories.index');
Route::get('categories/{nama_kategori}', [CategoriesController::class, 'show']);
Route::get('categories/create', [CategoriesController::class, 'create'])->name('categories.create');
Route::post('categories', [CategoriesController::class, 'store'])->name('categories.store');
Route::get('categories/{id}/edit', [CategoriesController::class, 'edit'])->name('categories.edit');
Route::put('categories/{id}', [CategoriesController::class, 'update'])->name('categories.update');
Route::delete('categories/{id}/delete', [CategoriesController::class, 'destroy'])->name('categories.destroy');

// Routing for Cart
Route::get('cart', [CartController::class, 'index'])->name('cart.view');
Route::post('cart', [CartController::class, 'add'])->name('cart.add');
