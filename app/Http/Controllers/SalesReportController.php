<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SalesReportController extends Controller
{
    public function index()
    {
        $totalSales = Order::sum('total');
        $totalOrders = Order::count();
        $topProducts = Order::select('product_id', DB::raw('count(*) as total_sales'))
                            ->groupBy('product_id')
                            ->orderBy('total_sales', 'desc')
                            ->take(5)
                            ->get();
        
        return view('admin.reports.index', compact('totalSales', 'totalOrders', 'topProducts'));
    }
}
