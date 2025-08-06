<!-- resources/views/admin/katalog-detail.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Detail Katalog</title>
</head>
<body style="background: #1e1e1e; color: white; font-family: sans-serif;">
    <h2 style="text-align: center;">{{ $jenis }}</h2>

    <div style="text-align: center; margin-bottom: 20px;">
        <a href="{{ route('katalog.create', $jenis) }}">
            <button style="padding: 10px; background: seagreen; color: white; border: none;">Buat Katalog Baru</button>
        </a>
    </div>

    @foreach($katalogs as $katalog)
        <div style="border: 1px solid #444; padding: 15px; margin: 10px; background: #2e2e2e;">
            @if ($katalog->gambar)
                <img src="{{ asset('storage/' . $katalog->gambar) }}" width="300" alt="{{ $katalog->nama_mesin }}"><br><br>
            @endif

            <h3>{{ $katalog->nama_mesin }}</h3>
            <p><strong>Harga:</strong> {{ $katalog->harga }}</p>
            <p><strong>Spesifikasi:</strong><br> {{ $katalog->spesifikasi }}</p>

            <a href="{{ route('katalog.edit', $katalog->id) }}">
                <button style="margin-top: 10px; padding: 8px; background: #c56f6f; color: white; border: none;">Ubah Katalog</button>
            </a>

            <form action="{{ route('katalog.destroy', $katalog->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus katalog ini?')" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" style="padding: 8px; background: #a94442; color: white; border: none;">Hapus Katalog</button>
            </form>
        </div>
    @endforeach
</body>
</html>
