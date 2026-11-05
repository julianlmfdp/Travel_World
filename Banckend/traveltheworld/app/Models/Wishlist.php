<?php

namespace App\Models;

class Wishlist extends TravelModel
{
    protected $table = 'Wishlist';

    protected $fillable = [
        'clienteId',
        'nombre',
    ];

    protected $casts = [
        'clienteId' => 'integer',
    ];
}
