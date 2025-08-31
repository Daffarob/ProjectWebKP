<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ isset($promo) ? 'Edit Promo' : 'Tambah Promo' }} | Admin Samafitro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>

<style>
    body {
        background-color: #f9f9f9;
    }
    .form-section {
        background: #ffffff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        color: #000; /* pastikan teks hitam di form */
    }
    .form-control {
        background-color: #fff;
        color: #000;
        border: 1px solid #ccc;
    }
    .form-control::placeholder {
        color: #6c757d; /* abu-abu gelap agar jelas */
        opacity: 1;
    }
    label {
        font-weight: 600;
        color: #000;
    }
    .img-preview {
        width: 100px;
        border-radius: 8px;
        margin-top: 10px;
    }
    .btn-success {
        background-color: #28a745;
        border: none;
    }
    .btn-success:hover {
        background-color: #218838;
    }
</style>

</head>

<body class="bg-gradient-to-b from-gray-900 to-gray-800 text-white font-sans min-h-screen flex flex-col">

    <!-- Navbar -->
    <nav class="bg-gray-950 shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-4 py-3 flex items-center justify-between">
            <a href="#" class="flex items-center">
                <img src="{{ asset('images/logo-samafitro.png') }}" alt="Samafitro" class="h-16 mr-3">
            </a>

            <!-- Desktop Menu -->
            <ul class="hidden md:flex space-x-6 text-sm font-medium">
                <li><a href="{{ route('admin.dashboard') }}" class="hover:text-indigo-400 transition">Edit Beranda</a></li>
                <li><a href="#" class="hover:text-indigo-400 transition">Edit Produk</a></li>
                <li><a href="{{ route('admin.promos.index') }}" class="hover:text-indigo-400 transition">Edit Promo</a></li>
                <li><a href="{{ route('admin.articles.index') }}" class="hover:text-indigo-400 transition">Edit Artikel & Berita</a></li>
                <li><a href="#" class="hover:text-indigo-400 transition">Hubungi Kami</a></li>
            </ul>

            <!-- Icons -->
            <div class="hidden md:flex items-center space-x-4">
                <a href="#"><img src="/images/cart.png" class="h-6"></a>
                <a href="{{ route('User.profile.index') }}"><img src="/images/profile.png" class="h-6"></a>
            </div>

            <!-- Mobile Menu Button -->
            <button class="md:hidden text-white focus:outline-none" onclick="toggleMenu()">
                <i class="fas fa-bars text-xl"></i>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-gray-900 px-4 py-3 space-y-2">
            <a href="{{ route('admin.dashboard') }}" class="block hover:text-indigo-400">Edit Beranda</a>
            <a href="#" class="block hover:text-indigo-400">Edit Produk</a>
            <a href="{{ route('admin.promos.index') }}" class="block text-indigo-400 font-semibold">Edit Promo</a>
            <a href="{{ route('admin.articles.index') }}" class="block hover:text-indigo-400">Edit Artikel & Berita</a>
            <a href="#" class="block hover:text-indigo-400">Hubungi Kami</a>
            <div class="flex items-center space-x-4 pt-2 border-t border-gray-700">
                <a href="#"><img src="/images/cart.png" class="h-6"></a>
                <a href="{{ route('User.profile.index') }}"><img src="/images/profile.png" class="h-6"></a>
            </div>
        </div>
    </nav>


    <!-- Form Section -->
    <div class="container py-5 flex-grow">
        <div class="form-section mx-auto" style="max-width: 700px;">

    <!-- Button Back -->
        <div class="mb-3">
            <a href="{{ route('admin.promos.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>

            <h4 class="mb-4">{{ isset($promo) ? 'Edit Promo' : 'Tambah Promo Baru' }}</h4>

            <form action="{{ isset($promo) ? route('admin.promos.update', $promo->id) : route('admin.promos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($promo)) @method('PUT') @endif

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="name" class="form-label">Judul Promo</label>
                        <input type="text" name="name" class="form-control" value="{{ $promo->name ?? old('name') }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="vendor" class="form-label">Brand</label>
                        <input type="text" name="vendor" class="form-control" value="{{ $promo->vendor ?? old('vendor') }}" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="label" class="form-label">Label</label>
                        <input type="text" name="label" class="form-control" value="{{ $promo->label ?? old('label') }}">
                    </div>
                    <div class="col-md-3">
                        <label for="discount" class="form-label">Diskon (%)</label>
                        <input type="text" name="discount" class="form-control" value="{{ $promo->discount ?? old('discount') }}">
                    </div>
                    <div class="col-md-3">
                        <label for="periode" class="form-label">Periode</label>
                        <input type="date" name="periode" class="form-control" value="{{ $promo->periode ?? old('periode') }}">
                    </div>
                </div>
                
                <div class="mb-3">
                <label for="terms" class="form-label">Syarat & Ketentuan (masing-masing baris dipisah newline)</label>
                <textarea name="terms" rows="5" class="form-control" placeholder="Tulis syarat & ketentuan, setiap baris akan menjadi item list...">{{ old('terms', $promo->terms ?? '') }}</textarea>
                <div class="form-text">Contoh: baris pertama = "Khusus pengguna kartu X"</div>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Upload Gambar</label>
                    <input type="file" name="image" class="form-control">
                    @if(isset($promo) && $promo->image)
                        <img src="{{ asset('storage/' . $promo->image) }}" class="img-preview" alt="Preview">
                    @endif
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-success w-100">
                        {{ isset($promo) ? 'Update Promo' : 'Simpan Promo' }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- Footer --}}
