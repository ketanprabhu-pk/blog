<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel Blog</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- CSS only -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-gray-300">
    <main>
        <nav class="p-5 px-28 bg-gray-800 text-white flex justify-between mb-4">
            <ul class="flex mx-9 item-center">
                <li><a href="{{ route('home') }}" class="p-3">Home</a></li>
                <li><a href="http://" class="p-3">Dashboard</a></li>
                <li><a href="http://" class="p-3">Post</a></li>
                <li><a href="http://" class="p-3"></a></li>
            </ul>
            <ul class="flex mx-9 item-center">
                <li><a href="{{ route('profile') }}" class="p-3">Ketan Prabhu</a></li>
                <li><a href="{{ route('login') }}" class="p-3">Login</a></li>
                <li><a href="{{ route('register') }}" class="p-3">Register</a></li>
                <li><a href="{{ route('logout') }}" class="p-3">Logout</a></li>
            </ul>
        </nav>
        <div class="container">
            @yield('content')
        </div>
    </main>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
    </script>
</body>

</html>
