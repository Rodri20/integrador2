@extends('layouts.app')

@section('content')
<head>
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
    <style>
        .reset-password-card {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
        }
        .reset-password-header {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 20px;
            font-size: 24px;
            font-weight: bold;
        }
        .reset-password-body {
            padding: 30px;
        }
        .reset-password-form .form-control {
            border-radius: 25px;
            box-shadow: none;
            border: 1px solid #ddd;
        }
        .reset-password-form .form-control:focus {
            box-shadow: none;
            border-color: #007bff;
        }
        .reset-password-form .btn-primary {
            border-radius: 25px;
            padding: 10px 20px;
            font-size: 16px;
            width: 100%;
        }
        .reset-password-form .invalid-feedback {
            display: block;
        }
        .reset-password-card-footer {
            text-align: center;
            margin-top: 20px;
        }
        .reset-password-card-footer p {
            margin: 10px 0;
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .reset-password-card {
                border-radius: 0;
            }
            .reset-password-header {
                border-radius: 15px 15px 0 0;
            }
        }
    </style>
</head>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card reset-password-card">
                <div class="card-header reset-password-header">
                    {{ __('Restablecer Contraseña') }}
                </div>

                <div class="card-body reset-password-body">
                    <form method="POST" action="{{ route('password.update') }}" class="reset-password-form">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="mb-3">
                            <label for="email" class="form-label">
                                {{ __('Correo Electrónico') }}
                            </label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">
                                {{ __('Nueva Contraseña') }}
                            </label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

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
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Restablecer Contraseña') }}
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
