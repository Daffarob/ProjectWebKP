<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-6">

    <h1 class="text-2xl font-bold mb-6">Keranjang Belanja</h1>

    <div class="bg-white shadow rounded-lg p-4">
        <div class="flex items-center border-b pb-4 mb-4">
            <img src="https://via.placeholder.com/80" class="w-20 h-20 rounded-lg" alt="Produk">
            <div class="ml-4 flex-1">
                <h2 class="text-lg font-semibold">Nama Produk</h2>
                <p class="text-gray-500">Rp 1.000.000</p>
            </div>
            <div class="flex items-center space-x-2">
                <button class="px-3 py-1 bg-gray-200 rounded">-</button>
                <span>1</span>
                <button class="px-3 py-1 bg-gray-200 rounded">+</button>
            </div>
        </div>

        <div class="flex justify-between font-semibold text-lg">
            <span>Total</span>
            <span>Rp 1.000.000</span>
        </div>

        <div class="mt-6 text-right">
            <a href="{{ route('checkout') }}" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Lanjutkan ke Pembayaran</a>
        </div>
    </div>

</body>
</html>
