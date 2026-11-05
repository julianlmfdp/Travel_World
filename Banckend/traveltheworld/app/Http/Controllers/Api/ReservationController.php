<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        return response()->json(Reservation::latest('creadoEn')->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'clienteId' => 'required|integer|min:1|exists:Customer,id',
            'viajeId' => 'required|integer|min:1|exists:Trip,id',
            'fechaReserva' => 'required|date',
            'cantidadPersonas' => 'required|integer',
            'montoTotal' => 'required|numeric|min:0',
            'estado' => 'required|string|max:255',
        ]);

        $record = Reservation::create($data);

        return response()->json($record, 201);
    }

    public function show(Reservation $reservation)
    {
        return response()->json($reservation, 200);
    }

    public function update(Request $request, Reservation $reservation)
    {
        $data = $request->validate([
            'clienteId' => 'sometimes|required|integer|min:1|exists:Customer,id',
            'viajeId' => 'sometimes|required|integer|min:1|exists:Trip,id',
            'fechaReserva' => 'sometimes|required|date',
            'cantidadPersonas' => 'sometimes|required|integer',
            'montoTotal' => 'sometimes|required|numeric|min:0',
            'estado' => 'sometimes|required|string|max:255',
        ]);

        $reservation->update($data);

        return response()->json($reservation, 200);
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return response()->json(['message' => 'Registro eliminado'], 200);
    }
}
