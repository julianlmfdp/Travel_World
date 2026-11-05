<?php

namespace App\Models;

class Cart extends TravelModel
{
    protected $table = 'Cart';

    protected $fillable = [
        'clienteId',
        'estado',
    ];

    protected $casts = [
        'clienteId' => 'integer',
    ];
}
