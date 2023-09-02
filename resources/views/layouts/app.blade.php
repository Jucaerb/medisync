<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        @include('loginModal')
    </head>
    <div id="app" class="mt-4">
        @include('layouts.navbar')
        <main class="py-4">
            @yield('content')
        </main>
    </div>
@include('layouts.footer')
</html>
