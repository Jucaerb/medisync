@extends('layouts.app')

@section('content')

    <div class="d-flex p-4">
        <div class="container">
            <p class="card-title text-aling-left text-body-title pb-3">Actividades</p>
            <div class="card mb-3">
                <div class="card-header">
                    <form action="{{route('activities')}}" method="get">
                        <div class="d-flex flex-row align-items-start">
                            <input type="text" class="form-control busqueda" name="texto" value="{{$texto}}">
                            <input type="submit" class="btn btn-primary mx-2 button-buscar" value="Buscar">
                            <a href="{{ route('createactivity') }}" class="button-add a ">+ Añadir actividad</a>
                        </div>
                    </form>
                </div>
                @if(Auth::check())
                    @switch(Auth::user()->role)
                        @case('ADMIN')
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-md">
                                        <thead>
                                        <tr>
                                            <th scope="col" class="text-body">Nombre</th>
                                            <th scope="col" class="text-body">Permisos</th>
                                            <th scope="col" class="text-body">Temporalidad</th>
                                            <th scope="col" class="text-body">Horario</th>
                                            <th scope="col" class="text-body">Medicamentos</th>
                                            <th scope="col" class="text-body">Dosis</th>
                                            <th scope="col" class="text-body">vía</th>
                                            <th scope="col" class="text-body">Fecha de creacion</th>
                                            <th scope="col" class="text-body">Fecha de suspensión</th>
                                            <th scope="col" style="max-width: 120px;"></th>
                                            <th scope="col" style="max-width: 120px;"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(count($activities)<=0)
                                            <tr>
                                                <td>No hay resultado</td>
                                            </tr>
                                        @else
                                            @foreach($activities as $activity)
                                                @include('doctor.deleteActivityModal')
                                                {{--                                    <input type="hidden" id="activities_id" name="activities_id" value="{{$activity->id_patient}}">--}}
                                                <tr>
                                                    <td class="text-body-table">
                                                        <strong>{{$activity->name_activity}}</strong></td>
                                                    <td class="text-body-table">{{__('passwords.'.$activity->min_permissions)}}</td>
                                                    <td class="text-body-table">{{__('passwords.'.$activity->temporality)}}</td>
                                                    <td class="text-body-table">{{$activity->schedule}}</td>
                                                    <td class="text-body-table">{{$activity->medicine_id}}</td>
                                                    <td class="text-body-table">{{$activity->dose}}</td>
                                                    <td class="text-body-table">{{$activity->via}}</td>
                                                    <td class="text-body-table">{{$activity->create_date}}</td>
                                                    <td class="text-body-table">{{$activity->suspension_date}}</td>
                                                    <td>

                                                    </td>
                                                    <td>
                                                        <a>
                                                            <button type="button" data-bs-toggle="modal"
                                                                    data-
                                                                    data-bs-target="#deleteActivityModal{{$activity->id}}"
                                                                    style="border: none; background: none">
                                                                <i class="bi bi-trash" style="font-size: 1.4rem;"></i>
                                                            </button>

                                                        </a>
                                                    </td>
                                                    <td>

                                                        <a href="{{route('editactivity', ['id' => $activity->id])}}">
                                                            <i class="bi bi-pencil-square"
                                                               style="font-size: 1.4rem;"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            @break
                        @case('DOCTOR')
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-md">
                                        <thead>
                                        <tr>
                                            <th scope="col" class="text-body">Nombre</th>
                                            <th scope="col" class="text-body">Permisos</th>
                                            <th scope="col" class="text-body">Temporalidad</th>
                                            <th scope="col" class="text-body">Horario</th>
                                            <th scope="col" class="text-body">Medicamentos</th>
                                            <th scope="col" class="text-body">Dosis</th>
                                            <th scope="col" class="text-body">vía</th>
                                            <th scope="col" class="text-body">Fecha de creacion</th>
                                            <th scope="col" class="text-body">Fecha de suspensión</th>
                                            <th scope="col" style="max-width: 120px;"></th>
                                            <th scope="col" style="max-width: 120px;"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(count($activities)<=0)
                                            <tr>
                                                <td>No hay resultado</td>
                                            </tr>
                                        @else
                                            @foreach($activities as $activity)
                                                @include('doctor.deleteActivityModal')
                                                {{--                                    <input type="hidden" id="activities_id" name="activities_id" value="{{$activity->id_patient}}">--}}
                                                <tr>
                                                    <td class="text-body-table">
                                                        <strong>{{$activity->name_activity}}</strong></td>
                                                    <td class="text-body-table">{{__('passwords.'.$activity->min_permissions)}}</td>
                                                    <td class="text-body-table">{{__('passwords.'.$activity->temporality)}}</td>
                                                    <td class="text-body-table">{{$activity->schedule}}</td>
                                                    <td class="text-body-table">{{$activity->medicine_id}}</td>
                                                    <td class="text-body-table">{{$activity->dose}}</td>
                                                    <td class="text-body-table">{{$activity->via}}</td>
                                                    <td class="text-body-table">{{$activity->create_date}}</td>
                                                    <td class="text-body-table">{{$activity->suspension_date}}</td>
                                                    <td>

                                                    </td>
                                                    <td>
                                                        <a>
                                                            <button type="button" data-bs-toggle="modal"
                                                                    data-
                                                                    data-bs-target="#deleteActivityModal{{$activity->id}}"
                                                                    style="border: none; background: none">
                                                                <i class="bi bi-trash" style="font-size: 1.4rem;"></i>
                                                            </button>

                                                        </a>
                                                    </td>
                                                    <td>

                                                        <a href="{{route('editactivity', ['id' => $activity->id])}}">
                                                            <i class="bi bi-pencil-square"
                                                               style="font-size: 1.4rem;"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            @break
                        @case('BOSS_NURSE')
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-md">
                                        <thead>
                                        <tr>
                                            <th scope="col" class="text-body">Nombre</th>
                                            <th scope="col" class="text-body">Permisos</th>
                                            <th scope="col" class="text-body">Temporalidad</th>
                                            <th scope="col" class="text-body">Horario</th>
                                            <th scope="col" class="text-body">Medicamentos</th>
                                            <th scope="col" class="text-body">Dosis</th>
                                            <th scope="col" class="text-body">vía</th>
                                            <th scope="col" class="text-body">Fecha de creacion</th>
                                            <th scope="col" class="text-body">Fecha de suspensión</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(count($activities)<=0)
                                            <tr>
                                                <td>No hay resultado</td>
                                            </tr>
                                        @else
                                            @foreach($activities as $activity)
                                                @include('doctor.deleteActivityModal')
                                                {{--                                    <input type="hidden" id="activities_id" name="activities_id" value="{{$activity->id_patient}}">--}}
                                                <tr>
                                                    <td class="text-body-table">
                                                        <strong>{{$activity->name_activity}}</strong></td>
                                                    <td class="text-body-table">{{__('passwords.'.$activity->min_permissions)}}</td>
                                                    <td class="text-body-table">{{__('passwords.'.$activity->temporality)}}</td>
                                                    <td class="text-body-table">{{$activity->schedule}}</td>
                                                    <td class="text-body-table">{{$activity->medicine_id}}</td>
                                                    <td class="text-body-table">{{$activity->dose}}</td>
                                                    <td class="text-body-table">{{$activity->via}}</td>
                                                    <td class="text-body-table">{{$activity->create_date}}</td>
                                                    <td class="text-body-table">{{$activity->suspension_date}}</td>
                                                    <td>

                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            @break
                        @case('NURSE')
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-md">
                                        <thead>
                                        <tr>
                                            <th scope="col" class="text-body">Nombre</th>
                                            <th scope="col" class="text-body">Permisos</th>
                                            <th scope="col" class="text-body">Temporalidad</th>
                                            <th scope="col" class="text-body">Horario</th>
                                            <th scope="col" class="text-body">Medicamentos</th>
                                            <th scope="col" class="text-body">Dosis</th>
                                            <th scope="col" class="text-body">vía</th>
                                            <th scope="col" class="text-body">Fecha de creacion</th>
                                            <th scope="col" class="text-body">Fecha de suspensión</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(count($activities)<=0)
                                            <tr>
                                                <td>No hay resultado</td>
                                            </tr>
                                        @else
                                            @foreach($activities as $activity)
                                                @include('doctor.deleteActivityModal')
                                                {{--                                    <input type="hidden" id="activities_id" name="activities_id" value="{{$activity->id_patient}}">--}}
                                                <tr>
                                                    <td class="text-body-table">
                                                        <strong>{{$activity->name_activity}}</strong></td>
                                                    <td class="text-body-table">{{__('passwords.'.$activity->min_permissions)}}</td>
                                                    <td class="text-body-table">{{__('passwords.'.$activity->temporality)}}</td>
                                                    <td class="text-body-table">{{$activity->schedule}}</td>
                                                    <td class="text-body-table">{{$activity->medicine_id}}</td>
                                                    <td class="text-body-table">{{$activity->dose}}</td>
                                                    <td class="text-body-table">{{$activity->via}}</td>
                                                    <td class="text-body-table">{{$activity->create_date}}</td>
                                                    <td class="text-body-table">{{$activity->suspension_date}}</td>
                                                    <td>

                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            @break
                    @endswitch
                @endif
                {{$activities->links('vendor.pagination.simple-bootstrap-5')}}
            </div>
            <a href="{{route('home')}}" class="button-regresar a">Regresar</a>
        </div>
    </div>

@endsection
