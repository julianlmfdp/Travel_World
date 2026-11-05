<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\HotelService;
use Illuminate\Http\Request;

class HotelServiceController extends Controller
{
    public function index()
    {
        return response()->json(HotelService::latest('creadoEn')->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'hotelId' => 'required|integer|min:1|exists:Hotel,id',
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        $record = HotelService::create($data);

        return response()->json($record, 201);
    }

    public function show(HotelService $hotelService)
    {
        return response()->json($hotelService, 200);
    }

    public function update(Request $request, HotelService $hotelService)
    {
        $data = $request->validate([
            'hotelId' => 'sometimes|required|integer|min:1|exists:Hotel,id',
            'nombre' => 'sometimes|required|string|max:255',
            'descripcion' => 'sometimes|nullable|string',
        ]);

        $hotelService->update($data);

        return response()->json($hotelService, 200);
    }

    public function destroy(HotelService $hotelService)
    {
        $hotelService->delete();

        return response()->json(['message' => 'Registro eliminado'], 200);
    }
}
