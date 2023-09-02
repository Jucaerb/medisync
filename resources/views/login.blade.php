@extends('layouts.app')

@section('content')


<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">MediSync</div>
                    <div class="card-body">
                        <form action="" method="">
                            <div class="form-group">
                                <label for="user" class="col-md-4 col-form-label text-md-right">Usuario: </label><br>
                                <div class="col-max">
                                    <input type="text" id="user" class="form-control" name="user" required autofocus placeholder="Ingresa tu usuario">
                                </div>
                            </div>

                            <div class="form-group pb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña:</label>
                                <div class="col-max">
                                    <input type="password" id="password" class="form-control" name="password" required placeholder="Ingresa tu contraseña">
                                </div>
                            </div>
                            <div class="link pb-3">
                            <a href="#" class="btn btn-link">
                                    Olvide mi contraseña
                                </a>
                            </div>


                            <div class="col-md-6 offset-md-4">

                                <button type="submit" class="button purple">
                                    Inicia Sesión
                                </button><br>

                            </div>
                            <div class=" cold-md-6 offset-md-4 pl-10">
                            <button type="submit" class="btn">
                                    Cancelar
                                </button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
