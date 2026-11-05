<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TripTransportation;
use Illuminate\Http\Request;

class TripTransportationController extends Controller
{
    public function index()
    {
        return response()->json(TripTransportation::latest('creadoEn')->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'viajeId' => 'required|integer|min:1|exists:Trip,id',
            'transporteId' => 'required|integer|min:1|exists:Transportation,id',
        ]);

        $record = TripTransportation::create($data);

        return response()->json($record, 201);
    }

    public function show(TripTransportation $tripTransportation)
    {
        return response()->json($tripTransportation, 200);
    }

    public function update(Request $request, TripTransportation $tripTransportation)
    {
        $data = $request->validate([
            'viajeId' => 'sometimes|required|integer|min:1|exists:Trip,id',
            'transporteId' => 'sometimes|required|integer|min:1|exists:Transportation,id',
        ]);

        $tripTransportation->update($data);

        return response()->json($tripTransportation, 200);
    }

    public function destroy(TripTransportation $tripTransportation)
    {
        $tripTransportation->delete();

        return response()->json(['message' => 'Registro eliminado'], 200);
    }
}
