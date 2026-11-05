<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
    public function index()
    {
        return response()->json(RoomType::latest('creadoEn')->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'hotelId' => 'required|integer|min:1|exists:Hotel,id',
            'nombre' => 'required|string|max:255',
            'capacidad' => 'required|integer',
            'descripcion' => 'nullable|string',
        ]);

        $record = RoomType::create($data);

        return response()->json($record, 201);
    }

    public function show(RoomType $roomType)
    {
        return response()->json($roomType, 200);
    }

    public function update(Request $request, RoomType $roomType)
    {
        $data = $request->validate([
            'hotelId' => 'sometimes|required|integer|min:1|exists:Hotel,id',
            'nombre' => 'sometimes|required|string|max:255',
            'capacidad' => 'sometimes|required|integer',
            'descripcion' => 'sometimes|nullable|string',
        ]);

        $roomType->update($data);

        return response()->json($roomType, 200);
    }

    public function destroy(RoomType $roomType)
    {
        $roomType->delete();

        return response()->json(['message' => 'Registro eliminado'], 200);
    }
}
