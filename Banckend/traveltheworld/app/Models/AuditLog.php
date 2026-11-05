<?php

namespace App\Models;

class AuditLog extends TravelModel
{
    protected $table = 'AuditLog';

    protected $fillable = [
        'usuarioId',
        'accion',
        'nombreEntidad',
        'entidadId',
        'valoresAnteriores',
        'valoresNuevos',
        'direccionIp',
    ];

    protected $casts = [
        'usuarioId' => 'integer',
        'entidadId' => 'integer',
        'valoresAnteriores' => 'array',
        'valoresNuevos' => 'array',
    ];
}
