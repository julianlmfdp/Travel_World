<?php

namespace App\Models;

class CustomerMembership extends TravelModel
{
    protected $table = 'CustomerMembership';

    protected $fillable = [
        'clienteId',
        'membresiaId',
        'fechaInicio',
        'fechaFin',
        'estado',
    ];

    protected $casts = [
        'clienteId' => 'integer',
        'membresiaId' => 'integer',
        'fechaInicio' => 'date',
        'fechaFin' => 'date',
    ];
}
