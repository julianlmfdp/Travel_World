<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        return response()->json(Coupon::latest('creadoEn')->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'descuentoId' => 'required|integer|min:1|exists:Discount,id',
            'codigo' => 'required|string|max:255',
            'fechaInicio' => 'required|date',
            'fechaFin' => 'required|date',
            'limiteUsos' => 'nullable|integer',
            'usosRealizados' => 'required|integer',
            'estado' => 'required|string|max:255',
        ]);

        $record = Coupon::create($data);

        return response()->json($record, 201);
    }

    public function show(Coupon $coupon)
    {
        return response()->json($coupon, 200);
    }

    public function update(Request $request, Coupon $coupon)
    {
        $data = $request->validate([
            'descuentoId' => 'sometimes|required|integer|min:1|exists:Discount,id',
            'codigo' => 'sometimes|required|string|max:255',
            'fechaInicio' => 'sometimes|required|date',
            'fechaFin' => 'sometimes|required|date',
            'limiteUsos' => 'sometimes|nullable|integer',
            'usosRealizados' => 'sometimes|required|integer',
            'estado' => 'sometimes|required|string|max:255',
        ]);

        $coupon->update($data);

        return response()->json($coupon, 200);
    }

    public function destroy(Coupon $coupon)
    {
        $coupon->delete();

        return response()->json(['message' => 'Registro eliminado'], 200);
    }
}
