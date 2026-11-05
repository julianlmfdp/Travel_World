<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('Route', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ciudadOrigenId');
            $table->unsignedBigInteger('ciudadDestinoId');
            $table->decimal('distanciaKm', 12, 2)->nullable();
            $table->integer('duracionEstimada')->nullable();
            $table->foreign('ciudadOrigenId')->references('id')->on('City')->restrictOnDelete();
            $table->foreign('ciudadDestinoId')->references('id')->on('City')->restrictOnDelete();
            $table->timestamp('creadoEn')->nullable();
            $table->timestamp('actualizadoEn')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('Route');
    }
};