<footer class="bg-gray-900 py-10 text-white text-sm">
    <div class="max-w-7xl mx-auto px-4 flex flex-col md:flex-row gap-10">
        <div class="flex-shrink-0">
            <img src="{{ asset('images/logo-samafitro.png') }}" alt="Samafitro Logo" class="h-20 sm:h-24">
        </div>
        <div>
            <h3 class="text-lg font-semibold mb-4">Social Media Kami :</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">

                <div class="flex items-center gap-2">
                    <img src="{{ asset('images/email.png') }}" alt="Email" class="h-5 w-5">
                    <span>samafitro_bdg@samafitro.co.id</span>
                </div>

                <div class="flex items-center gap-2">
                    <img src="{{ asset('images/instagram.png') }}" alt="Instagram" class="h-5 w-5">
                    <span>@samafitro_bandung</span>
                </div>

                <div class="flex items-center gap-2">
                    <img src="{{ asset('images/youtube.png') }}" alt="YouTube" class="h-5 w-5">
                    <span>Samafitro Bandung</span>
                </div>

                <div class="flex items-center gap-2">
                    <img src="{{ asset('images/tokopedia.png') }}" alt="Store" class="h-5 w-5">
                    <span>Official Store</span>
                </div>

                <div class="flex items-center gap-2">
                    <img src="{{ asset('images/facebook.png') }}" alt="Facebook" class="h-5 w-5">
                    <span>@SamafitroBandung</span>
                </div>

                <div class="flex items-center gap-2">
                    <img src="{{ asset('images/tiktok.png') }}" alt="TikTok" class="h-5 w-5">
                    <span>@samafitro.bandung</span>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-8 border-t border-gray-700 pt-4 text-center">
        <p class="flex items-center justify-center gap-2">
            <span>Copyright</span>
            <img src="{{ asset('images/ccopyright.png') }}" alt="Copyright" class="h-4 w-4">
            <span>2025 Cabang PT Samafitro Bandung</span>
        </p>
        <p>Oleh Tim Developer Kami</p>
    </div>
</footer>

    {{-- Alpine.js --}}
    <script src="//unpkg.com/alpinejs" defer></script>

</body>
</html>