<?php

namespace App\Models;

class Review extends TravelModel
{
    protected $table = 'review';
    protected $fillable = ['usuarioId', 'destinoId', 'calificacion', 'comentario'];
    protected $casts = ['usuarioId'=>'integer','destinoId'=>'integer','calificacion'=>'integer'];
}