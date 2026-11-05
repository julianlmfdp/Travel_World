<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        return response()->json(Employee::latest('creadoEn')->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'usuarioId' => 'required|integer|min:1|exists:users,id',
            'codigoEmpleado' => 'nullable|string|max:255',
            'cargo' => 'nullable|string|max:255',
            'fechaContratacion' => 'nullable|date',
        ]);

        $record = Employee::create($data);

        return response()->json($record, 201);
    }

    public function show(Employee $employee)
    {
        return response()->json($employee, 200);
    }

    public function update(Request $request, Employee $employee)
    {
        $data = $request->validate([
            'usuarioId' => 'sometimes|required|integer|min:1|exists:users,id',
            'codigoEmpleado' => 'sometimes|nullable|string|max:255',
            'cargo' => 'sometimes|nullable|string|max:255',
            'fechaContratacion' => 'sometimes|nullable|date',
        ]);

        $employee->update($data);

        return response()->json($employee, 200);
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return response()->json(['message' => 'Registro eliminado'], 200);
    }
}
