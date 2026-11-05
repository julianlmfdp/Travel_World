<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index()
    {
        return response()->json(Favorite::latest('creadoEn')->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'clienteId' => 'required|integer|min:1|exists:Customer,id',
            'destinoId' => 'required|integer|min:1|exists:Destination,id',
        ]);

        $record = Favorite::create($data);

        return response()->json($record, 201);
    }

    public function show(Favorite $favorite)
    {
        return response()->json($favorite, 200);
    }

    public function update(Request $request, Favorite $favorite)
    {
        $data = $request->validate([
            'clienteId' => 'sometimes|required|integer|min:1|exists:Customer,id',
            'destinoId' => 'sometimes|required|integer|min:1|exists:Destination,id',
        ]);

        $favorite->update($data);

        return response()->json($favorite, 200);
    }

    public function destroy(Favorite $favorite)
    {
        $favorite->delete();

        return response()->json(['message' => 'Registro eliminado'], 200);
    }
}
