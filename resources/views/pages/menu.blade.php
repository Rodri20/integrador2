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
        <div class="col-lg-6 mb-4">
            <div class="card border-0 shadow">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid rounded-start" style="height: 200px; object-fit: cover;">
                    </div>
                    <div class="col-md-8">
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
                                            <button type="submit" class="btn btn-primary ms-2"><i class="fas fa-cart-plus"></i> Añadir al Carrito</button>
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
