<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('TripTransportation', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('viajeId');
            $table->unsignedBigInteger('transporteId');
            $table->foreign('viajeId')->references('id')->on('Trip')->restrictOnDelete();
            $table->foreign('transporteId')->references('id')->on('Transportation')->restrictOnDelete();
            $table->unique(['viajeId', 'transporteId'], 'trip_transport_unique');
            $table->timestamp('creadoEn')->nullable();
            $table->timestamp('actualizadoEn')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('TripTransportation');
    }
};
