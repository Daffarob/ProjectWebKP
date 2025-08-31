@extends('layouts.loggedin')

@section('title', ($promo->name ?? 'Detail Promo') . ' | Samafitro')

@section('additional-styles')
<style>
    .promo-tag {
        position: absolute;
        top: 12px;
        left: 12px;
        background: #d32f2f;
        color: #fff;
        padding: .4rem .9rem;
        border-radius: 8px;
        font-weight: 700;
        z-index: 5;
    }
    .promo-card {
        background: linear-gradient(180deg, rgba(255,255,255,0.03), rgba(0,0,0,0.03));
        border-radius: 14px;
        padding: 20px;
    }
    .info-box {
        background: rgba(255,255,255,0.03);
        border-radius: 12px;
        padding: 16px;
    }
    .badge-cta {
        background: #d32f2f;
        color: #fff;
        padding: .35rem .6rem;
        border-radius: 999px;
        font-weight: 700;
    }
    .badge-time {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 1rem;
        font-weight: 600;
        padding: 0.4rem 0.8rem;
        min-width: 110px;
        text-align: center;
        line-height: 1.2;
    }
    /* Responsive tweaks */
    @media (max-width: 767px) {
        .promo-hero-inner { flex-direction: column; }
        .promo-image-wrapper { width: 100% !important; max-width: 100% !important; }
        .promo-image-wrapper img { height: auto !important; }
        .promo-card { padding: 15px; }
    }
</style>
@endsection

@section('content')
    {{-- Hero Section --}}
    <section class="py-5">
        <div class="container">
            <div class="promo-card">
                <div class="row promo-hero-inner">
                    <div class="col-md-6 promo-image-wrapper" style="max-width: 400px;">
                        <div class="position-relative">
                            @if($promo->image)
                                <img src="{{ asset('storage/' . $promo->image) }}" 
                                     alt="{{ $promo->name }}" 
                                     class="img-fluid rounded" 
                                     style="width: 100%; height: 300px; object-fit: cover;">
                            @else
                                <div class="bg-secondary rounded d-flex align-items-center justify-content-center" 
                                     style="width: 100%; height: 300px;">
                                    <span class="text-muted">No Image</span>
                                </div>
                            @endif
                            
                            <div class="promo-tag">
                                {{ $promo->discount ?? '30%' }} OFF
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="ps-md-4">
                            <h1 class="display-5 fw-bold mb-3">{{ $promo->name ?? 'Promo Spesial' }}</h1>
                            
                            @if($promo->description)
                                <p class="lead mb-4">{{ $promo->description }}</p>
                            @endif

                            <div class="d-flex flex-wrap gap-2 mb-4">
                                @if($promo->vendor)
                                    <span class="badge-cta">{{ $promo->vendor }}</span>
                                @endif
                                @if($promo->label)
                                    <span class="badge-cta">{{ $promo->label }}</span>
                                @endif
                            </div>

                            @if($promo->terms)
                                <div class="mb-4">
                                    <h6 class="fw-semibold">Syarat & Ketentuan:</h6>
                                    <ul class="small mb-0">
                                        @foreach(explode("\n", $promo->terms) as $term)
                                            @if(trim($term))
                                                <li>{{ trim($term) }}</li>
                                            @else
                                                <li>-</li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="info-box">
                                        <h6 class="fw-semibold">Informasi Detail</h6>
                                        <p class="small mb-0">
                                            <strong>Vendor:</strong> {{ $promo->vendor ?? '-' }}<br>
                                            <strong>Label:</strong> {{ $promo->label ?? '-' }}<br>
                                            <strong>Periode:</strong> {{ \Carbon\Carbon::parse($promo->periode)->format('d M Y') ?? '-' }}<br>
                                            <strong>Diskon:</strong> {{ $promo->discount ?? '-' }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4 d-flex flex-wrap gap-3">
                                @php
                                    $waNumber = '6281234567890';
                                    $waText = urlencode("Halo, saya tertarik promo: {$promo->name} (ID: {$promo->id}). Mohon info lebih lanjut.");
                                @endphp

                                <a href="https://wa.me/{{ $waNumber }}?text={{ $waText }}" target="_blank"
                                    class="btn btn-success btn-lg d-inline-flex align-items-center">
                                    <img src="{{ asset('images/cart.png') }}" alt="Cart"
                                        style="width: 20px; height: 20px; margin-right: 8px;">
                                    Pesan Sekarang
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('floating-wa')
    {{-- Floating WA button --}}
    <a href="https://wa.me/6281234567890" target="_blank" class="floating-wa" title="Chat WhatsApp">
        <img src="{{ asset('images/buttonwa.png') }}" alt="WhatsApp">
    </a>
@endsection
