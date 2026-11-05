<?php

namespace App\Models;

class Customer extends TravelModel
{
    protected $table = 'Customer';

    protected $fillable = [
        'usuarioId',
        'codigoCliente',
    ];

    protected $casts = [
        'usuarioId' => 'integer',
    ];
}
