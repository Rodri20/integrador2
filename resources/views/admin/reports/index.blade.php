@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Análisis de Ventas</div>

                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Total de Ventas</h5>
                                        <p class="card-text">{{ $totalSales }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Total de Pedidos</h5>
                                        <p class="card-text">{{ $totalOrders }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Productos más Vendidos</h5>
                                        <ul class="list-group list-group-flush">
                                            @foreach($topProducts as $product)
                                                <li class="list-group-item">{{ $product->name }} - {{ $product->total_sales }} ventas</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Aquí se pueden agregar más análisis y gráficos -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
