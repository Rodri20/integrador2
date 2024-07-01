<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalUsers = User::count();
        $totalProducts = Product::count();
        $totalOrders = Order::count();
        $totalSales = Order::sum('total');
    
        // Obtener datos para los gráficos
        $salesData = Order::selectRaw('MONTH(created_at) as month, SUM(total) as total')
            ->groupBy('month')
            ->get()
            ->pluck('total', 'month')->toArray();
    
        $ordersData = Order::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->get()
            ->pluck('count', 'month')->toArray();
    
        return view('admin.dashboard', compact('totalUsers', 'totalProducts', 'totalOrders', 'totalSales', 'salesData', 'ordersData'));
    }
    
}    
