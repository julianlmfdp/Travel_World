<?php

namespace App\Models;

class Coupon extends TravelModel
{
    protected $table = 'Coupon';

    protected $fillable = [
        'descuentoId',
        'codigo',
        'fechaInicio',
        'fechaFin',
        'limiteUsos',
        'usosRealizados',
        'estado',
    ];

    protected $casts = [
        'descuentoId' => 'integer',
        'fechaInicio' => 'date',
        'fechaFin' => 'date',
        'limiteUsos' => 'integer',
        'usosRealizados' => 'integer',
    ];
}
