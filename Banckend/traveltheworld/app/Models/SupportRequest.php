<?php

namespace App\Models;

class SupportRequest extends TravelModel
{
    protected $table = 'SupportRequest';

    protected $fillable = [
        'usuarioId',
        'asunto',
        'descripcion',
        'prioridad',
        'estado',
    ];

    protected $casts = [
        'usuarioId' => 'integer',
    ];
}
