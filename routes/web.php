<?php

use Illuminate\Support\Facades\Route;
use App\Models\Category;
use App\Models\Product;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\PromoController;
use App\Http\Controllers\Admin\AdminPromoController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\User\ArticleController as UserArticleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CartController;

// Tampilkan form login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// Proses login
Route::post('/login', [LoginController::class, 'login']);

// Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Reset password (opsional, bisa pakai Laravel Breeze atau Fortify)
Route::get('/password/reset', function () {
    return view('auth.forgot-password');
})->name('password.request');

// Tampilkan form daftar
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');

// Proses pendaftaran
Route::post('/register', [RegisterController::class, 'register']);


Route::get('/', function () {
    if (!session()->has('splash_shown')) {
        session(['splash_shown' => true]);
        return view('pages.splash');
    }
    return redirect('/beranda');
});
Route::get('/beranda', function () {
    return view('pages.beranda');
});

// Halaman Tentang Kami
Route::get('/tentangkami', function () {
    return view('pages.tentangkami');
});

// ✅ Halaman Kantor Cabang
Route::get('/kantor-cabang', function () {
    return view('pages.kantor-cabang'); // Pastikan ada file resources/views/kantor-cabang.blade.php
});

// ✅ Halaman Kantor Cabang
Route::get('/hubungi-kami', function () {
    return view('pages.hubungikami'); // Pastikan ada file resources/views/kantor-cabang.blade.php
});


// Halaman produk user
Route::get('/produk', function () {
    return view('pages.produk');
});

// API untuk halaman produk
Route::get('/produk/json', function () {
    $categories = Category::select('id', 'name')->get();
    $products = Product::select('id', 'kategori_id', 'nama_produk', 'deskripsi', 'gambar')->get();

    return response()->json([
        'categories' => $categories,
        'products' => $products
    ]);
});

// Route untuk Keranjang
Route::get('/keranjang', [CartController::class, 'index'])->name('cart.index');
Route::post('/keranjang/tambah', [CartController::class, 'add'])->name('cart.add');
Route::delete('/cart/{cart}', [CartController::class, 'remove'])->name('cart.remove');
Route::put('/cart/{cart}', [CartController::class, 'update'])->name('cart.update');


// Halaman admin
Route::get('/produksales/admin', function () {
    $categories = Category::all();
    $products = Product::with('category')->get();
    return view('admin.produk', compact('categories', 'products'));
})->name('admin.produk');

// Simpan produk baru
Route::post('/admin/produk', function (\Illuminate\Http\Request $request) {
    $request->validate([
        'nama_produk' => 'required|string|max:255',
        'kategori_id' => 'required|exists:categories,id',
        'spec_labels' => 'required|array',
        'spec_labels.*' => 'required|string|max:100',
        'spec_values' => 'required|array',
        'spec_values.*' => 'required|string|max:255',
        'gambar' => 'required|image|mimes:png,jpg,jpeg|max:2048', // ✅ Perbaikan
    ]);

    // Generate ID unik
    $id = uniqid('prod_');

    // Format spesifikasi
    $specifications = [];
    for ($i = 0; $i < count($request->spec_labels); $i++) {
        $specifications[] = [
            'label' => $request->spec_labels[$i],
            'value' => $request->spec_values[$i]
        ];
    }

    // ✅ Simpan gambar ke storage
    $path = $request->file('gambar')->store('products', 'public');

    // Simpan ke database
    \App\Models\Product::create([
        'id' => $id,
        'kategori_id' => $request->kategori_id,
        'nama_produk' => $request->nama_produk,
        'deskripsi' => $specifications,
        'gambar' => '/storage/' . $path, // URL akses publik
    ]);

    return redirect()->back()->with('success', 'Produk berhasil ditambahkan');
})->name('admin.produk.store');
// Update produk
Route::put('/admin/produk/update/{id}', function (\Illuminate\Http\Request $request, $id) {
    $request->validate([
        'nama_produk' => 'required|string|max:255',
        'kategori_id' => 'required|exists:categories,id',
        'spec_labels' => 'required|array',
        'spec_labels.*' => 'required|string|max:100',
        'spec_values' => 'required|array',
        'spec_values.*' => 'required|string|max:255',
        'gambar' => 'nullable|image|mimes:png,jpg,jpeg|max:2048', // nullable karena opsional
    ]);

    $product = \App\Models\Product::findOrFail($id);

    // Format spesifikasi
    $specifications = [];
    for ($i = 0; $i < count($request->spec_labels); $i++) {
        $specifications[] = [
            'label' => $request->spec_labels[$i],
            'value' => $request->spec_values[$i]
        ];
    }

    // Jika ada gambar baru, simpan
    if ($request->hasFile('gambar')) {
        // Hapus gambar lama (opsional)
        // ...

        $path = $request->file('gambar')->store('products', 'public');
        $gambarPath = '/storage/' . $path;
    } else {
        $gambarPath = $product->gambar;
    }

    // Update produk
    $product->update([
        'kategori_id' => $request->kategori_id,
        'nama_produk' => $request->nama_produk,
        'deskripsi' => $specifications,
        'gambar' => $gambarPath,
    ]);

    return redirect()->back()->with('success', 'Produk berhasil diperbarui');
})->name('admin.produk.update');

// Hapus produk
Route::delete('/admin/produk/delete/{id}', function ($id) {
    Product::destroy($id);
    return redirect()->back()->with('success', 'Produk berhasil dihapus');
})->name('admin.produk.delete');


// ========================
// 💡 DEFAULT & USER SECTION
// ========================

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
require __DIR__ . '/auth.php';
