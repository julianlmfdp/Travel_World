<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        return response()->json(Report::latest('creadoEn')->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'tipoReporteId' => 'required|integer|min:1|exists:ReportType,id',
            'usuarioId' => 'required|integer|min:1|exists:users,id',
            'titulo' => 'required|string|max:255',
            'detalles' => 'nullable|string',
            'estado' => 'required|string|max:255',
        ]);

        $record = Report::create($data);

        return response()->json($record, 201);
    }

    public function show(Report $report)
    {
        return response()->json($report, 200);
    }

    public function update(Request $request, Report $report)
    {
        $data = $request->validate([
            'tipoReporteId' => 'sometimes|required|integer|min:1|exists:ReportType,id',
            'usuarioId' => 'sometimes|required|integer|min:1|exists:users,id',
            'titulo' => 'sometimes|required|string|max:255',
            'detalles' => 'sometimes|nullable|string',
            'estado' => 'sometimes|required|string|max:255',
        ]);

        $report->update($data);

        return response()->json($report, 200);
    }

    public function destroy(Report $report)
    {
        $report->delete();

        return response()->json(['message' => 'Registro eliminado'], 200);
    }
}
