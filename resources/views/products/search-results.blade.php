<!-- resources/views/products/search-results.blade.php -->
@extends('layouts.app')

@section('title', 'Resultados de Búsqueda')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Resultados de Búsqueda</h1>

    <div class="row">
        @foreach($products as $product)
        <div class="col-lg-4 mb-4">
            <div class="card border-0 shadow h-100">
                <div class="row g-0">
                    <div class="col-md-5">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid rounded-start" style="width: 100%; height: 200px; object-fit: cover;">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body d-flex flex-column h-100">
                            <div>
                                <h5 class="card-title mb-0">{{ $product->name }}</h5>
                                <p class="card-text text-muted">{{ $product->description }}</p>
                            </div>
                            <div class="mt-auto">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="text-primary fw-bold">${{ $product->price }}</span>
                                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                        @csrf
                                        <div class="input-group">
                                            <input type="number" name="quantity" class="form-control" value="1" min="1" required>
                                            <button type="submit" class="btn btn-primary"><i class="fas fa-cart-plus me-2"></i> Añadir al Carrito</button>
                                        </div>
                                    </form>
                                </div>
                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-link mt-2">Ver más</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>
@endsection
