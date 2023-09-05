<div class="modal fade" id="login-modal" tabindex="-1" aria-labelledby="login-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="w-100 float-to-right mx-2">
                    <a class="text-body-medium align-bottom">
                        MediSync
                        <img width="48" height="48" src="{{ asset('images/logo.png')}}">
                    </a>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="mt-2">
                <div class="d-flex justify-content-center">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="text-center text-body-login-modal">
                                LOGIN
                        </div>
                        <div class="mb-3 mt-2">
                            <div>
                                <label for="email" class="text-body-medium size-login">Usuario:</label>
                            </div>
                            <div class="">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror input-login" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-5 mt-4">
                            <label for="password" class="text-body-medium size-login">Contraseña:</label>
                            <div class="">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror input-login" name="password" required autocomplete="current-password" aria-describedby="passwordHelp">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <div id="passwordHelp">
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            Olvidé mi contraseña
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="mb-4 mt-5 d-flex justify-content-center">
                            <button type="submit" class="button-login">
                                Inicia sesión
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
