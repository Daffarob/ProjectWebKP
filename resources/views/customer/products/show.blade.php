<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products | Samafitro </title>
    @vite('resources/css/app.css')

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    @include('customer.layouts.header')
    <div class="max-w-7xl h-screen mx-auto px-4 py-10">
        <div class="flex flex-col gap-8 md:flex-row">
            <!-- Gambar Produk -->
            <div class="w-full md:w-1/2">
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full object-cover rounded-lg mb-4">
            </div>

            <!-- Deskripsi Produk -->
            <div class="w-full md:w-1/2">
                <h1 class="text-2xl font-bold mb-4">{{ $product->name }}</h1>
                <p class="text-gray-400 mb-2">Harga: Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                <hr class="my-4">
                <div class="space-y-2">
                    <p><strong>Arsitektur:</strong> SCODIX ULTRA 6000</p>
                    <p><strong>Area Cetak:</strong> Sampai 505 x 764 mm</p>
                    <p><strong>Gramatur:</strong> 135–675 gsm</p>
                    <p><strong>Print Speed:</strong> Max. 1,000 SPH</p>
                    <p><strong>Ketebalan:</strong> Hingga 0.7 mm</p>
                    <p><strong>Resolusi:</strong> 2,540 x 450 dpi</p>
                    <p><strong>Scanner:</strong> CCD - positioning otomatis (RSP™)</p>
                    <p><strong>Polimer Layer:</strong> Up to 250 µm (mode Braille)</p>
                    <p><strong>Maintenance:</strong> Sistem cleaning & auto maintenance</p>
                </div>
                <div class="flex justify-between mt-4">
                    <a href="" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Negosiasi</a>
                    <div class="flex items-center">
                        <button class="bg-gray-500 text-white px-2 py-2 rounded-l hover:bg-gray-600">-</button>
                        <input type="number" value="1" class="w-8 border border-gray-300 text-center" min="1">
                        <button class="bg-gray-500 text-white px-2 py-2 rounded-r hover:bg-gray-600">+</button>
                    </div>
                    <form action="{{ route('cart.add') }}" name="add_to_cart" method="POST">
                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Masukkan Keranjang</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('customer.layouts.footer')
    <script>
        // Script untuk mengcek jika produk sudah masuk kedalam keranjang
        document.addEventListener('DOMContentLoaded', function() {
            const addToCartForm = document.forms['add_to_cart'];
            if (addToCartForm) {
                addToCartForm.addEventListener('submit', function(event) {
                    event.preventDefault(); // Mencegah form untuk dikirim secara default

                    // Menggunakan Fetch API untuk mengirim data form
                    fetch(this.action, {
                            method: this.method,
                            body: new FormData(this),
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest', // Menandai permintaan sebagai AJAX
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // Pastikan ada meta tag CSRF di head
                            }
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json(); // Mengurai respons JSON
                        })
                        .then(data => {
                            if (data.success) {
                                alert('Produk berhasil ditambahkan ke keranjang!');
                                // Opsi lain: perbarui tampilan keranjang di halaman
                            } else {
                                alert('Gagal menambahkan produk ke keranjang. ' + (data.message || 'Silakan coba lagi.'));
                            }
                        })
                        .catch(error => {
                            console.error('Ada masalah dengan operasi fetch:', error);
                            alert('Terjadi kesalahan saat menambahkan produk. Silakan coba lagi nanti.');
                        });
                });
            }
        });
    </script>
</body>

</html>