@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h1 class="text-2xl font-bold mb-4">Welcome to Dashboard!</h1>
                <p class="mb-4">You are successfully logged in as: <strong>{{ Auth::user()->name }}</strong></p>
                <p class="mb-4">Email: <strong>{{ Auth::user()->email }}</strong></p>
                <p class="mb-4">Phone: <strong>{{ Auth::user()->phone }}</strong></p>
                
                <div class="mt-6">
                    <h2 class="text-lg font-semibold mb-2">Quick Actions:</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <a href="{{ route('User.profile.index') }}" class="block p-4 bg-blue-100 dark:bg-blue-900 rounded-lg hover:bg-blue-200 dark:hover:bg-blue-800 transition-colors">
                            <h3 class="font-semibold text-blue-800 dark:text-blue-200">View Profile</h3>
                            <p class="text-blue-600 dark:text-blue-300 text-sm">Manage your account information</p>
                        </a>
                        <a href="{{ route('promo.index') }}" class="block p-4 bg-green-100 dark:bg-green-900 rounded-lg hover:bg-green-200 dark:hover:bg-green-800 transition-colors">
                            <h3 class="font-semibold text-green-800 dark:text-green-200">View Promos</h3>
                            <p class="text-green-600 dark:text-green-300 text-sm">Check out current promotions</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
