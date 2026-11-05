<?php

namespace App\Models;

class ProviderContact extends TravelModel
{
    protected $table = 'ProviderContact';

    protected $fillable = [
        'proveedorId',
        'nombre',
        'cargo',
        'correo',
        'telefono',
    ];

    protected $casts = [
        'proveedorId' => 'integer',
    ];
}
