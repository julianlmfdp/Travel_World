<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ReservationCoupon;
use Illuminate\Http\Request;

class ReservationCouponController extends Controller
{
    public function index()
    {
        return response()->json(ReservationCoupon::latest('creadoEn')->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'reservaId' => 'required|integer|min:1|exists:Reservation,id',
            'cuponId' => 'required|integer|min:1|exists:Coupon,id',
            'montoDescuento' => 'required|numeric|min:0',
        ]);

        $record = ReservationCoupon::create($data);

        return response()->json($record, 201);
    }

    public function show(ReservationCoupon $reservationCoupon)
    {
        return response()->json($reservationCoupon, 200);
    }

    public function update(Request $request, ReservationCoupon $reservationCoupon)
    {
        $data = $request->validate([
            'reservaId' => 'sometimes|required|integer|min:1|exists:Reservation,id',
            'cuponId' => 'sometimes|required|integer|min:1|exists:Coupon,id',
            'montoDescuento' => 'sometimes|required|numeric|min:0',
        ]);

        $reservationCoupon->update($data);

        return response()->json($reservationCoupon, 200);
    }

    public function destroy(ReservationCoupon $reservationCoupon)
    {
        $reservationCoupon->delete();

        return response()->json(['message' => 'Registro eliminado'], 200);
    }
}
