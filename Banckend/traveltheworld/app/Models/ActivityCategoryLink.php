<?php

namespace App\Models;

class ActivityCategoryLink extends TravelModel
{
    protected $table = 'ActivityCategoryLink';

    protected $fillable = [
        'actividadTuristicaId',
        'categoriaActividadId',
    ];

    protected $casts = [
        'actividadTuristicaId' => 'integer',
        'categoriaActividadId' => 'integer',
    ];
}
