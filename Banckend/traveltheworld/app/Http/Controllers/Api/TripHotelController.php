<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TripHotel;
use Illuminate\Http\Request;

class TripHotelController extends Controller
{
    public function index()
    {
        return response()->json(TripHotel::latest('creadoEn')->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'viajeId' => 'required|integer|min:1|exists:Trip,id',
            'hotelId' => 'required|integer|min:1|exists:Hotel,id',
            'tipoHabitacionId' => 'nullable|integer|min:1|exists:RoomType,id',
            'fechaEntrada' => 'required|date',
            'fechaSalida' => 'required|date',
            'precio' => 'required|numeric|min:0',
        ]);

        $record = TripHotel::create($data);

        return response()->json($record, 201);
    }

    public function show(TripHotel $tripHotel)
    {
        return response()->json($tripHotel, 200);
    }

    public function update(Request $request, TripHotel $tripHotel)
    {
        $data = $request->validate([
            'viajeId' => 'sometimes|required|integer|min:1|exists:Trip,id',
            'hotelId' => 'sometimes|required|integer|min:1|exists:Hotel,id',
            'tipoHabitacionId' => 'sometimes|nullable|integer|min:1|exists:RoomType,id',
            'fechaEntrada' => 'sometimes|required|date',
            'fechaSalida' => 'sometimes|required|date',
            'precio' => 'sometimes|required|numeric|min:0',
        ]);

        $tripHotel->update($data);

        return response()->json($tripHotel, 200);
    }

    public function destroy(TripHotel $tripHotel)
    {
        $tripHotel->delete();

        return response()->json(['message' => 'Registro eliminado'], 200);
    }
}
