<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard Samafitro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- TailwindCSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome Free CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

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
    <script>
        function toggleMenu() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        }
    </script>
</head>

<body class="bg-gradient-to-b from-gray-900 via-gray-800 to-gray-900 text-white font-sans min-h-screen">

    <!-- Navbar -->
    <nav class="bg-gray-950 shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-4 py-3 flex items-center justify-between">
            <a href="#" class="flex items-center">
                <img src="{{ asset('images/logo-samafitro.png') }}" alt="Samafitro" class="h-16 mr-3">
            </a>

            <!-- Desktop Menu -->
            <ul class="hidden md:flex space-x-6 text-sm font-medium">
                <li><a href="{{ route('admin.dashboard') }}" class="hover:text-indigo-400 transition">Edit Beranda</a></li>
                <li><a href="{{ route('admin.produk') }}" class="hover:text-indigo-400 transition">Edit Produk</a></li>
                <li><a href="{{ route('admin.promos.index') }}" class="hover:text-indigo-400 transition">Edit Promo</a></li>
                <li><a href="{{ route('admin.articles.index') }}" class="hover:text-indigo-400 transition">Edit Artikel & Berita</a></li>
                <li><a href="#" class="hover:text-indigo-400 transition">Hubungi Kami</a></li>
            </ul>

            <!-- Icons -->
            <div class="hidden md:flex items-center space-x-4">
                <a href="#"><img src="/images/cart.png" class="h-6"></a>
                <a href="{{ route('User.profile.index') }}"><img src="/images/profile.png" class="h-6"></a>
            </div>

            <!-- Mobile Menu Button -->
            <button class="md:hidden text-white focus:outline-none" onclick="toggleMenu()">
                <i class="fas fa-bars text-xl"></i>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-gray-900 px-4 py-3 space-y-2">
            <a href="{{ route('admin.dashboard') }}" class="block hover:text-indigo-400">Edit Beranda</a>
            <a href="#" class="block hover:text-indigo-400">Edit Produk</a>
            <a href="{{ route('admin.promos.index') }}" class="block text-indigo-400 font-semibold">Edit Promo</a>
            <a href="{{ route('admin.articles.index') }}" class="block hover:text-indigo-400">Edit Artikel & Berita</a>
            <a href="#" class="block hover:text-indigo-400">Hubungi Kami</a>
            <div class="flex items-center space-x-4 pt-2 border-t border-gray-700">
                <a href="{{ route('cart.index') }}"><img src="/images/cart.png" class="h-6"></a>
                <a href="{{ route('User.profile.index') }}"><img src="/images/profile.png" class="h-6"></a>
            </div>
        </div>
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

    {{-- Alpine.js --}}
    <script src="//unpkg.com/alpinejs" defer></script>
</body>

</html>