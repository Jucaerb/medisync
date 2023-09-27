@extends('layouts.app')

@section('content')

    <div class="d-flex p-4">
        <div class="container">
            <p class="card-title text-aling-left text-body-title pb-3">Mira tus pacientes activos</p>
            <div class="card mb-3">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('doctor.registerpatient') }}" class="button-add a ">+ Añadir paciente</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-md">
                            <thead>
                            <tr>
                                <th scope="col" class="text-body">Nombre completo</th>
                                <th scope="col" class="text-body">Fecha de ingreso</th>
                                <th scope="col" class="text-body">Sexo</th>
                                <th scope="col" class="text-body">Fecha de nacimiento</th>
                                <th scope="col" class="text-body">Identificación</th>
                                <th scope="col" class="text-body">Habitación</th>
                                <th scope="col" class="text-body">Historia clinica</th>
                                <th scope="col" style="max-width: 120px;"></th>
                                <th scope="col" style="max-width: 120px;"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($patient as $patient)
                                <tr>
                                    <td class="text-body-table"> <strong>{{$patient->name}}</strong></td>
                                    <td class="text-body-table">{{$patient->in_date}}</td>
                                    <td class="text-body-table">{{__('passwords.'.$patient->sex)}}</td>
                                    <td class="text-body-table">{{$patient->birth_date}}</td>
                                    <td class="text-body-table">{{$patient->identification}}</td>
                                    <td class="text-body-table">{{$patient->room}}</td>
                                    <td>
                                    <td>
                                        <a href="{{route('doctor.editpatient', ['id' => $patient->id])}}">
                                            <i class="bi bi-pencil-square" style="font-size: 1.4rem;"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{route('doctor.deleted', [$patient->id])}}">
                                            <i class="bi bi-trash" style="font-size: 1.4rem;"></i>
                                        </a>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <a href="{{route('doctor.home')}}" class="button-regresar a">Regresar</a>
        </div>
    </div>

@endsection
