<?php

namespace App\Models;

class Room extends TravelModel
{
    protected $table = 'Room';

    protected $fillable = [
        'hotelId',
        'tipoHabitacionId',
        'numeroHabitacion',
        'precioPorNoche',
        'estado',
    ];

    protected $casts = [
        'hotelId' => 'integer',
        'tipoHabitacionId' => 'integer',
        'precioPorNoche' => 'decimal:2',
    ];
}
