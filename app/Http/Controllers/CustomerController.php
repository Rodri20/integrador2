<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = User::where('rol', 'cliente')->get();
        return view('admin.customers.index', compact('customers'));
    }

    public function show(User $customer)
    {
        return view('admin.customers.show', compact('customer'));
    }

    public function destroy(User $customer)
    {
        $customer->delete();
        return redirect()->route('admin.customers.index')->with('success', 'Cliente eliminado con éxito');
    }
}
