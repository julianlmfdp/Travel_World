<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        return response()->json(City::latest('creadoEn')->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'paisId' => 'required|integer|min:1|exists:Country,id',
            'nombre' => 'required|string|max:255',
            'region' => 'nullable|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        $record = City::create($data);

        return response()->json($record, 201);
    }

    public function show(City $city)
    {
        return response()->json($city, 200);
    }

    public function update(Request $request, City $city)
    {
        $data = $request->validate([
            'paisId' => 'sometimes|required|integer|min:1|exists:Country,id',
            'nombre' => 'sometimes|required|string|max:255',
            'region' => 'sometimes|nullable|string|max:255',
            'descripcion' => 'sometimes|nullable|string',
        ]);

        $city->update($data);

        return response()->json($city, 200);
    }

    public function destroy(City $city)
    {
        $city->delete();

        return response()->json(['message' => 'Registro eliminado'], 200);
    }
}
