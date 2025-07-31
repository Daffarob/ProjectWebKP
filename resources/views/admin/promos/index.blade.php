<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Admin - Daftar Promo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome Free CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f4f4;
            font-family: 'Segoe UI', sans-serif;
        }

        .promo-img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 6px;
        }

        .table td, .table th {
            vertical-align: middle;
        }

        .table-striped > tbody > tr:nth-of-type(odd) {
            background-color: #fafafa;
        }

        .badge-custom {
            background-color: #6c63ff;
            font-size: 0.8rem;
        }

        .btn-action {
            transition: all 0.2s ease-in-out;
        }

        .btn-action:hover {
            transform: scale(1.05);
            opacity: 0.9;
        }

        .nav-link:hover {
            color: #0d6efd !important;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="{{ asset('images/logo-samafitro.png') }}" alt="Samafitro" class="me-2" style="height: 40px;">
            </a>

            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 gap-3">
                    <li class="nav-item"><a class="nav-link" href="#">Edit Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Katalog Produk</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Promo</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Artikel & Berita</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Hubungi Kami</a></li>
                </ul>
                <div class="d-flex ms-3 gap-2">
                    <a href="#"><img src="/images/cart.png" class="img-fluid" style="height: 24px;"></a>
                    <a href="#"><img src="/images/profile.png" class="img-fluid" style="height: 24px;"></a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Promo Table -->
    <div class="container py-5">
        <h2 class="mb-4 text-center fw-bold">📋 Daftar Promo Produk</h2>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="{{ route('promos.create') }}" class="btn btn-success shadow-sm btn-action">
                <i class="fas fa-plus me-2"></i> Tambah Promo
            </a>

            @if(session('success'))
                <div class="alert alert-success mb-0">{{ session('success') }}</div>
            @endif
        </div>

        <div class="table-responsive shadow rounded bg-white p-3">
            <table class="table table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Judul</th>
                        <th>Vendor</th>
                        <th>Label</th>
                        <th>Diskon</th>
                        <th>Periode</th>
                        <th>Gambar</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($promos as $promo)
                        <tr>
                            <td>{{ $promo->title }}</td>
                            <td>{{ $promo->vendor }}</td>
                            <td><span class="badge badge-custom">{{ $promo->label }}</span></td>
                            <td class="text-danger fw-semibold">{{ $promo->discount }}</td>
                            <td>{{ $promo->periode }}</td>
                            <td><img src="{{ asset('storage/' . $promo->image) }}" alt="Gambar Promo" class="promo-img"></td>
                            <td class="text-center">
                                <a href="{{ route('promos.edit', $promo->id) }}" class="btn btn-warning btn-sm me-1 btn-action">
                                    <i class="fas fa-edit me-1"></i>Edit
                                </a>
                                <form action="{{ route('promos.destroy', $promo->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus promo ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm btn-action">
                                        <i class="fas fa-trash-alt me-1"></i>Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">Belum ada data promo.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-light pt-5">
        <div class="container">
            <div class="row align-items-start text-center text-md-start">
                <!-- Logo -->
                <div class="col-lg-4 mb-4">
                    <img src="{{ asset('images/logo-samafitro.png') }}" class="mb-3" style="height: 45px;" alt="Samafitro Logo">
                    <p class="small text-muted mb-0">&copy; 2025 Samafitro Bandung. All rights reserved.</p>
                </div>

                <!-- Hubungi Kami -->
                <div class="col-lg-4 mb-4">
                    <h6 class="fw-bold mb-3">Hubungi Kami</h6>
                    <ul class="list-unstyled text-muted small">
                        <li class="mb-2"><i class="fas fa-envelope me-2"></i>samafitro_bdg@samafitro.co.id</li>
                        <li><i class="fas fa-store me-2"></i>Samafitro Bandung Official Store</li>
                    </ul>
                </div>

                <!-- Sosial Media -->
                <div class="col-lg-4 mb-4">
                    <h6 class="fw-bold mb-3">Social Media</h6>
                    <ul class="list-unstyled text-muted small">
                        <li class="mb-2"><i class="fab fa-instagram me-2"></i>@samafitro_bandung</li>
                        <li class="mb-2"><i class="fab fa-facebook me-2"></i>@SamafitroBandung</li>
                        <li class="mb-2"><i class="fab fa-youtube me-2"></i>Samafitro Bandung</li>
                        <li><i class="fab fa-tiktok me-2"></i>@samafitro.bandung</li>
                    </ul>
                </div>
            </div>

            <hr class="border-light">
            <p class="text-center text-muted small mb-0">Dibuat dengan <i class="fas fa-heart text-danger"></i> oleh Tim Samafitro Bandung</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
