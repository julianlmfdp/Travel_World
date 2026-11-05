<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        return response()->json(Inventory::latest('creadoEn')->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'productoId' => 'required|integer|min:1|exists:Product,id',
            'cantidad' => 'required|integer',
            'nivelReposicion' => 'required|integer',
        ]);

        $record = Inventory::create($data);

        return response()->json($record, 201);
    }

    public function show(Inventory $inventory)
    {
        return response()->json($inventory, 200);
    }

    public function update(Request $request, Inventory $inventory)
    {
        $data = $request->validate([
            'productoId' => 'sometimes|required|integer|min:1|exists:Product,id',
            'cantidad' => 'sometimes|required|integer',
            'nivelReposicion' => 'sometimes|required|integer',
        ]);

        $inventory->update($data);

        return response()->json($inventory, 200);
    }

    public function destroy(Inventory $inventory)
    {
        $inventory->delete();

        return response()->json(['message' => 'Registro eliminado'], 200);
    }
}
