<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        return response()->json(Room::latest('creadoEn')->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'hotelId' => 'required|integer|min:1|exists:Hotel,id',
            'tipoHabitacionId' => 'required|integer|min:1|exists:RoomType,id',
            'numeroHabitacion' => 'required|string|max:255',
            'precioPorNoche' => 'required|numeric|min:0',
            'estado' => 'required|string|max:255',
        ]);

        $record = Room::create($data);

        return response()->json($record, 201);
    }

    public function show(Room $room)
    {
        return response()->json($room, 200);
    }

    public function update(Request $request, Room $room)
    {
        $data = $request->validate([
            'hotelId' => 'sometimes|required|integer|min:1|exists:Hotel,id',
            'tipoHabitacionId' => 'sometimes|required|integer|min:1|exists:RoomType,id',
            'numeroHabitacion' => 'sometimes|required|string|max:255',
            'precioPorNoche' => 'sometimes|required|numeric|min:0',
            'estado' => 'sometimes|required|string|max:255',
        ]);

        $room->update($data);

        return response()->json($room, 200);
    }

    public function destroy(Room $room)
    {
        $room->delete();

        return response()->json(['message' => 'Registro eliminado'], 200);
    }
}
