<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ActivityCategoryLink;
use Illuminate\Http\Request;

class ActivityCategoryLinkController extends Controller
{
    public function index()
    {
        return response()->json(ActivityCategoryLink::latest('creadoEn')->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'actividadTuristicaId' => 'required|integer|min:1|exists:TouristActivity,id',
            'categoriaActividadId' => 'required|integer|min:1|exists:ActivityCategory,id',
        ]);

        $record = ActivityCategoryLink::create($data);

        return response()->json($record, 201);
    }

    public function show(ActivityCategoryLink $activityCategoryLink)
    {
        return response()->json($activityCategoryLink, 200);
    }

    public function update(Request $request, ActivityCategoryLink $activityCategoryLink)
    {
        $data = $request->validate([
            'actividadTuristicaId' => 'sometimes|required|integer|min:1|exists:TouristActivity,id',
            'categoriaActividadId' => 'sometimes|required|integer|min:1|exists:ActivityCategory,id',
        ]);

        $activityCategoryLink->update($data);

        return response()->json($activityCategoryLink, 200);
    }

    public function destroy(ActivityCategoryLink $activityCategoryLink)
    {
        $activityCategoryLink->delete();

        return response()->json(['message' => 'Registro eliminado'], 200);
    }
}
