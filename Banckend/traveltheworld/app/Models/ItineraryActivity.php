<?php

namespace App\Models;

class ItineraryActivity extends TravelModel
{
    protected $table = 'ItineraryActivity';

    protected $fillable = [
        'itinerarioId',
        'actividadTuristicaId',
        'horaInicio',
        'horaFin',
        'notas',
    ];

    protected $casts = [
        'itinerarioId' => 'integer',
        'actividadTuristicaId' => 'integer',
        'horaInicio' => 'string',
        'horaFin' => 'string',
    ];
}
