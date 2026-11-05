<?php

namespace App\Models;

class TourGuide extends TravelModel
{
    protected $table = 'TourGuide';

    protected $fillable = [
        'empleadoId',
        'numeroLicencia',
        'idiomas',
        'biografia',
    ];

    protected $casts = [
        'empleadoId' => 'integer',
    ];
}
