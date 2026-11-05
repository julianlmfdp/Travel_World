<?php

namespace App\Models;

class Membership extends TravelModel
{
    protected $table = 'Membership';

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'duracionDias',
        'beneficios',
        'estado',
    ];

    protected $casts = [
        'precio' => 'decimal:2',
        'duracionDias' => 'integer',
    ];
}
