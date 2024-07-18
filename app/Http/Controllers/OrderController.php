<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        return view('admin.orders.show', compact('order'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|string|max:255',
        ]);

        $order->status = $request->status;
        $order->save();

        return redirect()->route('admin.orders.index')->with('success', 'Estado del pedido actualizado con éxito');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('admin.orders.index')->with('success', 'Pedido eliminado con éxito');
    }

    public function confirmation(Order $order)
    {
        return view('orders.confirmation', compact('order'));
    }

    public function dashboard()
    {
        $orders = Order::where('user_id', auth()->id())->get(); // Asegúrate de que esto devuelve una colección.
        return view('cliente.dashboard', ['orders' => $orders]);
    }

    // Método para buscar un pedido por código
    public function search(Request $request)
    {
        $request->validate([
            'order_code' => 'required|string',
        ]);

        $order = auth()->user()->orders()->where('tracking_code', $request->order_code)->first();

        if ($order) {
            return view('cliente.order_detail', compact('order'));
        } else {
            return redirect()->route('cliente.dashboard')->with('error', 'Pedido no encontrado');
        }
    }

    public function detalleCli($id)
    {
        $order = Order::with(['orderItems.product'])->find($id);
    
        if (!$order) {
            return redirect()->route('cliente.dashboard')->with('error', 'Pedido no encontrado.');
        }
    

    
        return view('cliente.order_detail', compact('order'));
    }
    
    
    
    
}
