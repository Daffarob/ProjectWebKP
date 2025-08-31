<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Samafitro')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/alpinejs" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
     @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <style>
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
    
    @yield('additional-styles')
</head>
<body class="bg-gradient-to-b from-gray-900 via-gray-800 to-gray-900 text-white font-sans">
    @include('includes.header-loggedin')
    
    <main>
        @yield('content')
    </main>
    
    @yield('floating-wa')
    
    @include('includes.footer-loggedin')
    
    @yield('additional-scripts')
</body>
</html>
