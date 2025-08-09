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

<!-- Header -->
<nav class="bg-gray-950 px-6 py-4 shadow-lg">
    <div class="flex items-center justify-between">
        <!-- Logo -->
        <img src="{{ asset('images/logo-samafitro.png') }}" class="h-10" alt="Samafitro">

        <!-- Menu + Icon -->
        <div class="flex items-center gap-6">
            <!-- Menu -->
            <ul class="flex items-center space-x-6 text-sm text-white">
                <li><a href="{{ route('admin.dashboard') }}" class="hover:text-primary transition">Edit Home</a></li>
                <li><a href="#" class="hover:text-primary transition">Edit Katalog Produk</a></li>
                <li><a href="{{ route('admin.promos.index') }}" class="hover:text-primary transition">Edit Promo</a></li>
                <li><a href="{{ route('admin.articles.index') }}" class="hover:text-primary transition">Edit Artikel & Berita</a></li>
                <li><a href="#" class="hover:text-primary transition">Hubungi Kami</a></li>
            </ul>

             <!-- Icon -->
            <div class="flex items-center gap-4">
                <a href="#"><img src="/images/cart.png" alt="Cart" class="h-6 w-6"></a>
                <a href="{{ route('User.profile.index') }}"><img src="/images/profile.png" alt="Profile" class="h-6 w-6"></a>
            </div>
        </div>
    </div>
</nav>

    <!-- Header -->
    <header class="bg-gradient-to-r from-gray-900 to-gray-800 px-6 py-4 flex justify-between items-center shadow-md">
        <h1 class="text-2xl font-bold text-white">Dashboard Admin</h1>
        <a href="{{ route('admin.articles.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md shadow transition">
            + Tambah Artikel
        </a>
    </header>

<!-- Main Content -->
<main class="max-w-7xl mx-auto px-6 py-10 flex-grow">
    <div class="bg-gradient-to-br from-gray-800/80 to-gray-700/80 backdrop-blur-sm p-6 rounded-xl shadow-xl border border-gray-600">
        <h2 class="text-2xl font-semibold text-white mb-6 border-b border-gray-600 pb-2">Daftar Artikel & Berita</h2>

        <div class="overflow-x-auto rounded-lg">
            <table class="min-w-full divide-y divide-gray-600 text-white">
                <thead class="bg-gray-800/90">
                    <tr>
                        <th class="px-4 py-3 text-left text-sm font-medium">Gambar</th>
                        <th class="px-4 py-3 text-left text-sm font-medium">Judul</th>
                        <th class="px-4 py-3 text-left text-sm font-medium">Tahun</th>
                        <th class="px-4 py-3 text-left text-sm font-medium">Isi</th>
                        <th class="px-4 py-3 text-left text-sm font-medium">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    @forelse ($articles as $article)
                        <tr class="hover:bg-gray-700/50 transition duration-150">
                            <td class="px-4 py-3">
                                @if ($article->image)
                                    <img src="{{ asset('storage/' . $article->image) }}" class="w-24 h-auto rounded-md shadow" alt="Gambar Artikel">
                                @else
                                    <span class="text-gray-400 italic">Tidak ada gambar</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-sm font-semibold">{{ $article->title }}</td>
                            <td class="px-4 py-3 text-sm">{{ $article->year }}</td>
                            <td class="px-4 py-3 text-sm max-w-xs overflow-hidden whitespace-nowrap overflow-ellipsis">
                                {{ \Illuminate\Support\Str::limit(strip_tags($article->content), 80) }}
                            </td>
                            <td class="px-4 py-3 space-x-2">
                                <a href="{{ route('admin.articles.edit', $article) }}"
                                   class="text-blue-400 hover:text-blue-200 font-medium transition">Edit</a>
                                <form method="POST" action="{{ route('admin.articles.destroy', $article) }}"
                                      class="inline-block"
                                      onsubmit="return confirm('Yakin ingin menghapus artikel ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-400 hover:text-red-300 font-medium transition">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-6 text-gray-400">
                                Belum ada artikel ditambahkan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</main>

    {{-- Footer --}}
    <footer class="bg-gradient-to-b from-gray-900 to-gray-800 py-10 text-white text-sm">
        <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row gap-10">
            <div class="flex flex-col space-y-6">
                <img src="{{ asset('images/logo-samafitro.png') }}" alt="Samafitro Logo" class="h-20 sm:h-24">
            </div>

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
