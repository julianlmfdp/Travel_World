<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

abstract class TravelModel extends Model
{
    public const CREATED_AT = 'creadoEn';
    public const UPDATED_AT = 'actualizadoEn';
}