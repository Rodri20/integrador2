<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    public function index()
    {
        $promotions = Promotion::all();
        return view('admin.promotions.index', compact('promotions'));
    }

    public function create()
    {
        return view('admin.promotions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|string|unique:promotions|max:255',
            'discount_amount' => 'required|numeric|min:0',
            'valid_from' => 'required|date',
            'valid_until' => 'required|date|after_or_equal:valid_from',
        ]);

        Promotion::create($request->all());

        return redirect()->route('admin.promotions.index')->with('success', 'Promoción creada con éxito');
    }

    public function edit(Promotion $promotion)
    {
        return view('admin.promotions.edit', compact('promotion'));
    }

    public function update(Request $request, Promotion $promotion)
    {
        $request->validate([
            'code' => 'required|string|max:255|unique:promotions,code,'.$promotion->id,
            'discount_amount' => 'required|numeric|min:0',
            'valid_from' => 'required|date',
            'valid_until' => 'required|date|after_or_equal:valid_from',
        ]);

        $promotion->update($request->all());

        return redirect()->route('admin.promotions.index')->with('success', 'Promoción actualizada con éxito');
    }

    public function destroy(Promotion $promotion)
    {
        $promotion->delete();
        return redirect()->route('admin.promotions.index')->with('success', 'Promoción eliminada con éxito');
    }
}
