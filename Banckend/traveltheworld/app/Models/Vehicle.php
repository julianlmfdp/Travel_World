<?php

namespace App\Models;

class Vehicle extends TravelModel
{
    protected $table = 'Vehicle';

    protected $fillable = [
        'empresaTransporteId',
        'tipoVehiculo',
        'matricula',
        'capacidad',
        'estado',
    ];

    protected $casts = [
        'empresaTransporteId' => 'integer',
        'capacidad' => 'integer',
    ];
}
