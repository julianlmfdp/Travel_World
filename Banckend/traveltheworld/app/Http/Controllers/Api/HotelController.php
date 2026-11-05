<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index()
    {
        return response()->json(Hotel::latest('creadoEn')->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'destinoId' => 'required|integer|min:1|exists:Destination,id',
            'proveedorId' => 'nullable|integer|min:1|exists:Provider,id',
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'direccion' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:255',
            'estado' => 'required|string|max:255',
        ]);

        $record = Hotel::create($data);

        return response()->json($record, 201);
    }

    public function show(Hotel $hotel)
    {
        return response()->json($hotel, 200);
    }

    public function update(Request $request, Hotel $hotel)
    {
        $data = $request->validate([
            'destinoId' => 'sometimes|required|integer|min:1|exists:Destination,id',
            'proveedorId' => 'sometimes|nullable|integer|min:1|exists:Provider,id',
            'nombre' => 'sometimes|required|string|max:255',
            'descripcion' => 'sometimes|nullable|string',
            'direccion' => 'sometimes|nullable|string|max:255',
            'telefono' => 'sometimes|nullable|string|max:255',
            'estado' => 'sometimes|required|string|max:255',
        ]);

        $hotel->update($data);

        return response()->json($hotel, 200);
    }

    public function destroy(Hotel $hotel)
    {
        $hotel->delete();

        return response()->json(['message' => 'Registro eliminado'], 200);
    }
}
