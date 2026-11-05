<?php

namespace App\Models;

class Message extends TravelModel
{
    protected $table = 'Message';

    protected $fillable = [
        'conversacionId',
        'usuarioRemitenteId',
        'contenido',
        'fechaEnvio',
        'fechaLectura',
    ];

    protected $casts = [
        'conversacionId' => 'integer',
        'usuarioRemitenteId' => 'integer',
        'fechaEnvio' => 'datetime',
        'fechaLectura' => 'datetime',
    ];
}
