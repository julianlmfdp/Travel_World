<?php

namespace App\Models;

class Person extends TravelModel
{
    protected $table = 'Person';

    protected $fillable = [
        'nombres',
        'apellidos',
        'tipoDocumento',
        'numeroDocumento',
        'fechaNacimiento',
        'telefono',
        'correo',
    ];

    protected $casts = [
        'fechaNacimiento' => 'date',
    ];
}
