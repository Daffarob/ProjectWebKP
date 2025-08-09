<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Samafitro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite('resources/css/app.css')
    <script src="https://unpkg.com/alpinejs" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous" />
</head>
<body class="bg-gradient-to-b from-gray-900 via-gray-800 to-gray-900 text-white font-sans">
    {{-- Navbar --}}
    <nav x-data="{ open: false }" class="bg-gray-950 shadow relative z-50">
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

    {{-- Carousel --}}
    <section x-data="carousel()" x-init="start()" class="max-w-7xl mx-auto px-4 py-14">
        <div class="relative overflow-hidden h-[400px] md:h-[600px] rounded-3xl shadow-2xl bg-gray-900">
            <template x-for="(slide, index) in slides" :key="index">
                <div x-show="activeIndex === index" x-transition class="absolute inset-0 md:relative flex flex-col md:flex-row items-center w-full h-full">
                    <div class="w-full md:w-1/2 bg-black/40 backdrop-blur-md p-6 sm:p-8 md:p-12 flex flex-col justify-center space-y-4">
                        <h2 class="text-white text-2xl sm:text-3xl md:text-4xl font-bold" x-text="slide.title"></h2>
                        <h3 class="text-blue-400 text-lg md:text-xl font-semibold" x-text="slide.brand"></h3>
                        <p class="text-gray-200 text-sm sm:text-base md:text-lg" x-text="slide.description"></p>
                    </div>
                    <div class="w-full md:w-1/2 flex items-center justify-center p-4">
                        <img :src="slide.image" alt="Slide Image" class="max-h-[300px] sm:max-h-[400px] md:max-h-[500px] object-contain rounded-xl shadow-lg">
                    </div>
                </div>
            </template>
            <button @click="prev" class="absolute top-1/2 left-2 sm:left-6 transform -translate-y-1/2 bg-black/40 hover:bg-black/60 text-3xl px-3 py-1 rounded-full z-10">‹</button>
            <button @click="next" class="absolute top-1/2 right-2 sm:right-6 transform -translate-y-1/2 bg-black/40 hover:bg-black/60 text-3xl px-3 py-1 rounded-full z-10">›</button>
        </div>
    </section>

    <script>
        function carousel() {
            return {
                // gunakan data yang sudah disiapkan di controller
                slides: @json($carousels ?? []),
                activeIndex: 0,
                start() {
                    if (this.slides.length > 0) {
                        this.activeIndex = 0;
                        // interval otomatis, simpan id kalau ingin stop nanti
                        this._interval = setInterval(() => this.next(), 4000);
                    } else {
                        this.activeIndex = -1;
                    }
                },
                next() {
                    if (this.slides.length === 0) return;
                    this.activeIndex = (this.activeIndex + 1) % this.slides.length;
                },
                prev() {
                    if (this.slides.length === 0) return;
                    this.activeIndex = (this.activeIndex - 1 + this.slides.length) % this.slides.length;
                }
            }
        }
    </script>

    {{-- Section with text and images --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 py-12 grid grid-cols-1 md:grid-cols-3 gap-6 items-center">
        <div class="flex flex-col gap-4">
            @foreach($gradient_cards->take(2) as $card)
                <div class="rounded-2xl bg-gray-800 p-4 flex items-center justify-center shadow-lg">
                    <img src="{{ asset('storage/' . $card->gambar) }}" alt="{{ $card->judul ?? 'Gradient Card' }}" class="object-contain w-full h-[180px]">
                </div>
            @endforeach
        </div>
        <div class="text-center">
            <h2 class="text-xl sm:text-2xl md:text-4xl font-bold">Kepercayaan Anda,<br> keahlian kami</h2>
            <p class="mt-3 text-gray-300 text-sm sm:text-base">Dengan mesin yang berperforma tinggi,<br> memberikan pengalaman terbaik kepada Anda</p>
        </div>
        <div class="flex flex-col gap-4">
            @foreach($gradient_cards->slice(2, 2) as $card)
                <div class="rounded-2xl bg-gray-800 p-4 flex items-center justify-center shadow-lg">
                    <img src="{{ asset('storage/' . $card->gambar) }}" alt="{{ $card->judul ?? 'Gradient Card' }}" class="object-contain w-full h-[180px]">
                </div>
            @endforeach
        </div>
    </section>

    {{-- Items dari database --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 py-10">
            <div class="max-w-6xl mx-auto px-4 py-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @forelse($items as $item)
            <div class="bg-white shadow rounded-xl overflow-hidden">
                @if($item->gambar)
                    <img src="{{ asset('storage/' . $item->gambar) }}" class="w-full h-48 object-cover" alt="{{ $item->judul }}">
                @endif
                <div class="p-4">
                    <h2 class="text-lg font-bold">{{ $item->judul }}</h2>
                    @if($item->brand)
                        <p class="text-sm text-gray-500">{{ $item->brand }}</p>
                    @endif
                    <p class="text-gray-700 mt-2">{{ $item->deskripsi }}</p>
                </div>
            </div>
        @empty
            <p class="col-span-full text-center text-gray-500">Belum ada konten.</p>
        @endforelse
    </div>
    </section>

    {{-- Footer --}}
    <footer class="bg-gray-900 py-10 text-white text-sm">
        <div class="max-w-7xl mx-auto px-4 flex flex-col md:flex-row gap-10">
            <div class="flex-shrink-0">
                <img src="{{ asset('images/logo-samafitro.png') }}" alt="Samafitro Logo" class="h-20 sm:h-24">
            </div>
            <div>
                <h3 class="text-lg font-semibold mb-4">Social Media Kami :</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                    <div class="flex items-center gap-2"><i class="fas fa-envelope"></i><span>samafitro_bdg@samafitro.co.id</span></div>
                    <div class="flex items-center gap-2"><i class="fab fa-instagram"></i><span>@samafitro_bandung</span></div>
                    <div class="flex items-center gap-2"><i class="fab fa-youtube"></i><span>Samafitro Bandung</span></div>
                    <div class="flex items-center gap-2"><i class="fas fa-store"></i><span>Official Store</span></div>
                    <div class="flex items-center gap-2"><i class="fab fa-facebook"></i><span>@SamafitroBandung</span></div>
                    <div class="flex items-center gap-2"><i class="fab fa-tiktok"></i><span>@samafitro.bandung</span></div>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>
