<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Samafitro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite('resources/css/app.css')
    <script src="https://unpkg.com/alpinejs" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous" />
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
                <a href="{{ route('cart.index') }}"><img src="/images/cart.png" alt="Cart" class="h-6 w-6 hover:opacity-80 transition duration-200" /></a>
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

    {{-- Pastikan Alpine.js ter-load --}}
    <script src="//unpkg.com/alpinejs" defer></script>


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

    {{-- Section with text and images --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 py-12 grid grid-cols-1 md:grid-cols-3 gap-6 items-center">

        {{-- Left side cards --}}
        <div class="flex flex-col gap-4"
            x-data="{ show1: false, show2: false }"
            x-init="
            setInterval(() => { show1 = !show1 }, 3000);
            setTimeout(() => setInterval(() => { show2 = !show2 }, 3000), 1500);
         ">

            <div class="rounded-2xl bg-gray-800 p-4 flex items-center justify-center shadow-lg"
                x-show="show1"
                x-transition:enter="transition ease-out duration-700"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-700"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95">
                <img src="{{ asset('images/ucjv330.png') }}" alt="UCJV330" class="object-contain w-full h-[180px]">
            </div>

            <div class="rounded-2xl bg-gray-800 p-4 flex items-center justify-center shadow-lg"
                x-show="show2"
                x-transition:enter="transition ease-out duration-700"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-700"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95">
                <img src="{{ asset('images/lxir320.png') }}" alt="LXiR320" class="object-contain w-full h-[180px]">
            </div>
        </div>

        {{-- Center text --}}
        <div class="text-center">
            <h2 class="text-xl sm:text-2xl md:text-4xl font-bold">Kepercayaan Anda,<br> keahlian kami</h2>
            <p class="mt-3 text-gray-300 text-sm sm:text-base">
                Dengan mesin yang berperforma tinggi,<br> memberikan pengalaman terbaik kepada Anda
            </p>
        </div>

        {{-- Right side cards --}}
        <div class="flex flex-col gap-4"
            x-data="{ show3: false, show4: false }"
            x-init="
            setInterval(() => { show3 = !show3 }, 3000);
            setTimeout(() => setInterval(() => { show4 = !show4 }, 3000), 1500);
         ">

            <div class="rounded-2xl bg-gray-800 p-4 flex items-center justify-center shadow-lg"
                x-show="show3"
                x-transition:enter="transition ease-out duration-700"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-700"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95">
                <img src="{{ asset('images/tc20m.png') }}" alt="TC-20M" class="object-contain w-full h-[180px]">
            </div>

            <div class="rounded-2xl bg-gray-800 p-4 flex items-center justify-center shadow-lg"
                x-show="show4"
                x-transition:enter="transition ease-out duration-700"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-700"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95">
                <img src="{{ asset('images/prestos.png') }}" alt="Presto S" class="object-contain w-full h-[180px]">
            </div>
        </div>
    </section>

    {{-- Items dari database --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 py-10">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($items as $item)
            <div class="bg-gray-800 rounded-xl p-4 shadow hover:shadow-xl transition">
                <h3 class="text-lg font-semibold mb-2">{{ $item->judul }}</h3>
                <p class="text-gray-300 text-sm mb-3">{{ $item->deskripsi }}</p>
                @if ($item->gambar)
                <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" class="rounded-lg w-full object-cover max-h-52">
                @endif
            </div>
            @endforeach
        </div>
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

    <script>
        function carousel() {
            return {
                activeIndex: 0,
                slides: [{
                        image: '/images/ucjv330.png',
                        title: 'UCJV330 SERIE',
                        brand: 'Mimaki',
                        description: 'Inovasi cetak, kualitas profesional.'
                    },
                    {
                        image: '/images/tc20m.png',
                        title: 'Image PROGRAF TC-20M',
                        brand: 'Canon',
                        description: 'Desain ramping, performa maksimal.'
                    },
                    {
                        image: '/images/lxir320.png',
                        title: 'RollToRoll UV Printer LXiR320',
                        brand: 'Jetrix',
                        description: 'Warna lebih hidup, daya tahan lebih lama.'
                    },
                    {
                        image: '/images/prestos.png',
                        title: 'KORNIT Presto S',
                        brand: 'Kornit',
                        description: 'Solusi cetak, untuk kain berkualitas.'
                    },
                ],
                start() {
                    setInterval(() => this.next(), 4000);
                },
                next() {
                    this.activeIndex = (this.activeIndex + 1) % this.slides.length;
                },
                prev() {
                    this.activeIndex = (this.activeIndex - 1 + this.slides.length) % this.slides.length;
                }
            };
        }
    </script>
</body>

</html>