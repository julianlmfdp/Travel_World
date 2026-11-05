<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ConversationParticipant;
use Illuminate\Http\Request;

class ConversationParticipantController extends Controller
{
    public function index()
    {
        return response()->json(ConversationParticipant::latest('creadoEn')->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'conversacionId' => 'required|integer|min:1|exists:Conversation,id',
            'usuarioId' => 'required|integer|min:1|exists:users,id',
            'fechaIngreso' => 'required|date',
        ]);

        $record = ConversationParticipant::create($data);

        return response()->json($record, 201);
    }

    public function show(ConversationParticipant $conversationParticipant)
    {
        return response()->json($conversationParticipant, 200);
    }

    public function update(Request $request, ConversationParticipant $conversationParticipant)
    {
        $data = $request->validate([
            'conversacionId' => 'sometimes|required|integer|min:1|exists:Conversation,id',
            'usuarioId' => 'sometimes|required|integer|min:1|exists:users,id',
            'fechaIngreso' => 'sometimes|required|date',
        ]);

        $conversationParticipant->update($data);

        return response()->json($conversationParticipant, 200);
    }

    public function destroy(ConversationParticipant $conversationParticipant)
    {
        $conversationParticipant->delete();

        return response()->json(['message' => 'Registro eliminado'], 200);
    }
}
