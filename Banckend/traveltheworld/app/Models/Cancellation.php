<?php

namespace App\Models;

class Cancellation extends TravelModel
{
    protected $table = 'Cancellation';

    protected $fillable = [
        'reservaId',
        'motivo',
        'fechaSolicitud',
        'estado',
        'cargoCancelacion',
    ];

    protected $casts = [
        'reservaId' => 'integer',
        'fechaSolicitud' => 'datetime',
        'cargoCancelacion' => 'decimal:2',
    ];
}
