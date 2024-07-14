@extends('layouts.app')

@section('title', 'Carrito de Compras')

@section('content')
    <div class="container">
        <h1 class="my-4">Carrito de Compras</h1>
        <a href="{{ route('pages.menu') }}" class="btn btn-secondary mb-3">Volver a la carta</a>

        @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session()->get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(empty($cart))
            <div class="alert alert-info">
                <p>El carrito está vacío.</p>
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio Unitario</th>
                            <th>Subtotal</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cart as $id => $details)
                            <tr>
                                <td class="align-middle">
                                    <img src="{{ asset('storage/' . $details['image']) }}" alt="{{ $details['name'] }}" class="img-thumbnail" style="width: 50px; height: 50px; object-fit: cover;">
                                    {{ $details['name'] }}
                                </td>
                                <td class="align-middle">
                                    <form action="{{ route('cart.update') }}" method="POST" class="d-inline-block">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $id }}">
                                        <input type="number" name="quantity" value="{{ $details['quantity'] }}" class="form-control d-inline-block" style="width: 60px;">
                                        <button type="submit" class="btn btn-sm btn-primary mt-2">Actualizar</button>
                                    </form>
                                </td>
                                <td class="align-middle">${{ $details['price'] }}</td>
                                <td class="align-middle">${{ $details['price'] * $details['quantity'] }}</td>
                                <td class="align-middle">
                                    <a href="{{ route('cart.remove', $id) }}" class="btn btn-sm btn-danger">Eliminar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="table-dark">
                        <tr>
                            <td colspan="3" class="text-end"><strong>Total</strong></td>
                            <td colspan="2"><strong>${{ collect($cart)->sum(function($item) { return $item['price'] * $item['quantity']; }) }}</strong></td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('cart.clear') }}" class="btn btn-danger">Vaciar Carrito</a>
                <a href="{{ route('cart.checkout') }}" class="btn btn-success">Proceder al Pago</a>
                
            </div>
        @endif
    </div>
@endsection

@push('styles')
<style>
    .img-thumbnail {
        max-width: 100%;
        height: auto;
    }
    .table th, .table td {
        vertical-align: middle;
    }
</style>
@endpush
