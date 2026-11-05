<?php

namespace App\Models;

class Reservation extends TravelModel
{
    protected $table = 'Reservation';

    protected $fillable = [
        'clienteId',
        'viajeId',
        'fechaReserva',
        'cantidadPersonas',
        'montoTotal',
        'estado',
    ];

    protected $casts = [
        'clienteId' => 'integer',
        'viajeId' => 'integer',
        'fechaReserva' => 'datetime',
        'cantidadPersonas' => 'integer',
        'montoTotal' => 'decimal:2',
    ];
}
