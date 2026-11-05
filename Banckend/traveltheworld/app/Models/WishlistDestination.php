<?php

namespace App\Models;

class WishlistDestination extends TravelModel
{
    protected $table = 'WishlistDestination';

    protected $fillable = [
        'listaDeseosId',
        'destinoId',
    ];

    protected $casts = [
        'listaDeseosId' => 'integer',
        'destinoId' => 'integer',
    ];
}
