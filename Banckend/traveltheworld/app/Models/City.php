<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class City extends TravelModel
{
    protected $table = 'City';

    protected $fillable = [
        'paisId',
        'nombre',
        'region',
        'descripcion',
    ];

    protected $casts = [
        'paisId' => 'integer',
    ];

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'paisId');
    }
}
