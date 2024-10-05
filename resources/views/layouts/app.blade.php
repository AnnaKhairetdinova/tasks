<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tasks - @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="csrf-param" content="_token" />
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<nav class="navbar navbar-expand-lg">
<div class="container-fluid">
    <?php
    if (Auth::check()) { ?>
        <ul class="nav">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Главная</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('tasks.index') }}">Задачи</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('statuses.index') }}">Статусы</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('tags.index') }}">Метки</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('users.index') }}">Пользователи</a>
        </li>
    </ul>
    <?php
    } ?>

    <span class="navbar-text">
        @guest
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
            </ul>
        @endguest

        @auth
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <a class="nav-link" href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>
        @endauth
    </span>
</div>
</nav>
<div class="vw-75 p-4 translate-absolute mx-auto">
    <h1>@yield('header')</h1>
    @yield('content')
</div>
</body>
</html>
