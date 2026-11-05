<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ActivityCategory;
use Illuminate\Http\Request;

class ActivityCategoryController extends Controller
{
    public function index()
    {
        return response()->json(ActivityCategory::latest('creadoEn')->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        $record = ActivityCategory::create($data);

        return response()->json($record, 201);
    }

    public function show(ActivityCategory $activityCategory)
    {
        return response()->json($activityCategory, 200);
    }

    public function update(Request $request, ActivityCategory $activityCategory)
    {
        $data = $request->validate([
            'nombre' => 'sometimes|required|string|max:255',
            'descripcion' => 'sometimes|nullable|string',
        ]);

        $activityCategory->update($data);

        return response()->json($activityCategory, 200);
    }

    public function destroy(ActivityCategory $activityCategory)
    {
        $activityCategory->delete();

        return response()->json(['message' => 'Registro eliminado'], 200);
    }
}
