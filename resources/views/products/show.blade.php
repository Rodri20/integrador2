@extends('layouts.app')

@section('content')
    <div class="bg-light py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-lg">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid rounded-left">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h2 class="card-title mb-4">{{ $product->name }}</h2>
                                <p class="lead mb-4">{{ $product->description }}</p>
                                <div class="mb-4">
                                    <p><strong>Precio:</strong> ${{ $product->price }}</p>
                                    <p><strong>Stock:</strong> {{ $product->stock }}</p>
                                    <p><strong>Cantidad:</strong></p>
                                    <div class="input-group mb-3" style="max-width: 120px;">
                                        <input type="number" name="quantity" value="1" min="1" max="{{ $product->stock }}" class="form-control">
                                        <div class="input-group-append">
                                            <span class="input-group-text">Disponible</span>
                                        </div>
                                    </div>
                                </div>
                                <p><strong>Categorías:</strong></p>
                                <ul class="list-unstyled mb-4">
                                    @foreach($product->categories as $category)
                                        <li><span class="badge badge-secondary">{{ $category->name }}</span></li>
                                    @endforeach
                                </ul>
                                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                    @csrf
                                    <div class="form-group mb-4">
                                        <label for="quantity">Cantidad:</label>
                                        <div class="input-group">
                                            <input type="number" name="quantity" value="1" min="1" max="{{ $product->stock }}" class="form-control" style="width: 70px;">
                                            <div class="input-group-append">
                                                <span class="input-group-text">Disponible</span>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">Agregar al Carrito</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-light text-center">
                        <a href="{{ route('pages.menu') }}" class="btn btn-link">Volver al Menú</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sección de Productos Relacionados -->
        <div class="row justify-content-center mt-5">
            <div class="col-lg-12">
                <h3 class="mb-4">Productos Relacionados</h3>
                <div class="row">
                    @foreach($relatedProducts as $relatedProduct)
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                            <div class="card shadow-sm h-100">
                                <div style="height: 200px; overflow: hidden;">
                                    <img src="{{ asset('storage/' . $relatedProduct->image) }}" class="card-img-top img-fluid" alt="{{ $relatedProduct->name }}">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $relatedProduct->name }}</h5>
                                    <p class="card-text">{{ $relatedProduct->description }}</p>
                                    <a href="{{ route('products.show', $relatedProduct->id) }}" class="btn btn-primary btn-sm">Ver Producto</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
