@extends('layouts.loggedin')

@section('title', 'Promo Menarik Bulan Ini')

@section('additional-styles')
<style>
    .promo-title {
        font-weight: 600;
    }
    .promo-subtitle {
        color: #bbb;
    }
    .promo-tag {
        position: absolute;
        top: 0;
        left: 0;
        background: #d32f2f;
        color: white;
        font-weight: bold;
        padding: 0.4rem 1rem;
        border-top-left-radius: 12px;
        border-bottom-right-radius: 12px;
        font-size: 0.95rem;
        z-index: 10;
    }
</style>
@endsection

@section('content')
    {{-- Header Section --}}
    <div class="container-fluid py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h1 class="promo-title display-4 mb-3">Promo Menarik Bulan Ini</h1>
                <p class="promo-subtitle lead">Dapatkan penawaran terbaik untuk produk-produk berkualitas dari Samafitro</p>
            </div>
        </div>

        {{-- Promo Grid --}}
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mt-4">
            @foreach($promos as $promo)
                <div class="col">
                    <div class="bg-white text-dark rounded-3 overflow-hidden shadow position-relative h-100 d-flex flex-column">
                        <div class="promo-tag">
                            Diskon {{ $promo['discount'] ?? '30%' }}
                            <div style="font-size: 0.7rem; font-weight: 400;">Brand {{ $promo['vendor'] }}</div>
                        </div>

                        <img src="{{ asset('storage/' . $promo->image) }}" class="w-100" style="height: 180px; object-fit: cover;" alt="{{ $promo['title'] }}">

                        <div class="p-3 d-flex flex-column justify-content-between flex-grow-1">
                            <div>
                                <h5 class="fw-semibold">{{ $promo['title'] }}</h5>
                                <div class="mb-2">
                                    <span class="badge bg-secondary me-1">{{ $promo['vendor'] }}</span>
                                    <span class="badge bg-secondary">{{ $promo['label'] }}</span>
                                </div>
                                <p class="text-muted small mb-0"><i class="far fa-clock me-1"></i>Periode: {{ $promo['periode'] }}</p>
                            </div>
                            <div class="mt-3">
                                <a href="{{ route('promo.show', $promo->id) }}" class="btn btn-outline-dark w-100 d-flex justify-content-between align-items-center">
                                    <span>Lihat Detail</span>
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('floating-wa')
    {{-- Floating WhatsApp --}}
    <a href="https://wa.me/6281234567890" target="_blank" class="floating-wa">
        <img src="{{ asset('images/buttonwa.png') }}" alt="WhatsApp">
    </a>
@endsection
