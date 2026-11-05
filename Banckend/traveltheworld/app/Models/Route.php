<?php

namespace App\Models;

class Route extends TravelModel
{
    protected $table = 'Route';

    protected $fillable = [
        'ciudadOrigenId',
        'ciudadDestinoId',
        'distanciaKm',
        'duracionEstimada',
    ];

    protected $casts = [
        'ciudadOrigenId' => 'integer',
        'ciudadDestinoId' => 'integer',
        'distanciaKm' => 'decimal:2',
        'duracionEstimada' => 'integer',
    ];
}
