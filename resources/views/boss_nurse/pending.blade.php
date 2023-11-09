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
                            <div class="card" style="height: 100%; display: flex; flex-direction: column;">
                                <!-- Encabezado de la tarjeta -->
                                <div class="card-header border-0"
                                     style="display: flex; justify-content: space-between;">
                                    <div style="width: 100%;">
                                        <p class="text-body-table"><strong>{{ $patient->name }}</strong></p>
                                        <p class="text-body-table"
                                           id="num_identification">{{ $patient->identification }}</p>
                                        <table>
                                            <thead>
                                            <tr>
                                                <th scope="col" class="text-body padding-card">Actividad</th>
                                                <th scope="col" class="text-body">Hora</th>
                                            </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                                <!-- Cuerpo de la tarjeta -->
                                <div class="card-content" style="overflow: auto;">
                                    <div class="card-body">
                                        <div class="table-responsive" style="max-height: 180px;">
                                            <table class="table table-md">
                                                <tbody>
                                                @php $shownAttention = 0 @endphp
                                                @foreach($attention as $jsonData)
                                                    @include('boss_nurse.attentionModal')
                                                    @if($jsonData->user_id == $patient->id && count($attention) > 0)
                                                        @if($shownAttention < 3)
                                                            <div class="card-item">
                                                                <div class="activity-info">
                                                                    <p class="text-body-table">{{ $jsonData->activity_name }}</p>
                                                                    <p class="text-body-table">{{ \Carbon\Carbon::createFromFormat('H',$jsonData->hour)->format('H:i') }}</p>
                                                                    <button type="button" data-bs-toggle="modal"
                                                                            data-bs-target="#attentionModal{{$jsonData->id}}"
                                                                            style="border: none; background: none">
                                                                        <i class="bi bi-eye-fill"
                                                                           style="font-size: 1rem; "></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            @php $shownAttention++; @endphp
                                                        @else
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
                                                @if ($shownAttention == 0)
                                                    <p class="text-body-table">No hay actividades.</p>
                                                @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Pie de la tarjeta -->
                                <div class="card-footer border-0 d-flex justify-content-between"
                                     style="margin-top: auto;">
                                    <a class="button-card a"
                                       href="{{route('pendingList', ['filter' => $patient->id])}}">Ver todas</a>
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
