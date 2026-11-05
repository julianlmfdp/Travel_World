<?php

namespace App\Models;

class TravelInsurance extends TravelModel
{
    protected $table = 'TravelInsurance';

    protected $fillable = [
        'proveedorId',
        'nombre',
        'descripcion',
        'montoCobertura',
        'precio',
        'estado',
    ];

    protected $casts = [
        'proveedorId' => 'integer',
        'montoCobertura' => 'decimal:2',
        'precio' => 'decimal:2',
    ];
}
