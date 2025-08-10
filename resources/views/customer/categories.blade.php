<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body>
    <!-- Header / Navbar -->
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <img src="{{ asset('logo.png') }}" alt="Logo" class="h-8">
                <span class="text-xl font-bold text-gray-700">samafitro</span>
            </div>
            <nav class="space-x-6 text-sm text-gray-600">
                <a href="/" class="hover:text-black">Home</a>
                <a href="#" class="hover:text-black">Katalog Produk</a>
                <a href="#" class="hover:text-black">Promo</a>
                <a href="#" class="hover:text-black">Artikel & Berita</a>
                <a href="#" class="hover:text-black">Hubungi Kami</a>
            </nav>
            <div class="flex items-center space-x-4">
                <a href="#" class="text-gray-600 hover:text-black"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M3 3h18M3 3v18M3 21h18" />
                    </svg></a>
                <a href="#" class="text-gray-600 hover:text-black"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M5 12h14M12 5l7 7-7 7" />
                    </svg></a>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-4xl mx-auto py-20 text-center">
        <h1 class="text-3xl md:text-4xl font-bold mb-2">
            COCOKKAN KEBUTUHAN ANDA DENGAN MESIN <span class="text-gray-700">TERBAIK</span>
        </h1>
        <p class="text-gray-600 mb-10">Sesuaikan Pilihan Mesin Anda</p>

        <!-- Carousel Area -->
        <div class="flex items-center justify-center space-x-4">
            <button id="prevBtn" class="text-2xl px-4 py-2 bg-gray-300 rounded-full hover:bg-gray-400">&#8592;</button>

            <div class="overflow-hidden w-64">
                <ul id="carousel" class="flex transition-transform duration-500 ease-in-out">
                    @foreach ($categories as $category)
                    <li class="min-w-64 flex-shrink-0 text-center px-2">
                        <div class="px-6 py-4 bg-white rounded shadow text-sm font-semibold whitespace-nowrap">
                            {{ $category->nama_kategori }}
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>

            <button id="nextBtn" class="text-2xl px-4 py-2 bg-gray-300 rounded-full hover:bg-gray-400">&#8594;</button>
        </div>

        <!-- Pilih Button -->
        <div class="mt-10">
            <a id="selectBtn" href="categories/{id}" class="bg-gray-800 text-white px-6 py-2 rounded hover:bg-gray-700 transition">
                Pilih Jenis Mesin
            </a>
        </div>
    </main>

    <script>
        const carousel = document.getElementById('carousel');
        const items = carousel.children;
        let currentIndex = 0;

        function updateCarousel() {
            carousel.style.transform = `translateX(-${currentIndex * 100}%)`;
            const selectedText = items[currentIndex].innerText.trim();
            document.getElementById('selectBtn').href = `/categories/${encodeURIComponent(selectedText)}`;
        }

        document.getElementById('prevBtn').addEventListener('click', () => {
            currentIndex = (currentIndex - 1 + items.length) % items.length;
            updateCarousel();
        });

        document.getElementById('nextBtn').addEventListener('click', () => {
            currentIndex = (currentIndex + 1) % items.length;
            updateCarousel();
        });

        updateCarousel();
    </script>
</body>

</html>