<?php

namespace App\Models;

class PaymentReceipt extends TravelModel
{
    protected $table = 'PaymentReceipt';

    protected $fillable = [
        'pagoId',
        'numeroComprobante',
        'urlArchivo',
        'fechaEmision',
    ];

    protected $casts = [
        'pagoId' => 'integer',
        'fechaEmision' => 'date',
    ];
}
