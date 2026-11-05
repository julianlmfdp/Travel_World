<?php

namespace App\Models;

class Payment extends TravelModel
{
    protected $table = 'Payment';

    protected $fillable = [
        'facturaId',
        'monto',
        'metodoPago',
        'estado',
        'fechaPago',
        'referenciaTransaccion',
    ];

    protected $casts = [
        'facturaId' => 'integer',
        'monto' => 'decimal:2',
        'fechaPago' => 'datetime',
    ];
}
