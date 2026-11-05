<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Transportation;
use Illuminate\Http\Request;

class TransportationController extends Controller
{
    public function index()
    {
        return response()->json(Transportation::latest('creadoEn')->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'empresaTransporteId' => 'required|integer|min:1|exists:TransportationCompany,id',
            'vehiculoId' => 'nullable|integer|min:1|exists:Vehicle,id',
            'rutaId' => 'required|integer|min:1|exists:Route,id',
            'fechaSalida' => 'required|date',
            'fechaLlegada' => 'nullable|date',
            'precio' => 'required|numeric|min:0',
            'estado' => 'required|string|max:255',
        ]);

        $record = Transportation::create($data);

        return response()->json($record, 201);
    }

    public function show(Transportation $transportation)
    {
        return response()->json($transportation, 200);
    }

    public function update(Request $request, Transportation $transportation)
    {
        $data = $request->validate([
            'empresaTransporteId' => 'sometimes|required|integer|min:1|exists:TransportationCompany,id',
            'vehiculoId' => 'sometimes|nullable|integer|min:1|exists:Vehicle,id',
            'rutaId' => 'sometimes|required|integer|min:1|exists:Route,id',
            'fechaSalida' => 'sometimes|required|date',
            'fechaLlegada' => 'sometimes|nullable|date',
            'precio' => 'sometimes|required|numeric|min:0',
            'estado' => 'sometimes|required|string|max:255',
        ]);

        $transportation->update($data);

        return response()->json($transportation, 200);
    }

    public function destroy(Transportation $transportation)
    {
        $transportation->delete();

        return response()->json(['message' => 'Registro eliminado'], 200);
    }
}
