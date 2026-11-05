<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ItineraryActivity', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('itinerarioId');
            $table->unsignedBigInteger('actividadTuristicaId');
            $table->time('horaInicio')->nullable();
            $table->time('horaFin')->nullable();
            $table->text('notas')->nullable();
            $table->foreign('itinerarioId')->references('id')->on('Itinerary')->restrictOnDelete();
            $table->foreign('actividadTuristicaId')->references('id')->on('TouristActivity')->restrictOnDelete();
            $table->timestamp('creadoEn')->nullable();
            $table->timestamp('actualizadoEn')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ItineraryActivity');
    }
};
