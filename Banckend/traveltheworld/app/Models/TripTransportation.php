<?php

namespace App\Models;

class TripTransportation extends TravelModel
{
    protected $table = 'TripTransportation';

    protected $fillable = [
        'viajeId',
        'transporteId',
    ];

    protected $casts = [
        'viajeId' => 'integer',
        'transporteId' => 'integer',
    ];
}
