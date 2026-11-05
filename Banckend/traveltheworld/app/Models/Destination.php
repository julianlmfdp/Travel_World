<?php

namespace App\Models;

class Destination extends TravelModel
{
    protected $table = 'Destination';

    protected $fillable = [
        'ciudadId',
        'nombre',
        'slug',
        'descripcion',
        'direccion',
        'latitud',
        'longitud',
        'imagenPortada',
        'estado',
    ];

    protected $casts = [
        'ciudadId' => 'integer',
        'latitud' => 'decimal:2',
        'longitud' => 'decimal:2',
    ];
}
