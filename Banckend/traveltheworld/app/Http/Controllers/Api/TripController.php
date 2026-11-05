<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Trip;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public function index()
    {
        return response()->json(Trip::latest('creadoEn')->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'destinoId' => 'required|integer|min:1|exists:Destination,id',
            'tipoViajeId' => 'required|integer|min:1|exists:TripType,id',
            'temporadaId' => 'nullable|integer|min:1|exists:Season,id',
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'fechaInicio' => 'required|date',
            'fechaFin' => 'required|date',
            'precio' => 'required|numeric|min:0',
            'capacidad' => 'required|integer',
            'estado' => 'required|string|max:255',
        ]);

        $record = Trip::create($data);

        return response()->json($record, 201);
    }

    public function show(Trip $trip)
    {
        return response()->json($trip, 200);
    }

    public function update(Request $request, Trip $trip)
    {
        $data = $request->validate([
            'destinoId' => 'sometimes|required|integer|min:1|exists:Destination,id',
            'tipoViajeId' => 'sometimes|required|integer|min:1|exists:TripType,id',
            'temporadaId' => 'sometimes|nullable|integer|min:1|exists:Season,id',
            'titulo' => 'sometimes|required|string|max:255',
            'descripcion' => 'sometimes|nullable|string',
            'fechaInicio' => 'sometimes|required|date',
            'fechaFin' => 'sometimes|required|date',
            'precio' => 'sometimes|required|numeric|min:0',
            'capacidad' => 'sometimes|required|integer',
            'estado' => 'sometimes|required|string|max:255',
        ]);

        $trip->update($data);

        return response()->json($trip, 200);
    }

    public function destroy(Trip $trip)
    {
        $trip->delete();

        return response()->json(['message' => 'Registro eliminado'], 200);
    }
}
