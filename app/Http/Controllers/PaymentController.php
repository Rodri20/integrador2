<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;

class PaymentController extends Controller
{
    public function process(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            Charge::create([
                'amount' => 5000, // Monto en centavos (ejemplo: $50.00)
                'currency' => 'usd',
                'description' => 'Compra en MR. BURGUER',
                'source' => $request->stripeToken,
            ]);

            return redirect()->route('cart.index')->with('success', 'Pago realizado con éxito');
        } catch (\Exception $e) {
            return back()->with('error', 'Error en el pago: ' . $e->getMessage());
        }
    }
}
