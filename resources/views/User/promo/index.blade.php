<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Promo Menarik Bulan Ini</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-color: #1f1f1f;
            color: white;
        }
        .promo-title {
            font-weight: 600;
        }
        .promo-subtitle {
            color: #bbb;
        }
        .promo-tag {
            position: absolute;
            top: 0;
            left: 0;
            background: #d32f2f;
            color: white;
            font-weight: bold;
            padding: 0.4rem 1rem;
            border-top-left-radius: 12px;
            border-bottom-right-radius: 12px;
            font-size: 0.95rem;
            z-index: 10;
        }
        .floating-wa { 
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 999;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .floating-wa img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }
        .floating-wa:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 14px rgba(0, 255, 0, 0.5);
        }
    </style>
</head>
<body class="bg-gradient-to-b from-gray-900 via-gray-800 to-gray-900 text-white font-sans">
{{-- Navbar --}}
<nav x-data="{ open: false }" class="bg-gray-950 shadow fixed top-0 left-0 w-full z-50">
    <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">

        {{-- Logo --}}
        <div class="flex items-center space-x-3">
            <img src="{{ asset('images/logo-samafitro.png') }}" alt="Samafitro" class="h-12 md:h-16 w-auto max-h-14">
        </div>

        {{-- Desktop Menu --}}
        <ul class="hidden md:flex flex-wrap space-x-4 lg:space-x-8 text-xs md:text-sm font-medium text-white">
            <li><a href="{{ route('dashboard') }}" class="hover:text-blue-400">Beranda</a></li>
            <li><a href="#" class="hover:text-blue-400">Produk</a></li>
            <li><a href="{{ route('promo.index') }}" class="hover:text-blue-400">Promo</a></li>
            <li><a href="{{ route('article.index') }}" class="hover:text-blue-400">Artikel & Berita</a></li>
            <li><a href="#" class="hover:text-blue-400">Hubungi Kami</a></li>
        </ul>

        {{-- Desktop Icons --}}
        <div class="hidden md:flex space-x-4">
            <a href="#"><img src="/images/cart.png" alt="Cart" class="h-6 w-6 hover:opacity-80 transition duration-200" /></a>
            <a href="{{ route('User.profile.index') }}"><img src="/images/profile.png" alt="User" class="h-6 w-6 hover:opacity-80 transition duration-200" /></a>
        </div>

        {{-- Mobile Hamburger --}}
        <div class="md:hidden flex items-center space-x-4">
            <a href="#"><img src="/images/cart.png" alt="Cart" class="h-6 w-6 hover:opacity-80 transition duration-200" /></a>
            <a href="{{ route('User.profile.index') }}"><img src="/images/profile.png" alt="User" class="h-6 w-6 hover:opacity-80 transition duration-200" /></a>
            <button @click="open = !open" class="text-white focus:outline-none ml-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <div x-show="open" x-transition
         class="md:hidden absolute top-full left-0 w-full bg-gray-950 border-t border-gray-800">
        <ul class="flex flex-col space-y-3 px-6 py-4 text-white text-sm">
            <li><a href="{{ route('dashboard') }}" class="hover:text-blue-400">Beranda</a></li>
            <li><a href="#" class="hover:text-blue-400">Produk</a></li>
            <li><a href="{{ route('promo.index') }}" class="hover:text-blue-400">Promo</a></li>
            <li><a href="{{ route('article.index') }}" class="hover:text-blue-400">Artikel & Berita</a></li>
            <li><a href="#" class="hover:text-blue-400">Hubungi Kami</a></li>
        </ul>
    </div>
</nav>

{{-- Tambahkan padding di awal halaman supaya konten tidak ketimpa --}}
<div class="pt-20"></div>

{{-- Pastikan Alpine.js ter-load --}}
<script src="//unpkg.com/alpinejs" defer></script>


    {{-- Promo Section --}}
    <div class="container py-5">
        <h2 class="text-center text-2xl sm:text-3xl md:text-4xl font-bold promo-title">Promo Menarik Bulan Ini</h2>
        <p class="text-center text-base sm:text-lg md:text-xl promo-subtitle mt-2">Produk yang kami tawarkan pada bulan ini</p>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mt-4">
            @foreach($promos as $promo)
                <div class="col">
                    <div class="bg-white text-dark rounded-3 overflow-hidden shadow position-relative h-100 d-flex flex-column">
                        <div class="promo-tag">
                            Diskon {{ $promo['discount'] ?? '30%' }}
                            <div style="font-size: 0.7rem; font-weight: 400;">Brand {{ $promo['vendor'] }}</div>
                        </div>

                        <img src="{{ asset('storage/' . $promo->image) }}" class="w-100" style="height: 180px; object-fit: cover;" alt="{{ $promo['title'] }}">

                        <div class="p-3 d-flex flex-column justify-content-between flex-grow-1">
                            <div>
                                <h5 class="fw-semibold">{{ $promo['title'] }}</h5>
                                <div class="mb-2">
                                    <span class="badge bg-secondary me-1">{{ $promo['vendor'] }}</span>
                                    <span class="badge bg-secondary">{{ $promo['label'] }}</span>
                                </div>
                                <p class="text-muted small mb-0"><i class="far fa-clock me-1"></i>Periode: {{ $promo['periode'] }}</p>
                            </div>
                            <div class="mt-3">
                                <a href="{{ route('promo.show', $promo->id) }}" class="btn btn-outline-dark w-100 d-flex justify-content-between align-items-center">
                                    <span>Lihat Detail</span>
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {{-- Floating WhatsApp --}}
    <a href="https://wa.me/6281234567890" target="_blank" class="floating-wa">
        <img src="{{ asset('images/buttonwa.png') }}" alt="WhatsApp">
    </a>

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

    <script>
        function toggleMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('hidden');
        }
    </script>

</body>
</html>
