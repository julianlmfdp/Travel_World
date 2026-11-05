<?php

namespace App\Models;

class ActivityCategory extends TravelModel
{
    protected $table = 'ActivityCategory';

    protected $fillable = [
        'nombre',
        'descripcion',
    ];
}
