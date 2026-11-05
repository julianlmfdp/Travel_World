<?php

namespace App\Models;

class DestinationCategoryLink extends TravelModel
{
    protected $table = 'DestinationCategoryLink';

    protected $fillable = [
        'destinoId',
        'categoriaDestinoId',
    ];

    protected $casts = [
        'destinoId' => 'integer',
        'categoriaDestinoId' => 'integer',
    ];
}
