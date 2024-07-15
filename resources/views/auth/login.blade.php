@extends('layouts.app')

@section('content')
<head>
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
    <style>
        .login-card {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .login-image {
            background-image: url('{{ asset('img/about-4.jpg') }}');
            background-size: cover;
            background-position: center;
            height: 100%;
            border-radius: 15px 0 0 15px;
        }
        .login-form {
            padding: 30px;
        }
        .login-form .form-control {
            border-radius: 25px;
            box-shadow: none;
            border: 1px solid #ddd;
        }
        .login-form .form-control:focus {
            box-shadow: none;
            border-color: #007bff;
        }
        .login-form .btn-primary {
            border-radius: 25px;
            padding: 10px 20px;
            font-size: 16px;
        }
        .login-form .btn-link {
            color: #007bff;
            text-decoration: none;
        }
        .login-form .btn-link:hover {
            text-decoration: underline;
        }
        .login-form .text-muted {
            color: #6c757d;
        }
        .login-form .icon {
            font-size: 20px;
            color: #fea115;
        }
        .login-card-header {
            color: white;
            border-bottom: 1px solid #ddd;
        }
        .login-card-header h2 {
            margin: 0;
            padding: 15px;
            font-size: 24px;
        }
        .login-form p {
            margin: 10px 0;
        }
    </style>
</head>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card login-card">
                <div class="row g-0">
                    <!-- Columna de la imagen -->
                    <div class="col-md-4 d-none d-md-block">
                        <div class="login-image"></div>
                    </div>

                    <!-- Columna del formulario -->
                    <div class="col-md-8">
                        <div class="card-body login-form">
                            <div class="login-card-header">
                                <h2>{{ __('Iniciar sesión') }}</h2>
                            </div>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="mb-3">
                                    <label for="email" class="form-label">
                                        <i class="fas fa-envelope icon"></i> {{ __('Correo Electrónico') }}
                                    </label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{ __('Correo Electrónico') }}">
                                    
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">
                                        <i class="fas fa-key icon"></i> {{ __('Contraseña') }}
                                    </label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="{{ __('Contraseña') }}">
                                    
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3 form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Recuérdame') }}
                                    </label>
                                </div>

                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Iniciar sesión') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('¿Olvidaste tu contraseña?') }}
                                        </a>
                                    @endif
                                </div>

                                <div class="text-center">
                                    <p class="text-muted">{{ __('Al registrarte, aceptas nuestras Condiciones de uso y Política de privacidad.') }}</p>
                                    <p>{{ __('¿No tienes una cuenta?') }} <a class="btn btn-link" href="{{ route('register') }}">{{ __('Regístrate') }}</a></p>
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
