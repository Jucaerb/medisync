@extends('layouts.app')

@section('content')
<div class= "d-flex justify-content-center align-items-center p-5">
<div class="card mb-3 border-0 " style="">
  <div class="row g-0">
    <div class="col-md-8">
      <div class="card-body text-body-big">
          <div class="text-body-big">
          Mantén actualizado el estado de tus paciente
          </div>
          <div class="text-body-small">
          Con MediSync puedes mantener al dia todos los datos de tus pacientes, al igual que los medicamentos administrados y por administrar. Además de mantener al dia tus inventarios de medicamentos.

          </div>
      </div>
    </div>
    <div class="col-md-4">
        <img class="img-responsive" src="{{ asset('images/doctora.png')}}">
    </div>
  </div>
</div>
</div>
@endsection
