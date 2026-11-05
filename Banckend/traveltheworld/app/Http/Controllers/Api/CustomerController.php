<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return response()->json(Customer::latest('creadoEn')->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'usuarioId' => 'required|integer|min:1|exists:users,id',
            'codigoCliente' => 'nullable|string|max:255',
        ]);

        $record = Customer::create($data);

        return response()->json($record, 201);
    }

    public function show(Customer $customer)
    {
        return response()->json($customer, 200);
    }

    public function update(Request $request, Customer $customer)
    {
        $data = $request->validate([
            'usuarioId' => 'sometimes|required|integer|min:1|exists:users,id',
            'codigoCliente' => 'sometimes|nullable|string|max:255',
        ]);

        $customer->update($data);

        return response()->json($customer, 200);
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return response()->json(['message' => 'Registro eliminado'], 200);
    }
}
