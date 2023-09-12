@extends('layouts.app')

@section('content')
    <div class="d-flex  p-5">
    <div class="container">
        <h5 class="card-title text-aling-left text-body-title  ">Mira tus empleados activos!</h5>
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

                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Roxana.reina</td>
                            <td>Roxana Reina</td>
                            <td>Enfermera</td>
                            <td>roxana@gmail.com</td>
                            <td>11111</td>
                            <td>Activo</td>
                            <td>
                                <i class="bi bi-trash"></i>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
        <a href="{{route('admin.home')}}" class="button-regresar">Regresar</a>
    </div>
    </div>




@endsection
