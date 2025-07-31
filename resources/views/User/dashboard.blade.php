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
    <nav class="bg-gray-950 shadow">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <img src="{{ asset('images/logo-samafitro.png') }}" alt="Samafitro" class="h-12 md:h-16 w-auto max-h-14">
            </div>
            <ul class="hidden md:flex flex-wrap space-x-4 lg:space-x-8 text-xs md:text-sm font-medium text-white">
                <li><a href="#" class="hover:text-blue-400">Home</a></li>
                <li><a href="#" class="hover:text-blue-400">Katalog Produk</a></li>
                <li><a href="#" class="hover:text-blue-400">Promo</a></li>
                <li><a href="#" class="hover:text-blue-400">Artikel & Berita</a></li>
                <li><a href="#" class="hover:text-blue-400">Hubungi Kami</a></li>
            </ul>
            <div class="flex space-x-4">
                <a href="#"><img src="/images/cart.png" alt="Cart" class="h-6 w-6 hover:opacity-80 transition duration-200" /></a>
                <a href="#"><img src="/images/profile.png" alt="User" class="h-6 w-6 hover:opacity-80 transition duration-200" /></a>
            </div>
        </div>
    </nav>

    {{-- Carousel --}}
    <section x-data="carousel()" x-init="start()" class="max-w-7xl mx-auto px-4 py-14">
        <div class="relative overflow-hidden h-auto md:h-[600px] rounded-3xl shadow-2xl bg-gray-900">
            <template x-for="(slide, index) in slides" :key="index">
                <div x-show="activeIndex === index" x-transition
                    class="absolute inset-0 md:relative flex flex-col md:flex-row items-center md:items-stretch w-full h-full">
                    <div class="w-full md:w-1/2 bg-black/40 backdrop-blur-md p-8 md:p-16 flex flex-col justify-center space-y-6">
                        <h2 class="text-white text-3xl md:text-5xl font-extrabold tracking-wide" x-text="slide.title"></h2>
                        <h3 class="text-blue-400 text-xl md:text-2xl font-semibold" x-text="slide.brand"></h3>
                        <p class="text-gray-200 text-base md:text-lg leading-relaxed max-w-xl" x-text="slide.description"></p>
                    </div>
                    <div class="w-full md:w-1/2 flex items-center justify-center bg-gray-800 p-6 md:p-10">
                        <img :src="slide.image" alt="Slide Image" class="max-h-[450px] md:max-h-[560px] object-contain rounded-xl shadow-lg" loading="lazy">
                    </div>
                </div>
            </template>
            <button @click="prev" class="absolute top-1/2 left-6 transform -translate-y-1/2 bg-black/40 hover:bg-black/60 text-3xl px-4 py-1 rounded-full z-10 transition duration-300">‹</button>
            <button @click="next" class="absolute top-1/2 right-6 transform -translate-y-1/2 bg-black/40 hover:bg-black/60 text-3xl px-4 py-1 rounded-full z-10 transition duration-300">›</button>
        </div>
    </section>

    {{-- Static section with images and text --}}
    <section class="max-w-7xl mx-auto px-3 sm:px-6 md:px-10 py-16 min-h-[600px] grid grid-cols-1 md:grid-cols-3 gap-6 items-center justify-center">
        {{-- Left images --}}
        <div x-data="{ show: false }" x-init="setTimeout(() => show = true, 300)" class="flex flex-col gap-6">
            <div x-show="show" x-transition:enter="transition ease-out duration-700" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" class="rounded-2xl shadow-xl p-6 bg-gradient-to-br from-gray-800 to-gray-900 flex items-center justify-center">
                <img src="/images/ucjv330.png" alt="UCJV330" class="object-contain w-full h-[200px]" loading="lazy">
            </div>
            <div x-show="show" x-transition:enter="transition ease-out duration-700" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" class="rounded-2xl shadow-xl p-6 bg-gradient-to-br from-gray-800 to-gray-900 flex items-center justify-center">
                <img src="/images/lxir320.png" alt="LXiR320" class="object-contain w-full h-[200px]" loading="lazy">
            </div>
        </div>

        {{-- Center text --}}
        <div class="flex flex-col items-center justify-center text-center px-4">
            <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-white leading-tight">
                Kepercayaan Anda,<br> keahlian kami
            </h2>
            <p class="mt-4 text-base sm:text-lg text-gray-300 leading-relaxed">
                Dengan mesin yang berperforma tinggi,<br> memberikan pengalaman terbaik kepada Anda
            </p>
        </div>

        {{-- Right images --}}
        <div x-data="{ show: false }" x-init="setTimeout(() => show = true, 300)" class="flex flex-col gap-6">
            <div x-show="show" x-transition:enter="transition ease-out duration-700" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" class="rounded-2xl shadow-xl p-6 bg-gradient-to-br from-gray-800 to-gray-900 flex items-center justify-center">
                <img src="/images/tc20m.png" alt="TC-20M" class="object-contain w-full h-[200px]" loading="lazy">
            </div>
            <div x-show="show" x-transition:enter="transition ease-out duration-700" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" class="rounded-2xl shadow-xl p-6 bg-gradient-to-br from-gray-800 to-gray-900 flex items-center justify-center">
                <img src="/images/prestos.png" alt="Presto S" class="object-contain w-full h-[200px]" loading="lazy">
            </div>
        </div>
    </section>

    {{-- 💡 Dinamis dari Database --}}
    <section class="max-w-7xl mx-auto px-6 py-10">
        <h2 class="text-2xl md:text-3xl font-bold mb-8 text-center">Informasi Terbaru dari Admin</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($items as $item)
                <div class="bg-gray-800 rounded-xl shadow-md p-6 hover:shadow-xl transition">
                    <h3 class="text-xl font-semibold text-white mb-2">{{ $item->judul }}</h3>
                    <p class="text-gray-300 mb-3">{{ $item->deskripsi }}</p>
                    @if ($item->gambar)
                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" class="rounded-lg w-full object-cover max-h-56">
                    @endif
                </div>
            @endforeach
        </div>
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

    {{-- Carousel Script --}}
    <script>
        function carousel() {
            return {
                activeIndex: 0,
                slides: [
                    { image: '/images/ucjv330.png', title: 'UCJV330 SERIE', brand: 'Mimaki', description: 'Inovasi cetak, kualitas profesional.' },
                    { image: '/images/tc20m.png', title: 'Image PROGRAF TC-20M', brand: 'Canon', description: 'Desain ramping, performa maksimal.' },
                    { image: '/images/lxir320.png', title: 'RollToRoll UV Printer LXiR320', brand: 'Jetrix', description: 'Warna lebih hidup, daya tahan lebih lama.' },
                    { image: '/images/prestos.png', title: 'KORNIT Presto S', brand: 'Kornit', description: 'Solusi cetak, untuk kain berkualitas.' },
                ],
                start() { setInterval(() => this.next(), 4000); },
                next() { this.activeIndex = (this.activeIndex + 1) % this.slides.length; },
                prev() { this.activeIndex = (this.activeIndex - 1 + this.slides.length) % this.slides.length; }
            };
        }
    </script>
</body>
</html>
