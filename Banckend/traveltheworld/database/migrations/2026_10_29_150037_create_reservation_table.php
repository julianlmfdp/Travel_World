<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('Reservation', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('clienteId');
            $table->unsignedBigInteger('viajeId');
            $table->dateTime('fechaReserva');
            $table->integer('cantidadPersonas');
            $table->decimal('montoTotal', 12, 2);
            $table->string('estado');
            $table->foreign('clienteId')->references('id')->on('Customer')->restrictOnDelete();
            $table->foreign('viajeId')->references('id')->on('Trip')->restrictOnDelete();
            $table->timestamp('creadoEn')->nullable();
            $table->timestamp('actualizadoEn')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('Reservation');
    }
};
