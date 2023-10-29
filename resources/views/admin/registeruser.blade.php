@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="d-flex justify-content-center align-items-center p-5">
        <div class="card mb-3 border-0 " style="">
            <a class="card-title text-body-title">Registra un nuevo empleado!</a>
            <p class="card-text">
            @include('admin.cancelModal')
            <form action="{{route('admin.storeuser')}}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Nombre completo</span>
                    <input id="full_name" name="full_name" type="text" class="form-control"
                           aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                           maxlength="255" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Usuario</span>
                    <input id="username" name="username" type="text" class="form-control"
                           aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                           maxlength="255" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Identificación</span>
                    <input id="identification_number" name="identification_number" type="text" class="form-control"
                           aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                           maxlength="255" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Correo electrónico</span>
                    <input id="email" name="email" type="text" class="form-control" aria-label="Sizing example input"
                           aria-describedby="inputGroup-sizing-default" maxlength="255" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Rol principal</span>
                    <select id="role" name="role" class="form-select" aria-label="Default select example">
                        <option disabled selected value>Selecciona una opción</option>
                        <option value="DOCTOR">Doctor</option>
                        <option value="BOSS_NURSE">Jefe de enfermeria</option>
                        <option value="NURSE">Enfermero</option>
                        <option value="ADMIN">Administrador</option>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Contraseña</span>
                    <input id="password" name="password" type="password" class="form-control"
                           aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                           maxlength="255" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Confirmar contraseña</span>
                    <input id="confirm-password" name="confirm-password" type="password" class="form-control" aria-label="Sizing example input"
                           aria-describedby="inputGroup-sizing-default" maxlength="255" required>
                </div>
                <div class="d-flex justify-content-start">
                    <div class="pr-5">
                        <button type="submit" class="button-usuario" style="margin-right: 5px;">Crear</button>
                    </div>
                    <div>
                        <button type="button" data-bs-toggle="modal" class="button-regresar"  data- data-bs-target="#cancelModal">Cancelar</button>
                    </div>
                </div>
            </form>
            </p>

        </div>
    </div>
@endsection
