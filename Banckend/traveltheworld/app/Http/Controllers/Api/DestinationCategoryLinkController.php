<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DestinationCategoryLink;
use Illuminate\Http\Request;

class DestinationCategoryLinkController extends Controller
{
    public function index()
    {
        return response()->json(DestinationCategoryLink::latest('creadoEn')->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'destinoId' => 'required|integer|min:1|exists:Destination,id',
            'categoriaDestinoId' => 'required|integer|min:1|exists:DestinationCategory,id',
        ]);

        $record = DestinationCategoryLink::create($data);

        return response()->json($record, 201);
    }

    public function show(DestinationCategoryLink $destinationCategoryLink)
    {
        return response()->json($destinationCategoryLink, 200);
    }

    public function update(Request $request, DestinationCategoryLink $destinationCategoryLink)
    {
        $data = $request->validate([
            'destinoId' => 'sometimes|required|integer|min:1|exists:Destination,id',
            'categoriaDestinoId' => 'sometimes|required|integer|min:1|exists:DestinationCategory,id',
        ]);

        $destinationCategoryLink->update($data);

        return response()->json($destinationCategoryLink, 200);
    }

    public function destroy(DestinationCategoryLink $destinationCategoryLink)
    {
        $destinationCategoryLink->delete();

        return response()->json(['message' => 'Registro eliminado'], 200);
    }
}
