<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TransportationCompany;
use Illuminate\Http\Request;

class TransportationCompanyController extends Controller
{
    public function index()
    {
        return response()->json(TransportationCompany::latest('creadoEn')->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'proveedorId' => 'nullable|integer|min:1|exists:Provider,id',
            'nombre' => 'required|string|max:255',
            'telefono' => 'nullable|string|max:255',
            'correo' => 'nullable|string|max:255',
            'estado' => 'required|string|max:255',
        ]);

        $record = TransportationCompany::create($data);

        return response()->json($record, 201);
    }

    public function show(TransportationCompany $transportationCompany)
    {
        return response()->json($transportationCompany, 200);
    }

    public function update(Request $request, TransportationCompany $transportationCompany)
    {
        $data = $request->validate([
            'proveedorId' => 'sometimes|nullable|integer|min:1|exists:Provider,id',
            'nombre' => 'sometimes|required|string|max:255',
            'telefono' => 'sometimes|nullable|string|max:255',
            'correo' => 'sometimes|nullable|string|max:255',
            'estado' => 'sometimes|required|string|max:255',
        ]);

        $transportationCompany->update($data);

        return response()->json($transportationCompany, 200);
    }

    public function destroy(TransportationCompany $transportationCompany)
    {
        $transportationCompany->delete();

        return response()->json(['message' => 'Registro eliminado'], 200);
    }
}
