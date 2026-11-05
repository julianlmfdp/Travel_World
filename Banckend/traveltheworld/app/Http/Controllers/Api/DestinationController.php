<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    public function index()
    {
        return response()->json(Destination::latest('creadoEn')->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'ciudadId' => 'required|integer|min:1|exists:City,id',
            'nombre' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'direccion' => 'nullable|string|max:255',
            'latitud' => 'nullable|numeric|min:0',
            'longitud' => 'nullable|numeric|min:0',
            'imagenPortada' => 'nullable|string|max:255',
            'estado' => 'required|string|max:255',
        ]);

        $record = Destination::create($data);

        return response()->json($record, 201);
    }

    public function show(Destination $destination)
    {
        return response()->json($destination, 200);
    }

    public function update(Request $request, Destination $destination)
    {
        $data = $request->validate([
            'ciudadId' => 'sometimes|required|integer|min:1|exists:City,id',
            'nombre' => 'sometimes|required|string|max:255',
            'slug' => 'sometimes|required|string|max:255',
            'descripcion' => 'sometimes|nullable|string',
            'direccion' => 'sometimes|nullable|string|max:255',
            'latitud' => 'sometimes|nullable|numeric|min:0',
            'longitud' => 'sometimes|nullable|numeric|min:0',
            'imagenPortada' => 'sometimes|nullable|string|max:255',
            'estado' => 'sometimes|required|string|max:255',
        ]);

        $destination->update($data);

        return response()->json($destination, 200);
    }

    public function destroy(Destination $destination)
    {
        $destination->delete();

        return response()->json(['message' => 'Registro eliminado'], 200);
    }
}
