@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Detalles del Cliente</div>

                    <div class="card-body">
                        <p><strong>ID del Cliente:</strong> {{ $customer->id }}</p>
                        <p><strong>Nombre:</strong> {{ $customer->name }}</p>
                        <p><strong>Email:</strong> {{ $customer->email }}</p>
                        <p><strong>Fecha de Registro:</strong> {{ $customer->created_at }}</p>
                        <p><strong>Última Actualización:</strong> {{ $customer->updated_at }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
