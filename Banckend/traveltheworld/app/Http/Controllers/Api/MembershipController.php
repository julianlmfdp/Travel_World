<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Membership;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    public function index()
    {
        return response()->json(Membership::latest('creadoEn')->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'duracionDias' => 'required|integer',
            'beneficios' => 'nullable|string',
            'estado' => 'required|string|max:255',
        ]);

        $record = Membership::create($data);

        return response()->json($record, 201);
    }

    public function show(Membership $membership)
    {
        return response()->json($membership, 200);
    }

    public function update(Request $request, Membership $membership)
    {
        $data = $request->validate([
            'nombre' => 'sometimes|required|string|max:255',
            'descripcion' => 'sometimes|nullable|string',
            'precio' => 'sometimes|required|numeric|min:0',
            'duracionDias' => 'sometimes|required|integer',
            'beneficios' => 'sometimes|nullable|string',
            'estado' => 'sometimes|required|string|max:255',
        ]);

        $membership->update($data);

        return response()->json($membership, 200);
    }

    public function destroy(Membership $membership)
    {
        $membership->delete();

        return response()->json(['message' => 'Registro eliminado'], 200);
    }
}
