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
        // Obtener el usuario autenticado
        $user = Auth::user();

        // Obtener los pedidos del usuario autenticado
        $orders = Order::where('user_id', $user->id)->get();

        // Pasar los pedidos a la vista
        return view('cliente.dashboard', compact('orders'));
    }
}
