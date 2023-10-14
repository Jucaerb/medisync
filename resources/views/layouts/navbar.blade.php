<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="m-0 w-100">
        <div class="row">
            <div class="col-sm text-start">
                <div class="col text-start text-body-medium">MediSync</div>
            </div>
            <div class="col-sm">
                <div class="text-end">
                    <img width="300" height="50" src="{{ asset('images/funcasat.jpg')}}">
                </div>
            </div>
        </div>
    </div>

</nav>
<nav class="navbar navbar-expand-lg bg-body-tertiary bg-5 navbar-transparent">
    <div class="container-fluid navbar-transparent p-0">
        <a class="navbar-brand" href="{{route('home')}}"><img width="48" height="48" src="{{ asset('images/logo.png')}}"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @if(Auth::check())
                    @switch(Auth::user()->role)
                        @case('DOCTOR')
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                   aria-expanded="false">
                                    Registro de pacientes
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{route('registerpatient')}}">Nuevo paciente</a></li>
                                    <li><a class="dropdown-item" href="{{route('patient')}}">Visualización de pacientes</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="{{route('createactivity')}}">Creación de actividades</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                   aria-expanded="false">
                                    Consulta de pacientes
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Dashboard</a></li>
                                    <li><a class="dropdown-item" href="#">Pendientes</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Terminados</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                   aria-expanded="false">
                                    Control diario
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Lector de QR</a></li>
                                    <li><a class="dropdown-item" href="#">Registro de atención</a></li>
                                    <li><a class="dropdown-item" href="{{route('activities')}}">Visualización de actividades</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                </ul>
                            </li>
                            @break
                        @case('ADMIN')
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                   aria-expanded="false">
                                    Registro de pacientes
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{route('registerpatient')}}">Nuevo paciente</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="{{route('patient')}}">Visualización de pacientes</a></li>
                                    <li><a class="dropdown-item" href="{{route('createactivity')}}">Creación de actividades</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                   aria-expanded="false">
                                    Consulta de pacientes
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{route('dashboardpatient')}}">Dashboard</a></li>
                                    <li><a class="dropdown-item" href="#">Pendientes</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Terminados</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                   aria-expanded="false">
                                    Control diario
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Lector de QR</a></li>
                                    <li><a class="dropdown-item" href="#">Registro de atención</a></li>
                                    <li><a class="dropdown-item" href="{{route('activities')}}">Visualización de actividades</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                   aria-expanded="false">
                                    Control de empleados
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{route('admin.registeruser')}}">Registro</a>
                                    </li>
                                    <li><a class="dropdown-item" href="{{route('admin.users')}}">Lista de empleados</a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                </ul>
                            </li>
                            @break
                        @case('BOSS_NURSE')
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                   aria-expanded="false">
                                    Consulta de pacientes
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Dashboard</a></li>
                                    <li><a class="dropdown-item" href="#">Pendientes</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Terminados</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                   aria-expanded="false">
                                    Control diario
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Lector de QR</a></li>
                                    <li><a class="dropdown-item" href="#">Registro de atención</a></li>
                                    <li><a class="dropdown-item" href="{{route('activities')}}">Visualización de actividades</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                </ul>
                            </li>
                            @break
                        @case('NURSE')
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                   aria-expanded="false">
                                    Consulta de pacientes
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{route('dashboardpatient')}}">Dashboard</a></li>
                                    <li><a class="dropdown-item" href="#">Pendientes</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Terminados</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                   aria-expanded="false">
                                    Control diario
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Lector de QR</a></li>
                                    <li><a class="dropdown-item" href="#">Registro de atención</a></li>
                                    <li><a class="dropdown-item" href="{{route('activities')}}">Visualización de actividades</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                </ul>
                            </li>
                            @break
                        @case('CARER')
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                   aria-expanded="false">
                                    Consulta de paciente
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Dashboard</a></li>
                                    <li><a class="dropdown-item" href="#">Pendientes</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Terminados</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                   aria-expanded="false">
                                    Control diario
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Lector de QR</a></li>
                                    <li><a class="dropdown-item" href="#">Registro de atención</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                </ul>
                            </li>
                            @break
                        @case('INVENTORY')

                            @break
                    @endswitch
                @endif
            </ul>
            @guest
                @if (Route::has('login'))
                    <button type="button" class="button-login" data-bs-toggle="modal" data-bs-target="#login-modal">
                        Inicia Sesión&nbsp&nbsp
                        <i class="bi bi-box-arrow-in-left"></i>
                    </button>
                @endif
            @else
                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-body-medium" href="#" role="button"
                       data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->full_name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-end text-body-small" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item text" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            Cerrar sesión&nbsp&nbsp <i class="bi bi-box-arrow-right"></i>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
            @endguest
        </div>
    </div>
</nav>
