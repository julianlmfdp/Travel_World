<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        return response()->json(Payment::latest('creadoEn')->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'facturaId' => 'required|integer|min:1|exists:Invoice,id',
            'monto' => 'required|numeric|min:0',
            'metodoPago' => 'required|string|max:255',
            'estado' => 'required|string|max:255',
            'fechaPago' => 'nullable|date',
            'referenciaTransaccion' => 'nullable|string|max:255',
        ]);

        $record = Payment::create($data);

        return response()->json($record, 201);
    }

    public function show(Payment $payment)
    {
        return response()->json($payment, 200);
    }

    public function update(Request $request, Payment $payment)
    {
        $data = $request->validate([
            'facturaId' => 'sometimes|required|integer|min:1|exists:Invoice,id',
            'monto' => 'sometimes|required|numeric|min:0',
            'metodoPago' => 'sometimes|required|string|max:255',
            'estado' => 'sometimes|required|string|max:255',
            'fechaPago' => 'sometimes|nullable|date',
            'referenciaTransaccion' => 'sometimes|nullable|string|max:255',
        ]);

        $payment->update($data);

        return response()->json($payment, 200);
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();

        return response()->json(['message' => 'Registro eliminado'], 200);
    }
}
