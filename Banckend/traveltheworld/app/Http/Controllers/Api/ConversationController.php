<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Conversation;
use Illuminate\Http\Request;

class ConversationController extends Controller
{
    public function index()
    {
        return response()->json(Conversation::latest('creadoEn')->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'asunto' => 'required|string|max:255',
            'usuarioCreadorId' => 'required|integer|min:1|exists:users,id',
            'estado' => 'required|string|max:255',
        ]);

        $record = Conversation::create($data);

        return response()->json($record, 201);
    }

    public function show(Conversation $conversation)
    {
        return response()->json($conversation, 200);
    }

    public function update(Request $request, Conversation $conversation)
    {
        $data = $request->validate([
            'asunto' => 'sometimes|required|string|max:255',
            'usuarioCreadorId' => 'sometimes|required|integer|min:1|exists:users,id',
            'estado' => 'sometimes|required|string|max:255',
        ]);

        $conversation->update($data);

        return response()->json($conversation, 200);
    }

    public function destroy(Conversation $conversation)
    {
        $conversation->delete();

        return response()->json(['message' => 'Registro eliminado'], 200);
    }
}
