@extends('layouts.app')

@section('content')
<head>
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
    <style>
        .register-card {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .register-card-header {
            background-color:#fea115 ;
            color: white;
            text-align: center;
            padding: 20px;
            font-size: 24px;
            font-weight: bold;
        }
        .register-form {
            padding: 30px;
        }
        .register-form .form-control {
            border-radius: 25px;
            box-shadow: none;
            border: 1px solid #ddd;
        }
        .register-form .form-control:focus {
            box-shadow: none;
            border-color: #007bff;
        }
        .register-form .btn-primary {
            border-radius: 25px;
            padding: 10px 20px;
            font-size: 16px;
            width: 100%;
        }
        .register-form .form-check-label a {
            color: #007bff;
            text-decoration: none;
        }
        .register-form .form-check-label a:hover {
            text-decoration: underline;
        }
        .register-card-footer {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card register-card">
                <div class="card-header register-card-header">
                    {{ __('Registro') }}
                </div>

                <div class="card-body register-form">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">
                                {{ __('Nombre') }}
                            </label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="{{ __('Nombre') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">
                                {{ __('Correo Electrónico') }}
                            </label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="{{ __('Correo Electrónico') }}" required autocomplete="email">

                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">
                                {{ __('Contraseña') }}
                            </label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="{{ __('Contraseña') }}" required autocomplete="new-password">

                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password-confirm" class="form-label">
                                {{ __('Confirmar Contraseña') }}
                            </label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="{{ __('Confirmar Contraseña') }}" required autocomplete="new-password">
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="terms" id="terms" required>
                                <label class="form-check-label" for="terms">
                                    {{ __('Acepto los') }} <a href="#">{{ __('Términos y Condiciones') }}</a>
                                </label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Registrarse') }}
                            </button>
                        </div>

                        <div class="register-card-footer">
                            <p>{{ __('¿Ya tienes una cuenta?') }} <a href="{{ url('/login') }}">{{ __('Inicia sesión') }}</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
