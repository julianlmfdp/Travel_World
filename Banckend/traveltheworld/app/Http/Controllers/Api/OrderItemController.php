<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    public function index()
    {
        return response()->json(OrderItem::latest('creadoEn')->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'pedidoId' => 'required|integer|min:1|exists:Order,id',
            'productoId' => 'required|integer|min:1|exists:Product,id',
            'cantidad' => 'required|integer',
            'precioUnitario' => 'required|numeric|min:0',
            'totalLinea' => 'required|numeric|min:0',
        ]);

        $record = OrderItem::create($data);

        return response()->json($record, 201);
    }

    public function show(OrderItem $orderItem)
    {
        return response()->json($orderItem, 200);
    }

    public function update(Request $request, OrderItem $orderItem)
    {
        $data = $request->validate([
            'pedidoId' => 'sometimes|required|integer|min:1|exists:Order,id',
            'productoId' => 'sometimes|required|integer|min:1|exists:Product,id',
            'cantidad' => 'sometimes|required|integer',
            'precioUnitario' => 'sometimes|required|numeric|min:0',
            'totalLinea' => 'sometimes|required|numeric|min:0',
        ]);

        $orderItem->update($data);

        return response()->json($orderItem, 200);
    }

    public function destroy(OrderItem $orderItem)
    {
        $orderItem->delete();

        return response()->json(['message' => 'Registro eliminado'], 200);
    }
}
