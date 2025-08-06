<!-- resources/views/admin/katalog-edit.blade.php -->

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Katalog</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-b from-black to-gray-900 text-white min-h-screen">

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
        <h2 class="text-xl font-bold mb-6">← Edit Katalog</h2>

        <form action="{{ route('katalog.update', $katalog->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 items-start">
                {{-- Preview Gambar --}}
                <div class="w-full h-36 bg-gray-700 rounded-lg flex items-center justify-center">
                    @if($katalog->gambar)
                        <img src="{{ asset('storage/' . $katalog->gambar) }}" class="h-full object-contain" alt="Preview">
                    @else
                        <span class="text-sm text-gray-400">Preview Gambar</span>
                    @endif
                </div>

                <div class="space-y-3 w-full">
                    {{-- Upload gambar --}}
                    <label class="block">
                        <input type="file" name="gambar" class="w-full text-sm text-white bg-gray-800 border border-gray-600 rounded p-2" />
                    </label>

                    {{-- Nama --}}
                    <div class="flex space-x-2">
                        <input type="text" name="nama_mesin" value="{{ $katalog->nama_mesin }}" placeholder="Masukkan Nama" class="flex-1 p-2 rounded bg-gray-800 border border-gray-600 placeholder-gray-400">
                        <button type="button" class="px-3 py-2 bg-red-500 hover:bg-red-600 rounded text-white text-sm">Ubah Nama</button>
                    </div>

                    {{-- Harga --}}
                    <div class="flex space-x-2">
                        <input type="text" name="harga" value="{{ $katalog->harga }}" placeholder="Masukkan Harga" class="flex-1 p-2 rounded bg-gray-800 border border-gray-600 placeholder-gray-400">
                        <button type="button" class="px-3 py-2 bg-red-500 hover:bg-red-600 rounded text-white text-sm">Ubah Harga</button>
                    </div>
                </div>
            </div>

            {{-- Spesifikasi --}}
            <div>
                <label class="block text-lg font-semibold mb-2">Masukkan Spesifikasi Produk</label>
                <div class="relative">
                    <textarea name="spesifikasi" rows="6" class="w-full bg-gray-800 border border-gray-600 p-4 rounded placeholder-gray-400">{{ $katalog->spesifikasi }}</textarea>
                    <button type="button" class="absolute right-4 bottom-4 bg-red-500 hover:bg-red-600 px-3 py-1 rounded text-white text-sm">Ubah Katalog</button>
                </div>
            </div>

            {{-- Tombol --}}
            <button type="submit" class="w-full bg-green-700 hover:bg-green-800 text-white font-semibold py-2 rounded">
                Save
            </button>
        </form>
    </div>
</body>
</html>
