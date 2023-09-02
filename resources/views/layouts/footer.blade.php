<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @include('loginModal')
    <div id="app" class="mt-4">
        @include('layouts.navbar')
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</head>

<!-- cuerpo -->

<!-- FOOTER -->
<div class="wrapper">
    <footer class="section footer-classic context-dark bg-image">
        <div class="container">
            <div class="row row-30">
                <div class="col-md-4 col-xl-5">
                    <div class="pr-xl-4"><br class="brand" href="index.html">
                        <!-- Foto del logo de nosotros -->
                        <img width="48" height="48" src="/images/logo.png"><br>
                        <p class="headline-1">MediSync</p>
                        <p class="only-text-regular">Aplicacion web de monitoreo de pacientes y administración de medicamentos</p>
                        <!-- Rights-->
                        <p class="rights only-text-regular"><span>©  </span><span class="copyright-year"> 2023, </span><span> </span><span>Waves</span><span>. </span><span>All Rights Reserved</span></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <h5 class="headline-1 text-regular-size">Nuestros portales</h5>
                    <dl class="contact-list">
                        <dd class="only-text-regular">Médico principal</dd>
                    </dl>
                    <dl class="contact-list">
                        <dd class="only-text-regular">Administrador del sistema</dd>
                    </dl>
                    <dl class="contact-list">
                        <dd class="only-text-regular">Operativo</dd>
                    </dl>
                    <dl class="contact-list">
                        <dd class="only-text-regular">Inventario</dd>
                    </dl>
                </div>
                <div class="col-md-4 col-xl-3">
                    <h5 class="headline-1 text-regular-size">Soporte</h5>
                    <ul class="nav-list">
                        <li class="only-text-regular">Manual de uso</li>
                        <li class="only-text-regular">Whatsapp</li>
                        <li class="only-text-regular">Blog</li>
                        <li class="only-text-regular">Contacts</li>
                        <li class="only-text-regular">Información de contácto</li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</div>

</html>
