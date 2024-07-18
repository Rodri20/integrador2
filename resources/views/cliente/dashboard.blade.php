@extends('layouts.app')

@section('title', 'Dashboard de Cliente')

@section('content')
<div class="container">
    <h1 class="my-4">Mis Órdenes</h1>

    <div class="mb-4">
        <form action="{{ route('cliente.dashboard') }}" method="GET" class="form-inline">
            <input type="text" name="order_code" class="form-control mr-sm-2" placeholder="Código de Pedido">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>
    </div>

    @if($orders->isEmpty())
        <div class="alert alert-info">
            <p>No has realizado ninguna orden aún.</p>
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID de Pedido</th>
                        <th>Estado</th>
                        <th>Total</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->status }}</td>
                            <td>${{ $order->total }}</td>
                            <td>{{ $order->created_at->format('d/m/Y') }}</td>
                            <td>
                                <a href="{{ route('cliente.detalleCli', $order->id) }}" class="btn btn-sm btn-primary">Ver Detalles</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
