<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-6">

    <h1 class="text-2xl font-bold mb-6">Pembayaran</h1>

    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-lg font-semibold mb-4">Ringkasan Pesanan</h2>
        <div class="flex justify-between mb-2">
            <span>Produk A</span>
            <span>Rp 1.000.000</span>
        </div>
        <div class="flex justify-between font-bold text-lg">
            <span>Total</span>
            <span>Rp 1.000.000</span>
        </div>

        <h2 class="text-lg font-semibold mt-6 mb-2">Metode Pembayaran</h2>
        <select class="w-full border p-2 rounded mb-4">
            <option>Transfer Bank</option>
            <option>OVO</option>
            <option>DANA</option>
            <option>GoPay</option>
        </select>

        <button class="w-full bg-green-600 text-white py-2 rounded-lg hover:bg-green-700">Bayar Sekarang</button>
    </div>

</body>
</html>
