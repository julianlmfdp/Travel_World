<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TripPromotion;
use Illuminate\Http\Request;

class TripPromotionController extends Controller
{
    public function index()
    {
        return response()->json(TripPromotion::latest('creadoEn')->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'promocionId' => 'required|integer|min:1|exists:Promotion,id',
            'viajeId' => 'required|integer|min:1|exists:Trip,id',
        ]);

        $record = TripPromotion::create($data);

        return response()->json($record, 201);
    }

    public function show(TripPromotion $tripPromotion)
    {
        return response()->json($tripPromotion, 200);
    }

    public function update(Request $request, TripPromotion $tripPromotion)
    {
        $data = $request->validate([
            'promocionId' => 'sometimes|required|integer|min:1|exists:Promotion,id',
            'viajeId' => 'sometimes|required|integer|min:1|exists:Trip,id',
        ]);

        $tripPromotion->update($data);

        return response()->json($tripPromotion, 200);
    }

    public function destroy(TripPromotion $tripPromotion)
    {
        $tripPromotion->delete();

        return response()->json(['message' => 'Registro eliminado'], 200);
    }
}
