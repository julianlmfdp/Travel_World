<?php

namespace App\Models;

class Invoice extends TravelModel
{
    protected $table = 'Invoice';

    protected $fillable = [
        'reservaId',
        'numeroFactura',
        'fechaEmision',
        'subtotal',
        'impuesto',
        'total',
        'estado',
    ];

    protected $casts = [
        'reservaId' => 'integer',
        'fechaEmision' => 'date',
        'subtotal' => 'decimal:2',
        'impuesto' => 'decimal:2',
        'total' => 'decimal:2',
    ];
}
