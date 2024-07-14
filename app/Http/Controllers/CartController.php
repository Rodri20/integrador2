<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Stripe\Stripe;
use Stripe\Charge;

class CartController extends Controller
{
    /**
     * Muestra el contenido actual del carrito.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $cart = session()->get('cart');
        return view('cart.index', compact('cart'));
    }

    /**
     * Agrega un producto al carrito.
     *
     * @param  int  $id  ID del producto a agregar
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart');
    
        $quantity = $request->input('quantity', 1); // Obtener la cantidad del formulario, por defecto 1 si no se especifica
    
        // Si el carrito está vacío, crea uno nuevo; de lo contrario, usa el existente
        if (!$cart) {
            $cart = [
                $id => [
                    'name' => $product->name,
                    'quantity' => $quantity,
                    'price' => $product->price,
                    'image' => $product->image,
                ]
            ];
        } else {
            // Si el producto ya está en el carrito, incrementa la cantidad o actualiza
            if (isset($cart[$id])) {
                $cart[$id]['quantity'] += $quantity;
            } else {
                // Si no está en el carrito, agrega el producto con la cantidad especificada
                $cart[$id] = [
                    'name' => $product->name,
                    'quantity' => $quantity,
                    'price' => $product->price,
                    'image' => $product->image,
                ];
            }
        }
    
        session()->put('cart', $cart);
    
        return redirect()->route('cart.index')->with('success', 'Producto añadido al carrito correctamente');
    }
    
    /**
     * Actualiza la cantidad de un producto en el carrito.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Carrito actualizado exitosamente');
        }
        return redirect()->route('cart.index');
    }

    /**
     * Elimina un producto del carrito.
     *
     * @param  int  $id  ID del producto a eliminar
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remove($id)
    {
        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Producto eliminado del carrito');
    }

    /**
     * Elimina todos los productos del carrito.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function clear()
    {
        session()->forget('cart');
        return redirect()->route('cart.index')->with('success', 'Carrito vaciado');
    }

    public function checkout()
    {
        $cart = session()->get('cart');
        if (!$cart) {
            return redirect()->route('pages.menu')->with('error', 'El carrito está vacío.');
        }

        $total = collect($cart)->sum(function($item) {
            return $item['price'] * $item['quantity'];
        });

        return view('cart.checkout', compact('cart', 'total'));
    }

    public function processCheckout(Request $request)
    {
        $cart = session()->get('cart');
        if (!$cart) {
            return redirect()->route('pages.menu')->with('error', 'El carrito está vacío.');
        }

        $total = collect($cart)->sum(function($item) {
            return $item['price'] * $item['quantity'];
        });

        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            $charge = Charge::create([
                'amount' => $total * 100, // Stripe charges in cents
                'currency' => 'usd',
                'source' => $request->stripeToken,
                'description' => 'Pago de carrito de compras',
            ]);

            session()->forget('cart');

            return redirect()->route('pages.menu')->with('success', 'Pago realizado con éxito.');
        } catch (\Exception $e) {
            return back()->with('error', 'Hubo un error al procesar tu pago. Por favor, intenta de nuevo.');
        }
    }
}
