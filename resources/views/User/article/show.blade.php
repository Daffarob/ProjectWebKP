<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $article->title }} | Samafitro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-950 text-white font-sans leading-relaxed">

    <div class="min-h-screen py-10 px-5 sm:px-10">
        <div class="max-w-6xl mx-auto">

            {{-- Tombol Kembali --}}
            <div class="mb-6">
                <a href="{{ route('article.index') }}" class="inline-flex items-center text-blue-400 hover:text-blue-300 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    <span>Kembali ke Artikel</span>
                </a>
            </div>

            {{-- Grid Layout --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-start bg-gray-900 p-6 rounded-xl shadow-lg">

                {{-- Gambar Artikel --}}
                <div class="w-full h-full">
                    <div class="rounded-lg overflow-hidden shadow-md">
                        <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}"
                             class="w-full h-[300px] object-cover hover:scale-105 transition-transform duration-300 ease-in-out">
                    </div>
                </div>

                {{-- Konten Artikel --}}
                <div>
                    <h1 class="text-4xl font-bold mb-4 text-white">{{ $article->title }}</h1>

                    <p class="text-sm text-gray-400 mb-6">
                        <span class="inline-block bg-blue-800 px-3 py-1 rounded-full text-xs font-medium">
                            Tahun: {{ $article->year }}
                        </span>
                    </p>

                    <div class="text-gray-200 text-lg space-y-4">
                        {!! nl2br(e($article->content)) !!}
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
</html>
