<?php

namespace App\Models;

class DestinationCategory extends TravelModel
{
    protected $table = 'DestinationCategory';

    protected $fillable = [
        'nombre',
        'descripcion',
    ];
}
