@extends('layouts.app')

@section('content')
    @include('admin.inactiveModal')
    <div class="d-flex  p-4">
        <div class="container">
            <h5 class="card-title text-aling-left text-body-title pb-3 ">Mira tus empleados activos!</h5>
            <div class="card mb-3">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-md">
                            <thead>
                            <tr>
                                <th scope="col">Usuario</th>
                                <th scope="col">Nombre completo</th>
                                <th scope="col">Rol</th>
                                <th scope="col">Email</th>
                                <th scope="col">Identificación</th>
                                <th scope="col">Estado</th>
                                <th scope="col" style="max-width: 120px;"></th>
                                <th scope="col" style="max-width: 120px;"></th>


                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $users)
                                <tr>
                                    <td>{{$users->username}}</td>
                                    <td>{{$users->full_name}}</td>
                                    <td>{{$users->role}}</td>
                                    <td>{{$users->email}}</td>
                                    <td>{{$users->identification_number}}</td>
                                    <td>
                                        <span class="badge rounded-pill bg-success">
                                            {{$users->status}}
                                        </span>
                                        </td>
                                    <td>
                                        <a href="{{route('admin.edituser', ['id' => $users->id])}}">
                                            <i class="bi bi-pencil-square" style="font-size: 1.4rem;"></i>
                                        </a>

                                    </td>
                                    <td>
                                        <button type="button"  data-bs-toggle="modal" data-bs-target="#exampleModal" style="border: none; background: none;">
                                            <i class="bi bi-toggle-off" style="font-size: 1.4rem;"></i>
                                        </button>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
            <a href="{{route('admin.home')}}" class="button-regresar a">Regresar</a>
        </div>
    </div>

@endsection
