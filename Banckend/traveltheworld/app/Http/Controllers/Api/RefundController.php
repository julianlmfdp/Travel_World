<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Refund;
use Illuminate\Http\Request;

class RefundController extends Controller
{
    public function index()
    {
        return response()->json(Refund::latest('creadoEn')->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'pagoId' => 'required|integer|min:1|exists:Payment,id',
            'monto' => 'required|numeric|min:0',
            'motivo' => 'required|string',
            'estado' => 'required|string|max:255',
            'fechaReembolso' => 'nullable|date',
        ]);

        $record = Refund::create($data);

        return response()->json($record, 201);
    }

    public function show(Refund $refund)
    {
        return response()->json($refund, 200);
    }

    public function update(Request $request, Refund $refund)
    {
        $data = $request->validate([
            'pagoId' => 'sometimes|required|integer|min:1|exists:Payment,id',
            'monto' => 'sometimes|required|numeric|min:0',
            'motivo' => 'sometimes|required|string',
            'estado' => 'sometimes|required|string|max:255',
            'fechaReembolso' => 'sometimes|nullable|date',
        ]);

        $refund->update($data);

        return response()->json($refund, 200);
    }

    public function destroy(Refund $refund)
    {
        $refund->delete();

        return response()->json(['message' => 'Registro eliminado'], 200);
    }
}
