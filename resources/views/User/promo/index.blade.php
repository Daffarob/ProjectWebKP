<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Promo Menarik Bulan Ini</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-color: #1f1f1f;
            color: white;
        }
        .promo-title {
            font-weight: 600;
        }
        .promo-subtitle {
            color: #bbb;
        }
        .promo-card {
            background: #2d2d2d;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0,0,0,0.3);
            position: relative;
            padding: 1rem;
        }
        .promo-tag {
            position: absolute;
            top: 0;
            left: 0;
            background: #d32f2f;
            color: white;
            font-weight: bold;
            padding: 0.4rem 1rem;
            border-top-left-radius: 12px;
            border-bottom-right-radius: 12px;
            font-size: 0.95rem;
        }
        .product-img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 6px;
            margin-bottom: 0.75rem;
        }
        .badge-custom {
            background-color: #444;
            color: #eee;
            font-size: 0.7rem;
            margin-right: 5px;
        }
    </style>
</head>
<body class="text-white bg-[#1f1f1f]">

    <!-- Navbar -->
    <nav class="bg-gray-950 shadow">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <!-- Logo -->
            <div class="flex items-center space-x-3">
                <img src="{{ asset('images/logo-samafitro.png') }}" alt="Samafitro" class="h-12 md:h-16 w-auto max-h-14">
            </div>

            <!-- Menu Desktop -->
            <ul class="hidden md:flex flex-wrap space-x-4 lg:space-x-8 text-xs md:text-sm font-medium text-white">
                <li><a href="#" class="hover:text-blue-400">Home</a></li>
                <li><a href="#" class="hover:text-blue-400">Katalog Produk</a></li>
                <li><a href="#" class="hover:text-blue-400">Promo</a></li>
                <li><a href="#" class="hover:text-blue-400">Artikel & Berita</a></li>
                <li><a href="#" class="hover:text-blue-400">Hubungi Kami</a></li>
            </ul>

            <!-- Icons -->
            <div class="flex space-x-4">
                <a href="#">
                    <img src="/images/cart.png" alt="Cart" class="h-6 w-6 hover:opacity-80 transition duration-200" />
                </a>
                <a href="#">
                    <img src="/images/profile.png" alt="User" class="h-6 w-6 hover:opacity-80 transition duration-200" />
                </a>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="container py-5">
        <h2 class="text-center text-3xl md:text-4xl font-bold promo-title">Promo Menarik Bulan Ini</h2>
        <p class="text-center text-lg md:text-xl promo-subtitle mt-2">Produk yang kami tawarkan pada bulan ini</p>
        <div class="row g-4 mt-4">
    @foreach($promos as $promo)
        <div class="col-md-6 col-lg-4">
            <div class="bg-white text-dark rounded-3 overflow-hidden shadow position-relative" style="min-height: 420px;">
                <!-- Cashback Ribbon -->
                <div class="position-absolute top-0 start-0 bg-danger text-white px-3 py-2 fw-bold" style="clip-path: polygon(0 0, 100% 0, 85% 100%, 0% 100%); z-index: 10;">
                    Cashback {{ $promo['discount'] ?? '30%' }}
                    <div style="font-size: 0.7rem; font-weight: 400;">Khusus produk {{ $promo['vendor'] }}</div>
                </div>

                <!-- Gambar -->
                <img src="{{ asset('images/' . $promo['image']) }}" class="w-100" style="height: 180px; object-fit: cover;" alt="{{ $promo['title'] }}">

                <!-- Konten -->
                <div class="p-3 d-flex flex-column justify-content-between h-100">
                    <div>
                        <h5 class="fw-semibold">{{ $promo['title'] }}</h5>
                        <div class="mb-2">
                            <span class="badge bg-secondary me-1">{{ $promo['vendor'] }}</span>
                            <span class="badge bg-secondary">{{ $promo['label'] }}</span>
                        </div>
                        <p class="text-muted small mb-0"><i class="far fa-clock me-1"></i>Periode: {{ $promo['periode'] }}</p>
                    </div>

                    <!-- Tombol -->
                    <div class="mt-3">
                        <a href="#" class="btn btn-outline-dark w-100 d-flex justify-content-between align-items-center">
                            <span>Lihat Detail</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<!-- Footer -->
<footer class="bg-gray-900 mt-5 pt-10 pb-6 text-sm text-gray-300">
    <div class="max-w-7xl mx-auto px-6 grid gap-10 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1">
        
        <!-- Brand Logo & Copyright -->
        <div class="flex flex-col items-start space-y-4">
            <img src="{{ asset('images/logo-samafitro.png') }}" alt="Samafitro Logo" class="h-auto max-h-14 w-auto">
            <p class="text-gray-400 text-xs">&copy; 2025 Samafitro Bandung. All rights reserved.</p>
        </div>

        <!-- Contact Info -->
        <div>
            <h3 class="text-white font-semibold mb-4">Hubungi Kami</h3>
            <ul class="space-y-2">
                <li class="flex items-start">
                    <i class="fas fa-envelope text-white mr-3 pt-1"></i>
                    <span>samafitro_bdg@samafitro.co.id</span>
                </li>
                <li class="flex items-start">
                    <i class="fas fa-store text-white mr-3 pt-1"></i>
                    <span>Samafitro Bandung Official Store</span>
                </li>
            </ul>
        </div>

        <!-- Social Media -->
        <div>
            <h3 class="text-white font-semibold mb-4">Social Media</h3>
            <ul class="space-y-2">
                <li class="flex items-start">
                    <i class="fab fa-instagram text-white mr-3 pt-1"></i>
                    <span>@samafitro_bandung</span>
                </li>
                <li class="flex items-start">
                    <i class="fab fa-facebook text-white mr-3 pt-1"></i>
                    <span>@SamafitroBandung</span>
                </li>
                <li class="flex items-start">
                    <i class="fab fa-youtube text-white mr-3 pt-1"></i>
                    <span>Samafitro Bandung</span>
                </li>
                <li class="flex items-start">
                    <i class="fab fa-tiktok text-white mr-3 pt-1"></i>
                    <span>@samafitro.bandung</span>
                </li>
            </ul>
        </div>
    </div>

    <!-- Bottom Line -->
    <div class="border-t border-gray-700 mt-10 pt-4 text-center text-xs text-gray-500">
        Dibuat dengan ❤️ oleh Tim Samafitro Bandung
    </div>
</footer>


</body>
</html>
