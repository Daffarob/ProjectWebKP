<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Artikel | Samafitro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body class="bg-gradient-to-b from-gray-900 to-gray-800 text-white font-sans min-h-screen flex flex-col">

<body class="bg-gradient-to-b from-gray-900 to-gray-800 text-white font-sans min-h-screen flex flex-col">

    <!-- Navbar -->
    <nav class="bg-gray-950 shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-4 py-3 flex items-center justify-between">
            <a href="#" class="flex items-center">
                <img src="{{ asset('images/logo-samafitro.png') }}" alt="Samafitro" class="h-16 mr-3">
            </a>

            <!-- Desktop Menu -->
            <ul class="hidden md:flex space-x-6 text-sm font-medium">
                <li><a href="{{ route('admin.dashboard') }}" class="hover:text-indigo-400 transition">Edit Beranda</a></li>
                <li><a href="#" class="hover:text-indigo-400 transition">Edit Produk</a></li>
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
            <a href="{{ route('admin.promos.index') }}" class="hover:text-indigo-400 transition">Edit Promo</a>
            <a href="{{ route('admin.articles.index') }}" class="block hover:text-indigo-400">Edit Artikel & Berita</a>
            <a href="#" class="block hover:text-indigo-400">Hubungi Kami</a>
            <div class="flex items-center space-x-4 pt-2 border-t border-gray-700">
                <a href="#"><img src="/images/cart.png" class="h-6"></a>
                <a href="{{ route('User.profile.index') }}"><img src="/images/profile.png" class="h-6"></a>
            </div>
        </div>
    </nav>


<!-- Header -->
<header class="bg-gradient-to-r from-gray-900 to-gray-800 px-6 py-4 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3 shadow-md">
    <h1 class="text-xl sm:text-2xl font-bold text-white">Artikel Admin</h1>
    <a href="{{ route('admin.articles.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md shadow transition text-center">
        + Tambah Artikel
    </a>
</header>

<!-- Main Content -->
<main class="max-w-7xl mx-auto px-4 sm:px-6 py-8 flex-grow w-full">
    <div class="bg-gradient-to-br from-gray-800/80 to-gray-700/80 backdrop-blur-sm p-4 sm:p-6 rounded-xl shadow-xl border border-gray-600">
        <h2 class="text-xl sm:text-2xl font-semibold text-white mb-4 sm:mb-6 border-b border-gray-600 pb-2">Daftar Artikel & Berita</h2>

        <div class="overflow-x-auto rounded-lg">
            <table class="min-w-full text-white text-sm sm:text-base">
                <thead class="bg-gray-800/90">
                    <tr>
                        <th class="px-4 py-3 text-left font-medium">Gambar</th>
                        <th class="px-4 py-3 text-left font-medium">Judul</th>
                        <th class="px-4 py-3 text-left font-medium">Tahun</th>
                        <th class="px-4 py-3 text-left font-medium">Isi</th>
                        <th class="px-4 py-3 text-left font-medium">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    @forelse ($articles as $article)
                        <tr class="hover:bg-gray-700/50 transition duration-150">
                            <td class="px-4 py-3">
                                @if ($article->image)
                                    <img src="{{ asset('storage/' . $article->image) }}" class="w-20 sm:w-24 h-auto rounded-md shadow" alt="Gambar Artikel">
                                @else
                                    <span class="text-gray-400 italic">Tidak ada gambar</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 font-semibold">{{ $article->title }}</td>
                            <td class="px-4 py-3">{{ $article->year }}</td>
                            <td class="px-4 py-3 max-w-xs overflow-hidden text-ellipsis">
                                {{ \Illuminate\Support\Str::limit(strip_tags($article->content), 80) }}
                            </td>
                            <td class="px-4 py-3 space-x-2 whitespace-nowrap">
                                <a href="{{ route('admin.articles.edit', $article) }}" class="text-blue-400 hover:text-blue-200 transition">Edit</a>
                                <form method="POST" action="{{ route('admin.articles.destroy', $article) }}" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus artikel ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-400 hover:text-red-300 transition">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-6 text-gray-400">Belum ada artikel ditambahkan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</main>

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

{{-- Notifikasi sukses --}}
@if (session('success'))
<script>
    window.onload = function () {
        alert("{{ session('success') }}");
    }
</script>
@endif

</body>
</html>
