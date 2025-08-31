@extends('layouts.loggedin')

@section('title', 'Profil Saya')

@section('additional-styles')
<style>
    .profile-container {
        padding: 20px;
        width: 100%;
        max-width: 500px;
        margin: 0 auto;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 80vh;
    }

    .profile-card {
        background: rgba(255, 255, 255, 0.06);
        backdrop-filter: blur(15px);
        border-radius: 20px;
        padding: 30px;
        text-align: center;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        transition: transform 0.3s ease;
    }

    .profile-card:hover {
        transform: scale(1.015);
    }

    .profile-card img {
        width: 130px;
        height: 130px;
        object-fit: cover;
        border-radius: 50%;
        border: 4px solid #4cafef;
        margin-bottom: 20px;
        transition: transform 0.4s ease;
    }

    .profile-card img:hover {
        transform: scale(1.05);
    }

    .profile-card h2 {
        font-size: 26px;
        margin-bottom: 10px;
    }

    .profile-card p {
        font-size: 15px;
        margin: 6px 0;
    }

    .btn-edit, .btn-back {
        display: inline-block;
        background: linear-gradient(135deg, #4cafef, #007bff);
        color: white;
        border: none;
        border-radius: 10px;
        padding: 10px 25px;
        font-weight: 600;
        font-size: 14px;
        margin: 10px 5px 0;
        transition: background 0.3s ease;
        text-decoration: none;
    }

    .btn-edit:hover, .btn-back:hover {
        background: linear-gradient(135deg, #007bff, #0056b3);
    }

    .btn-logout {
        display: inline-block;
        background: linear-gradient(135deg, #dc3545, #c82333);
        color: white;
        border: none;
        border-radius: 10px;
        padding: 10px 25px;
        font-weight: 600;
        font-size: 14px;
        margin: 10px 5px 0;
        transition: background 0.3s ease;
        text-decoration: none;
        cursor: pointer;
    }

    .btn-logout:hover {
        background: linear-gradient(135deg, #c82333, #a71e2a);
    }

    @media (max-width: 576px) {
        .profile-card {
            padding: 25px 20px;
        }

        .profile-card h2 {
            font-size: 22px;
        }

        .profile-card img {
            width: 110px;
            height: 110px;
        }

        .btn-edit, .btn-back {
            font-size: 13px;
            padding: 9px 20px;
        }
    }
</style>
@endsection

@section('content')
    <div class="profile-container">
        <div class="profile-card items-center" style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
            @if($user->photo)
                <img src="{{ asset('images/' . $user->photo) }}" alt="Foto Profil">
            @else
                <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="Default Foto">
            @endif

            <!-- Nama Lengkap -->
            <p class="mt-2 mb-1"><strong>Nama Lengkap:</strong></p>
            <h2>{{ $user->name }}</h2>

            <!-- Info lainnya -->
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Telepon:</strong> {{ $user->phone ?: '-' }}</p>
            <p><strong>Alamat:</strong> {{ $user->address ?: '-' }}</p>

            <div>
                <!-- Tombol -->
                <a href="{{ route('User.profile.edit') }}" class="btn-edit">Edit Profil</a>
                <a href="{{ route('dashboard') }}" class="btn-back">Kembali</a>
                
                <!-- Logout Button -->
                <form action="{{ route('logout') }}" method="POST" class="mt-3">
                    @csrf
                    <button type="submit" class="btn-logout">Logout</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('floating-wa')
    {{-- Floating WhatsApp --}}
    <a href="https://wa.me/6281234567890" target="_blank" class="floating-wa">
        <img src="{{ asset('images/buttonwa.png') }}" alt="WhatsApp">
    </a>
@endsection