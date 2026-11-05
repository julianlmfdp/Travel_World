<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        return response()->json(Message::latest('creadoEn')->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'conversacionId' => 'required|integer|min:1|exists:Conversation,id',
            'usuarioRemitenteId' => 'required|integer|min:1|exists:users,id',
            'contenido' => 'required|string',
            'fechaEnvio' => 'required|date',
            'fechaLectura' => 'nullable|date',
        ]);

        $record = Message::create($data);

        return response()->json($record, 201);
    }

    public function show(Message $message)
    {
        return response()->json($message, 200);
    }

    public function update(Request $request, Message $message)
    {
        $data = $request->validate([
            'conversacionId' => 'sometimes|required|integer|min:1|exists:Conversation,id',
            'usuarioRemitenteId' => 'sometimes|required|integer|min:1|exists:users,id',
            'contenido' => 'sometimes|required|string',
            'fechaEnvio' => 'sometimes|required|date',
            'fechaLectura' => 'sometimes|nullable|date',
        ]);

        $message->update($data);

        return response()->json($message, 200);
    }

    public function destroy(Message $message)
    {
        $message->delete();

        return response()->json(['message' => 'Registro eliminado'], 200);
    }
}
