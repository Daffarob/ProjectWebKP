<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ isset($promo) ? 'Edit Promo' : 'Tambah Promo' }} | Admin Samafitro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            background-color: #f9f9f9;
        }
        .form-section {
            background: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }
        label {
            font-weight: 500;
        }
        .img-preview {
            width: 100px;
            border-radius: 8px;
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="bg-gray-950 shadow">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <img src="{{ asset('images/logo-samafitro.png') }}" alt="Samafitro" class="h-12 md:h-16 w-auto max-h-14">
            </div>

            <ul class="hidden md:flex flex-wrap space-x-4 lg:space-x-8 text-xs md:text-sm font-medium text-white">
                <li><a href="#" class="hover:text-blue-400">Home</a></li>
                <li><a href="#" class="hover:text-blue-400">Katalog Produk</a></li>
                <li><a href="#" class="hover:text-blue-400">Promo</a></li>
                <li><a href="#" class="hover:text-blue-400">Artikel & Berita</a></li>
                <li><a href="#" class="hover:text-blue-400">Hubungi Kami</a></li>
            </ul>

            <div class="flex space-x-4">
                <a href="#"><img src="/images/cart.png" alt="Cart" class="h-6 w-6 hover:opacity-80 transition duration-200" /></a>
                <a href="#"><img src="/images/profile.png" alt="User" class="h-6 w-6 hover:opacity-80 transition duration-200" /></a>
            </div>
        </div>
    </nav>

    <!-- Form Section -->
    <div class="container py-5">
        <div class="form-section mx-auto" style="max-width: 700px;">
            <h4 class="mb-4">{{ isset($promo) ? 'Edit Promo' : 'Tambah Promo Baru' }}</h4>

            <form action="{{ isset($promo) ? route('admin.promos.update', $promo->id) : route('admin.promos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($promo)) @method('PUT') @endif

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="name" class="form-label">Judul Promo</label>
                        <input type="text" name="name" class="form-control" value="{{ $promo->name?? old('name') }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="vendor" class="form-label">Vendor</label>
                        <input type="text" name="vendor" class="form-control" value="{{ $promo->vendor ?? old('vendor') }}" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="label" class="form-label">Label</label>
                        <input type="text" name="label" class="form-control" value="{{ $promo->label ?? old('label') }}">
                    </div>
                    <div class="col-md-3">
                        <label for="discount" class="form-label">Diskon (%)</label>
                        <input type="text" name="discount" class="form-control" value="{{ $promo->discount ?? old('discount') }}">
                    </div>
                    <div class="col-md-3">
                        <label for="periode" class="form-label">Periode</label>
                        <input type="date" name="periode" class="form-control" value="{{ $promo->periode ?? old('periode') }}">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Upload Gambar</label>
                    <input type="file" name="image" class="form-control">
                    @if(isset($promo) && $promo->image)
                        <img src="{{ asset('storage/' . $promo->image) }}" class="img-preview" alt="Preview">
                    @endif
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-success w-100">
                        {{ isset($promo) ? 'Update Promo' : 'Simpan Promo' }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 mt-5 pt-10 pb-6 text-sm text-gray-300">
        <div class="max-w-7xl mx-auto px-6 grid gap-10 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1">
            <div class="flex flex-col items-start space-y-4">
                <img src="{{ asset('images/logo-samafitro.png') }}" alt="Samafitro Logo" class="h-auto max-h-14 w-auto">
                <p class="text-gray-400 text-xs">&copy; 2025 Samafitro Bandung. All rights reserved.</p>
            </div>

            <div>
                <h3 class="text-white font-semibold mb-4">Hubungi Kami</h3>
                <ul class="space-y-2">
                    <li class="flex items-start"><i class="fas fa-envelope text-white mr-3 pt-1"></i> <span>samafitro_bdg@samafitro.co.id</span></li>
                    <li class="flex items-start"><i class="fas fa-store text-white mr-3 pt-1"></i> <span>Samafitro Bandung Official Store</span></li>
                </ul>
            </div>

            <div>
                <h3 class="text-white font-semibold mb-4">Social Media</h3>
                <ul class="space-y-2">
                    <li class="flex items-start"><i class="fab fa-instagram text-white mr-3 pt-1"></i> <span>@samafitro_bandung</span></li>
                    <li class="flex items-start"><i class="fab fa-facebook text-white mr-3 pt-1"></i> <span>@SamafitroBandung</span></li>
                    <li class="flex items-start"><i class="fab fa-youtube text-white mr-3 pt-1"></i> <span>Samafitro Bandung</span></li>
                    <li class="flex items-start"><i class="fab fa-tiktok text-white mr-3 pt-1"></i> <span>@samafitro.bandung</span></li>
                </ul>
            </div>
        </div>

        <div class="border-t border-gray-700 mt-10 pt-4 text-center text-xs text-gray-500">
            Dibuat dengan ❤️ oleh Tim Samafitro Bandung
        </div>
    </footer>

</body>
</html>