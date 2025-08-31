@extends('layouts.loggedin')

@section('title', 'Edit Profil')

@section('additional-styles')
<style>
    .edit-card {
        background: rgba(255, 255, 255, 0.06);
        backdrop-filter: blur(15px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 20px;
        padding: 35px;
        max-width: 900px;
        width: 100%;
        margin: 0 auto;
        box-shadow: 0 0 25px rgba(0, 255, 255, 0.1);
    }

    .edit-card h2 {
        font-weight: 600;
        color: #d9e9ff;
    }

    .profile-pic {
        width: 120px;
        height: 120px;
        object-fit: cover;
        border-radius: 50%;
        border: 3px solid #00bfff;
        box-shadow: 0 0 15px rgba(0, 191, 255, 0.4);
    }

    .btn-upload {
        margin-top: 10px;
    }

    .btn-save {
        background: linear-gradient(to right, #00bcd4, #2196f3);
        border: none;
        color: white;
        border-radius: 12px;
        padding: 12px 25px;
        font-size: 16px;
        transition: all 0.3s ease;
    }

    .btn-save:hover {
        background: linear-gradient(to right, #2196f3, #00bcd4);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 191, 255, 0.3);
    }

    .btn-back {
        margin-top: 15px;
        background-color: transparent;
        color: #ccc;
        border: 1px solid #777;
        padding: 10px 20px;
        border-radius: 10px;
        transition: all 0.3s ease;
        font-size: 14px;
        text-decoration: none;
    }

    .btn-back:hover {
        background-color: #333;
        color: #fff;
        border-color: #555;
    }

    .form-control {
        background: rgba(255, 255, 255, 0.08);
        border: 1px solid rgba(255, 255, 255, 0.15);
        color: #ffffff;
    }

    .form-control::placeholder {
        color: rgba(255, 255, 255, 0.6);
    }

    .form-control:focus {
        background: rgba(255, 255, 255, 0.1);
        color: #fff;
        border-color: #00bfff;
        box-shadow: 0 0 0 0.2rem rgba(0, 191, 255, 0.25);
    }

    .alert {
        background-color: rgba(40, 167, 69, 0.2);
        border-color: #28a745;
        color: #c2f0c2;
    }
</style>
@endsection

@section('content')
    <div class="edit-card">
        <h2 class="text-center mb-4">Edit Profil</h2>

        @if(session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        <form action="{{ route('User.profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="text-center mb-4">
                @if($user->photo)
                    <img id="profile-preview" src="{{ asset('images/' . $user->photo) }}" class="profile-pic mb-2">
                @else
                    <img id="profile-preview" src="https://cdn-icons-png.flaticon.com/512/149/149071.png" class="profile-pic mb-2">
                @endif
                <div>
                    <label class="btn btn-outline-info btn-sm btn-upload">
                        Ganti Foto <input type="file" name="photo" id="photo-input" hidden>
                    </label>
                </div>
            </div>

            <div class="row g-3">
                <div class="col-md-6">
                    <input type="text" name="name" class="form-control" placeholder="Nama Lengkap" value="{{ old('name', $user->name) }}">
                </div>
                <div class="col-md-6">
                    <input type="text" name="phone" class="form-control" placeholder="Nomor Telepon" value="{{ old('phone', $user->phone) }}">
                </div>
                <div class="col-md-6">
                    <input type="email" name="email" class="form-control" placeholder="Alamat Email" value="{{ old('email', $user->email) }}">
                </div>
                <div class="col-md-6">
                    <input type="text" name="address" class="form-control" placeholder="Alamat" value="{{ old('address', $user->address) }}">
                </div>
                <div class="col-md-4">
                    <input type="password" name="current_password" class="form-control" placeholder="Kata Sandi Lama">
                </div>
                <div class="col-md-4">
                    <input type="password" name="new_password" class="form-control" placeholder="Kata Sandi Baru">
                </div>
                <div class="col-md-4">
                    <input type="password" name="new_password_confirmation" class="form-control" placeholder="Konfirmasi Kata Sandi">
                </div>
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-save">Simpan Perubahan</button>
                <a href="{{ route('User.profile.index') }}" class="btn-back d-inline-block mt-3">← Kembali ke Dashboard</a>
            </div>
        </form>
    </div>
@endsection

@section('additional-scripts')
<script>
    document.getElementById('photo-input').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('profile-preview').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection