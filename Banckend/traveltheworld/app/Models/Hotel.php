<?php

namespace App\Models;

class Hotel extends TravelModel
{
    protected $table = 'Hotel';

    protected $fillable = [
        'destinoId',
        'proveedorId',
        'nombre',
        'descripcion',
        'direccion',
        'telefono',
        'estado',
    ];

    protected $casts = [
        'destinoId' => 'integer',
        'proveedorId' => 'integer',
    ];
}
