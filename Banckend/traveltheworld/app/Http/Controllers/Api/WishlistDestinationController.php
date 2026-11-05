<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\WishlistDestination;
use Illuminate\Http\Request;

class WishlistDestinationController extends Controller
{
    public function index()
    {
        return response()->json(WishlistDestination::latest('creadoEn')->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'listaDeseosId' => 'required|integer|min:1|exists:Wishlist,id',
            'destinoId' => 'required|integer|min:1|exists:Destination,id',
        ]);

        $record = WishlistDestination::create($data);

        return response()->json($record, 201);
    }

    public function show(WishlistDestination $wishlistDestination)
    {
        return response()->json($wishlistDestination, 200);
    }

    public function update(Request $request, WishlistDestination $wishlistDestination)
    {
        $data = $request->validate([
            'listaDeseosId' => 'sometimes|required|integer|min:1|exists:Wishlist,id',
            'destinoId' => 'sometimes|required|integer|min:1|exists:Destination,id',
        ]);

        $wishlistDestination->update($data);

        return response()->json($wishlistDestination, 200);
    }

    public function destroy(WishlistDestination $wishlistDestination)
    {
        $wishlistDestination->delete();

        return response()->json(['message' => 'Registro eliminado'], 200);
    }
}
