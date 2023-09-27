@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center p-5">
    <div class="card mb-3 border-0" style="">
        <div class="row g-0">
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title text-body-big">Bienvenido Doctor !</h5>
                    <p class="card-text text-body-medium2">INGRESA UN NUEVO <span class="font-weight-bold">PACIENTE&nbsp;&nbsp;&nbsp;</span>
                        <button type="button" class="button-body" href="{{route('doctor.registerpatient')}}">
                            Registrar&nbsp;&nbsp;
                        </button>
                    </p>
                    <p class="card-text text-body-small">Con MediSync puedes mantener al día todos los datos de tus
                        pacientes, al igual que los medicamentos administrados y por administrar. Además de mantener al
                        día tus inventarios de medicamentos.</p>
                </div>
            </div>
            <div class="col-md-4">
                <img class="img-responsive" src="{{ asset('images/doctora.png') }}">
            </div>
        </div>
    </div>
</div>

@endsection
