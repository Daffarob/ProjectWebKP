<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ isset($promo) ? 'Edit Promo' : 'Tambah Promo' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Tailwind CSS -->
    @vite('resources/css/app.css')
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        /* Tombol umum */
        button, .btn-back {
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
            transition: all 0.3s ease;
        }
        .btn-back {
            background-color: #6b7280;
            color: white;
            display: inline-block;
            text-decoration: none;
            margin-bottom: 20px;
        }
        .btn-back:hover { 
            background-color: #4b5563; 
        }
        button[type="submit"] {
            background-color: #2563eb;
            color: white;
            border: none;
            cursor: pointer;
        }
        button[type="submit"]:hover { 
            background-color: #1d4ed8; 
        }

        /* Input form */
        input[type="text"], input[type="date"], textarea, input[type="file"] {
            width: 100%;
            padding: 10px;
            background-color: #1f2937; /* abu gelap */
            border: 1px solid #374151;
            color: white;
            border-radius: 5px;
        }
        input::placeholder, textarea::placeholder {
            color: #9ca3af;
        }
        .img-preview {
            max-width: 100%; /* Menyesuaikan dengan lebar kolom */
            height: auto;
            border-radius: 8px;
            margin-top: 10px;
        }

        /* Overlay Menu Mobile */
        .overlay {
            visibility: hidden;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            z-index: 9999;
            overflow-y: auto;
            transition: visibility 0.3s, opacity 0.3s;
        }
        .overlay.active {
            visibility: visible;
        }
        .overlay ul {
            list-style: none;
            padding: 20px;
            margin: 0;
        }
        .overlay li {
            margin-bottom: 10px;
        }
        .overlay a {
            color: white;
            text-decoration: none;
            font-size: 16px;
            transition: color 0.3s;
        }
        .overlay a:hover {
            color: #2563eb;
        }

        /* Scroll Behavior */
        body {
            overscroll-behavior: contain;
        }

        /* Fix Layout */
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex: 1;
            padding-bottom: 80px; /* Jarak dari footer */
            overflow-y: auto; /* Scroll hanya pada konten utama */
        }

        footer {
            margin-top: auto; /* Footer selalu di bawah konten */
            position: relative;
            width: 100%;
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

        <!-- Mobile Menu Overlay -->
        <div id="mobile-menu-overlay" class="overlay">
            <div class="overlay-content">
                <ul>
                    <li><a href="{{ route('admin.dashboard') }}">Edit Beranda</a></li>
                    <li><a href="#">Edit Produk</a></li>
                    <li><a href="{{ route('admin.promos.index') }}" class="text-indigo-400 font-semibold">Edit Promo</a></li>
                    <li><a href="{{ route('admin.articles.index') }}">Edit Artikel & Berita</a></li>
                    <li><a href="#">Hubungi Kami</a></li>
                </ul>
                <div class="flex items-center space-x-4 pt-2 border-t border-gray-700">
                    <a href="#"><img src="/images/cart.png" class="h-6"></a>
                    <a href="{{ route('User.profile.index') }}"><img src="/images/profile.png" class="h-6"></a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Konten Utama -->
    <div class="container py-5 flex-grow">
        <div class="max-w-3xl mx-auto my-10 px-6 pb-28"> <!-- pb-28 untuk jarak extra dari footer -->
            <div class="bg-gradient-to-br from-gray-800 via-gray-900 to-black rounded-xl shadow-lg p-8">
                <a href="{{ route('admin.promos.index') }}" class="btn-back">← Kembali</a>
                <h2 class="text-2xl font-bold mb-6 text-white">
                    {{ isset($promo) ? 'Edit Promo' : 'Tambah Promo Baru' }}
                </h2>

                <form action="{{ isset($promo) ? route('admin.promos.update', $promo->id) : route('admin.promos.store') }}" 
                      method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @if(isset($promo)) @method('PUT') @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="name" class="block mb-2 font-semibold">Judul Promo</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $promo->name ?? '') }}" required>
                        </div>
                        <div>
                            <label for="vendor" class="block mb-2 font-semibold">Vendor</label>
                            <input type="text" name="vendor" id="vendor" value="{{ old('vendor', $promo->vendor ?? '') }}" required>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label for="label" class="block mb-2 font-semibold">Label</label>
                            <input type="text" name="label" id="label" value="{{ old('label', $promo->label ?? '') }}">
                        </div>
                        <div>
                            <label for="discount" class="block mb-2 font-semibold">Diskon (%)</label>
                            <input type="text" name="discount" id="discount" value="{{ old('discount', $promo->discount ?? '') }}">
                        </div>
                        <div>
                            <label for="periode" class="block mb-2 font-semibold">Periode</label>
                            <input type="date" name="periode" id="periode" value="{{ old('periode', $promo->periode ?? '') }}">
                        </div>
                    </div>

                    <div>
                        <label for="terms" class="block mb-2 font-semibold">Syarat dan Ketentuan</label>
                        <textarea name="terms" id="terms" rows="5" class="resize-y">{{ old('terms', $promo->terms ?? '') }}</textarea>
                    </div>

                    <div>
                        <label for="image" class="block mb-2 font-semibold">Upload Gambar</label>
                        <input type="file" name="image" id="image">
                    </div>

                    @if(isset($promo) && $promo->image)
                        <div>
                            <p class="text-sm text-gray-400 mb-2">Gambar saat ini:</p>
                            <img src="{{ asset('storage/' . $promo->image) }}" alt="Preview Promo" 
                                 class="img-preview border border-gray-700">
                        </div>
                    @endif

                    <button type="submit" 
                            class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded transition duration-200">
                        {{ isset($promo) ? 'Update Promo' : 'Simpan Promo' }}
                    </button>
                </form>
            </div>
        </div>
    </main>

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