@extends('layouts.app')

@section('content')
<head>
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
    <style>
        .password-reset-card {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
        }
        .password-reset-header {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 20px;
            font-size: 24px;
            font-weight: bold;
        }
        .password-reset-body {
            padding: 30px;
        }
        .password-reset-form .form-control {
            border-radius: 25px;
            box-shadow: none;
            border: 1px solid #ddd;
        }
        .password-reset-form .form-control:focus {
            box-shadow: none;
            border-color: #007bff;
        }
        .password-reset-form .btn-primary {
            border-radius: 25px;
            padding: 10px 20px;
            font-size: 16px;
            width: 100%;
        }
        .password-reset-form .alert {
            border-radius: 25px;
        }
        .password-reset-card-footer {
            text-align: center;
            margin-top: 20px;
        }
        .password-reset-card-footer p {
            margin: 10px 0;
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .password-reset-card {
                border-radius: 0;
            }
            .password-reset-header {
                border-radius: 15px 15px 0 0;
            }
        }
    </style>
</head>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card password-reset-card">
                <div class="card-header password-reset-header">
                    {{ __('Restablecer Contraseña') }}
                </div>

                <div class="card-body password-reset-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}" class="password-reset-form">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">
                                {{ __('Correo Electrónico') }}
                            </label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Enviar Enlace para Restablecer Contraseña') }}
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
