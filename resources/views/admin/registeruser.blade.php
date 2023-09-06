@extends('layouts.app')

@section('content')
<div class= "d-flex justify-content-center align-items-center p-5">
<div class="card mb-3 border-0 " style="">
<h5 class="card-title text-body-title">Registra un nuevo empleado!</h5>
<p class="card-text">
<form action="{{route('admin.storeuser')}}" method="POST">
    @csrf
    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">Nombre completo</span>
    <input id="full_name" name="full_name" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
</div>
<div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Usuario</span>
  <input id="username" name="username" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
</div>
<div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Identificación</span>
  <input id="identification_number" name="identification_number" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
</div>
<div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Correo electrónico</span>
  <input id="email" name="email" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
</div>
<div class="input-group mb-3">
  <span  class="input-group-text" id="inputGroup-sizing-default">Rol principal</span>
  <select id="role" name="role" class="form-select" aria-label="Default select example">
  <option selected>Selecciona una opción </option>
  <option value="DOCTOR">Doctor</option>
  <option value="BOSS_NURSE">Jefe de enfermeria</option>
  <option value="NURSE">Enfermero</option>
  <option value="CARER">Cuidador</option>
  <option value="INVENTORY">Inventario</option>
  <option value="ADMIN">Administrador</option>
</select>
</div>
<div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Contraseña</span>
  <input id="password" name="password" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
</div>
<div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Confirmar contraseña</span>
  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
</div>
  <button type="submit" class="btn btn-primary">Crear</button>
<a href="{{route('admin.home')}}" class="btn btn-primary">Cancelar</a>
    </form>
    </p>

</div>
</div>
@endsection
