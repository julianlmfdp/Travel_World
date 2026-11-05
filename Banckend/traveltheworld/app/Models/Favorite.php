<?php

namespace App\Models;

class Favorite extends TravelModel
{
    protected $table = 'Favorite';

    protected $fillable = [
        'clienteId',
        'destinoId',
    ];

    protected $casts = [
        'clienteId' => 'integer',
        'destinoId' => 'integer',
    ];
}
