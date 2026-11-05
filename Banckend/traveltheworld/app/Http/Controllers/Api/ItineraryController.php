<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Itinerary;
use Illuminate\Http\Request;

class ItineraryController extends Controller
{
    public function index()
    {
        return response()->json(Itinerary::latest('creadoEn')->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'viajeId' => 'required|integer|min:1|exists:Trip,id',
            'numeroDia' => 'required|integer',
            'titulo' => 'nullable|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        $record = Itinerary::create($data);

        return response()->json($record, 201);
    }

    public function show(Itinerary $itinerary)
    {
        return response()->json($itinerary, 200);
    }

    public function update(Request $request, Itinerary $itinerary)
    {
        $data = $request->validate([
            'viajeId' => 'sometimes|required|integer|min:1|exists:Trip,id',
            'numeroDia' => 'sometimes|required|integer',
            'titulo' => 'sometimes|nullable|string|max:255',
            'descripcion' => 'sometimes|nullable|string',
        ]);

        $itinerary->update($data);

        return response()->json($itinerary, 200);
    }

    public function destroy(Itinerary $itinerary)
    {
        $itinerary->delete();

        return response()->json(['message' => 'Registro eliminado'], 200);
    }
}
