<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        return response()->json(Review::latest('creadoEn')->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'usuarioId' => 'required|integer|min:1',
            'destinoId' => 'required|integer|min:1',
            'calificacion' => 'required|integer|between:1,5',
            'comentario' => 'nullable|string',
        ]);
        $review = Review::create($data);

        return response()->json($review, 201);
    }

    public function show(Review $review)
    {
        return response()->json($review, 200);
    }

    public function update(Request $request, Review $review)
    {
        $data = $request->validate([
            'usuarioId' => 'sometimes|required|integer|min:1',
            'destinoId' => 'sometimes|required|integer|min:1',
            'calificacion' => 'sometimes|required|integer|between:1,5',
            'comentario' => 'sometimes|nullable|string',
        ]);
        $review->update($data);

        return response()->json($review, 200);
    }

    public function destroy(Review $review)
    {
        $review->delete();

        return response()->json(['message' => 'Reseña eliminada'], 200);
    }
}
