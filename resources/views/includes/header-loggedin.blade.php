
{{-- Navbar --}}
<nav x-data="{ open: false }" class="bg-gray-950 shadow fixed top-0 left-0 w-full z-50">
    <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">

        {{-- Logo --}}
        <div class="flex items-center space-x-3">
            <img src="{{ asset('images/logo-samafitro.png') }}" alt="Samafitro" class="h-12 md:h-16 w-auto max-h-14">
        </div>

        {{-- Desktop Menu --}}
        <ul class="hidden md:flex flex-wrap space-x-4 lg:space-x-8 text-xs md:text-sm font-medium text-white">
            <li><a href="{{ route('dashboard') }}" class="hover:text-blue-400">Beranda</a></li>
            <li><a href="{{ route('produk.user') }}" class="hover:text-blue-400">Produk</a></li>
            <li><a href="{{ route('promo.index') }}" class="hover:text-blue-400">Promo</a></li>
            <li><a href="{{ route('article.index') }}" class="hover:text-blue-400">Artikel & Berita</a></li>
            <li><a href="#" class="hover:text-blue-400">Hubungi Kami</a></li>
        </ul>

        {{-- Desktop Icons --}}
        <div class="hidden md:flex space-x-4 items-center">
            <a href="#"><img src="/images/cart.png" alt="Cart" class="h-6 w-6 hover:opacity-80 transition duration-200" /></a>
            <a href="{{ route('User.profile.index') }}"><img src="/images/profile.png" alt="User" class="h-6 w-6 hover:opacity-80 transition duration-200" /></a>
            
            <!-- Logout Button -->
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="text-red-400 hover:text-red-300 text-sm font-medium transition-colors">
                    Logout
                </button>
            </form>
        </div>

        {{-- Mobile Hamburger --}}
        <div class="md:hidden flex items-center space-x-4">
            <a href="#"><img src="/images/cart.png" alt="Cart" class="h-6 w-6 hover:opacity-80 transition duration-200" /></a>
            <a href="{{ route('User.profile.index') }}"><img src="/images/profile.png" alt="User" class="h-6 w-6 hover:opacity-80 transition duration-200" /></a>
            
            <!-- Mobile Logout Button -->
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="text-red-400 hover:text-red-300 text-sm font-medium transition-colors">
                    Logout
                </button>
            </form>
            
            <button @click="open = !open" class="text-white focus:outline-none ml-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <div x-show="open" x-transition
         class="md:hidden absolute top-full left-0 w-full bg-gray-950 border-t border-gray-800">
        <ul class="flex flex-col space-y-3 px-6 py-4 text-white text-sm">
            <li><a href="{{ route('dashboard') }}" class="hover:text-blue-400">Beranda</a></li>
            <li><a href="{{ route('produk.user') }}" class="hover:text-blue-400">Produk</a></li>
            <li><a href="{{ route('promo.index') }}" class="hover:text-blue-400">Promo</a></li>
            <li><a href="{{ route('article.index') }}" class="hover:text-blue-400">Artikel & Berita</a></li>
            <li><a href="#" class="hover:text-blue-400">Hubungi Kami</a></li>
            <li class="border-t border-gray-700 pt-3">
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-red-400 hover:text-red-300 transition-colors w-full text-left">
                        Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>
</nav>

{{-- Tambahkan padding di awal halaman supaya konten tidak ketimpa --}}
<div class="pt-20"></div>
