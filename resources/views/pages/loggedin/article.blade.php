@extends('layouts.loggedin')

@section('title', 'Artikel & Berita | Samafitro')

@section('content')
    {{-- Judul Halaman --}}
    <section class="text-center py-10 px-4">
        <h1 class="text-3xl font-bold">Artikel & Berita</h1>
        <p class="text-sm text-gray-400 mt-1">Berita seputar produk dari samafitro</p>
        <hr class="w-24 mx-auto border-gray-500 mt-3">
    </section>

    {{-- Artikel Grid --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 pb-16">
        @forelse ($articles as $article)
        <div class="bg-white text-black rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition duration-300 group">
            <div class="overflow-hidden aspect-[16/9] bg-gray-200">
                @if ($article->image)
                    <img src="{{ asset('storage/' . $article->image) }}" 
                         alt="{{ $article->title }}" 
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                @else
                    <div class="w-full h-full flex items-center justify-center bg-gray-300">
                        <span class="text-gray-500">No Image</span>
                    </div>
                @endif
            </div>
            <div class="p-6">
                <h3 class="text-xl font-bold mb-2 line-clamp-2 group-hover:text-blue-600 transition-colors">
                    {{ $article->title }}
                </h3>
                <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                    {{ Str::limit($article->content, 120) }}
                </p>
                <div class="flex items-center justify-between">
                    <span class="text-xs text-gray-500">
                        {{ $article->created_at ? $article->created_at->format('d M Y') : 'No Date' }}
                    </span>
                    <a href="{{ route('article.show', $article->id) }}" 
                       class="text-blue-600 hover:text-blue-800 font-medium text-sm transition-colors">
                        Baca Selengkapnya →
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-full text-center py-16">
            <div class="text-gray-400 mb-4">
                <svg class="mx-auto h-16 w-16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                </svg>
            </div>
            <h3 class="text-lg font-medium text-gray-900 mb-2">Belum ada artikel</h3>
            <p class="text-gray-500">Artikel akan segera tersedia.</p>
        </div>
        @endforelse
    </section>
@endsection

@section('floating-wa')
    {{-- Floating WhatsApp --}}
    <a href="https://wa.me/6281234567890" target="_blank" class="floating-wa">
        <img src="{{ asset('images/buttonwa.png') }}" alt="WhatsApp">
    </a>
@endsection

