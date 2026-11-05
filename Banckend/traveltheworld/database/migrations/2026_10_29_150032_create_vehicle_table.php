<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('Vehicle', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('empresaTransporteId');
            $table->string('tipoVehiculo');
            $table->string('matricula');
            $table->integer('capacidad');
            $table->string('estado');
            $table->foreign('empresaTransporteId')->references('id')->on('TransportationCompany')->restrictOnDelete();
            $table->timestamp('creadoEn')->nullable();
            $table->timestamp('actualizadoEn')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('Vehicle');
    }
};
