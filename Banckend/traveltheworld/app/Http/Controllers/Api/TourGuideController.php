<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TourGuide;
use Illuminate\Http\Request;

class TourGuideController extends Controller
{
    public function index()
    {
        return response()->json(TourGuide::latest('creadoEn')->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'empleadoId' => 'required|integer|min:1|exists:Employee,id',
            'numeroLicencia' => 'nullable|string|max:255',
            'idiomas' => 'nullable|string',
            'biografia' => 'nullable|string',
        ]);

        $record = TourGuide::create($data);

        return response()->json($record, 201);
    }

    public function show(TourGuide $tourGuide)
    {
        return response()->json($tourGuide, 200);
    }

    public function update(Request $request, TourGuide $tourGuide)
    {
        $data = $request->validate([
            'empleadoId' => 'sometimes|required|integer|min:1|exists:Employee,id',
            'numeroLicencia' => 'sometimes|nullable|string|max:255',
            'idiomas' => 'sometimes|nullable|string',
            'biografia' => 'sometimes|nullable|string',
        ]);

        $tourGuide->update($data);

        return response()->json($tourGuide, 200);
    }

    public function destroy(TourGuide $tourGuide)
    {
        $tourGuide->delete();

        return response()->json(['message' => 'Registro eliminado'], 200);
    }
}
