<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        return response()->json(Notification::latest('creadoEn')->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'usuarioId' => 'required|integer|min:1|exists:users,id',
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string',
            'tipo' => 'required|string|max:255',
            'fechaLectura' => 'nullable|date',
        ]);

        $record = Notification::create($data);

        return response()->json($record, 201);
    }

    public function show(Notification $notification)
    {
        return response()->json($notification, 200);
    }

    public function update(Request $request, Notification $notification)
    {
        $data = $request->validate([
            'usuarioId' => 'sometimes|required|integer|min:1|exists:users,id',
            'titulo' => 'sometimes|required|string|max:255',
            'contenido' => 'sometimes|required|string',
            'tipo' => 'sometimes|required|string|max:255',
            'fechaLectura' => 'sometimes|nullable|date',
        ]);

        $notification->update($data);

        return response()->json($notification, 200);
    }

    public function destroy(Notification $notification)
    {
        $notification->delete();

        return response()->json(['message' => 'Registro eliminado'], 200);
    }
}
