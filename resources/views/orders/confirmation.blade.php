@extends('layouts.app')

@section('title', 'Confirmación de Pedido')

@section('content')
<div class="container">
    <h1 class="my-4">Gracias por comprar en Mr. Burger</h1>
    <div class="alert alert-success">
        <h4>Tu pedido ha sido recibido exitosamente.</h4>
        <p>ID de Pedido: <strong>{{ $order->id }}</strong></p>
        <p>Número de Pedido: <strong>{{ $order->number }}</strong></p>
        <p>Estado del Pedido: <strong>{{ $order->status }}</strong></p>
    </div>

    <h2>Detalles del Pedido</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->pivot->quantity }}</td>
                <td>${{ number_format($product->pivot->price, 2) }}</td>
                <td>${{ number_format($product->pivot->price * $product->pivot->quantity, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3" class="text-end">Total</th>
                <th>${{ number_format($order->total, 2) }}</th>
            </tr>
        </tfoot>
    </table>
</div>
@endsection
