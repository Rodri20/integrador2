@extends('layouts.app')

@section('title', 'Dashboard del Cliente')

@section('content')
<div class="container">
    <h1 class="my-4">Dashboard del Cliente</h1>

    <!-- Mensajes de éxito o error -->
    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session()->get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if(session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session()->get('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Formulario de búsqueda de pedidos -->
    <form action="{{ route('cliente.search') }}" method="GET" class="mb-4">
        @csrf
        <div class="form-group">
            <label for="order_code">Buscar por código de pedido:</label>
            <input type="text" id="order_code" name="order_code" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Buscar</button>
    </form>

    <!-- Lista de pedidos del cliente -->
    <h3>Mis Pedidos</h3>
    @if($orders->count() > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Código de Seguimiento</th>
                    <th>Total</th>
                    <th>Estado</th>
                    <th>Detalles</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->tracking_code }}</td>
                        <td>${{ $order->total }}</td>
                        <td>{{ $order->status }}</td>
                        <td>
                            <a href="{{ route('cliente.detalleCli', $order->id) }}" class="btn btn-info">Ver Detalles</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No tienes pedidos registrados.</p>
    @endif
</div>
@endsection
