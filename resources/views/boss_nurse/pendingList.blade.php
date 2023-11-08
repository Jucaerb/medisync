@extends('layouts.app')

@section('content')
    <div class="d-flex p-4">
        <div class="container">
            <p class="card-title text-aling-left text-body-title pb-3">Atenciones pendientes</p>
            <div class="card mb-3">
                <div class="card-header">
                    <form action="{{ route('pendingList') }}" method="get">
                        <div class="d-flex flex-row align-items-start">
                            <input type="text" class="form-control busqueda" name="texto" value="{{ $texto }}">
                            <input type="submit" class="btn btn-primary mx-2 button-buscar" value="Buscar">
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-md">
                            <thead>
                            <tr>
                                <th scope="col" class="text-body">Actividad</th>
                                <th scope="col" class="text-body">Medicamento</th>
                                <th scope="col" class="text-body">Hora</th>
                                <th scope="col" class="text-body">Permisos</th>
                                <th scope="col" class="text-body">Habitación</th>
                                <th scope="col" class="text-body">Fecha</th>
                                <th scope="col" style="max-width: 120px;"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($attention as $atten)
                                @foreach ($activities[$atten->patient_id] ?? [] as $jsonData)
                                    @if (is_object($jsonData) && property_exists($jsonData, 'medicine_id'))
                                        <tr>
                                            <td class="text-body-table">
                                                <strong>{{ $atten->activity_name }}</strong>
                                            </td>
                                            <td class="text-body-table">{{ $jsonData->medicine_id }}</td>
                                            <td class="text-body-table">{{ $atten->hour }}</td>
                                            <td class="text-body-table">{{ $jsonData->min_permissions }}</td>
                                            <td class="text-body-table">{{ $atten->patient->room }}</td>
                                            <td class="text-body-table">{{ $atten->date_for }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            @empty
                                <tr>
                                    <td colspan="7">No hay resultados</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                {{ $attention->links('vendor.pagination.simple-bootstrap-5') }}
            </div>
            <a href="{{ route('pending') }}" class="button-regresar a">Regresar</a>
        </div>
    </div>
@endsection
