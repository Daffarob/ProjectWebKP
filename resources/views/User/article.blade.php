<!DOCTYPE html>
<html lang="id" x-data="{ open: false }" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <title>Artikel & Berita | Samafitro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="bg-gradient-to-b from-gray-900 via-gray-800 to-gray-900 text-white font-sans">
    {{-- Navbar --}}
    <nav class="bg-gray-950 shadow relative z-50">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">

            {{-- Logo --}}
            <div class="flex items-center space-x-3">
                <img src="{{ asset('images/logo-samafitro.png') }}" alt="Samafitro" class="h-12 md:h-16 w-auto max-h-14">
            </div>

            {{-- Desktop Menu --}}
            <ul class="hidden md:flex flex-wrap space-x-4 lg:space-x-8 text-xs md:text-sm font-medium text-white">
                <li><a href="{{ route('dashboard') }}" class="hover:text-blue-400">Home</a></li>
                <li><a href="#" class="hover:text-blue-400">Katalog Produk</a></li>
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
                <li><a href="{{ route('dashboard') }}" class="hover:text-blue-400">Home</a></li>
                <li><a href="#" class="hover:text-blue-400">Katalog Produk</a></li>
                <li><a href="{{ route('promo.index') }}" class="hover:text-blue-400">Promo</a></li>
                <li><a href="{{ route('article.index') }}" class="hover:text-blue-400">Artikel & Berita</a></li>
                <li><a href="#" class="hover:text-blue-400">Hubungi Kami</a></li>
            </ul>
        </div>
    </nav>

    {{-- Judul Halaman --}}
    <section class="text-center py-10 px-4">
        <h1 class="text-3xl font-bold">Artikel & Berita</h1>
        <p class="text-sm text-gray-400 mt-1">Berita seputar produk dari samafitro</p>
        <hr class="w-24 mx-auto border-gray-500 mt-3">
    </section>

    {{-- Artikel Grid --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-8 pb-16">
        @forelse ($articles as $article)
        <div class="bg-white text-black rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition duration-300 group">
            <div class="overflow-hidden aspect-[16/9] bg-gray-200">
                <img src="{{ asset('storage/' . $article->image) }}" alt="Artikel"
                     class="w-full h-full object-cover object-center group-hover:scale-105 transition duration-300">
            </div>
            <div class="p-5">
                <h2 class="font-semibold text-lg mb-1 line-clamp-2">{{ $article->title }}</h2>
                <p class="text-sm text-gray-600 mb-2">in {{ $article->year }}</p>
                <a href="{{ route('article.show', $article->id) }}"
                   class="text-sm text-blue-600 hover:underline hover:text-blue-800">
                    Read More...
                </a>
            </div>
        </div>
        @empty
        <div class="col-span-2 text-center text-gray-400">
            Tidak ada artikel yang tersedia saat ini.
        </div>
        @endforelse
    </section>

    {{-- Footer --}}
    <footer class="bg-gradient-to-b from-gray-900 to-gray-800 py-10 text-white text-sm">
        <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row gap-10">
            <div class="flex flex-col space-y-6">
                <img src="{{ asset('images/logo-samafitro.png') }}" alt="Samafitro Logo" class="h-20 sm:h-24">
            </div>
            <div>
                <h3 class="text-xl font-semibold mb-4">Social Media Kami :</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    <div class="flex items-center space-x-3"><i class="fas fa-envelope text-white text-lg"></i><span>samafitro_bdg@samafitro.co.id</span></div>
                    <div class="flex items-center space-x-3"><i class="fab fa-instagram text-white text-lg"></i><span>@samafitro_bandung</span></div>
                    <div class="flex items-center space-x-3"><i class="fab fa-youtube text-white text-lg"></i><span>Samafitro Bandung</span></div>
                    <div class="flex items-center space-x-3"><i class="fas fa-store text-white text-lg"></i><span>Samafitro Bandung Official Store</span></div>
                    <div class="flex items-center space-x-3"><i class="fab fa-facebook text-white text-lg"></i><span>@SamafitroBandung</span></div>
                    <div class="flex items-center space-x-3"><i class="fab fa-tiktok text-white text-lg"></i><span>@samafitro.bandung</span></div>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>
