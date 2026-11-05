<?php

namespace App\Models;

class Employee extends TravelModel
{
    protected $table = 'Employee';

    protected $fillable = [
        'usuarioId',
        'codigoEmpleado',
        'cargo',
        'fechaContratacion',
    ];

    protected $casts = [
        'usuarioId' => 'integer',
        'fechaContratacion' => 'date',
    ];
}
