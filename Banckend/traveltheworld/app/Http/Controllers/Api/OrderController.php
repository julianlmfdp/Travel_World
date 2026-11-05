<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return response()->json(Order::latest('creadoEn')->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'clienteId' => 'required|integer|min:1|exists:Customer,id',
            'numeroPedido' => 'required|string|max:255',
            'estado' => 'required|string|max:255',
            'subtotal' => 'required|numeric|min:0',
            'costoEnvio' => 'required|numeric|min:0',
            'impuesto' => 'required|numeric|min:0',
            'total' => 'required|numeric|min:0',
            'fechaPedido' => 'required|date',
        ]);

        $record = Order::create($data);

        return response()->json($record, 201);
    }

    public function show(Order $order)
    {
        return response()->json($order, 200);
    }

    public function update(Request $request, Order $order)
    {
        $data = $request->validate([
            'clienteId' => 'sometimes|required|integer|min:1|exists:Customer,id',
            'numeroPedido' => 'sometimes|required|string|max:255',
            'estado' => 'sometimes|required|string|max:255',
            'subtotal' => 'sometimes|required|numeric|min:0',
            'costoEnvio' => 'sometimes|required|numeric|min:0',
            'impuesto' => 'sometimes|required|numeric|min:0',
            'total' => 'sometimes|required|numeric|min:0',
            'fechaPedido' => 'sometimes|required|date',
        ]);

        $order->update($data);

        return response()->json($order, 200);
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return response()->json(['message' => 'Registro eliminado'], 200);
    }
}
