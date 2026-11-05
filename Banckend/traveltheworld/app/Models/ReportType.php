<?php

namespace App\Models;

class ReportType extends TravelModel
{
    protected $table = 'ReportType';

    protected $fillable = [
        'nombre',
        'descripcion',
    ];
}
