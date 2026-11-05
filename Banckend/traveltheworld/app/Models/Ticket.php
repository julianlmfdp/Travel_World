<?php

namespace App\Models;

class Ticket extends TravelModel
{
    protected $table = 'Ticket';

    protected $fillable = [
        'reservaId',
        'numeroTiquete',
        'nombrePasajero',
        'fechaEmision',
        'estado',
    ];

    protected $casts = [
        'reservaId' => 'integer',
        'fechaEmision' => 'date',
    ];
}
