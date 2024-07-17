@extends('layouts.app')

@section('title', 'Detalles del Pedido')

@section('content')
<div class="container">
    <h1>Detalles del Pedido</h1>

    <p><strong>ID de Pedido:</strong> {{ $order->id }}</p>
    <p><strong>Código de Rastreo:</strong> {{ $order->tracking_code }}</p>
    <p><strong>Estado:</strong> {{ $order->status }}</p>
    <p><strong>Total:</strong> ${{ $order->total }}</p>

    <h3>Productos</h3>
    @if($order->orderItems->count() > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->orderItems as $item)
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>${{ $item->price }}</td>
                        <td>${{ $item->price * $item->quantity }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No hay productos en este pedido.</p>
    @endif
</div>
@endsection
