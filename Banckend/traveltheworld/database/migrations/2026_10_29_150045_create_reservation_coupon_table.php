<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ReservationCoupon', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reservaId');
            $table->unsignedBigInteger('cuponId');
            $table->decimal('montoDescuento', 12, 2);
            $table->foreign('reservaId')->references('id')->on('Reservation')->restrictOnDelete();
            $table->foreign('cuponId')->references('id')->on('Coupon')->restrictOnDelete();
            $table->unique(['reservaId', 'cuponId'], 'reservation_coupon_unique');
            $table->timestamp('creadoEn')->nullable();
            $table->timestamp('actualizadoEn')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ReservationCoupon');
    }
};
