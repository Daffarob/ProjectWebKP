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
    @include('customer.layouts.header')

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