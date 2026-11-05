<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        return response()->json(Wishlist::latest('creadoEn')->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'clienteId' => 'required|integer|min:1|exists:Customer,id',
            'nombre' => 'required|string|max:255',
        ]);

        $record = Wishlist::create($data);

        return response()->json($record, 201);
    }

    public function show(Wishlist $wishlist)
    {
        return response()->json($wishlist, 200);
    }

    public function update(Request $request, Wishlist $wishlist)
    {
        $data = $request->validate([
            'clienteId' => 'sometimes|required|integer|min:1|exists:Customer,id',
            'nombre' => 'sometimes|required|string|max:255',
        ]);

        $wishlist->update($data);

        return response()->json($wishlist, 200);
    }

    public function destroy(Wishlist $wishlist)
    {
        $wishlist->delete();

        return response()->json(['message' => 'Registro eliminado'], 200);
    }
}
