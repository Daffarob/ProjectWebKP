<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Akun | Samafitro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="flex min-h-screen">
        <!-- Left Panel -->
        <div class="w-1/2 bg-gradient-to-br from-gray-100 to-gray-300 p-10 flex flex-col justify-center items-center">
            <a href="/login" class="self-start text-gray-600 hover:text-gray-800 text-xl font-semibold">
                ← samafitro
            </a>
            <div class="mt-24 text-center">
                <h2 class="text-4xl font-bold mb-4">Hi!</h2>
                <p class="text-gray-600 mb-6">Anda sudah memiliki akun?</p>
                <a href="{{ route('login') }}" class="bg-gray-800 text-white px-6 py-2 rounded hover:bg-gray-700 transition">
                    Masuk Disini
                </a>
            </div>
        </div>

        <!-- Right Panel -->
        <div class="w-1/2 bg-gray-900 text-white p-10 overflow-auto">
            <h2 class="text-3xl font-semibold mb-8 text-center">Daftar Akun</h2>
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div class="grid grid-cols-2 gap-4">
                    <!-- Data Pribadi -->
                    <div>
                        <label class="block mb-1">Nama Lengkap</label>
                        <input type="text" name="name" class="w-full p-2 bg-gray-800 rounded border border-gray-600" required>
                    </div>
                    <div>
                        <label class="block mb-1">Alamat Email</label>
                        <input type="email" name="email" class="w-full p-2 bg-gray-800 rounded border border-gray-600" required>
                    </div>
                    <div>
                        <label class="block mb-1">Nomor Telepon</label>
                        <input type="text" name="phone" class="w-full p-2 bg-gray-800 rounded border border-gray-600" required>
                    </div>
                    <div>
                        <label class="block mb-1">Alamat</label>
                        <input type="text" name="address" class="w-full p-2 bg-gray-800 rounded border border-gray-600">
                    </div>
                    <div>
                        <label class="block mb-1">Kata Sandi</label>
                        <input type="password" name="password" class="w-full p-2 bg-gray-800 rounded border border-gray-600" required>
                    </div>
                    <div>
                        <label class="block mb-1">Konfirmasi Kata Sandi</label>
                        <input type="password" name="password_confirmation" class="w-full p-2 bg-gray-800 rounded border border-gray-600" required>
                    </div>

                    <!-- Data KTP -->
                    <div>
                        <label class="block mb-1">Nomor KTP</label>
                        <input type="text" name="ktp_number" class="w-full p-2 bg-gray-800 rounded border border-gray-600" required>
                    </div>
                    <div>
                        <label class="block mb-1">Unggah Foto KTP</label>
                        <input type="file" name="ktp_photo" class="w-full p-2 bg-gray-800 rounded border border-gray-600" required>
                    </div>

                    <!-- Profil Organisasi -->
                    <div>
                        <label class="block mb-1">Nama Perusahaan</label>
                        <input type="text" name="company_name" class="w-full p-2 bg-gray-800 rounded border border-gray-600">
                    </div>
                    <div>
                        <label class="block mb-1">NPWP</label>
                        <input type="text" name="npwp" class="w-full p-2 bg-gray-800 rounded border border-gray-600">
                    </div>

                    <!-- Keamanan -->
                    <div>
                        <label class="block mb-1">Pertanyaan Keamanan</label>
                        <select name="security_question" class="w-full p-2 bg-gray-800 rounded border border-gray-600" required>
                            <option value="">Pilih pertanyaan</option>
                            <option value="ibu_kandung">Siapa nama ibu kandung Anda?</option>
                            <option value="sekolah_pertama">Apa nama sekolah pertama Anda?</option>
                            <option value="makanan_favorit">Apa makanan favorit Anda?</option>
                        </select>
                    </div>
                    <div>
                        <label class="block mb-1">Jawaban Keamanan</label>
                        <input type="text" name="security_answer" class="w-full p-2 bg-gray-800 rounded border border-gray-600" required>
                    </div>
                </div>

                <div class="text-center pt-6">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-500 text-white px-6 py-2 rounded">
                        Daftar Sekarang
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
