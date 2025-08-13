<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Models\Category;
use App\Models\Product;


use App\Http\Controllers\LoginController;

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

use App\Http\Controllers\RegisterController;

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


