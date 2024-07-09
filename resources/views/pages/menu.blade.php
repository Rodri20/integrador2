@extends('layouts.app')

@section('title', 'Nuestra Carta')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h5 class="section-title text-primary fw-bold">Nuestra Carta</h5>
        <h1 class="display-4 fw-normal">MR. BURGUER</h1>
    </div>

    <div class="row">
        @foreach($products as $product)
        <div class="col-lg-4 mb-4">
            <div class="card border-0 shadow">
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="card-img-top img-fluid" style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text text-muted">{{ $product->description }}</p>
                </div>
                <div class="card-footer d-flex justify-content-between align-items-center">
                    <span class="text-primary fw-bold">${{ $product->price }}</span>
                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                        @csrf
                        <div class="input-group">
                            <input type="number" name="quantity" class="form-control" value="1" min="1" required>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-cart-plus me-2"></i> Añadir al Carrito</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-link">Ver más</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>
@endsection
