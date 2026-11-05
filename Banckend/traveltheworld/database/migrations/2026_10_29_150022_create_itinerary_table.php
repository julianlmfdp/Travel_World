<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('Itinerary', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('viajeId');
            $table->integer('numeroDia');
            $table->string('titulo')->nullable();
            $table->text('descripcion')->nullable();
            $table->foreign('viajeId')->references('id')->on('Trip')->restrictOnDelete();
            $table->timestamp('creadoEn')->nullable();
            $table->timestamp('actualizadoEn')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('Itinerary');
    }
};
