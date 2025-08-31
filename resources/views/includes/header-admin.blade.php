<!-- Navbar -->
<nav class="bg-gray-950 shadow-md sticky top-0 z-50">
    <div class="container mx-auto px-4 py-3 flex items-center justify-between">
        <a href="#" class="flex items-center">
            <img src="{{ asset('images/logo-samafitro.png') }}" alt="Samafitro" class="h-16 mr-3">
        </a>

        <!-- Desktop Menu -->
        <ul class="hidden md:flex space-x-6 text-sm font-medium">
            <li><a href="{{ route('admin.dashboard') }}" class="hover:text-indigo-400 transition">Edit Beranda</a></li>
            <li><a href="{{ route('admin.produk.index') }}" class="hover:text-indigo-400 transition">Edit Produk</a></li>
            <li><a href="{{ route('admin.promos.index') }}" class="hover:text-indigo-400 transition">Edit Promo</a></li>
            <li><a href="{{ route('admin.articles.index') }}" class="hover:text-indigo-400 transition">Edit Artikel & Berita</a></li>
            <li><a href="{{ route('admin.contact') }}" class="hover:text-indigo-400 transition">Hubungi Kami</a></li>
        </ul>

        <!-- Icons -->
        <div class="hidden md:flex items-center space-x-4">
            <a href="#"><img src="/images/cart.png" class="h-6"></a>
            <a href="{{ route('User.profile.index') }}"><img src="/images/profile.png" class="h-6"></a>
            
            <!-- Logout Button -->
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="text-red-400 hover:text-red-300 text-sm font-medium transition-colors">
                    Logout
                </button>
            </form>
        </div>

        <!-- Mobile Menu Button -->
        <button class="md:hidden text-white focus:outline-none" onclick="toggleMenu()">
            <i class="fas fa-bars text-xl"></i>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden bg-gray-900 px-4 py-3 space-y-2">
        <a href="{{ route('admin.dashboard') }}" class="block hover:text-indigo-400">Edit Beranda</a>
        <a href="{{ route('admin.produk.index') }}" class="block hover:text-indigo-400">Edit Produk</a>
        <a href="{{ route('admin.promos.index') }}" class="block hover:text-indigo-400">Edit Promo</a>
        <a href="{{ route('admin.articles.index') }}" class="block hover:text-indigo-400">Edit Artikel & Berita</a>
        <a href="{{ route('admin.contact') }}" class="block hover:text-indigo-400">Hubungi Kami</a>
        <div class="flex items-center space-x-4 pt-2 border-t border-gray-700">
            <a href="#"><img src="/images/cart.png" class="h-6"></a>
            <a href="{{ route('User.profile.index') }}"><img src="/images/profile.png" class="h-6"></a>
            
            <!-- Mobile Logout Button -->
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="text-red-400 hover:text-red-300 text-sm font-medium transition-colors">
                    Logout
                </button>
            </form>
        </div>
    </div>
</nav>

<script>
    function toggleMenu() {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    }
</script>
