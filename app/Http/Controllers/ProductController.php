<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('categories')->get();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all(); // Obtener todas las categorías
        return view('admin.products.create', compact('categories'));
    }
    
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }
    public function showCliente(Product $product)
    {
        $relatedProducts = Product::where('id', '!=', $product->id)->inRandomOrder()->take(4)->get();
        return view('products.show', compact('product', 'relatedProducts'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'categories' => 'required|array',
        ]);

        $product = new Product($validatedData);
        
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('product_images', 'public');
            $product->image = $imagePath;
        }

        $product->save();

        $product->categories()->attach($request->categories);

        return redirect()->route('admin.products.index')->with('success', 'Producto creado con éxito');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'categories' => 'required|array',
        ]);

        $product->update($validatedData);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('product_images', 'public');
            $product->image = $imagePath;
        }

        $product->categories()->sync($request->categories);

        return redirect()->route('admin.products.index')->with('success', 'Producto actualizado con éxito');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Producto eliminado con éxito');
    }

    public function menu()
    {
        $products = Product::all(); // Obtener todos los productos
        return view('pages.menu', compact('products'));
    }

    public function tablaInicio()
    {
        $products = Product::all(); // Obtener todos los productos
        return view('welcome', compact('products'));
    }
    

}
