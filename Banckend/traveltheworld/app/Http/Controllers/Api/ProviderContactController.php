<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProviderContact;
use Illuminate\Http\Request;

class ProviderContactController extends Controller
{
    public function index()
    {
        return response()->json(ProviderContact::latest('creadoEn')->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'proveedorId' => 'required|integer|min:1|exists:Provider,id',
            'nombre' => 'required|string|max:255',
            'cargo' => 'nullable|string|max:255',
            'correo' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:255',
        ]);

        $record = ProviderContact::create($data);

        return response()->json($record, 201);
    }

    public function show(ProviderContact $providerContact)
    {
        return response()->json($providerContact, 200);
    }

    public function update(Request $request, ProviderContact $providerContact)
    {
        $data = $request->validate([
            'proveedorId' => 'sometimes|required|integer|min:1|exists:Provider,id',
            'nombre' => 'sometimes|required|string|max:255',
            'cargo' => 'sometimes|nullable|string|max:255',
            'correo' => 'sometimes|nullable|string|max:255',
            'telefono' => 'sometimes|nullable|string|max:255',
        ]);

        $providerContact->update($data);

        return response()->json($providerContact, 200);
    }

    public function destroy(ProviderContact $providerContact)
    {
        $providerContact->delete();

        return response()->json(['message' => 'Registro eliminado'], 200);
    }
}
