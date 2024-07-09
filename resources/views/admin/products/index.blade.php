@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Gestión de Productos</div>

                    <div class="card-body">
                        <a href="{{ route('admin.products.create') }}" class="btn btn-primary mb-3">Agregar Producto</a>
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mb-3">Volver al Dashboard</a>

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Precio</th>
                                    <th>Stock</th>
                                    <th>Imagen</th>
                                    <th>Categorías</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->stock }}</td>
                                        <td>
                                            @if($product->image)
                                                <img src="{{ asset('storage/' . $product->image) }}" width="50" height="50">
                                            @else
                                                Sin imagen
                                            @endif
                                        </td>
                                        <td>
                                            <!-- Aquí mostramos las categorías asociadas a este producto -->
                                            @foreach($product->categories as $category)
                                                <span class="badge badge-primary">{{ $category->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-warning btn-sm">Editar</a>
                                            <form action="{{ route('admin.products.destroy', $product) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                            </form>
                                            <a href="{{ route('admin.products.show', $product) }}" class="btn btn-info btn-sm">Ver</a> <!-- Agregado -->
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
