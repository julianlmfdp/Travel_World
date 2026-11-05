<?php

namespace App\Models;

class TouristActivity extends TravelModel
{
    protected $table = 'TouristActivity';

    protected $fillable = [
        'destinoId',
        'nombre',
        'descripcion',
        'duracionMinutos',
        'precio',
        'ubicacion',
        'estado',
    ];

    protected $casts = [
        'destinoId' => 'integer',
        'duracionMinutos' => 'integer',
        'precio' => 'decimal:2',
    ];
}
