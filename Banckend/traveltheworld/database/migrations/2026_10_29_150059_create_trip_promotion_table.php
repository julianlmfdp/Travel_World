<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('TripPromotion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('promocionId');
            $table->unsignedBigInteger('viajeId');
            $table->foreign('promocionId')->references('id')->on('Promotion')->restrictOnDelete();
            $table->foreign('viajeId')->references('id')->on('Trip')->restrictOnDelete();
            $table->unique(['promocionId', 'viajeId'], 'trip_promotion_unique');
            $table->timestamp('creadoEn')->nullable();
            $table->timestamp('actualizadoEn')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('TripPromotion');
    }
};
