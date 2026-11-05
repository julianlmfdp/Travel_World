<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ReportType;
use Illuminate\Http\Request;

class ReportTypeController extends Controller
{
    public function index()
    {
        return response()->json(ReportType::latest('creadoEn')->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        $record = ReportType::create($data);

        return response()->json($record, 201);
    }

    public function show(ReportType $reportType)
    {
        return response()->json($reportType, 200);
    }

    public function update(Request $request, ReportType $reportType)
    {
        $data = $request->validate([
            'nombre' => 'sometimes|required|string|max:255',
            'descripcion' => 'sometimes|nullable|string',
        ]);

        $reportType->update($data);

        return response()->json($reportType, 200);
    }

    public function destroy(ReportType $reportType)
    {
        $reportType->delete();

        return response()->json(['message' => 'Registro eliminado'], 200);
    }
}
