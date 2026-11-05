<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends TravelModel
{
    protected $table = 'Country';

    protected $fillable = [
        'nombre',
        'codigoIso',
        'descripcion',
    ];

    public function cities(): HasMany
    {
        return $this->hasMany(City::class, 'paisId');
    }
}
