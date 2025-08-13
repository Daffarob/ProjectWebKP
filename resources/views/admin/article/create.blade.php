<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Artikel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body { font-family: Arial, sans-serif; background: #f3f4f6; margin: 0; padding: 0; }
        .container { max-width: 800px; margin: 40px auto; padding: 20px; background: white; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        .form-group { margin-bottom: 20px; }
        label { display: block; margin-bottom: 6px; font-weight: bold; }
        input[type="text"], textarea, input[type="file"] {
            width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;
        }
        button {
            background-color: #2563eb; color: white; padding: 10px 20px;
            border: none; border-radius: 5px; cursor: pointer;
        }
        button:hover { background-color: #1d4ed8; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Tambah Artikel Baru</h2>
        <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Judul Artikel</label>
                <input type="text" name="title" id="title" required>
            </div>
            <div class="form-group">
                <label for="content">Isi Artikel</label>
                <textarea name="content" id="content" rows="6" required></textarea>
            </div>
            <div class="form-group">
                <label for="year">Tahun</label>
                <input type="text" name="year" id="year" required>
            </div>
            <div class="form-group">
                <label for="image">Gambar</label>
                <input type="file" name="image" id="image">
            </div>
            <button type="submit">Simpan</button>
        </form>
    </div>
</body>
</html>
