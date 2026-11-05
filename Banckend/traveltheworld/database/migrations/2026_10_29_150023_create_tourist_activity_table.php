<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('TouristActivity', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('destinoId');
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->integer('duracionMinutos')->nullable();
            $table->decimal('precio', 12, 2);
            $table->string('ubicacion')->nullable();
            $table->string('estado');
            $table->foreign('destinoId')->references('id')->on('Destination')->restrictOnDelete();
            $table->timestamp('creadoEn')->nullable();
            $table->timestamp('actualizadoEn')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('TouristActivity');
    }
};
