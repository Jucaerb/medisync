@extends('layouts.app')

@section('content')
<div class="login-container">
  <h2>Iniciar sesión</h2>
  <form action="procesar_login.php" method="post">
    <input type="text" name="usuario" placeholder="Usuario" required>
    <input type="password" name="contrasena" placeholder="Contraseña" required>
    <button type="submit">Iniciar sesión</button>
  </form>
</div>
@endsection
