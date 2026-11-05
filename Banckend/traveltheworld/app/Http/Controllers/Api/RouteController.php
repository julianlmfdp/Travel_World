<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Route;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function index()
    {
        return response()->json(Route::latest('creadoEn')->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'ciudadOrigenId' => 'required|integer|min:1|exists:City,id',
            'ciudadDestinoId' => 'required|integer|min:1|exists:City,id',
            'distanciaKm' => 'nullable|numeric|min:0',
            'duracionEstimada' => 'nullable|integer',
        ]);

        $record = Route::create($data);

        return response()->json($record, 201);
    }

    public function show(Route $route)
    {
        return response()->json($route, 200);
    }

    public function update(Request $request, Route $route)
    {
        $data = $request->validate([
            'ciudadOrigenId' => 'sometimes|required|integer|min:1|exists:City,id',
            'ciudadDestinoId' => 'sometimes|required|integer|min:1|exists:City,id',
            'distanciaKm' => 'sometimes|nullable|numeric|min:0',
            'duracionEstimada' => 'sometimes|nullable|integer',
        ]);

        $route->update($data);

        return response()->json($route, 200);
    }

    public function destroy(Route $route)
    {
        $route->delete();

        return response()->json(['message' => 'Registro eliminado'], 200);
    }
}
