<?php

namespace App\Models;

class RoomType extends TravelModel
{
    protected $table = 'RoomType';

    protected $fillable = [
        'hotelId',
        'nombre',
        'capacidad',
        'descripcion',
    ];

    protected $casts = [
        'hotelId' => 'integer',
        'capacidad' => 'integer',
    ];
}
