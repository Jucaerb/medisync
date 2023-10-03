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
            <a class="card-title text-body-title">Registra un nuevo paciente:</a>
            <p class="card-text">
            <form action="{{route('storepatient')}}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Nombre completo</span>
                    <input id="name" name="name" type="text" class="form-control"
                           aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                           minlength="255" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Cédula</span>
                    <input id="identification" name="identification" type="text" class="form-control"
                           aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                           minlength="255" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Sexo</span>
                    <select id="sex" name="sex" class="form-select" aria-label="Default select example">
                        <option selected>Selecciona una opción</option>
                        <option value="MEN">Hombre</option>
                        <option value="FEMALE">Mujer</option>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Fecha de nacimiento</span>
                    <input id="birth_date" name="birth_date" type="text" class="form-control"
                           aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                           minlength="255" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Fecha de ingreso</span>
                    <input id="in_date" name="in_date" type="text" class="form-control"
                           aria-label="Sizing example input"
                           aria-describedby="inputGroup-sizing-default" minlength="255" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Habitación</span>
                    <input id="room" name="room" type="text" class="form-control" aria-label="Sizing example input"
                           aria-describedby="inputGroup-sizing-default" minlength="255" required>
                </div>
                <div class="d-flex justify-content-start">
                    <div class="pr-5">
                        <button type="submit" class="button-usuario" style="margin-right: 5px;">Crear</button>
                    </div>
                    <div>
                        <a href="{{route('doctor.home')}}" class="button-regresar a">Cancelar</a>
                    </div>
                </div>
            </form>
            </p>

        </div>
    </div>
@endsection
