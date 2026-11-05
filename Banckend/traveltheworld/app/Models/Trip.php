<?php

namespace App\Models;

class Trip extends TravelModel
{
    protected $table = 'Trip';

    protected $fillable = [
        'destinoId',
        'tipoViajeId',
        'temporadaId',
        'titulo',
        'descripcion',
        'fechaInicio',
        'fechaFin',
        'precio',
        'capacidad',
        'estado',
    ];

    protected $casts = [
        'destinoId' => 'integer',
        'tipoViajeId' => 'integer',
        'temporadaId' => 'integer',
        'fechaInicio' => 'date',
        'fechaFin' => 'date',
        'precio' => 'decimal:2',
        'capacidad' => 'integer',
    ];
}
