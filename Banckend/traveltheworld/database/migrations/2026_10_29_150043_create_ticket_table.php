<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('Ticket', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reservaId');
            $table->string('numeroTiquete');
            $table->string('nombrePasajero');
            $table->date('fechaEmision');
            $table->string('estado');
            $table->foreign('reservaId')->references('id')->on('Reservation')->restrictOnDelete();
            $table->timestamp('creadoEn')->nullable();
            $table->timestamp('actualizadoEn')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('Ticket');
    }
};
