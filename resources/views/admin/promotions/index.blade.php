@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Gestión de Promociones</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <a href="{{ route('admin.promotions.create') }}" class="btn btn-primary mb-3">Crear Nueva Promoción</a>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Código</th>
                                    <th>Descuento</th>
                                    <th>Válido Desde</th>
                                    <th>Válido Hasta</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($promotions as $promotion)
                                    <tr>
                                        <td>{{ $promotion->id }}</td>
                                        <td>{{ $promotion->code }}</td>
                                        <td>{{ $promotion->discount_amount }}</td>
                                        <td>{{ $promotion->valid_from }}</td>
                                        <td>{{ $promotion->valid_until }}</td>
                                        <td>
                                            <a href="{{ route('admin.promotions.edit', $promotion) }}" class="btn btn-warning btn-sm">Editar</a>
                                            <form action="{{ route('admin.promotions.destroy', $promotion) }}" method="POST" style="display:inline;">
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
