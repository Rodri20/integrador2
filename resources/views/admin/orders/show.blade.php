@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Detalles del Pedido</div>

                    <div class="card-body">
                        <p><strong>ID del Pedido:</strong> {{ $order->id }}</p>
                        <p><strong>Cliente:</strong> {{ $order->user->name }}</p>
                        <p><strong>Total:</strong> {{ $order->total }}</p>
                        <p><strong>Estado:</strong> {{ $order->status }}</p>
                        <p><strong>Código de Seguimiento:</strong> {{ $order->tracking_code }}</p>

                        <form method="POST" action="{{ route('admin.orders.updateStatus', $order) }}">
                            @csrf
                            <div class="form-group">
                                <label for="status">Actualizar Estado</label>
                                <select id="status" name="status" class="form-control">
                                    <option value="Pendiente" {{ $order->status == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                                    <option value="Procesando" {{ $order->status == 'Procesando' ? 'selected' : '' }}>Procesando</option>
                                    <option value="Enviado" {{ $order->status == 'Enviado' ? 'selected' : '' }}>Enviado</option>
                                    <option value="Completado" {{ $order->status == 'Completado' ? 'selected' : '' }}>Completado</option>
                                    <option value="Cancelado" {{ $order->status == 'Cancelado' ? 'selected' : '' }}>Cancelado</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Actualizar Estado</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
