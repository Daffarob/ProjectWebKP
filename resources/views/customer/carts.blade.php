<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carts | Samafitro</title>
    @vite('resources/css/app.css')

    {{-- Font Awesome --}}
</head>

<body class="bg-gradient-to-b from-gray-900 via-gray-800 to-gray-900 text-white font-sans">
    @include('customer.layouts.header')
    <div class=" container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-4">Keranjang Belanja</h1>
        <div class="bg-white shadow-md rounded-lg p-6">
            @if($cartItems->isEmpty())
            <p class="text-gray-500">Keranjang Anda kosong.</p>
            @else
            <table class="w-full text-left">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Produk</th>
                        <th class="px-4 py-2">Harga</th>
                        <th class="px-4 py-2">Jumlah</th>
                        <th class="px-4 py-2">Total</th>
                        <th class="px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cartItems as $cart)
                    <tr>
                        <td class="px-4 py-2">{{ $cart->product->nama_produk }}</td>
                        <td class="px-4 py-2">Rp {{ number_format($cart->product->harga, 0, ',', '.') }}</td>
                        <td class="px-4 py-2">{{ $cart->jumlah }}</td>
                        <td class="px-4 py-2">Rp {{ number_format($cart->product->harga * $cart->jumlah, 0, ',', '.') }}</td>
                        <td class="px-4 py-2">
                            <form action="{{ route('customer.cart.destroy', $cart->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini dari keranjang?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-6">
                <h2 class="text-xl font-semibold mb-2">Total Belanja: Rp {{ number_format($total, 0, ',', '.') }}</h2>
                <a href="{{ route('customer.checkout') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Checkout</a>
            </div>
            @endif
        </div>
</body>

</html>