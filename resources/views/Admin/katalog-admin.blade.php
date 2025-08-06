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
                katalog
            </h1>
        </div>

        {{-- Grid Produk --}}
        <div class="max-w-7xl mx-auto px-4 pb-10">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
              {{-- Produk pertama --}}
                <a href="{{ route('katalog.index', 'Digital Label & packaging') }}">
                    <div class="bg-gray-800 rounded-lg p-4 flex flex-col items-center justify-center text-center hover:bg-gray-700 transition">
                        <span class="text-white font-semibold mb-2">Digital Label & packaging</span>
                        <img src="{{ asset('images/image 1.png') }}" alt="Digital Label & packaging" class="max-h-40">
                    </div>
                </a>

                {{-- Produk 2 --}}
                <a href="{{ route('katalog.index', 'Digital Commercial Printing') }}">
                    <div class="bg-gray-800 rounded-lg p-4 flex flex-col items-center justify-center text-center hover:bg-gray-700 transition">
                        <span class="text-white font-semibold mb-2">Digital Commercial Printing</span>
                        <img src="{{ asset('images/image 2.png') }}" alt="Digital Commercial Printing" class="max-h-40">
                    </div>
                </a>

                {{-- Produk 3 --}}
                <a href="{{ route('katalog.index', 'Finishing Digital & Label Printing') }}">
                    <div class="bg-gray-800 rounded-lg p-4 flex flex-col items-center justify-center text-center hover:bg-gray-700 transition">
                        <span class="text-white font-semibold mb-2">Finishing Digital & Label Printing</span>
                        <img src="{{ asset('images/image 3.png') }}" alt="Finishing Digital & Label Printing" class="max-h-40">
                    </div>
                </a>

                {{-- Produk 4 - 3D Printer --}}
                <a href="{{ route('katalog.index', '3D Printer') }}">
                    <div class="bg-gray-800 rounded-lg p-4 flex flex-col items-center justify-center text-center hover:bg-gray-700 transition">
                        <span class="text-white font-semibold mb-2">3D Printer</span>
                        <img src="{{ asset('images/image 4.png') }}" alt="3D Printer" class="max-h-40">
                    </div>
                </a>

                {{-- Produk 5 - Garment Textile --}}
                <a href="{{ route('katalog.index', 'Garment Textile') }}">
                    <div class="bg-gray-800 rounded-lg p-4 flex flex-col items-center justify-center text-center hover:bg-gray-700 transition">
                        <span class="text-white font-semibold mb-2">Garment Textile</span>
                        <img src="{{ asset('images/image 5.png') }}" alt="Garment Textile" class="max-h-40">
                    </div>
                </a>

                {{-- Produk 6 - Large Format Printing --}}
                <a href="{{ route('katalog.index', 'Large Format Printing') }}">
                    <div class="bg-gray-800 rounded-lg p-4 flex flex-col items-center justify-center text-center hover:bg-gray-700 transition">
                        <span class="text-white font-semibold mb-2">Large Format Printing</span>
                        <img src="{{ asset('images/image 6.png') }}" alt="Large Format Printing" class="max-h-40">
                    </div>
                </a>


                {{-- Produk 7 - UV Printing --}}
                <a href="{{ route('katalog.index', 'UV Printing') }}">
                    <div class="bg-gray-800 rounded-lg p-4 flex flex-col items-center justify-center text-center hover:bg-gray-700 transition">
                        <span class="text-white font-semibold mb-2">UV Printing</span>
                        <img src="{{ asset('images/image 7.png') }}" alt="UV Printing" class="max-h-40">
                    </div>
                </a>

                {{-- Produk 8 - Cutting & Finishing --}}
                <a href="{{ route('katalog.index', 'Cutting & Finishing') }}">
                    <div class="bg-gray-800 rounded-lg p-4 flex flex-col items-center justify-center text-center hover:bg-gray-700 transition">
                        <span class="text-white font-semibold mb-2">Cutting & Finishing</span>
                        <img src="{{ asset('images/image 8.png') }}" alt="Cutting & Finishing" class="max-h-40">
                    </div>
                </a>

                {{-- Produk 9 - Office & Retail --}}
                <a href="{{ route('katalog.index', 'Office & Retail') }}">
                    <div class="bg-gray-800 rounded-lg p-4 flex flex-col items-center justify-center text-center hover:bg-gray-700 transition">
                        <span class="text-white font-semibold mb-2">Office & Retail</span>
                        <img src="{{ asset('images/image 9.png') }}" alt="Office & Retail" class="max-h-40">
                    </div>
                </a>

                {{-- Produk 10 - POS & PDT --}}
                <a href="{{ route('katalog.index', 'POS & PDT') }}">
                    <div class="bg-gray-800 rounded-lg p-4 flex flex-col items-center justify-center text-center hover:bg-gray-700 transition">
                        <span class="text-white font-semibold mb-2">POS & PDT</span>
                        <img src="{{ asset('images/image 10.png') }}" alt="POS & PDT" class="max-h-40">
                    </div>
                </a>

                {{-- Produk 11 - Sport & Wellness --}}
                <a href="{{ route('katalog.index', 'Sport & Wellness') }}">
                    <div class="bg-gray-800 rounded-lg p-4 flex flex-col items-center justify-center text-center hover:bg-gray-700 transition">
                        <span class="text-white font-semibold mb-2">Sport & Wellness</span>
                        <img src="{{ asset('images/image 11.png') }}" alt="Sport & Wellness" class="max-h-40">
                    </div>
                </a>

                {{-- Produk 12 - Medical --}}
                <a href="{{ route('katalog.index', 'Medical') }}">
                    <div class="bg-gray-800 rounded-lg p-4 flex flex-col items-center justify-center text-center hover:bg-gray-700 transition">
                        <span class="text-white font-semibold mb-2">Medical</span>
                        <img src="{{ asset('images/image 12.png') }}" alt="Medical" class="max-h-40">
                    </div>
                </a>
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
