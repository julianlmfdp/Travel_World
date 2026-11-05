<?php

namespace App\Models;

class Promotion extends TravelModel
{
    protected $table = 'Promotion';

    protected $fillable = [
        'nombre',
        'descripcion',
        'fechaInicio',
        'fechaFin',
        'estado',
    ];

    protected $casts = [
        'fechaInicio' => 'date',
        'fechaFin' => 'date',
    ];
}
