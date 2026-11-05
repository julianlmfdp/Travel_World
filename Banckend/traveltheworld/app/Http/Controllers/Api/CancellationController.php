<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cancellation;
use Illuminate\Http\Request;

class CancellationController extends Controller
{
    public function index()
    {
        return response()->json(Cancellation::latest('creadoEn')->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'reservaId' => 'required|integer|min:1|exists:Reservation,id',
            'motivo' => 'required|string',
            'fechaSolicitud' => 'required|date',
            'estado' => 'required|string|max:255',
            'cargoCancelacion' => 'required|numeric|min:0',
        ]);

        $record = Cancellation::create($data);

        return response()->json($record, 201);
    }

    public function show(Cancellation $cancellation)
    {
        return response()->json($cancellation, 200);
    }

    public function update(Request $request, Cancellation $cancellation)
    {
        $data = $request->validate([
            'reservaId' => 'sometimes|required|integer|min:1|exists:Reservation,id',
            'motivo' => 'sometimes|required|string',
            'fechaSolicitud' => 'sometimes|required|date',
            'estado' => 'sometimes|required|string|max:255',
            'cargoCancelacion' => 'sometimes|required|numeric|min:0',
        ]);

        $cancellation->update($data);

        return response()->json($cancellation, 200);
    }

    public function destroy(Cancellation $cancellation)
    {
        $cancellation->delete();

        return response()->json(['message' => 'Registro eliminado'], 200);
    }
}
