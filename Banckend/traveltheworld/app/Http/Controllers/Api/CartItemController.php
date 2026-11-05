<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use Illuminate\Http\Request;

class CartItemController extends Controller
{
    public function index()
    {
        return response()->json(CartItem::latest('creadoEn')->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'carritoId' => 'required|integer|min:1|exists:Cart,id',
            'productoId' => 'required|integer|min:1|exists:Product,id',
            'cantidad' => 'required|integer',
            'precioUnitario' => 'required|numeric|min:0',
        ]);

        $record = CartItem::create($data);

        return response()->json($record, 201);
    }

    public function show(CartItem $cartItem)
    {
        return response()->json($cartItem, 200);
    }

    public function update(Request $request, CartItem $cartItem)
    {
        $data = $request->validate([
            'carritoId' => 'sometimes|required|integer|min:1|exists:Cart,id',
            'productoId' => 'sometimes|required|integer|min:1|exists:Product,id',
            'cantidad' => 'sometimes|required|integer',
            'precioUnitario' => 'sometimes|required|numeric|min:0',
        ]);

        $cartItem->update($data);

        return response()->json($cartItem, 200);
    }

    public function destroy(CartItem $cartItem)
    {
        $cartItem->delete();

        return response()->json(['message' => 'Registro eliminado'], 200);
    }
}
