@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid">
        </div>
        <div class="col-md-6">
            <h2>{{ $product->name }}</h2>
            <p class="text-muted">{{ $product->description }}</p>
            <p class="text-primary fw-bold">${{ $product->price }}</p>
            <!-- Aquí puedes agregar más detalles del producto según sea necesario -->
            <form action="{{ route('cart.add', ['id' => $product->id]) }}" method="POST">
                @csrf
                <div class="input-group">
                    <input type="number" name="quantity" class="form-control" value="1" min="1" required>
                    <button type="submit" class="btn btn-primary mt-2"><i class="fas fa-cart-plus"></i> Añadir al Carrito</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
