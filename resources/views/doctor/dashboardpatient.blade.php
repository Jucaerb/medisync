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
                        </div>
                    </form>
                </div>
                <!-- Inicio de las tarjetas de pacientes -->
                <div class="row row-cols-1 row-cols-md-4 g-4" style="padding-top: 1rem;">
                    @foreach($patients as $patient)
                        <div class="col" style="display: flex; flex-direction: column;">
                            <div class="card h-100" style="height: 200px;">
                                <!-- Encabezado de la tarjeta -->
                                <div class="card-header border-0"
                                     style="display: flex; justify-content: space-between;">
                                    <div>
                                        <p class="text-body-table"><strong>{{ $patient->name }}</strong></p>
                                        <p class="text-body-table"
                                           id="num_identification">{{ $patient->identification }}</p>
                                    </div>
{{--                                    <i class="bi bi-person-square" style="font-size: 3.4rem;"></i>--}}
                                </div>
                                <!-- Cuerpo de la tarjeta -->
                                <div class="card-content" style="flex-grow: 1; max-height: 200px; overflow: auto;">
                                    @php $shownActivities = 0; @endphp
                                    @foreach($activities as $key => $value)
                                        @if ($key == $patient->id && count($value) > 0)
                                            @foreach ($value as $jsonData)
                                                @if ($shownActivities < 3)
                                                    <div class="card-body">
                                                        <ul>
                                                            <li class="text-body-table">
                                                                <i class="bi bi-check2 icon-negro">
                                                                    {{ $jsonData->name_activity }}
                                                                </i>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    @php $shownActivities++; @endphp
                                                @endif
                                            @endforeach
                                            @if (count($value) > $shownActivities)
                                                <div class="card-body">
                                                    <ul>
                                                        <li class="text-body-table">
                                                            <span>...</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            @endif
                                        @endif
                                    @endforeach
                                    @if ($shownActivities == 0)
                                        <p class="card-body">No hay actividades.</p>
                                    @endif
                                </div>
                                <!-- Pie de la tarjeta -->
                                <div class="card-footer border-0 d-flex justify-content-between align-items-center"
                                     style="padding-left: 10px; padding-right: 10px;">
                                    <a class="button-card a align-items-center"
                                       href="{{route('activities', ['filter' => $patient->id])}}">Ver
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
