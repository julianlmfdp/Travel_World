<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        return response()->json(Invoice::latest('creadoEn')->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'reservaId' => 'required|integer|min:1|exists:Reservation,id',
            'numeroFactura' => 'required|string|max:255',
            'fechaEmision' => 'required|date',
            'subtotal' => 'required|numeric|min:0',
            'impuesto' => 'required|numeric|min:0',
            'total' => 'required|numeric|min:0',
            'estado' => 'required|string|max:255',
        ]);

        $record = Invoice::create($data);

        return response()->json($record, 201);
    }

    public function show(Invoice $invoice)
    {
        return response()->json($invoice, 200);
    }

    public function update(Request $request, Invoice $invoice)
    {
        $data = $request->validate([
            'reservaId' => 'sometimes|required|integer|min:1|exists:Reservation,id',
            'numeroFactura' => 'sometimes|required|string|max:255',
            'fechaEmision' => 'sometimes|required|date',
            'subtotal' => 'sometimes|required|numeric|min:0',
            'impuesto' => 'sometimes|required|numeric|min:0',
            'total' => 'sometimes|required|numeric|min:0',
            'estado' => 'sometimes|required|string|max:255',
        ]);

        $invoice->update($data);

        return response()->json($invoice, 200);
    }

    public function destroy(Invoice $invoice)
    {
        $invoice->delete();

        return response()->json(['message' => 'Registro eliminado'], 200);
    }
}
