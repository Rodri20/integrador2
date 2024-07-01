<!-- show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $product->name }}</div>

                    <div class="card-body">
                        <p><strong>Descripción:</strong> {{ $product->description }}</p>
                        <p><strong>Precio:</strong> {{ $product->price }}</p>
                        <p><strong>Stock:</strong> {{ $product->stock }}</p>
                        <p><strong>Imagen:</strong> <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="200"></p>
                        <p><strong>Categorías:</strong></p>
                        <ul>
                            @foreach($product->categories as $category)
                                <li>{{ $category->name }}</li>
                            @endforeach
                        </ul>
                        <!-- Puedes agregar más detalles del producto aquí según sea necesario -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
