<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function index()
    {
        return response()->json(Provider::latest('creadoEn')->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'identificacionFiscal' => 'nullable|string|max:255',
            'correo' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:255',
            'direccion' => 'nullable|string|max:255',
            'estado' => 'required|string|max:255',
        ]);

        $record = Provider::create($data);

        return response()->json($record, 201);
    }

    public function show(Provider $provider)
    {
        return response()->json($provider, 200);
    }

    public function update(Request $request, Provider $provider)
    {
        $data = $request->validate([
            'nombre' => 'sometimes|required|string|max:255',
            'identificacionFiscal' => 'sometimes|nullable|string|max:255',
            'correo' => 'sometimes|nullable|string|max:255',
            'telefono' => 'sometimes|nullable|string|max:255',
            'direccion' => 'sometimes|nullable|string|max:255',
            'estado' => 'sometimes|required|string|max:255',
        ]);

        $provider->update($data);

        return response()->json($provider, 200);
    }

    public function destroy(Provider $provider)
    {
        $provider->delete();

        return response()->json(['message' => 'Registro eliminado'], 200);
    }
}
