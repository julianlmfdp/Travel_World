<?php

namespace App\Models;

class CartItem extends TravelModel
{
    protected $table = 'CartItem';

    protected $fillable = [
        'carritoId',
        'productoId',
        'cantidad',
        'precioUnitario',
    ];

    protected $casts = [
        'carritoId' => 'integer',
        'productoId' => 'integer',
        'cantidad' => 'integer',
        'precioUnitario' => 'decimal:2',
    ];
}
