<?php 

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name'               => 'required|string|max:255',
            'email'              => 'required|email|unique:users,email',
            'phone'              => 'nullable|string|max:20',
            'address'            => 'nullable|string|max:255',
            'password'           => 'required|string|min:6|confirmed',
            'ktp_number'         => 'required|string|max:30',
            'ktp_photo'          => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'company_name'       => 'nullable|string|max:255',
            'npwp'               => 'nullable|string|max:50',
            'security_question'  => 'required|string|max:255',
            'security_answer'    => 'required|string|max:255',
        ]);

        // Simpan file KTP
        $ktpPhotoPath = null;
        if ($request->hasFile('ktp_photo')) {
            $ktpPhotoPath = $request->file('ktp_photo')->store('ktp_photos', 'public');
        }

        // Buat user baru
        $user = User::create([
            'name'              => $validated['name'],
            'email'             => $validated['email'],
            'phone'             => $validated['phone'],
            'address'           => $validated['address'],
            'password'          => Hash::make($validated['password']),
            'ktp_number'        => $validated['ktp_number'],
            'ktp_photo'         => $ktpPhotoPath,
            'company_name'      => $validated['company_name'],
            'npwp'              => $validated['npwp'],
            'security_question' => $validated['security_question'],
            'security_answer'   => $validated['security_answer'],
        ]);

        Auth::login($user);

        return redirect()->route('dashboard')->with('success', 'Registrasi berhasil!');
    }
}
