<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Admin - Daftar Promo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- TailwindCSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome Free CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <script>
        function toggleMenu() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        }
    </script>
</head>

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
            <a href="{{ route('admin.promos.index') }}" class="block text-indigo-400 font-semibold">Edit Promo</a>
            <a href="{{ route('admin.articles.index') }}" class="block hover:text-indigo-400">Edit Artikel & Berita</a>
            <a href="#" class="block hover:text-indigo-400">Hubungi Kami</a>
            <div class="flex items-center space-x-4 pt-2 border-t border-gray-700">
                <a href="#"><img src="/images/cart.png" class="h-6"></a>
                <a href="{{ route('User.profile.index') }}"><img src="/images/profile.png" class="h-6"></a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-1 container mx-auto px-4 py-8">
        <h2 class="text-3xl font-bold text-center mb-6 flex items-center justify-center gap-2">
            Daftar Promo Produk
        </h2>

        <!-- Add Button -->
        <div class="flex flex-col sm:flex-row justify-between items-center mb-6 gap-4">
            <a href="{{ route('admin.promos.create') }}"
                class="bg-green-600 hover:bg-green-500 text-white px-4 py-2 rounded-lg shadow transition flex items-center gap-2">
                <i class="fas fa-plus"></i> Tambah Promo
            </a>
            @if(session('success'))
                <div class="bg-green-600 text-white px-4 py-2 rounded-lg shadow">
                    {{ session('success') }}
                </div>
            @endif
        </div>

        <!-- Table Card -->
        <div class="bg-gray-900 rounded-xl shadow-lg overflow-hidden">
            <div class="overflow-x-auto hidden md:block">
                <table class="min-w-full divide-y divide-gray-700">
                    <thead class="bg-gray-800 text-gray-300">
                        <tr>
                            <th class="px-4 py-3 text-left text-sm font-semibold">Judul</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold">Vendor</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold">Label</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold">Diskon</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold">Periode</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold">Gambar</th>
                            <th class="px-4 py-3 text-center text-sm font-semibold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-800">
                        @forelse($promos as $promo)
                            <tr class="hover:bg-gray-800 transition">
                                <td class="px-4 py-3">{{ $promo->name }}</td>
                                <td class="px-4 py-3">{{ $promo->vendor }}</td>
                                <td class="px-4 py-3">
                                    <span class="bg-indigo-500 text-white px-3 py-1 rounded-full text-xs font-semibold">
                                        {{ $promo->label }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-red-400 font-semibold">{{ $promo->discount }}</td>
                                <td class="px-4 py-3">{{ $promo->periode }}</td>
                                <td class="px-4 py-3">
                                    <img src="{{ asset('storage/' . $promo->image) }}" alt="Gambar Promo" class="w-20 h-20 object-cover rounded-lg">
                                </td>
                                <td class="px-4 py-3 text-center space-x-2">
                                    <a href="{{ route('admin.promos.edit', $promo->id) }}"
                                        class="bg-yellow-500 hover:bg-yellow-400 text-white px-3 py-1 rounded-md text-sm shadow transition inline-flex items-center gap-1">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.promos.destroy', $promo->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin hapus promo ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="bg-red-600 hover:bg-red-500 text-white px-3 py-1 rounded-md text-sm shadow transition inline-flex items-center gap-1">
                                            <i class="fas fa-trash-alt"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-4 py-6 text-center text-gray-500">Belum ada data promo.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Mobile Card View -->
            <div class="space-y-4 md:hidden p-4">
                @forelse($promos as $promo)
                    <div class="bg-gray-800 p-4 rounded-lg shadow space-y-2">
                        <div class="flex justify-between items-center">
                            <h3 class="font-bold">{{ $promo->name }}</h3>
                            <span class="bg-indigo-500 text-white px-3 py-1 rounded-full text-xs font-semibold">{{ $promo->label }}</span>
                        </div>
                        <p class="text-sm text-gray-400">Vendor: {{ $promo->vendor }}</p>
                        <p class="text-sm text-red-400 font-semibold">Diskon: {{ $promo->discount }}</p>
                        <p class="text-sm">Periode: {{ $promo->periode }}</p>
                        <img src="{{ asset('storage/' . $promo->image) }}" alt="Gambar Promo" class="w-full h-40 object-cover rounded-lg">
                        <div class="flex gap-2 pt-2">
                            <a href="{{ route('admin.promos.edit', $promo->id) }}"
                                class="flex-1 bg-yellow-500 hover:bg-yellow-400 text-white px-3 py-1 rounded-md text-sm shadow text-center">
                                Edit
                            </a>
                            <form action="{{ route('admin.promos.destroy', $promo->id) }}" method="POST" class="flex-1" onsubmit="return confirm('Yakin hapus promo ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="w-full bg-red-600 hover:bg-red-500 text-white px-3 py-1 rounded-md text-sm shadow">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-gray-500">Belum ada data promo.</p>
                @endforelse
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
</body>
</html>
