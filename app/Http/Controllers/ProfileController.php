<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    // Tampilkan halaman profil
    public function index()
    {
        $user = Auth::user();
        
        if (!$user) {
            return redirect()->route('login');
        }

        return view('pages.loggedin.profile.index', compact('user'));
    }

    // Tampilkan form edit profil
    public function edit()
    {
        $user = Auth::user();
        
        if (!$user) {
            return redirect()->route('login');
        }

        return view('pages.loggedin.profile.edit', compact('user'));
    }

    // Simpan hasil update profil
    public function update(Request $request)
    {
        $user = Auth::user();
        
        if (!$user) {
            return redirect()->route('login');
        }

        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
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
        $user->update($data);

        return redirect()->route('User.profile.edit')->with('success', 'Profil berhasil diperbarui!');
    }
}
