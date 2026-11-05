<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AuditLog;
use Illuminate\Http\Request;

class AuditLogController extends Controller
{
    public function index()
    {
        return response()->json(AuditLog::latest('creadoEn')->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'usuarioId' => 'nullable|integer|min:1|exists:users,id',
            'accion' => 'required|string|max:255',
            'nombreEntidad' => 'required|string|max:255',
            'entidadId' => 'required|integer',
            'valoresAnteriores' => 'nullable|array',
            'valoresNuevos' => 'nullable|array',
            'direccionIp' => 'nullable|string|max:255',
        ]);

        $record = AuditLog::create($data);

        return response()->json($record, 201);
    }

    public function show(AuditLog $auditLog)
    {
        return response()->json($auditLog, 200);
    }

    public function update(Request $request, AuditLog $auditLog)
    {
        $data = $request->validate([
            'usuarioId' => 'sometimes|nullable|integer|min:1|exists:users,id',
            'accion' => 'sometimes|required|string|max:255',
            'nombreEntidad' => 'sometimes|required|string|max:255',
            'entidadId' => 'sometimes|required|integer',
            'valoresAnteriores' => 'sometimes|nullable|array',
            'valoresNuevos' => 'sometimes|nullable|array',
            'direccionIp' => 'sometimes|nullable|string|max:255',
        ]);

        $auditLog->update($data);

        return response()->json($auditLog, 200);
    }

    public function destroy(AuditLog $auditLog)
    {
        $auditLog->delete();

        return response()->json(['message' => 'Registro eliminado'], 200);
    }
}
