<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SupportRequest;
use Illuminate\Http\Request;

class SupportRequestController extends Controller
{
    public function index()
    {
        return response()->json(SupportRequest::latest('creadoEn')->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'usuarioId' => 'required|integer|min:1|exists:users,id',
            'asunto' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'prioridad' => 'required|string|max:255',
            'estado' => 'required|string|max:255',
        ]);

        $record = SupportRequest::create($data);

        return response()->json($record, 201);
    }

    public function show(SupportRequest $supportRequest)
    {
        return response()->json($supportRequest, 200);
    }

    public function update(Request $request, SupportRequest $supportRequest)
    {
        $data = $request->validate([
            'usuarioId' => 'sometimes|required|integer|min:1|exists:users,id',
            'asunto' => 'sometimes|required|string|max:255',
            'descripcion' => 'sometimes|required|string',
            'prioridad' => 'sometimes|required|string|max:255',
            'estado' => 'sometimes|required|string|max:255',
        ]);

        $supportRequest->update($data);

        return response()->json($supportRequest, 200);
    }

    public function destroy(SupportRequest $supportRequest)
    {
        $supportRequest->delete();

        return response()->json(['message' => 'Registro eliminado'], 200);
    }
}
