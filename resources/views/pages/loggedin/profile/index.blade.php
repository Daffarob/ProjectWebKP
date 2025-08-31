<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom right, #0f2027, #203a43, #2c5364);
            color: #fff;
            font-family: 'Segoe UI', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .profile-container {
            padding: 20px;
            width: 100%;
            max-width: 500px;
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
        .floating-wa { 
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 999;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .floating-wa img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }
        .floating-wa:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 14px rgba(0, 255, 0, 0.5);
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <div class="profile-card">
            @if($profile->photo)
                <img src="{{ asset('images/' . $profile->photo) }}" alt="Foto Profil">
            @else
                <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="Default Foto">
            @endif

            <!-- Nama Lengkap -->
            <p class="mt-2 mb-1"><strong>Nama Lengkap:</strong></p>
            <h2>{{ $profile->name }}</h2>

            <!-- Info lainnya -->
            <p><strong>Email:</strong> {{ $profile->email }}</p>
            <p><strong>Telepon:</strong> {{ $profile->phone ?: '-' }}</p>
            <p><strong>Alamat:</strong> {{ $profile->address ?: '-' }}</p>

            <!-- Tombol -->
            <a href="{{ route('User.profile.edit') }}" class="btn-edit">Edit Profil</a>
            <a href="{{ route('dashboard') }}" class="btn-back">Kembali</a>
        </div>
    </div>
</body>
</html>