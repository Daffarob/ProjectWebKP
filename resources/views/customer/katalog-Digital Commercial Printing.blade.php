<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Samafitro Bandung - Katalog Produk</title>

    {{-- Tailwind CSS CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-black text-white">

    {{-- Navbar --}}
    <nav class="bg-black border-b-2 border-blue-500">
        <div class="max-w-7xl mx-auto px-4 py-4 flex flex-col sm:flex-row justify-between items-center gap-4 sm:gap-0">
            <div class="flex items-center gap-3">
                <img src="{{ asset('images/logo-samafitro.png') }}" alt="Logo" class="h-8">
                <span class="font-semibold text-sm sm:text-base">Samafitro Bandung</span>
            </div>
            <ul class="flex flex-wrap justify-center sm:justify-start gap-3 sm:space-x-6 text-sm text-center">
                <li><a href="{{ url('/') }}" class="hover:text-blue-300">Home</a></li>
                <li><a href="{{ url('/customer/katalog') }}" class="hover:text-blue-300">Katalog Produk</a></li>
                <li><a href="#" class="hover:text-blue-300">Promo</a></li>
                <li><a href="#" class="hover:text-blue-300">Artikel & Berita</a></li>
                <li><a href="#" class="hover:text-blue-300">Hubungi Kami</a></li>
            </ul>
            <div class="flex items-center gap-3 justify-center sm:justify-end">
                <i class="fas fa-cart-shopping hover:text-blue-300"></i>
                <i class="fas fa-user-circle hover:text-blue-300"></i>
            </div>
        </div>
    </nav>

    {{-- Konten --}}
    <div class="bg-[#1a1a1a] text-white min-h-screen">
        {{-- Header --}}
        <div class="text-center py-6">
            <h1 class="text-xl sm:text-2xl font-semibold border-b border-gray-500 inline-block pb-2">
                Digital Commercial Printing
            </h1>
        </div>

        {{-- Grid Produk --}}
        <div class="max-w-7xl mx-auto px-4 pb-10">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                {{-- Produk pertama --}}
                <div class="bg-gray-800 rounded-lg p-4 flex items-center justify-center">
                    <img src="{{ asset('images/produk1.png') }}" alt="Produk 1" class="max-h-40">
                </div>

                {{-- Kotak lainnya --}}
                @for ($i = 0; $i < 8; $i++)
                    <div class="bg-gray-800 rounded-lg p-4 h-40"></div>
                @endfor
            </div>
        </div>

        {{-- Footer --}}
        <footer class="bg-[#2e2e2e] text-white py-6 text-xs sm:text-sm">
            <div class="max-w-7xl mx-auto px-4 text-center">
                <div class="mb-4">
                    <img src="{{ asset('images/logo-samafitro.png') }}" alt="Samafitro Logo" class="mx-auto h-10 mb-2">
                    <p class="font-semibold">Social media kami :</p>
                </div>
                <div class="flex flex-wrap justify-center gap-3 sm:gap-4">
                    <span><i class="fas fa-envelope"></i> samafitro_bdg@samafitro.co.id</span>
                    <span><i class="fab fa-instagram"></i> @samafitro_bandung</span>
                    <span><i class="fab fa-youtube"></i> Samafitro Bandung Official Store</span>
                    <span><i class="fab fa-facebook"></i> @samafitrobandung</span>
                    <span><i class="fab fa-tiktok"></i> @samafitro.bandung</span>
                </div>
            </div>
        </footer>
    </div>

</body>
</html>
