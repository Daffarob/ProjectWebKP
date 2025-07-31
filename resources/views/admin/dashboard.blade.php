<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard Samafitro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- AlpineJS -->
    <script src="https://unpkg.com/alpinejs" defer></script>

    <!-- Custom Tailwind Config -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#2563eb',
                        dark: '#0f172a',
                        light: '#e2e8f0',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gradient-to-b from-gray-900 via-gray-800 to-gray-900 text-white font-sans min-h-screen">

    <!-- Header -->
    <nav class="bg-gray-950 px-6 py-4 flex items-center justify-between shadow-lg">
        <img src="{{ asset('images/logo-samafitro.png') }}" class="h-10" alt="Samafitro">
        <ul class="flex gap-6 text-sm font-medium tracking-wide">
            <li><a href="#" class="hover:text-blue-400 transition">Edit Home</a></li>
            <li><a href="#" class="hover:text-blue-400 transition">Edit Katalog Produk</a></li>
            <li><a href="#" class="hover:text-blue-400 transition">Edit Promo</a></li>
            <li><a href="#" class="hover:text-blue-400 transition">Edit Artikel & News</a></li>
        </ul>
    </nav>

    <!-- Form Input -->
    <section class="max-w-6xl mx-auto px-4 py-10">
        <h1 class="text-3xl font-bold mb-6">Tambah Konten Dashboard</h1>
        <form action="{{ route('admin.dashboard.store') }}" method="POST" enctype="multipart/form-data"
            class="grid grid-cols-1 md:grid-cols-2 gap-6 bg-gray-800 p-6 rounded-xl shadow-xl border border-gray-700">
            @csrf
            <div>
                <label class="block mb-2 text-sm font-semibold text-gray-300">Judul</label>
                <input type="text" name="judul" class="w-full p-3 rounded bg-gray-700 text-white focus:outline-none focus:ring focus:ring-blue-500" required>

                <label class="block mt-4 mb-2 text-sm font-semibold text-gray-300">Deskripsi</label>
                <textarea name="deskripsi" rows="4" class="w-full p-3 rounded bg-gray-700 text-white focus:outline-none focus:ring focus:ring-blue-500" required></textarea>
            </div>
            <div>
                <label class="block mb-2 text-sm font-semibold text-gray-300">Gambar</label>
                <input type="file" name="gambar" class="w-full bg-gray-700 rounded p-2 text-sm text-white border border-gray-600">

                <button type="submit" class="mt-6 w-full bg-blue-600 hover:bg-blue-700 transition py-3 rounded text-white font-semibold">
                    <i class="fas fa-save mr-2"></i> Simpan Konten
                </button>
            </div>
        </form>
    </section>

    <!-- Data Grid -->
    <section class="max-w-6xl mx-auto px-4 py-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach($items as $item)
        <div class="bg-gray-900 border border-gray-800 hover:shadow-xl transition rounded-xl overflow-hidden relative group">
            @if($item->gambar)
            <img src="{{ asset('storage/' . $item->gambar) }}" class="w-full h-40 object-cover">
            @endif
            <div class="p-4">
                <h2 class="text-xl font-semibold text-white mb-2">{{ $item->judul }}</h2>
                <p class="text-gray-400 text-sm leading-relaxed">{{ $item->deskripsi }}</p>
            </div>
            <form action="{{ route('admin.dashboard.destroy', $item->id) }}" method="POST" class="absolute top-3 right-3">
                @csrf
                @method('DELETE')
                <button class="bg-red-600 text-white p-2 rounded-full hover:bg-red-700 transition" onclick="return confirm('Hapus item ini?')">
                    <i class="fas fa-trash"></i>
                </button>
            </form>
        </div>
        @endforeach
    </section>

    <!-- Footer -->
    <footer class="bg-gradient-to-b from-gray-900 to-gray-800 py-10 text-white text-sm">
        <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row gap-10">
            <!-- Logo -->
            <div class="flex flex-col space-y-6">
                <img src="{{ asset('images/logo-samafitro.png') }}" alt="Samafitro Logo" class="h-20 sm:h-24">
            </div>

            <!-- Social Media -->
            <div>
                <h3 class="text-xl font-semibold mb-4">Social Media Kami :</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-envelope text-white text-lg"></i>
                        <span>samafitro_bdg@samafitro.co.id</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <i class="fab fa-instagram text-white text-lg"></i>
                        <span>@samafitro_bandung</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <i class="fab fa-youtube text-white text-lg"></i>
                        <span>Samafitro Bandung</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-store text-white text-lg"></i>
                        <span>Samafitro Bandung Official Store</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <i class="fab fa-facebook text-white text-lg"></i>
                        <span>@SamafitroBandung</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <i class="fab fa-tiktok text-white text-lg"></i>
                        <span>@samafitro.bandung</span>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>
