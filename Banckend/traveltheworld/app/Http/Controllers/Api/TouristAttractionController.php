<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TouristAttraction;
use Illuminate\Http\Request;

class TouristAttractionController extends Controller
{
    public function index()
    {
        return response()->json(TouristAttraction::latest('creadoEn')->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'destinoId' => 'required|integer|min:1|exists:Destination,id',
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'direccion' => 'nullable|string|max:255',
            'horarioApertura' => 'nullable|string',
            'precioEntrada' => 'nullable|numeric|min:0',
        ]);

        $record = TouristAttraction::create($data);

        return response()->json($record, 201);
    }

    public function show(TouristAttraction $touristAttraction)
    {
        return response()->json($touristAttraction, 200);
    }

    public function update(Request $request, TouristAttraction $touristAttraction)
    {
        $data = $request->validate([
            'destinoId' => 'sometimes|required|integer|min:1|exists:Destination,id',
            'nombre' => 'sometimes|required|string|max:255',
            'descripcion' => 'sometimes|nullable|string',
            'direccion' => 'sometimes|nullable|string|max:255',
            'horarioApertura' => 'sometimes|nullable|string',
            'precioEntrada' => 'sometimes|nullable|numeric|min:0',
        ]);

        $touristAttraction->update($data);

        return response()->json($touristAttraction, 200);
    }

    public function destroy(TouristAttraction $touristAttraction)
    {
        $touristAttraction->delete();

        return response()->json(['message' => 'Registro eliminado'], 200);
    }
}
