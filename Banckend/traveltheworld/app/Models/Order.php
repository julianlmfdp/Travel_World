<?php

namespace App\Models;

class Order extends TravelModel
{
    protected $table = 'Order';

    protected $fillable = [
        'clienteId',
        'numeroPedido',
        'estado',
        'subtotal',
        'costoEnvio',
        'impuesto',
        'total',
        'fechaPedido',
    ];

    protected $casts = [
        'clienteId' => 'integer',
        'subtotal' => 'decimal:2',
        'costoEnvio' => 'decimal:2',
        'impuesto' => 'decimal:2',
        'total' => 'decimal:2',
        'fechaPedido' => 'datetime',
    ];
}
