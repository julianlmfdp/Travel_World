<?php

namespace App\Models;

class Inventory extends TravelModel
{
    protected $table = 'Inventory';

    protected $fillable = [
        'productoId',
        'cantidad',
        'nivelReposicion',
    ];

    protected $casts = [
        'productoId' => 'integer',
        'cantidad' => 'integer',
        'nivelReposicion' => 'integer',
    ];
}
