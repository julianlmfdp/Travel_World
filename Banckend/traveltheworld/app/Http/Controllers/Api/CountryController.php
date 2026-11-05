<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        return response()->json(Country::latest('creadoEn')->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'codigoIso' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        $record = Country::create($data);

        return response()->json($record, 201);
    }

    public function show(Country $country)
    {
        return response()->json($country, 200);
    }

    public function update(Request $request, Country $country)
    {
        $data = $request->validate([
            'nombre' => 'sometimes|required|string|max:255',
            'codigoIso' => 'sometimes|required|string|max:255',
            'descripcion' => 'sometimes|nullable|string',
        ]);

        $country->update($data);

        return response()->json($country, 200);
    }

    public function destroy(Country $country)
    {
        $country->delete();

        return response()->json(['message' => 'Registro eliminado'], 200);
    }
}
