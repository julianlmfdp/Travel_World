<?php

namespace App\Models;

class TripType extends TravelModel
{
    protected $table = 'TripType';

    protected $fillable = [
        'nombre',
        'descripcion',
    ];
}
