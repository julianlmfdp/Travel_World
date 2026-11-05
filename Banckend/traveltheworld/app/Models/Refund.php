<?php

namespace App\Models;

class Refund extends TravelModel
{
    protected $table = 'Refund';

    protected $fillable = [
        'pagoId',
        'monto',
        'motivo',
        'estado',
        'fechaReembolso',
    ];

    protected $casts = [
        'pagoId' => 'integer',
        'monto' => 'decimal:2',
        'fechaReembolso' => 'datetime',
    ];
}
