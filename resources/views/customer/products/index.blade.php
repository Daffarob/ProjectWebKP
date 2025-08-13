<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products | Samafitro </title>
    @vite('resources/css/app.css')

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    @include('customer.layouts.header')
    <div class="max-w-7xl mx-auto px-4 pb-10">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @if($products->isEmpty())
            <div>
                <h1 class="text-2xl font-bold mb-4">Produk Tidak Ditemukan</h1>
            </div>
            @else
            @foreach( $products as $product )
            <div class="bg-gray-800 rounded-lg p-4 flex items-center justify-center">
                <img src="{{ asset('storage/image/' . $product->gambar_produk) }}" alt="{{ $product->name }}" class="max-h-40">
                <div class="mt-2 text-center">
                    <h2 class="text-sm font-semibold">{{ $product->name }}</h2>
                    <p class="text-xs text-gray-400">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    <a href="{{ url('/customer/products/' . $product->name) }}" class="mt-2 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Lihat Detail</a>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
    @include('customer.layouts.footer')
</body>

</html>