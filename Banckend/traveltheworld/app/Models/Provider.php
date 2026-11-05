<?php

namespace App\Models;

class Provider extends TravelModel
{
    protected $table = 'Provider';

    protected $fillable = [
        'nombre',
        'identificacionFiscal',
        'correo',
        'telefono',
        'direccion',
        'estado',
    ];
}
