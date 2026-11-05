<?php

namespace App\Models;

class TripHotel extends TravelModel
{
    protected $table = 'TripHotel';

    protected $fillable = [
        'viajeId',
        'hotelId',
        'tipoHabitacionId',
        'fechaEntrada',
        'fechaSalida',
        'precio',
    ];

    protected $casts = [
        'viajeId' => 'integer',
        'hotelId' => 'integer',
        'tipoHabitacionId' => 'integer',
        'fechaEntrada' => 'date',
        'fechaSalida' => 'date',
        'precio' => 'decimal:2',
    ];
}
