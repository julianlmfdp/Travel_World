<?php

namespace App\Models;

class ProductCategory extends TravelModel
{
    protected $table = 'ProductCategory';

    protected $fillable = [
        'nombre',
        'descripcion',
    ];
}
