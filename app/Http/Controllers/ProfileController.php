<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // Tampilkan halaman profil (optional, bisa sebagai ringkasan profil)
    public function index()
    {
        $profile = Profile::first();

        // Cek apakah data profil ada
        if (!$profile) {
            return redirect()->route('profile.edit')->with('warning', 'Silakan lengkapi profil Anda terlebih dahulu.');
        }

        return view('User.profile.index', compact('profile'));
    }

    // Tampilkan form edit profil
    public function edit()
{
    $profile = Profile::first();

    if (!$profile) {
        $profile = Profile::create([
            'name' => '',
            'email' => '',
            'phone' => '',
            'address' => '',
            'photo' => '',
            'password' => bcrypt('defaultpassword'), // ← Tambahkan ini
        ]);
    }

    return view('User.profile.edit', compact('profile'));
}

    // Simpan hasil update profil
    public function update(Request $request)
    {
        $profile = Profile::first();

        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Ambil semua data kecuali photo
        $data = $request->except('photo');

        // Proses upload foto jika ada
        if ($request->hasFile('photo')) {
            $fileName = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('images'), $fileName);
            $data['photo'] = $fileName;
        }

        // Simpan update data
        $profile->update($data);

        return redirect()->route('User.profile.edit')->with('success', 'Profil berhasil diperbarui!');
    }
}
