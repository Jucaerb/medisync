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
        <div class="card mb-3 border-0 ">
            <a class="card-title text-body-title">Registra un nuevo empleado!</a>
            <p class="card-text">
{{--            <form action="{{route('admin.storeuser')}}" method="POST">--}}
                @csrf
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Paciente</span>
                    <input class="form-control" type="text"
                           value="Disabled readonly input" aria-label="Disabled input example" disabled readonly>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Nombre de actividad</span>
                    <input class="form-control" type="text"
                           value="Disabled readonly input" aria-label="Disabled input example" disabled readonly>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Comentarios </span>
                    <input id="full_name" name="full_name" type="text" class="form-control"
                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                            maxlength="255" required>
                </div>
                <div class="d-flex justify-content-start">
                    <div class="pr-5">
                        <button type="submit" class="button-usuario" style="margin-right: 5px;">Guardar</button>
                    </div>
                    <div>
                        <button type="button" data-bs-toggle="modal" class="button-regresar">Cancelar</button>
                    </div>
                </div>
{{--            </form>--}}

        </div>
    </div>
@endsection

