<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $category->nama_kategori }} - Katalog Produk</title>

    {{-- Tailwind CSS CDN --}}
    @vite('resources/css/app.css')

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-black text-white">
    @include('customer.layouts.header')
    {{-- Konten --}}
    <div class="bg-[#1a1a1a] text-white min-h-screen text-center">
        {{-- Header --}}
        <div class="text-center py-6">
            <h1 class="text-xl sm:text-2xl font-semibold border-b border-gray-500 inline-block pb-2">
                {{ $category->nama_kategori }} - Katalog Produk
            </h1>
        </div>

        {{-- Tombol Tambah Produk Baru --}}
        <div class="button-holder flex justify-center items-center mb-4 text-center">
            <a href="/admin/products/create" class="flex justify-center items-center border-black border-2 w-1/2 h-14 bg-green-500 text-bold rounded-2xl">Tambahkan Produk Baru</a>
        </div>

        {{-- Grid Produk --}}
        <div class="max-w-7xl mx-auto px-4 pb-10">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                {{-- Produk pertama --}}
                <div class="bg-gray-800 rounded-lg p-4 flex-col items-center justify-center">
                    <img src="{{ asset('images/image 1.png') }}" alt="HP Indigo 120K" class="max-h-40">
                    <div class="mt-2 text-center">
                        <h2 class="text-sm font-semibold">HP Indigo 120K</h2>
                        <p class="text-xs text-gray-400">Rp. </p>
                        <a href="#" class="mt-2 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Lihat Detail</a>
                    </div>
                </div>
                {{-- Produk kedua --}}
                @foreach( $category->products as $product )
                <div class="bg-gray-800 rounded-lg p-4 flex items-center justify-center">
                    <img src="{{ asset('images/' . $product->gambar_produk) }}" alt="{{ $product->name }}" class="max-h-40">
                    <div class="mt-2 text-center">
                        <h2 class="text-sm font-semibold">{{ $product->name }}</h2>
                        <p class="text-xs text-gray-400">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        <a href="{{ url('/customer/products/' . $product->name) }}" class="mt-2 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Lihat Detail</a>
                    </div>
                </div>
                @endforeach
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