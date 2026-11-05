<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CustomerMembership;
use Illuminate\Http\Request;

class CustomerMembershipController extends Controller
{
    public function index()
    {
        return response()->json(CustomerMembership::latest('creadoEn')->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'clienteId' => 'required|integer|min:1|exists:Customer,id',
            'membresiaId' => 'required|integer|min:1|exists:Membership,id',
            'fechaInicio' => 'required|date',
            'fechaFin' => 'required|date',
            'estado' => 'required|string|max:255',
        ]);

        $record = CustomerMembership::create($data);

        return response()->json($record, 201);
    }

    public function show(CustomerMembership $customerMembership)
    {
        return response()->json($customerMembership, 200);
    }

    public function update(Request $request, CustomerMembership $customerMembership)
    {
        $data = $request->validate([
            'clienteId' => 'sometimes|required|integer|min:1|exists:Customer,id',
            'membresiaId' => 'sometimes|required|integer|min:1|exists:Membership,id',
            'fechaInicio' => 'sometimes|required|date',
            'fechaFin' => 'sometimes|required|date',
            'estado' => 'sometimes|required|string|max:255',
        ]);

        $customerMembership->update($data);

        return response()->json($customerMembership, 200);
    }

    public function destroy(CustomerMembership $customerMembership)
    {
        $customerMembership->delete();

        return response()->json(['message' => 'Registro eliminado'], 200);
    }
}
