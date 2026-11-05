<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TravelInsurance;
use Illuminate\Http\Request;

class TravelInsuranceController extends Controller
{
    public function index()
    {
        return response()->json(TravelInsurance::latest('creadoEn')->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'proveedorId' => 'nullable|integer|min:1|exists:Provider,id',
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'montoCobertura' => 'required|numeric|min:0',
            'precio' => 'required|numeric|min:0',
            'estado' => 'required|string|max:255',
        ]);

        $record = TravelInsurance::create($data);

        return response()->json($record, 201);
    }

    public function show(TravelInsurance $travelInsurance)
    {
        return response()->json($travelInsurance, 200);
    }

    public function update(Request $request, TravelInsurance $travelInsurance)
    {
        $data = $request->validate([
            'proveedorId' => 'sometimes|nullable|integer|min:1|exists:Provider,id',
            'nombre' => 'sometimes|required|string|max:255',
            'descripcion' => 'sometimes|nullable|string',
            'montoCobertura' => 'sometimes|required|numeric|min:0',
            'precio' => 'sometimes|required|numeric|min:0',
            'estado' => 'sometimes|required|string|max:255',
        ]);

        $travelInsurance->update($data);

        return response()->json($travelInsurance, 200);
    }

    public function destroy(TravelInsurance $travelInsurance)
    {
        $travelInsurance->delete();

        return response()->json(['message' => 'Registro eliminado'], 200);
    }
}
