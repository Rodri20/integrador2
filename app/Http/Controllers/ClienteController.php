<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class ClienteController extends Controller
{
    /**
     * Show the dashboard for the client.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {
        $user = Auth::user();
        $orders = $user->orders;

        return view('cliente.dashboard', compact('orders'));
    }
}
