<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('Transportation', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('empresaTransporteId');
            $table->unsignedBigInteger('vehiculoId')->nullable();
            $table->unsignedBigInteger('rutaId');
            $table->dateTime('fechaSalida');
            $table->dateTime('fechaLlegada')->nullable();
            $table->decimal('precio', 12, 2);
            $table->string('estado');
            $table->foreign('empresaTransporteId')->references('id')->on('TransportationCompany')->restrictOnDelete();
            $table->foreign('vehiculoId')->references('id')->on('Vehicle')->nullOnDelete();
            $table->foreign('rutaId')->references('id')->on('Route')->restrictOnDelete();
            $table->timestamp('creadoEn')->nullable();
            $table->timestamp('actualizadoEn')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('Transportation');
    }
};
