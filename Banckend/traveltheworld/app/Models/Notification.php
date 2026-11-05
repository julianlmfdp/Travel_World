<?php

namespace App\Models;

class Notification extends TravelModel
{
    protected $table = 'Notification';

    protected $fillable = [
        'usuarioId',
        'titulo',
        'contenido',
        'tipo',
        'fechaLectura',
    ];

    protected $casts = [
        'usuarioId' => 'integer',
        'fechaLectura' => 'datetime',
    ];
}
