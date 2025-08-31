<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Artikel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        /* Tombol umum */
        button, .btn-back {
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
            transition: all 0.3s ease;
        }
        .btn-back {
            background-color: #6b7280;
            color: white;
            display: inline-block;
            text-decoration: none;
            margin-bottom: 20px;
        }
        .btn-back:hover { background-color: #4b5563; }
        button[type="submit"] {
            background-color: #2563eb;
            color: white;
            border: none;
            cursor: pointer;
        }
        button[type="submit"]:hover { background-color: #1d4ed8; }

        /* Input form */
        input[type="text"], textarea, input[type="file"] {
            width: 100%;
            padding: 10px;
            background-color: #1f2937; /* abu gelap */
            border: 1px solid #374151;
            color: white;
            border-radius: 5px;
        }
        input::placeholder, textarea::placeholder {
            color: #9ca3af;
        }
        img.preview-image {
            max-width: 200px;
            border-radius: 8px;
            margin-top: 10px;
        }
    </style>
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
                <li><a href="{{ route('admin.promos.index') }}" class="text-indigo-400 font-semibold">Edit Promo</a></li>
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
            <a href="{{ route('admin.dashboard') }}" class="hover:text-indigo-400 transition">Edit Beranda</a>
            <a href="#" class="block hover:text-indigo-400">Edit Produk</a>
            <a href="{{ route('admin.promos.index') }}" class="hover:text-indigo-400 transition">Edit Promo</a>
            <a href="{{ route('admin.articles.index') }}" class="hover:text-indigo-400 transition">Edit Artikel & Berita</a>
            <a href="#" class="block hover:text-indigo-400">Hubungi Kami</a>
            <div class="flex items-center space-x-4 pt-2 border-t border-gray-700">
                <a href="#"><img src="/images/cart.png" class="h-6"></a>
                <a href="{{ route('User.profile.index') }}"><img src="/images/profile.png" class="h-6"></a>
            </div>
        </div>
    </nav>

    <!-- Konten Utama -->
    <main class="flex-grow">
        <div class="max-w-3xl mx-auto my-10 p-8 rounded-xl shadow-lg bg-gradient-to-br from-gray-800 via-gray-900 to-black">
            <a href="{{ route('admin.articles.index') }}" class="btn-back">← Kembali</a>
            <h2 class="text-2xl font-bold mb-6 text-white">Edit Artikel</h2>

            <form action="{{ route('admin.articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-5">
                    <label for="title" class="block mb-2 font-semibold">Judul Artikel</label>
                    <input type="text" name="title" id="title" value="{{ $article->title }}" required>
                </div>

                <div class="mb-5">
                    <label for="content" class="block mb-2 font-semibold">Isi Artikel</label>
                    <textarea name="content" id="content" rows="6" required>{{ $article->content }}</textarea>
                </div>

                <div class="mb-5">
                    <label for="year" class="block mb-2 font-semibold">Tahun</label>
                    <input type="text" name="year" id="year" value="{{ $article->year }}" required>
                </div>

                <div class="mb-5">
                    <label for="image" class="block mb-2 font-semibold">Gambar (kosongkan jika tidak ingin mengubah)</label>
                    <input type="file" name="image" id="image">
                </div>

                @if ($article->image)
                    <p class="text-sm text-gray-400">Gambar saat ini:</p>
                    <img src="{{ asset('storage/' . $article->image) }}" alt="Gambar Artikel" class="preview-image">
                @endif

                <button type="submit">Update Artikel</button>
            </form>
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
