<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('Payment', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('facturaId');
            $table->decimal('monto', 12, 2);
            $table->string('metodoPago');
            $table->string('estado');
            $table->dateTime('fechaPago')->nullable();
            $table->string('referenciaTransaccion')->nullable();
            $table->foreign('facturaId')->references('id')->on('Invoice')->restrictOnDelete();
            $table->timestamp('creadoEn')->nullable();
            $table->timestamp('actualizadoEn')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('Payment');
    }
};
