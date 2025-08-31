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
use App\Http\Controllers\CartController;

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






// ========================
// 💡 DEFAULT & USER SECTION
// ========================

// Halaman utama (welcome)
Route::view('/', 'welcome')->name('home');

// Dashboard & profile (protected by auth)
Route::middleware('auth')->group(function () {
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

    // Produk user (logged-in)
    Route::get('/produk-user', function () {
        return view('pages.loggedin.produk');
    })->name('produk.user');

    // Cart routes
    Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
    Route::post('/cart/remove', [CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::post('/cart/update', [CartController::class, 'updateQuantity'])->name('cart.update');
    Route::get('/cart', [CartController::class, 'getCart'])->name('cart.get');
    Route::post('/cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');
});


// ========================
// 🔒 ADMIN SECTION (protected by admin middleware)
// ========================
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {

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

    // Produk Admin
    Route::prefix('produk')->name('admin.produk.')->group(function () {
        Route::get('/', function () {
            $categories = Category::all();
            $products = Product::with('category')->get();
            return view('pages.admin.produk', compact('categories', 'products'));
        })->name('index');
        
        Route::post('/store', function (\Illuminate\Http\Request $request) {
            try {
                $request->validate([
                    'nama_produk' => 'required|string|max:255',
                    'kategori_id' => 'required|exists:categories,id',
                    'spec_labels' => 'required|array',
                    'spec_labels.*' => 'required|string|max:100',
                    'spec_values' => 'required|array',
                    'spec_values.*' => 'required|string|max:255',
                    'gambar' => 'required|image|mimes:png,jpg,jpeg|max:2048',
                ]);

                // Format spesifikasi
                $specifications = [];
                for ($i = 0; $i < count($request->spec_labels); $i++) {
                    $specifications[] = [
                        'label' => $request->spec_labels[$i],
                        'value' => $request->spec_values[$i]
                    ];
                }

                // Simpan gambar
                $path = $request->file('gambar')->store('products', 'public');
                $gambarPath = '/storage/' . $path;

                // Generate unique ID untuk produk
                $productId = 'prod_' . uniqid() . '_' . time();

                // Buat produk baru
                $product = Product::create([
                    'id' => $productId,
                    'nama_produk' => $request->nama_produk,
                    'kategori_id' => $request->kategori_id,
                    'deskripsi' => $specifications,
                    'gambar' => $gambarPath,
                ]);

                return redirect()->back()->with('success', 'Produk berhasil ditambahkan dengan ID: ' . $product->id);
            } catch (\Exception $e) {
                \Log::error('Error creating product: ' . $e->getMessage());
                return redirect()->back()->with('error', 'Gagal menambahkan produk: ' . $e->getMessage())->withInput();
            }
        })->name('store');

        Route::put('/update/{id}', function (\Illuminate\Http\Request $request, $id) {
            try {
                $request->validate([
                    'nama_produk' => 'required|string|max:255',
                    'kategori_id' => 'required|exists:categories,id',
                    'spec_labels' => 'required|array',
                    'spec_labels.*' => 'required|string|max:100',
                    'spec_values' => 'required|array',
                    'spec_values.*' => 'required|string|max:255',
                    'gambar' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
                ]);

                $product = Product::findOrFail($id);

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
            } catch (\Exception $e) {
                \Log::error('Error updating product: ' . $e->getMessage());
                return redirect()->back()->with('error', 'Gagal memperbarui produk: ' . $e->getMessage())->withInput();
            }
        })->name('update');

        Route::delete('/delete/{id}', function ($id) {
            try {
                $product = Product::findOrFail($id);
                $product->delete();
                return redirect()->back()->with('success', 'Produk berhasil dihapus');
            } catch (\Exception $e) {
                \Log::error('Error deleting product: ' . $e->getMessage());
                return redirect()->back()->with('error', 'Gagal menghapus produk: ' . $e->getMessage());
            }
        })->name('delete');
    });
});


// ========================
// 🔐 AUTH (Laravel Breeze/Jetstream/etc.)
// ========================
// require __DIR__.'/auth.php'; // Commented out to use traditional authentication