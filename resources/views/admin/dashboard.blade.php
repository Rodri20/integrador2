@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <!-- Row 1: Estadísticas principales -->
    <div class="card-header bg-transparent">
        <h3 class="text-center">Panel de Administración</h3>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card bg-primary text-white shadow">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Total de Usuarios</div>
                            <div class="h5 mb-0 font-weight-bold text-white">{{ $totalUsers }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card bg-success text-white shadow">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Total de Productos</div>
                            <div class="h5 mb-0 font-weight-bold text-white">{{ $totalProducts }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-boxes fa-2x text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card bg-warning text-white shadow">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Total de Pedidos</div>
                            <div class="h5 mb-0 font-weight-bold text-white">{{ $totalOrders }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-shopping-cart fa-2x text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card bg-danger text-white shadow">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Total de Ventas</div>
                            <div class="h5 mb-0 font-weight-bold text-white">{{ $totalSales }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin Row 1 -->

    <!-- Row 2: Gráficos de Ventas y Pedidos -->
    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Gráfico de Ventas</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="salesChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Gráfico de Pedidos</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="ordersChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin Row 2 -->

    <!-- Row 3: Accesos Rápidos -->
    <div class="row">
        <div class="col-lg-3 col-md-6 mb-4">
            <a href="{{ route('admin.products.index') }}" class="btn btn-outline-primary btn-block">Gestionar Productos</a>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
            <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-success btn-block">Gestionar Pedidos</a>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
            <a href="{{ route('admin.customers.index') }}" class="btn btn-outline-warning btn-block">Gestionar Usuarios</a>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
            <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-danger btn-block">Gestionar Categorías</a>
        </div>
    </div>
    <!-- Fin Row 3 -->

</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Configuración del gráfico de ventas
    var salesCtx = document.getElementById('salesChart').getContext('2d');
    var salesChart = new Chart(salesCtx, {
        type: 'line',
        data: {
            labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            datasets: [{
                label: 'Ventas',
                data: {!! json_encode(array_values($salesData)) !!},
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Configuración del gráfico de pedidos
    var ordersCtx = document.getElementById('ordersChart').getContext('2d');
    var ordersChart = new Chart(ordersCtx, {
        type: 'bar',
        data: {
            labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            datasets: [{
                label: 'Pedidos',
                data: {!! json_encode(array_values($ordersData)) !!},
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});
</script>
@endsection
