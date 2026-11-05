<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PaymentReceipt;
use Illuminate\Http\Request;

class PaymentReceiptController extends Controller
{
    public function index()
    {
        return response()->json(PaymentReceipt::latest('creadoEn')->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'pagoId' => 'required|integer|min:1|exists:Payment,id',
            'numeroComprobante' => 'required|string|max:255',
            'urlArchivo' => 'nullable|string|max:255',
            'fechaEmision' => 'required|date',
        ]);

        $record = PaymentReceipt::create($data);

        return response()->json($record, 201);
    }

    public function show(PaymentReceipt $paymentReceipt)
    {
        return response()->json($paymentReceipt, 200);
    }

    public function update(Request $request, PaymentReceipt $paymentReceipt)
    {
        $data = $request->validate([
            'pagoId' => 'sometimes|required|integer|min:1|exists:Payment,id',
            'numeroComprobante' => 'sometimes|required|string|max:255',
            'urlArchivo' => 'sometimes|nullable|string|max:255',
            'fechaEmision' => 'sometimes|required|date',
        ]);

        $paymentReceipt->update($data);

        return response()->json($paymentReceipt, 200);
    }

    public function destroy(PaymentReceipt $paymentReceipt)
    {
        $paymentReceipt->delete();

        return response()->json(['message' => 'Registro eliminado'], 200);
    }
}
