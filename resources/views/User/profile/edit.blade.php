<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #1a1a1d, #0d0d0d);
            font-family: 'Segoe UI', sans-serif;
            color: #ffffff;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px 15px;
        }

        .edit-card {
            background: rgba(255, 255, 255, 0.06);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 35px;
            max-width: 900px;
            width: 100%;
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
</head>
<body>
    <div class="edit-card">
        <h2 class="text-center mb-4">Edit Profil</h2>

        @if(session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        <form action="{{ route('User.profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="text-center mb-4">
                @if($profile->photo)
                    <img src="{{ asset('images/' . $profile->photo) }}" class="profile-pic mb-2">
                @else
                    <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" class="profile-pic mb-2">
                @endif
                <div>
                    <label class="btn btn-outline-info btn-sm btn-upload">
                        Ganti Foto <input type="file" name="photo" hidden>
                    </label>
                </div>
            </div>

            <div class="row g-3">
                <div class="col-md-6">
                    <input type="text" name="name" class="form-control" placeholder="Nama Lengkap" value="{{ old('name', $profile->name) }}">
                </div>
                <div class="col-md-6">
                    <input type="text" name="phone" class="form-control" placeholder="Nomor Telepon" value="{{ old('phone', $profile->phone) }}">
                </div>
                <div class="col-md-6">
                    <input type="email" name="email" class="form-control" placeholder="Alamat Email" value="{{ old('email', $profile->email) }}">
                </div>
                <div class="col-md-6">
                    <input type="text" name="address" class="form-control" placeholder="Alamat" value="{{ old('address', $profile->address) }}">
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
</body>
</html>