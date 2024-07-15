<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Mail\OrderConfirmation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Stripe\Stripe;
use Stripe\Charge;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PaymentController extends Controller
{
    public function process(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            // Crear o encontrar el usuario basado en el email
            $user = User::firstOrCreate(
                ['email' => $request->email],
                ['name' => $request->name, 'password' => bcrypt(Str::random(10))]
            );

            // Calcular el total del pedido desde el carrito de la sesión
            $cart = session('cart', []);
            $total = collect($cart)->sum(function ($item) {
                return $item['price'] * $item['quantity'];
            });

            if ($total < 1) {
                return back()->with('error', 'El total del pedido debe ser mayor o igual a $1.');
            }

            // Crear el pedido
            $order = new Order();
            $order->user_id = $user->id;
            $order->status = 'received'; // Puedes ajustar el estado por defecto si es necesario
            $order->total = $total;
            $order->tracking_code = Str::random(10);
            $order->save();

            // Asociar productos al pedido
            foreach ($cart as $id => $details) {
                try {
                    $product = Product::findOrFail($id);
                    $order->products()->attach($product->id, [
                        'quantity' => $details['quantity'],
                        'price' => $details['price']
                    ]);
                } catch (ModelNotFoundException $e) {
                    return back()->with('error', 'Producto no encontrado: ' . $id);
                }
            }

            // Cobrar el pago
            Charge::create([
                'amount' => $total * 100, // Monto en centavos
                'currency' => 'usd',
                'description' => 'Compra en MR. BURGUER',
                'source' => $request->stripeToken,
            ]);

            // Enviar correo de confirmación
            Mail::to($user->email)->send(new OrderConfirmation($order));

            // Restablecer el carrito
            session()->forget('cart');

            return redirect()->route('order.confirmation', ['order' => $order->id])->with('success', 'Pago realizado con éxito');
        } catch (\Exception $e) {
            return back()->with('error', 'Error en el pago: ' . $e->getMessage());
        }
    }
}
