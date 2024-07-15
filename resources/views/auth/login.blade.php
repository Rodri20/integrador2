@extends('layouts.app')

@section('content')

<head>
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
</head>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="row g-0">
                    <!-- Columna de la imagen -->
                    <div class="col-md-4 d-none d-md-block">
                        <div class="imagen-formulario" style="background-image: url('{{ asset('img/about-4.jpg') }}'); background-size: cover; background-position: center; height: 100%;"></div>
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
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Correo Electrónico">
                                            
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
                                            <button type="submit" class="btn btn-primary" style="width: 50%">
                                                {{ __('Login') }}
                                            </button>

                                            @if (Route::has('password.request'))
                                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            @endif
                                        </div>
                                    </div>

                                    <p class="text-center mt-3">Al registrarte, aceptas nuestras Condiciones de uso y Política de privacidad.</p>
                                    <p class="text-center">¿No tienes una cuenta? <a class="link" href="{{ route('register') }}">Regístrate</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
