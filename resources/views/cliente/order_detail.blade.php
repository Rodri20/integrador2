@extends('layouts.app')

@section('title', 'Detalles de la Orden')

@section('content')
<div class="container">
    <h1 class="my-4">Detalles de la Orden</h1>
    <div class="card">
        <div class="card-header">
            <strong>ID de Pedido:</strong> {{ $order->id }}
        </div>
        <div class="card-body">
            <p><strong>Estado:</strong> {{ $order->status }}</p>
            <p><strong>Total:</strong> ${{ $order->total }}</p>
            <p><strong>Fecha de Pedido:</strong> {{ $order->created_at->format('d/m/Y') }}</p>
            <h5>Productos:</h5>
            <ul>
                @foreach($order->orderItems as $orderItem)
                    <li>{{ $orderItem->product->name }} - Cantidad: {{ $orderItem->quantity }} - Precio: ${{ $orderItem->price }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
