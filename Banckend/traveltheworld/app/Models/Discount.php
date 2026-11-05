<?php

namespace App\Models;

class Discount extends TravelModel
{
    protected $table = 'Discount';

    protected $fillable = [
        'nombre',
        'tipoDescuento',
        'valor',
        'fechaInicio',
        'fechaFin',
        'estado',
    ];

    protected $casts = [
        'valor' => 'decimal:2',
        'fechaInicio' => 'date',
        'fechaFin' => 'date',
    ];
}
