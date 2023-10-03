@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center align-items-center p-5">
        <div class="card mb-3 border-0 " style="">
            <a class="card-title text-body-title">Editar información de empleados</a>
            <p class="card-text">
            <form action="{{route('admin.saveedit')}}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Nombre completo</span>
                    <input id="full_name" name="full_name" type="text" class="form-control"
                           aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                           maxlength="255"
                           value="{{$user->full_name}}">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Usuario</span>
                    <input id="username" name="username" type="text" class="form-control"
                           aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                           maxlength="255"
                           value="{{$user->username}}">
                </div>
                <input type="hidden" id="user_id" name="user_id" value="{{$user->id}}">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Identificación</span>
                    <input id="identification_number" name="identification_number" type="text" class="form-control"
                           aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                           maxlength="255"
                           value="{{$user->identification_number}}">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Correo electrónico</span>
                    <input id="email" name="email" type="text" class="form-control" aria-label="Sizing example input"
                           aria-describedby="inputGroup-sizing-default" maxlength="255" value="{{$user->email}}">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Rol principal</span>
                    <select id="role" name="role" class="form-select" aria-label="Default select example">
                        <option>Selecciona una opción</option>
                        <option value="DOCTOR" {{$user->role == 'DOCTOR' ? 'selected':''}}>Doctor</option>
                        <option value="BOSS_NURSE" {{$user->role == 'BOSS_NURSE' ? 'selected':''}}>Jefe de enfermeria
                        </option>
                        <option value="NURSE" {{$user->role == 'NURSE' ? 'selected':''}}>Enfermero</option>
                        <option value="CARER" {{$user->role == 'CARER' ? 'selected':''}}>Cuidador</option>
                        <option value="INVENTORY" {{$user->role == 'INVENTORY' ? 'selected':''}}>Inventario</option>
                        <option value="ADMIN" {{$user->role == 'ADMIN' ? 'selected':''}}>Administrador</option>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Contraseña</span>
                    <input id="password" name="password" type="password" class="form-control"
                           aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                           maxlength="255">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Confirmar contraseña</span>
                    <input type="password" class="form-control" aria-label="Sizing example input"
                           aria-describedby="inputGroup-sizing-default" maxlength="255">
                </div>
                <div class="d-flex justify-content-start">
                    <div class="pr-5">
                        <button type="submit" class="button-usuario" style="margin-right: 5px;">Guardar</button>
                    </div>
                    <div>
                        <a href="{{route('admin.users')}}" class="button-regresar a">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
