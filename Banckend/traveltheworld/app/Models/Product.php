<?php

namespace App\Models;

class Product extends TravelModel
{
    protected $table = 'Product';

    protected $fillable = [
        'categoriaProductoId',
        'codigoSku',
        'nombre',
        'descripcion',
        'precio',
        'estado',
    ];

    protected $casts = [
        'categoriaProductoId' => 'integer',
        'precio' => 'decimal:2',
    ];
}
