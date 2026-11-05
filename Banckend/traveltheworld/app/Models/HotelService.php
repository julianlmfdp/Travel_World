<?php

namespace App\Models;

class HotelService extends TravelModel
{
    protected $table = 'HotelService';

    protected $fillable = [
        'hotelId',
        'nombre',
        'descripcion',
    ];

    protected $casts = [
        'hotelId' => 'integer',
    ];
}
