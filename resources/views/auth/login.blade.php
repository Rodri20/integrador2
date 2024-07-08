@extends('layouts.app')

@section('content')
<<<<<<< HEAD

<head>
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
</head>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="row g-0">
                    <!-- Columna de la imagen -->
                    <div class="col-md-4 d-none d-md-block">
                        <div class="imagen-formulario"></div>
                    </div>

                    <!-- Columna del formulario -->
                    <div class="col-md-8">
                        <div class="card-body">
                            <center><h2 class="card-header">{{ __('Login') }}</h2></center>
                            <form method="POST" action="{{ route('login') }}" class="formulario">
                                @csrf

                                <div class="contenedor">
                                    <div class="row mb-3 input-contenedor">
                                        <label for="email" class="col-md-4 col-form-label text-md-end">
                                            <i class="fas fa-envelope icon"></i>
                                        </label>

                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Correo Electronico">
                                            
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3 input-contenedor">
                                        <label for="password" class="col-md-4 col-form-label text-md-end">
                                            <i class="fas fa-key icon"></i>
                                        </label>

                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Contraseña">
                                            
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6 offset-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                <label class="form-check-label" for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Login') }}
                                            </button>

                                            @if (Route::has('password.request'))
                                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            @endif
                                        </div>
                                    </div>

                                    <p>Al registrarte, aceptas nuestras Condiciones de uso y Política de privacidad.</p>
                                    <p>¿No tienes una cuenta? <a class="link" href="{{ route('register') }}">Registrate</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
=======

    <div class="row justify-content-center align-items-stretch">
        <!-- Contenedor con imagen a la izquierda -->
        <div class="col-md-6 d-flex align-items-center justify-content-center bg-dark">
            <img src="{{ asset('img/about-1.jpg') }}" class="img-fluid d-block w-100 object-fit-cover" alt="Login Image">
        </div>

        <!-- Contenedor con formulario a la derecha -->
        <div class="col-md-6 d-flex align-items-center justify-content-center p-0">
            <div class="card border-0 shadow" style="width: 100%; max-width: 100%; height: 100%;" >
                <div class="card-body m-3 p-3">
                    <div class="card-header bg-transparent text-center">
                        <h3 class="fw-bold mb-0">{{ __('Login') }}</h3>
                    </div>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Campo de email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Campo de contraseña -->
                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Opción de recordar sesión -->
                        <div class="mb-3 form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                        </div>

                        <!-- Botón de login -->
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
                        </div>

                        <!-- Enlace para recuperar contraseña -->
                        @if (Route::has('password.request'))
                            <div class="text-center mt-3">
                                <a class="btn btn-link" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                            </div>
                        @endif
                    </form>
>>>>>>> 6af23b1c3f44c239375c978f0b8cbb024eb09c36
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .img-fluid {
        max-width: 100%;
        height: auto;
    }

    .object-fit-cover {
        object-fit: cover;
        height: 100%;
    }

    .card {
        border-radius: 0;
    }

    /* Estilos específicos para esta página */
    .container-fluid {
        margin: 0 !important;
        padding: 0 !important;
    }
    
</style>
@endpush
