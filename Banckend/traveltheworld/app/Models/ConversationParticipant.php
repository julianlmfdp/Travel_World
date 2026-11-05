<?php

namespace App\Models;

class ConversationParticipant extends TravelModel
{
    protected $table = 'ConversationParticipant';

    protected $fillable = [
        'conversacionId',
        'usuarioId',
        'fechaIngreso',
    ];

    protected $casts = [
        'conversacionId' => 'integer',
        'usuarioId' => 'integer',
        'fechaIngreso' => 'datetime',
    ];
}
