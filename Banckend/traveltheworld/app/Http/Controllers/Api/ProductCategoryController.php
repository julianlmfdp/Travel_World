<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function index()
    {
        return response()->json(ProductCategory::latest('creadoEn')->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        $record = ProductCategory::create($data);

        return response()->json($record, 201);
    }

    public function show(ProductCategory $productCategory)
    {
        return response()->json($productCategory, 200);
    }

    public function update(Request $request, ProductCategory $productCategory)
    {
        $data = $request->validate([
            'nombre' => 'sometimes|required|string|max:255',
            'descripcion' => 'sometimes|nullable|string',
        ]);

        $productCategory->update($data);

        return response()->json($productCategory, 200);
    }

    public function destroy(ProductCategory $productCategory)
    {
        $productCategory->delete();

        return response()->json(['message' => 'Registro eliminado'], 200);
    }
}
