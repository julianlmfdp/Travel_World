<?php

namespace App\Models;

class TransportationCompany extends TravelModel
{
    protected $table = 'TransportationCompany';

    protected $fillable = [
        'proveedorId',
        'nombre',
        'telefono',
        'correo',
        'estado',
    ];

    protected $casts = [
        'proveedorId' => 'integer',
    ];
}
