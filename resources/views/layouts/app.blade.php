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
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    MediSync
                </a>
                <!-- imagen  -->
                <div class="d-flex">
                    <img width="48" height="48" src="/images/logo.png">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="d-flex justify-content-end">
                    <img  width="60" height="50" src="/images/funcasat.jpg">
                </div>


                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                </div>
            </div>
        </nav>

        <!-- navbar 2 -->
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">


                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <!-- boton desplegable paciente -->
                    <div class="dropdown-center">
                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                     Registro de pacientes
                    </button>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">xxxx</a></li>

                    </ul>
                    </div>

                    <!-- boton consulta pacientes -->
                    <div class="dropdown-center">
                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                     Consulta pacientes
                    </button>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">xxx</a></li>
                    </ul>
                    </div>

                    <!-- boton kardex -->
                    <div class="dropdown-center">
                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                     Kardex de medicamentos
                    </button>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">xxx</a></li>
                    </ul>
                    </div>

                    <!-- boton control diario -->
                    <div class="dropdown-center">
                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                     Control diario
                    </button>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">xxx</a></li>
                    </ul>
                    </div>

                    <!-- boton empleador -->
                    <div class="dropdown-center">
                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                     Control de empleados
                    </button>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">xxx</a></li>
                    </ul>
                    </div>




                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <!-- icono user -->
                                <!-- boton login redireccionando -->
                                <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">
                                <button type="nav-link" href="{{ route('login') }}" class="button purple"><span>
                                    Inicia Sesión
                                <i class="bi bi-person-circle"></i>

                                </span>
                            </button>
                                </a>

                            </li>



                            @endif
                            @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div>
        </div>



        <main class="py-4">
            @yield('content')
        </main>
    </div>
</head>

<!-- cuerpo -->
<body>
<div class="d-flex justify-content-center align-items-center wrapper" >
<div class="card mb-10">
  <div class="row g-0 ">
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Mantén actualizado el estado de tus pacientes</h5>
        <p class="card-text">Con MediSync puedes mantener al dia todos los datos de tus pacientes, al igual que los medicamentos administrados y por administrar. Además de mantener al dia tus inventarios de medicamentos.
        </p>

      </div>
    </div>
    <div class="col-md-4">
    <img  width="400" height="450" src="/images/viejita.jpg">
    </div>
  </div>
</div>
</div>


</body>
<!-- FOOTER -->
<div class="wrapper">
<footer class="section footer-classic context-dark bg-image shadow-sm" style="background: #fff;">
        <div class="container">
          <div class="row row-30">
            <div class="col-md-4 col-xl-5">
              <div class="pr-xl-4"><br class="brand" href="index.html">
              <!-- Foto del logo de nosotros -->
              <img width="48" height="48" src="/images/logo.png"><br>
              <p>MediSync</p>
              <p>Aplicacion web de monitoreo de pacientes y administración de medicamentos</p>
                <!-- Rights-->
                <p class="rights"><span>©  </span><span class="copyright-year"> 2023, </span><span> </span><span>Waves</span><span>. </span><span>All Rights Reserved</span></p>
              </div>
            </div>
            <div class="col-md-4">
              <h5>Nuestros portales</h5>
              <dl class="contact-list">
                <dd>Médico principal</dd>
              </dl>
              <dl class="contact-list">
                <dd>Administrador del sistema</a></dd>
              </dl>
              <dl class="contact-list">
                <dd>Operativo</a></dd>
              </dl>
              <dl class="contact-list">
                <dd>Inventario</a></dd>
              </dl>

            </div>
            <div class="col-md-4 col-xl-3">
              <h5>Soporte</h5>
              <ul class="nav-list">
                <li>Manual de uso</a></li>
                <li>Whatsapp</a></li>
                <li>Blog</a></li>
                <li>Contacts</a></li>
                <li>Información de contácto</a></li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
      </div>


</html>
