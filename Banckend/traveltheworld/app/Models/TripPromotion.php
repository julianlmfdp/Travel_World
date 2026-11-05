<?php

namespace App\Models;

class TripPromotion extends TravelModel
{
    protected $table = 'TripPromotion';

    protected $fillable = [
        'promocionId',
        'viajeId',
    ];

    protected $casts = [
        'promocionId' => 'integer',
        'viajeId' => 'integer',
    ];
}
