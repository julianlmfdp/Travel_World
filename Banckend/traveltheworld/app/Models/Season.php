<?php

namespace App\Models;

class Season extends TravelModel
{
    protected $table = 'Season';

    protected $fillable = [
        'nombre',
        'fechaInicio',
        'fechaFin',
        'descripcion',
    ];

    protected $casts = [
        'fechaInicio' => 'date',
        'fechaFin' => 'date',
    ];
}
