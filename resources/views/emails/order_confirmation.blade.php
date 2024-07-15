@component('mail::message')
# Confirmación de Pedido

Gracias por comprar en Mr. Burger.

## Detalles del Pedido
- **ID de Pedido:** {{ $order->id }}
- **Número de Pedido:** {{ $order->tracking_code }}
- **Estado:** {{ $order->status }}

## Productos
@foreach($order->products as $product)
- {{ $product->name }} x {{ $product->pivot->quantity }} - ${{ $product->pivot->price }}
@endforeach

**Total:** ${{ $order->total }}

Gracias por tu compra.

{{ config('app.name') }}
@endcomponent
