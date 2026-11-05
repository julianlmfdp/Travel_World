<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return response()->json(Cart::latest('creadoEn')->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'clienteId' => 'required|integer|min:1|exists:Customer,id',
            'estado' => 'required|string|max:255',
        ]);

        $record = Cart::create($data);

        return response()->json($record, 201);
    }

    public function show(Cart $cart)
    {
        return response()->json($cart, 200);
    }

    public function update(Request $request, Cart $cart)
    {
        $data = $request->validate([
            'clienteId' => 'sometimes|required|integer|min:1|exists:Customer,id',
            'estado' => 'sometimes|required|string|max:255',
        ]);

        $cart->update($data);

        return response()->json($cart, 200);
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();

        return response()->json(['message' => 'Registro eliminado'], 200);
    }
}
