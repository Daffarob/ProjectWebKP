<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create | Admin</title>
    @vite('resources/css/app.css')

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-black text-white">
    @include('admin.layouts.header')

    {{-- Navbar --}}
    <nav class="bg-black border-b border-gray-700 p-4 flex justify-between items-center">
        <div class="flex items-center space-x-3">
            <img src="{{ asset('images/logo-samafitro.png') }}" class="h-8" alt="Logo">
            <span class="text-sm font-semibold">Samafitro Bandung</span>
        </div>
        <ul class="flex space-x-4 text-sm">
            <li><a href="#" class="hover:text-blue-400">Edit Home</a></li>
            <li><a href="#" class="hover:text-blue-400">Edit Katalog Produk</a></li>
            <li><a href="#" class="hover:text-blue-400">Edit Promo</a></li>
            <li><a href="#" class="hover:text-blue-400">Edit Artikel & News</a></li>
        </ul>
    </nav>

    {{-- Content --}}
    <div class="max-w-4xl mx-auto px-6 py-10">
        <h2 class="text-xl font-bold mb-6">← Buat Katalog</h2>

        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 items-start">
                {{-- Gambar Preview --}}
                <div class="w-full h-full bg-gray-700 rounded-lg flex items-center justify-center text-sm">
                    Preview Gambar
                </div>

                <div class="space-y-3 w-full">
                    {{-- Upload gambar --}}
                    <label class="block">
                        <input type="file" name="image" class="w-full text-sm text-white bg-gray-800 border border-gray-600 rounded p-2" />
                    </label>

                    {{-- Nama --}}
                    <input type="text" name="name" placeholder="Masukkan Nama" class="w-full p-2 rounded bg-gray-800 border border-gray-600 placeholder-gray-400">


                    <select name="category_id" id="category" required class="w-full p-2 rounded bg-gray-800 border border-gray-600 text-gray-400">
                        <option value="" disabled selected>-- Pilih Kategori --</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" class="text-white">{{ $category->nama_kategori }}</option>
                        @endforeach
                    </select>

                    {{-- Harga --}}
                    <input type="text" name="price" placeholder="Masukkan Harga" class="w-full p-2 rounded bg-gray-800 border border-gray-600 placeholder-gray-400">

                    <input type="text" name="stock" placeholder="Masukkan Stock" class="w-full p-2 rounded bg-gray-800 border border-gray-600 placeholder-gray-400">
                </div>
            </div>

            {{-- Spesifikasi --}}
            <div>
                <label class="block text-lg font-semibold mb-2">Masukkan Spesifikasi Produk</label>
                <textarea name="description" rows="6" class="w-full bg-gray-800 border border-gray-600 p-4 rounded placeholder-gray-400" placeholder="Contoh: Ukuran, berat, jenis tinta, dll..."></textarea>
            </div>

            {{-- Tombol --}}
            <button type="submit" class="w-full bg-green-700 hover:bg-green-800 text-white font-semibold py-2 rounded">
                Buat Katalog Baru
            </button>
        </form>
    </div>
</body>

</html>