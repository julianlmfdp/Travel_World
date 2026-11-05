<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        return response()->json(Vehicle::latest('creadoEn')->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'empresaTransporteId' => 'required|integer|min:1|exists:TransportationCompany,id',
            'tipoVehiculo' => 'required|string|max:255',
            'matricula' => 'required|string|max:255',
            'capacidad' => 'required|integer',
            'estado' => 'required|string|max:255',
        ]);

        $record = Vehicle::create($data);

        return response()->json($record, 201);
    }

    public function show(Vehicle $vehicle)
    {
        return response()->json($vehicle, 200);
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        $data = $request->validate([
            'empresaTransporteId' => 'sometimes|required|integer|min:1|exists:TransportationCompany,id',
            'tipoVehiculo' => 'sometimes|required|string|max:255',
            'matricula' => 'sometimes|required|string|max:255',
            'capacidad' => 'sometimes|required|integer',
            'estado' => 'sometimes|required|string|max:255',
        ]);

        $vehicle->update($data);

        return response()->json($vehicle, 200);
    }

    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();

        return response()->json(['message' => 'Registro eliminado'], 200);
    }
}
