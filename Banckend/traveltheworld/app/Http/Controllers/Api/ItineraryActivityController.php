<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ItineraryActivity;
use Illuminate\Http\Request;

class ItineraryActivityController extends Controller
{
    public function index()
    {
        return response()->json(ItineraryActivity::latest('creadoEn')->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'itinerarioId' => 'required|integer|min:1|exists:Itinerary,id',
            'actividadTuristicaId' => 'required|integer|min:1|exists:TouristActivity,id',
            'horaInicio' => 'nullable|date_format:H:i:s',
            'horaFin' => 'nullable|date_format:H:i:s',
            'notas' => 'nullable|string',
        ]);

        $record = ItineraryActivity::create($data);

        return response()->json($record, 201);
    }

    public function show(ItineraryActivity $itineraryActivity)
    {
        return response()->json($itineraryActivity, 200);
    }

    public function update(Request $request, ItineraryActivity $itineraryActivity)
    {
        $data = $request->validate([
            'itinerarioId' => 'sometimes|required|integer|min:1|exists:Itinerary,id',
            'actividadTuristicaId' => 'sometimes|required|integer|min:1|exists:TouristActivity,id',
            'horaInicio' => 'sometimes|nullable|date_format:H:i:s',
            'horaFin' => 'sometimes|nullable|date_format:H:i:s',
            'notas' => 'sometimes|nullable|string',
        ]);

        $itineraryActivity->update($data);

        return response()->json($itineraryActivity, 200);
    }

    public function destroy(ItineraryActivity $itineraryActivity)
    {
        $itineraryActivity->delete();

        return response()->json(['message' => 'Registro eliminado'], 200);
    }
}
