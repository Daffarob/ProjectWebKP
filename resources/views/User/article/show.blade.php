<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $article->title }} | Samafitro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <style>
        html, body {
        height: 100%;
        }
        body {
            display: flex;
            flex-direction: column;
        }
        main {
            flex: 1; /* ini biar konten ngisi ruang kosong */
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
<body class="bg-gray-950 text-white font-sans leading-relaxed overflow-x-hidden">
        {{-- Navbar --}}
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

    <main class="min-h-screen py-10 px-5 sm:px-10">
        <div class="max-w-6xl mx-auto">

            {{-- Tombol Kembali --}}
            <div class="mb-6">
                <a href="{{ route('article.index') }}" class="inline-flex items-center text-blue-400 hover:text-blue-300 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    <span>Kembali ke Artikel</span>
                </a>
            </div>

{{-- Grid Layout --}}
<div class="bg-gradient-to-br from-gray-800 via-gray-900 to-black rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 p-6 md:p-8">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">

        {{-- Gambar Artikel --}}
        <div class="relative group flex justify-center">
            <img src="{{ asset('storage/' . $article->image) }}" 
                 alt="{{ $article->title }}"
                 class="w-full h-48 md:h-[250px] object-contain rounded-lg transform group-hover:scale-105 transition-transform duration-500 ease-in-out shadow-md bg-gray-900 p-3">
            <div class="absolute inset-0 rounded-lg opacity-0 group-hover:opacity-100 transition duration-300"></div>
        </div>

        {{-- Konten Artikel --}}
        <div class="flex flex-col h-full justify-between">
            {{-- Judul --}}
            <h1 class="text-3xl md:text-4xl font-extrabold text-white leading-snug mb-4">
                {{ $article->title }}
            </h1>

            {{-- Tahun --}}
            <p class="mb-4">
                <span class="inline-block bg-blue-800 px-3 py-1 rounded-full text-xs font-medium text-white">
                    Tahun: {{ $article->year }}
                </span>
            </p>

            {{-- Isi Artikel --}}
            <div class="text-gray-300 text-base leading-relaxed mb-6">
                {!! nl2br(e($article->content)) !!}
            </div>

            {{-- Tombol Share --}}
            <div class="flex flex-wrap gap-4 mt-auto">
                {{-- WhatsApp --}}
                <a href="https://wa.me/?text={{ urlencode($article->title . ' ' . url()->current()) }}" 
                   target="_blank" 
                   class="w-10 h-10 flex items-center justify-center bg-green-500 rounded-full hover:scale-110 transform transition">
                    <img src="{{ asset('images/WA.png') }}" alt="Share WhatsApp" class="w-6 h-6">
                </a>

                {{-- Facebook --}}
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" 
                   target="_blank" 
                   class="w-10 h-10 flex items-center justify-center bg-blue-600 rounded-full hover:scale-110 transform transition">
                    <img src="{{ asset('images/facebook.png') }}" alt="Share Facebook" class="w-6 h-6">
                </a>

                {{-- Instagram --}}
                <a href="https://www.instagram.com/" 
                   target="_blank" 
                   class="w-10 h-10 flex items-center justify-center bg-gradient-to-tr from-yellow-400 via-pink-500 to-purple-600 rounded-full hover:scale-110 transform transition">
                    <img src="{{ asset('images/instagram.png') }}" alt="Instagram" class="w-6 h-6">
                </a>
            </div>
        </div>

    </div>
</div>

         {{-- Floating WhatsApp --}}
    <a href="https://wa.me/6281234567890" target="_blank" class="floating-wa">
        <img src="{{ asset('images/buttonwa.png') }}" alt="WhatsApp">
    </a>

    {{-- Footer --}}
  <footer class="relative left-1/2 right-1/2 ml-[-50vw] mr-[-50vw] w-screen bg-gray-900 py-10 text-white text-sm">
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
    <!-- garis & teks bawah tetap dibatasi lebar konten -->
    <div class="mt-8 border-t border-gray-700 pt-4 text-center max-w-7xl mx-auto px-4">
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
