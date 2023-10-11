@extends('layouts.app')

@section('content')

    <div class="d-flex p-4">
        <div class="container">
            <p class="card-title text-aling-left text-body-title2 pb-3">Mira las actividades de tus pacientes</p>
            <div class="card mb-3 border-0 ">
                {{-- Filtros --}}
                <div class="card-header border-0">
                    <form action="{{ route('dashboardpatient') }}" method="get">
                        <div class="d-flex flex-row align-items-start">
                            <input type="text" class="form-control busqueda" name="texto" value="{{ $texto }}">
                            <input type="submit" class="btn btn-primary mx-2 button-buscar" value="Buscar">
                            <a href="{{ route('createactivity') }}" class="button-card a">+ Añadir actividad</a>
                        </div>
                    </form>
                </div>
                <!-- Inicio de las tarjetas de pacientes -->
                <div class="row row-cols-1 row-cols-md-4 g-4">
                    @foreach($patients as $patient)
                        <div class="col">
                            <div class="card h-100">
                                <!-- Encabezado de la tarjeta -->
                                <div class="card-header border-0"
                                     style="display: flex; justify-content: space-between;">
                                    <div>
                                        <p class="text-body-table"><strong>{{ $patient->name }}</strong></p>
                                        <p class="text-body-table"
                                           id="num_identification">{{ $patient->identification }}</p>
                                    </div>
                                    <i class="bi bi-person-square" style="font-size: 3.4rem;"></i>
                                </div>
                                <!-- Cuerpo de la tarjeta -->
                                <div class="card-body">
                                    <ul>
                                        <li class="text-body-table">{{$patient->name_activity}}</li>
                                    </ul>
                                </div>
                                <!-- Pie de la tarjeta -->
                                <div class="card-footer border-0 d-flex justify-content-between align-items-center"
                                     style="padding-left: 10px; padding-right: 10px;">
                                    <a class="button-card a">Ver todas</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{--                {{$dashboardPatient->links('vendor.pagination.simple-bootstrap-5')}}--}}
                <!-- Fin de las tarjetas de pacientes -->
            </div>
        </div>
    </div>

@endsection
