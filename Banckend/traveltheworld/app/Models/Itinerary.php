<?php

namespace App\Models;

class Itinerary extends TravelModel
{
    protected $table = 'Itinerary';

    protected $fillable = [
        'viajeId',
        'numeroDia',
        'titulo',
        'descripcion',
    ];

    protected $casts = [
        'viajeId' => 'integer',
        'numeroDia' => 'integer',
    ];
}
