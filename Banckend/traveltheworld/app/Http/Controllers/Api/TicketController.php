<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        return response()->json(Ticket::latest('creadoEn')->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'reservaId' => 'required|integer|min:1|exists:Reservation,id',
            'numeroTiquete' => 'required|string|max:255',
            'nombrePasajero' => 'required|string|max:255',
            'fechaEmision' => 'required|date',
            'estado' => 'required|string|max:255',
        ]);

        $record = Ticket::create($data);

        return response()->json($record, 201);
    }

    public function show(Ticket $ticket)
    {
        return response()->json($ticket, 200);
    }

    public function update(Request $request, Ticket $ticket)
    {
        $data = $request->validate([
            'reservaId' => 'sometimes|required|integer|min:1|exists:Reservation,id',
            'numeroTiquete' => 'sometimes|required|string|max:255',
            'nombrePasajero' => 'sometimes|required|string|max:255',
            'fechaEmision' => 'sometimes|required|date',
            'estado' => 'sometimes|required|string|max:255',
        ]);

        $ticket->update($data);

        return response()->json($ticket, 200);
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();

        return response()->json(['message' => 'Registro eliminado'], 200);
    }
}
