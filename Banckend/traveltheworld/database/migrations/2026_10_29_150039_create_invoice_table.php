<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('Invoice', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reservaId');
            $table->string('numeroFactura');
            $table->date('fechaEmision');
            $table->decimal('subtotal', 12, 2);
            $table->decimal('impuesto', 12, 2);
            $table->decimal('total', 12, 2);
            $table->string('estado');
            $table->foreign('reservaId')->references('id')->on('Reservation')->restrictOnDelete();
            $table->timestamp('creadoEn')->nullable();
            $table->timestamp('actualizadoEn')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('Invoice');
    }
};
