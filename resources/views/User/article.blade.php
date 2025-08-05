<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Artikel & Berita | Samafitro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css') {{-- Pastikan Tailwind CSS tersambung --}}
</head>
<body class="bg-gradient-to-b from-gray-800 to-gray-900 text-white font-sans">

    {{-- Navbar --}}
    <nav class="bg-black py-4 px-6 flex items-center justify-between">
        <div class="flex items-center space-x-4">
            <img src="{{ asset('images/logo-samafitro.png') }}" alt="Samafitro" class="h-6">
            <ul class="hidden md:flex space-x-6 text-sm text-white">
                <li><a href="/" class="hover:text-gray-400">Home</a></li>
                <li><a href="#" class="hover:text-gray-400">Katalog Produk</a></li>
                <li><a href="#" class="hover:text-gray-400">Promo</a></li>
                <li><a href="#" class="text-blue-400 font-semibold">Artikel & Berita</a></li>
                <li><a href="#" class="hover:text-gray-400">Hubungi Kami</a></li>
            </ul>
        </div>
        <div>
            <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18l-1 12H4L3 3z" />
            </svg>
        </div>
    </nav>

    {{-- Judul Halaman --}}
    <section class="text-center py-10">
        <h1 class="text-3xl font-bold">Artikel & Berita</h1>
        <p class="text-sm text-gray-400 mt-1">Berita seputar produk dari samafitro</p>
        <hr class="w-24 mx-auto border-gray-500 mt-3">
    </section>

    {{-- Artikel Grid --}}
    <section class="max-w-7xl mx-auto px-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-8 pb-16">
        @forelse ($articles as $article)
        <div class="bg-white text-black rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition duration-300 group">
            
            {{-- Gambar dengan ukuran tetap dan proporsional --}}
            <div class="overflow-hidden aspect-[16/9] bg-gray-200">
                <img src="{{ asset('storage/' . $article->image) }}" alt="Artikel"
                     class="w-full h-full object-cover object-center group-hover:scale-105 transition duration-300">
            </div>

            {{-- Konten --}}
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
            <!-- Logo -->
            <div class="flex flex-col space-y-6">
                <img src="{{ asset('images/logo-samafitro.png') }}" alt="Samafitro Logo" class="h-20 sm:h-24">
            </div>

            <!-- Social Media -->
            <div>
                <h3 class="text-xl font-semibold mb-4">Social Media Kami :</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-envelope text-white text-lg"></i>
                        <span>samafitro_bdg@samafitro.co.id</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <i class="fab fa-instagram text-white text-lg"></i>
                        <span>@samafitro_bandung</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <i class="fab fa-youtube text-white text-lg"></i>
                        <span>Samafitro Bandung</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-store text-white text-lg"></i>
                        <span>Samafitro Bandung Official Store</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <i class="fab fa-facebook text-white text-lg"></i>
                        <span>@SamafitroBandung</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <i class="fab fa-tiktok text-white text-lg"></i>
                        <span>@samafitro.bandung</span>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>
