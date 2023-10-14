@extends('layouts.app')

@section('content')

    <div class="d-flex p-4">
        <div class="container">
            <p class="card-title text-aling-left text-body-title pb-3">Mira tus empleados activos!</p>
            <div class="card mb-3">
                <div class="card-header">
                    <form action="{{route('admin.users')}}" method="get">
                        <div class="d-flex flex-row align-items-start">
                            <input type="text" class="form-control busqueda" name="texto" value="{{$texto}}">
                            <input type="submit" class="btn btn-primary mx-2 button-buscar" value="Buscar">
                            <a href="{{ route('admin.registeruser') }}" class="button-add a mx-2">+ Añadir empleado</a>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-md">
                            <thead>
                            <tr>
                                <th scope="col" class="text-body">Usuario</th>
                                <th scope="col" class="text-body">Nombre completo</th>
                                <th scope="col" class="text-body">Rol</th>
                                <th scope="col" class="text-body">Email</th>
                                <th scope="col" class="text-body">Identificación</th>
                                <th scope="col" class="text-body">Estado</th>
                                <th scope="col" style="max-width: 120px;"></th>
                                <th scope="col" style="max-width: 120px;"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($users)<=0)
                                <tr>
                                    <td>No hay resultado</td>
                                </tr>
                            @else
                                @foreach($users as $user)
                                    @include('admin.inactiveModal')
                                    @include('admin.activateModal')
                                    <tr>
                                        <td class="text-body-table"><strong>{{$user->username}}</strong></td>
                                        <td class="text-body-table">{{$user->full_name}}</td>
                                        <td class="text-body-table">{{__('passwords.'.$user->role)}}</td>
                                        <td class="text-body-table">{{$user->email}}</td>
                                        <td class="text-body-table">{{$user->identification_number}}</td>
                                        <td>
                                            @if($user->status == 'ACTIVE')

                                                <span class=" bi bi-dot badge rounded-pill custom-badge-active"
                                                      style="font-size: 0.9rem;">
                                            {{ucfirst(strtolower($user->status))}}
                                        </span>
                                            @else
                                                <span class=" bi bi-dot badge rounded-pill custom-badge-inactive"
                                                      style="font-size: 0.9rem;">
                                            {{ucfirst(strtolower($user->status))}}
                                        </span>
                                            @endif

                                        </td>
                                        <td>
                                        <td>
                                            <a href="{{route('admin.edituser', ['id' => $user->id])}}">
                                                <i class="bi bi-pencil-square" style="font-size: 1.4rem;"></i>
                                            </a>
                                        </td>
                                        <td>
                                            @if ($user->status == 'ACTIVE')
                                                <button type="button" data-bs-toggle="modal"
                                                        data-bs-target="#inactiveModal{{$user->id}}"
                                                        style="border: none; background: none">
                                                    <i class="bi bi-toggle-on" style="font-size: 1.4rem; "></i>
                                                </button>
                                            @else
                                                <button type="button" data-bs-toggle="modal"
                                                        data-bs-target="#activateModal{{$user->id}}"
                                                        style="border: none; background: none">
                                                    <i class="bi bi-toggle-off" style="font-size: 1.4rem;"></i>
                                                </button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                {{$users->links('vendor.pagination.simple-bootstrap-5')}}
            </div>
            <a href="{{route('admin.home')}}" class="button-regresar a">Regresar</a>
        </div>
    </div>

@endsection
