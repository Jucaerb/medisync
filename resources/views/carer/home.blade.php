@extends('layouts.app')

@section('content')
    <div class= "d-flex justify-content-center align-items-center p-5">
        <div class="card mb-3 border-0 " style="">
            <div class="row g-0">
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title text-body-title">Bienvenido!</h5>
                        <p class="card-text text-body-medium2">Busca lo que necesite tu paciente.</p>
                        <div class="d-flex justify-content-center">
                            <a href="{{route('admin.registeruser')}}" class="button-body " >
                                Aqui!
                            </a>
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
