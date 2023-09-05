<nav class="navbar navbar-expand-md navbar-light bg-white">
    <div class="container">
        <div class="d-flex justify-content-start">
            <div>
                <img width="48" height="48" src="{{ asset('images/logo.png')}}">
            </div>
            <div class="ms-4">
                <a class="headline-1" href="{{ url('/') }}">
                    MediSync
                </a>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <img  width="300" height="50" src="{{ asset('images/funcasat.jpg')}}">
        </div>

    </div>
</nav>

<!-- navbar 2 -->
<!-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm mt-2">
    <div class="container">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <!-- <ul class="navbar-nav me-auto"> -->
                <!-- boton desplegable paciente -->
                <!-- <div class="dropdown-center">
                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Registro de pacientes
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">xxxx</a></li>

                    </ul>
                </div> -->

                <!-- boton consulta pacientes -->
                <!-- <div class="dropdown-center">
                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Consulta pacientes
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">xxx</a></li>
                    </ul>
                </div> -->

                <!-- boton kardex -->
                <!-- <div class="dropdown-center">
                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Kardex de medicamentos
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">xxx</a></li>
                    </ul>
                </div> -->

                <!-- boton control diario -->
                <!-- <div class="dropdown-center">
                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Control diario
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">xxx</a></li>
                    </ul>
                </div> -->

                <!-- boton empleador -->
                <!-- <div class="dropdown-center">
                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Control de empleados
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('admin.register')}}">Registro</a></li>
                        <li><a class="dropdown-item" href="{{route('admin.users')}}">Lista de empleados</a></li>
                    </ul>
                </div>
            </ul> -->
            <!-- Right Side Of Navbar -->
            <!-- <ul class="navbar-nav ms-auto"> -->
                <!-- Authentication Links -->
                <!-- @guest
                    @if (Route::has('login'))
                        <button type="button" class="button-login" data-bs-toggle="modal" data-bs-target="#login-modal">
                            Inicia Sesión
                            <i class="bi bi-person-circle"></i>
                        </button>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->full_name }}
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
</div>  -->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Menu</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Registro de pacientes
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Consulta de pacientes
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
          </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Kardex de medicamentos
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
          </li>

          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Control diario
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
          </li>

          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Control de empleados
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
          </li>

        </li>
      </ul>
      <button type="button" class="button-login" data-bs-toggle="modal" data-bs-target="#login-modal">
                            Inicia Sesión
                            <i class="bi bi-person-circle"></i>
     </button>
    </div>
  </div>
</nav>
