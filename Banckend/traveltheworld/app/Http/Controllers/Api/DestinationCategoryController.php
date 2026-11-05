<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DestinationCategory;
use Illuminate\Http\Request;

class DestinationCategoryController extends Controller
{
    public function index()
    {
        return response()->json(DestinationCategory::latest('creadoEn')->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        $record = DestinationCategory::create($data);

        return response()->json($record, 201);
    }

    public function show(DestinationCategory $destinationCategory)
    {
        return response()->json($destinationCategory, 200);
    }

    public function update(Request $request, DestinationCategory $destinationCategory)
    {
        $data = $request->validate([
            'nombre' => 'sometimes|required|string|max:255',
            'descripcion' => 'sometimes|nullable|string',
        ]);

        $destinationCategory->update($data);

        return response()->json($destinationCategory, 200);
    }

    public function destroy(DestinationCategory $destinationCategory)
    {
        $destinationCategory->delete();

        return response()->json(['message' => 'Registro eliminado'], 200);
    }
}
