<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TouristActivity;
use Illuminate\Http\Request;

class TouristActivityController extends Controller
{
    public function index()
    {
        return response()->json(TouristActivity::latest('creadoEn')->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'destinoId' => 'required|integer|min:1|exists:Destination,id',
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'duracionMinutos' => 'nullable|integer',
            'precio' => 'required|numeric|min:0',
            'ubicacion' => 'nullable|string|max:255',
            'estado' => 'required|string|max:255',
        ]);

        $record = TouristActivity::create($data);

        return response()->json($record, 201);
    }

    public function show(TouristActivity $touristActivity)
    {
        return response()->json($touristActivity, 200);
    }

    public function update(Request $request, TouristActivity $touristActivity)
    {
        $data = $request->validate([
            'destinoId' => 'sometimes|required|integer|min:1|exists:Destination,id',
            'nombre' => 'sometimes|required|string|max:255',
            'descripcion' => 'sometimes|nullable|string',
            'duracionMinutos' => 'sometimes|nullable|integer',
            'precio' => 'sometimes|required|numeric|min:0',
            'ubicacion' => 'sometimes|nullable|string|max:255',
            'estado' => 'sometimes|required|string|max:255',
        ]);

        $touristActivity->update($data);

        return response()->json($touristActivity, 200);
    }

    public function destroy(TouristActivity $touristActivity)
    {
        $touristActivity->delete();

        return response()->json(['message' => 'Registro eliminado'], 200);
    }
}
