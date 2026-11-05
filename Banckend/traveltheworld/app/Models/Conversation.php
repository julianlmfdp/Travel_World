<?php

namespace App\Models;

class Conversation extends TravelModel
{
    protected $table = 'Conversation';

    protected $fillable = [
        'asunto',
        'usuarioCreadorId',
        'estado',
    ];

    protected $casts = [
        'usuarioCreadorId' => 'integer',
    ];
}
