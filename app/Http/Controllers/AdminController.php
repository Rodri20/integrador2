<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Contar los registros de usuarios, productos y pedidos
        $totalUsers = User::count();
        $totalProducts = Product::count();
        $totalOrders = Order::count();
        $totalSales = Order::sum('total');

        // Obtener datos de ventas agrupados por mes
        $salesData = Order::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('SUM(total) as total')
        )->groupBy('month')
        ->orderBy('month')
        ->pluck('total', 'month')
        ->toArray();

        // Obtener datos de pedidos agrupados por mes
        $ordersData = Order::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(*) as count')
        )->groupBy('month')
        ->orderBy('month')
        ->pluck('count', 'month')
        ->toArray();

        // Meses en español
        $monthNames = [
            0 => 'Enero',
            1 => 'Febrero',
            2 => 'Marzo',
            3 => 'Abril',
            4 => 'Mayo',
            5 => 'Junio',
            6 => 'Julio',
            7 => 'Agosto',
            8 => 'Septiembre',
            9 => 'Octubre',
            10 => 'Noviembre',
            11 => 'Diciembre'
        ];

        // Asegurar que todos los meses estén presentes en los datos
        $months = range(1, 1);
        $salesData = array_merge(array_fill_keys($months, 0), $salesData);
        $ordersData = array_merge(array_fill_keys($months, 0), $ordersData);

        // Ordenar los datos por mes
        ksort($salesData);
        ksort($ordersData);

        // Convertir números de mes a nombres de mes para etiquetas
        $salesLabels = array_map(function ($month) use ($monthNames) {
            return $monthNames[$month] ?? 'Desconocido'; // Maneja índices fuera de rango
        }, array_keys($salesData));
        
        $salesValues = array_values($salesData);

        $ordersLabels = array_map(function ($month) use ($monthNames) {
            return $monthNames[$month] ?? 'Desconocido'; // Maneja índices fuera de rango
        }, array_keys($ordersData));
        
        $ordersValues = array_values($ordersData);

        // Retornar la vista con los datos
        return view('admin.dashboard', compact('totalUsers', 'totalProducts', 'totalOrders', 'totalSales', 'salesLabels', 'salesValues', 'ordersLabels', 'ordersValues'));
    }
}
