<?php

namespace App\Models;

class ReservationCoupon extends TravelModel
{
    protected $table = 'ReservationCoupon';

    protected $fillable = [
        'reservaId',
        'cuponId',
        'montoDescuento',
    ];

    protected $casts = [
        'reservaId' => 'integer',
        'cuponId' => 'integer',
        'montoDescuento' => 'decimal:2',
    ];
}
