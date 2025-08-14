<!DOCTYPE html>
<html lang="id" x-data="{ open: false }" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8">
    <title>Artikel & Berita | Samafitro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <style>
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
    <nav class="bg-gray-950 shadow fixed top-0 left-0 w-full z-50">
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
                            stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
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


    {{-- Judul Halaman --}}
    <section class="text-center py-10 px-4">
        <h1 class="text-3xl font-bold">Artikel & Berita</h1>
        <p class="text-sm text-gray-400 mt-1">Berita seputar produk dari samafitro</p>
        <hr class="w-24 mx-auto border-gray-500 mt-3">
    </section>

    {{-- Artikel Grid --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 pb-16">
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

    {{-- Alpine.js --}}
    <script src="//unpkg.com/alpinejs" defer></script>
</body>

</html>