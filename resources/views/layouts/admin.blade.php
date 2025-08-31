<!DOCTYPE html>
<html>
<head>
    @include('includes.head')
</head>
<body class="bg-gradient-to-b from-gray-900 via-gray-800 to-gray-900 text-white font-sans min-h-screen">
<header>
    @include('includes.header-admin')
</header>
<main>
    @yield('content')
</main>
<footer>
    @include('includes.footer-loggedin') 
</footer>
</body>
</html>