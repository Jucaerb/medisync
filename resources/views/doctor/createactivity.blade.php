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
            <a class="card-title text-body-title">Registra una nueva actividad:</a>
            <p class="card-text">
            @include('doctor.cancelModal')
            <form action="{{route('saveactivity')}}" method="POST">
                @csrf

                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Paciente</span>
                    <select id="patient" name="patient" class="form-select" aria-label="Default select example"
                            required>
                        <option disabled selected value>Selecciona un paciente</option>
                        @foreach($patients as $patient)
                            <option value="{{$patient->id}}">{{$patient->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Nombre actividad</span>
                    <input id="name_activity" name="name_activity" type="text" class="form-control"
                           aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                           maxlength="100" required>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Permisos minimos</span>
                    <select id="min_permissions" name="min_permissions" class="form-select"
                            aria-label="Default select example" required>
                        <option disabled selected value>Selecciona una opción</option>
                        <option value="DOCTOR">Doctor</option>
                        <option value="BOSS_NURSE">Jefe de enfermeria</option>
                        <option value="NURSE">Enfermero</option>
                    </select>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Temporalidad</span>
                    <select id="temporality" name="temporality" class="form-select" aria-label="Default select example"
                            required>
                        <option disabled selected value>Selecciona una opción</option>
                        <option value="diary">Diario</option>
                        <option value="every 4 hours">Cada 4 horas</option>
                        <option value="every 8 hours">Cada 8 horas</option>
                        <option value="every 12 hours">Cada 12 horas</option>
                        <option value="weekly">Semanal</option>
                        <option value="monthly">mensual</option>
                        <option value="every 2 days">Cada 2 días</option>
                        <option value="every 3 days">Cada 3 días</option>
                        <option value="every 4 days">Cada 4 días</option>
                        <option value="every 5 days">Cada 5 días</option>
                        <option value="every 6 days">Cada 6 días</option>
                    </select>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Horario Inicial</span>
                    <select id="schedule" name="schedule" class="form-select" aria-label="Default select example"
                            required>
                        <option disabled selected value>Selecciona una opción</option>
                        <option value="00:00 - 02:00">00:00 - 02:00</option>
                        <option value="02:00 - 04:00">02:00 - 04:00</option>
                        <option value="04:00 - 06:00">04:00 - 06:00</option>
                        <option value="06:00 - 08:00">06:00 - 08:00</option>
                        <option value="08:00 - 10:00">08:00 - 10:00</option>
                        <option value="10:00 - 12:00">10:00 - 12:00</option>
                        <option value="12:00 - 14:00">12:00 - 14:00</option>
                        <option value="14:00 - 16:00">14:00 - 16:00</option>
                        <option value="16:00 - 18:00">16:00 - 18:00</option>
                        <option value="18:00 - 20:00">18:00 - 20:00</option>
                        <option value="20:00 - 22:00">20:00 - 22:00</option>
                        <option value="22:00 - 00:00">22:00 - 00:00</option>
                    </select>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Medicamento</span>
                    <input id="medicine_id" name="medicine_id" type="text" class="form-control"
                           aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                           maxlength="100" required>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Dosis</span>
                    <input id="dose" name="dose" type="text" class="form-control"
                           aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                           maxlength="100" required>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Vía</span>
                    <input id="via" name="via" type="text" class="form-control"
                           aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                           maxlength="100" required>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Fecha de creacion</span>
                    <input id="create_date" name="create_date" type="date" class="form-control"
                           max="{{ date('Y-m-d') }}" required>
                    <i class="fas fa-calendar input-prefix"></i>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Fecha de suspensión</span>
                    <input id="suspension_date" name="suspension_date" type="date" class="form-control" required>
                    <i class="fas fa-calendar input-prefix"></i>

                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Observaciones</span>
                    <input id="observations" name="observations" type="text" class="form-control"
                           aria-label="Sizing example input"
                           aria-describedby="inputGroup-sizing-default" maxlength="200" required>
                </div>

                <div class="d-flex justify-content-start">
                    <div class="pr-5">
                        <button type="submit" class="button-usuario" style="margin-right: 5px;">Crear</button>
                    </div>
                    <div>
                        <button type="button" data-bs-toggle="modal" class="button-regresar" data-
                                data-bs-target="#cancelModal">Cancelar
                        </button>
                    </div>
                </div>
            </form>
            </p>

        </div>
    </div>
@endsection
