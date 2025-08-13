<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Artikel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #111827;
            color: #fff;
            padding: 40px;
        }

        .container {
            max-width: 700px;
            margin: 0 auto;
            background-color: #1f2937;
            padding: 30px;
            border-radius: 10px;
        }

        h1 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            border-radius: 5px;
            border: none;
        }

        input[type="file"] {
            margin-bottom: 16px;
        }

        button {
            background-color: #2563eb;
            color: white;
            padding: 10px 16px;
            border: none;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background-color: #1e40af;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Artikel</h1>

        <form action="{{ route('admin.articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label for="title">Judul</label>
            <input type="text" name="title" id="title" value="{{ $article->title }}" required>

            <label for="content">Isi</label>
            <textarea name="content" id="content" rows="6" required>{{ $article->content }}</textarea>

            <label for="year">Tahun</label>
            <input type="text" name="year" id="year" value="{{ $article->year }}" required>

            <label for="image">Gambar (kosongkan jika tidak ingin mengubah)</label>
            <input type="file" name="image" id="image">

            @if ($article->image)
                <p>Gambar saat ini:</p>
                <img src="{{ asset('storage/' . $article->image) }}" alt="Gambar Artikel" style="max-width: 200px; margin-bottom: 15px;">
            @endif

            <button type="submit">Update Artikel</button>
        </form>
    </div>
</body>
</html>
