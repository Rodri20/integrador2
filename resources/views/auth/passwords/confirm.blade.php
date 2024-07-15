@extends('layouts.app')

@section('content')
<head>
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
    <style>
        .confirm-password-card {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
        }
        .confirm-password-header {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 20px;
            font-size: 24px;
            font-weight: bold;
        }
        .confirm-password-body {
            padding: 30px;
        }
        .confirm-password-form .form-control {
            border-radius: 25px;
            box-shadow: none;
            border: 1px solid #ddd;
        }
        .confirm-password-form .form-control:focus {
            box-shadow: none;
            border-color: #007bff;
        }
        .confirm-password-form .btn-primary {
            border-radius: 25px;
            padding: 10px 20px;
            font-size: 16px;
            width: 100%;
        }
        .confirm-password-form .btn-link {
            color: #007bff;
            text-decoration: none;
        }
        .confirm-password-form .btn-link:hover {
            text-decoration: underline;
        }
        .confirm-password-card-footer {
            text-align: center;
            margin-top: 20px;
        }
        .confirm-password-card-footer p {
            margin: 10px 0;
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .confirm-password-card {
                border-radius: 0;
            }
            .confirm-password-header {
                border-radius: 15px 15px 0 0;
            }
        }
    </style>
</head>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card confirm-password-card">
                <div class="card-header confirm-password-header">
                    {{ __('Confirmar Contraseña') }}
                </div>

                <div class="card-body confirm-password-body">
                    <p>{{ __('Por favor, confirma tu contraseña antes de continuar.') }}</p>

                    <form method="POST" action="{{ route('password.confirm') }}" class="confirm-password-form">
                        @csrf

                        <div class="mb-3">
                            <label for="password" class="form-label">
                                {{ __('Contraseña') }}
                            </label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Confirmar Contraseña') }}
                                </button>
                            </div>
                        </div>

                        @if (Route::has('password.request'))
                            <div class="text-center mt-3">
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('¿Olvidaste tu contraseña?') }}
                                </a>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
