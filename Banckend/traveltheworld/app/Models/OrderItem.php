<?php

namespace App\Models;

class OrderItem extends TravelModel
{
    protected $table = 'OrderItem';

    protected $fillable = [
        'pedidoId',
        'productoId',
        'cantidad',
        'precioUnitario',
        'totalLinea',
    ];

    protected $casts = [
        'pedidoId' => 'integer',
        'productoId' => 'integer',
        'cantidad' => 'integer',
        'precioUnitario' => 'decimal:2',
        'totalLinea' => 'decimal:2',
    ];
}
