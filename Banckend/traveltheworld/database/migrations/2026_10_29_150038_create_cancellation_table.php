<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('Cancellation', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reservaId');
            $table->text('motivo');
            $table->dateTime('fechaSolicitud');
            $table->string('estado');
            $table->decimal('cargoCancelacion', 12, 2);
            $table->foreign('reservaId')->references('id')->on('Reservation')->restrictOnDelete();
            $table->timestamp('creadoEn')->nullable();
            $table->timestamp('actualizadoEn')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('Cancellation');
    }
};
