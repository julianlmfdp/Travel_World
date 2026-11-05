<?php

namespace App\Models;

class Report extends TravelModel
{
    protected $table = 'Report';

    protected $fillable = [
        'tipoReporteId',
        'usuarioId',
        'titulo',
        'detalles',
        'estado',
    ];

    protected $casts = [
        'tipoReporteId' => 'integer',
        'usuarioId' => 'integer',
    ];
}
