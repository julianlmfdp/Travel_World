<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TripType;
use Illuminate\Http\Request;

class TripTypeController extends Controller
{
    public function index()
    {
        return response()->json(TripType::latest('creadoEn')->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        $record = TripType::create($data);

        return response()->json($record, 201);
    }

    public function show(TripType $tripType)
    {
        return response()->json($tripType, 200);
    }

    public function update(Request $request, TripType $tripType)
    {
        $data = $request->validate([
            'nombre' => 'sometimes|required|string|max:255',
            'descripcion' => 'sometimes|nullable|string',
        ]);

        $tripType->update($data);

        return response()->json($tripType, 200);
    }

    public function destroy(TripType $tripType)
    {
        $tripType->delete();

        return response()->json(['message' => 'Registro eliminado'], 200);
    }
}
