@extends('layouts.app')

@section('content')
    <div class="container">
        <h5 class="card-title text-aling-left text-body-medium2 mb-4 ">Olvidé mi contraseña</h5>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card p-4">
                    <div class="card border-0">
                        <div
                            class="card-header bg-azul-claro text-center text-body-small  text border-bottom">{{ __('Reiniciar contraseña') }}</div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="row mb-3">
                                    <label for="email"
                                           class="col-md-4 col-form-label text-md-end text-body-small">{{ __('Correo:') }}</label>
                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                               class="form-control @error('email') is-invalid @enderror" name="email"
                                               value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="button-email">
                                            {{ __('Enviar correo de verificación') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
