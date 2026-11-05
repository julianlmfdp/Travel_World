<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return response()->json(Product::latest('creadoEn')->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'categoriaProductoId' => 'required|integer|min:1|exists:ProductCategory,id',
            'codigoSku' => 'required|string|max:255',
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'estado' => 'required|string|max:255',
        ]);

        $record = Product::create($data);

        return response()->json($record, 201);
    }

    public function show(Product $product)
    {
        return response()->json($product, 200);
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'categoriaProductoId' => 'sometimes|required|integer|min:1|exists:ProductCategory,id',
            'codigoSku' => 'sometimes|required|string|max:255',
            'nombre' => 'sometimes|required|string|max:255',
            'descripcion' => 'sometimes|nullable|string',
            'precio' => 'sometimes|required|numeric|min:0',
            'estado' => 'sometimes|required|string|max:255',
        ]);

        $product->update($data);

        return response()->json($product, 200);
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json(['message' => 'Registro eliminado'], 200);
    }
}
