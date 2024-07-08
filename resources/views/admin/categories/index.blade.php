<!-- resources/views/admin/categories/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Listado de Categorías</div>

                    <div class="card-body">
                        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary mb-3">Crear Nueva Categoría</a>
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mb-3">Volver al Dashboard</a>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-warning btn-sm">Editar</a>
                                            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                            </form>
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
