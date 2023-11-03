@extends('layouts.app')

@section('content')

    <div class="d-flex p-4">
        <div class="container">
            <p class="card-title text-aling-left text-body-title2 pb-3">Mira las actividades pendientes de hoy de tus
                pacientes</p>
            <div class="card mb-3 border-0 ">
                {{-- Filtros --}}
                <div class="card-header border-0">
                    <form action="{{ route('pending') }}" method="get">
                        <div class="d-flex flex-row align-items-start">
                            <input type="text" class="form-control busqueda" name="texto" value="{{ $texto }}">
                            <input type="submit" class="btn btn-primary mx-2 button-buscar" value="Buscar">
                        </div>
                    </form>
                </div>
                <!-- Inicio de las tarjetas de pacientes -->
                <div class="row row-cols-1 row-cols-md-4 g-4">
                    @foreach($patients as $patient)
                        <div class="col">
                            <div class="card" style="height: auto;">
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
                                <div class="card-content" style="max-height: 400px; overflow: auto;">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-md">
                                                <thead>
                                                <tr>
                                                    <th scope="col" class="text-body">Actividad</th>
                                                    <th scope="col" class="text-body">Hora</th>
                                                    <th scope="col" style="max-width: 120px;"></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($attention as $key => $value)
                                                    @if($key == $patient->id)
                                                        @foreach($value as $jsonData)
{{--                                                            @if()--}}

{{--                                                            @endif--}}
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Pie de la tarjeta -->
                                <div class="card-footer border-0 d-flex justify-content-between align-items-center"
                                     style="padding-left: 10px; padding-right: 10px;">
                                    <a class="button-card a" href="{{route('activities', ['filter' => $patient->id])}}">Ver
                                        todas</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Fin de las tarjetas de pacientes -->
            </div>
            {{$patients->links('vendor.pagination.simple-bootstrap-5')}}
        </div>
    </div>

@endsection
