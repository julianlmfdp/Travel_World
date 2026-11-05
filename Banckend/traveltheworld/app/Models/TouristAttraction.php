<?php

namespace App\Models;

class TouristAttraction extends TravelModel
{
    protected $table = 'TouristAttraction';

    protected $fillable = [
        'destinoId',
        'nombre',
        'descripcion',
        'direccion',
        'horarioApertura',
        'precioEntrada',
    ];

    protected $casts = [
        'destinoId' => 'integer',
        'precioEntrada' => 'decimal:2',
    ];
}
