<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Season;
use Illuminate\Http\Request;

class SeasonController extends Controller
{
    public function index()
    {
        return response()->json(Season::latest('creadoEn')->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'fechaInicio' => 'required|date',
            'fechaFin' => 'required|date',
            'descripcion' => 'nullable|string',
        ]);

        $record = Season::create($data);

        return response()->json($record, 201);
    }

    public function show(Season $season)
    {
        return response()->json($season, 200);
    }

    public function update(Request $request, Season $season)
    {
        $data = $request->validate([
            'nombre' => 'sometimes|required|string|max:255',
            'fechaInicio' => 'sometimes|required|date',
            'fechaFin' => 'sometimes|required|date',
            'descripcion' => 'sometimes|nullable|string',
        ]);

        $season->update($data);

        return response()->json($season, 200);
    }

    public function destroy(Season $season)
    {
        $season->delete();

        return response()->json(['message' => 'Registro eliminado'], 200);
    }
}
