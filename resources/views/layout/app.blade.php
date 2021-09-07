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
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/fav/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/fav/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/fav/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('images/fav/site.webmanifest') }}">
</head>

<body class="bg-gray-300">
    <main>
        <nav class="p-5 px-28 bg-gray-800 text-white flex justify-between mb-4">
            <ul class="flex mx-9 item-center">
                <li><a href="{{ route('home') }}" class="p-3">Home</a></li>
                <li><a href="{{ route('dashboard') }}" class="p-3">Dashboard</a></li>
                <li><a href="{{ route('posts') }}" class="p-3">Post</a></li>
                <li><a href="http://" class="p-3"></a></li>
            </ul>
            <ul class="flex mx-9 item-center">
                @auth
                    <li><a href="{{ route('profile') }}" class="p-3">{{ auth()->user()->fname }}</a></li>
                    <form action="{{ route('logout') }}" method="post" class="inline">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                @endauth
                @guest
                    <li><a href="{{ route('login') }}" class="p-3">Login</a></li>
                    <li><a href="{{ route('register') }}" class="p-3">Register</a></li>
                @endguest
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
