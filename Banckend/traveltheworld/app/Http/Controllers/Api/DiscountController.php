<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function index()
    {
        return response()->json(Discount::latest('creadoEn')->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'tipoDescuento' => 'required|string|max:255',
            'valor' => 'required|numeric|min:0',
            'fechaInicio' => 'required|date',
            'fechaFin' => 'required|date',
            'estado' => 'required|string|max:255',
        ]);

        $record = Discount::create($data);

        return response()->json($record, 201);
    }

    public function show(Discount $discount)
    {
        return response()->json($discount, 200);
    }

    public function update(Request $request, Discount $discount)
    {
        $data = $request->validate([
            'nombre' => 'sometimes|required|string|max:255',
            'tipoDescuento' => 'sometimes|required|string|max:255',
            'valor' => 'sometimes|required|numeric|min:0',
            'fechaInicio' => 'sometimes|required|date',
            'fechaFin' => 'sometimes|required|date',
            'estado' => 'sometimes|required|string|max:255',
        ]);

        $discount->update($data);

        return response()->json($discount, 200);
    }

    public function destroy(Discount $discount)
    {
        $discount->delete();

        return response()->json(['message' => 'Registro eliminado'], 200);
    }
}
