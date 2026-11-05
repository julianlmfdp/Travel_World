<?php

namespace App\Models;

class Transportation extends TravelModel
{
    protected $table = 'Transportation';

    protected $fillable = [
        'empresaTransporteId',
        'vehiculoId',
        'rutaId',
        'fechaSalida',
        'fechaLlegada',
        'precio',
        'estado',
    ];

    protected $casts = [
        'empresaTransporteId' => 'integer',
        'vehiculoId' => 'integer',
        'rutaId' => 'integer',
        'fechaSalida' => 'datetime',
        'fechaLlegada' => 'datetime',
        'precio' => 'decimal:2',
    ];
}
