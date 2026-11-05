<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function index()
    {
        return response()->json(Person::latest('creadoEn')->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'tipoDocumento' => 'nullable|string|max:255',
            'numeroDocumento' => 'nullable|string|max:255',
            'fechaNacimiento' => 'nullable|date',
            'telefono' => 'nullable|string|max:255',
            'correo' => 'nullable|string|max:255',
        ]);

        $record = Person::create($data);

        return response()->json($record, 201);
    }

    public function show(Person $person)
    {
        return response()->json($person, 200);
    }

    public function update(Request $request, Person $person)
    {
        $data = $request->validate([
            'nombres' => 'sometimes|required|string|max:255',
            'apellidos' => 'sometimes|required|string|max:255',
            'tipoDocumento' => 'sometimes|nullable|string|max:255',
            'numeroDocumento' => 'sometimes|nullable|string|max:255',
            'fechaNacimiento' => 'sometimes|nullable|date',
            'telefono' => 'sometimes|nullable|string|max:255',
            'correo' => 'sometimes|nullable|string|max:255',
        ]);

        $person->update($data);

        return response()->json($person, 200);
    }

    public function destroy(Person $person)
    {
        $person->delete();

        return response()->json(['message' => 'Registro eliminado'], 200);
    }
}
