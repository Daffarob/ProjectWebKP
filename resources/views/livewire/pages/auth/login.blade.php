<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div class="w-full max-w-4xl mx-auto bg-white rounded-xl shadow-lg overflow-hidden">
    <!-- Flex container: stack on small screens, row on medium+ -->
    <div class="flex flex-col lg:flex-row">
        <!-- Left side: Login Form -->
        <div class="lg:w-1/2 p-8 md:p-12 bg-gradient-to-br from-gray-900 to-gray-700 relative">
            <a href="/" class="absolute top-6 left-6 text-white text-2xl">
                &#8592;
            </a>
            <div class="text-white mt-8">
                <h2 class="text-2xl md:text-3xl font-bold mb-3">Masuk Ke Akun Anda</h2>
                <p class="text-gray-300 mb-8">Silahkan masukkan email dan kata sandi yang sudah terdaftar</p>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-200 mb-2" for="email">Alamat Email</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}"
                            class="w-full px-4 py-2 rounded bg-gray-800 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required autofocus>
                        @error('email')
                        <span class="text-red-400 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-6 relative">
                        <label class="block text-gray-200 mb-2" for="password">Kata Sandi</label>
                        <input id="password" type="password" name="password"
                            class="w-full px-4 py-2 rounded bg-gray-800 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                        <span onclick="togglePassword()" class="absolute top-10 right-3 text-gray-300 cursor-pointer">
                            👁️
                        </span>
                    </div>
                    <div class="flex flex-col sm:flex-row items-center justify-between mb-6 gap-4">
                        <a href="{{ route('password.request') }}" class="text-gray-300 text-sm hover:underline">Lupa Password?</a>
                        <span class="text-gray-300 text-sm">atau <a href="/register" class="underline">Daftar</a></span>
                    </div>
                    <button type="submit"
                        class="w-full py-2 rounded bg-gray-600 hover:bg-gray-700 text-white font-semibold transition duration-200">
                        Masuk
                    </button>
                </form>
            </div>
        </div>

        <!-- Right side: Register Info (hidden on small screens, shown on medium+) -->
        <div class="hidden lg:block lg:w-1/2 p-8 md:p-12 bg-gradient-to-br from-gray-100 to-gray-300 relative">
            <img src="/logo.png" alt="Samafiltro Logo" class="absolute top-6 right-6 h-10">
            <h2 class="text-gray-700 text-2xl font-bold mb-4">Selamat Datang !</h2>
            <p class="text-gray-600 mb-8">Anda belum memiliki akun?</p>
            <a href="/register"
                class="inline-block py-2 px-6 rounded bg-gray-600 hover:bg-gray-700 text-white font-semibold transition duration-200">
                Daftar Disini
            </a>
        </div>
    </div>
</div>