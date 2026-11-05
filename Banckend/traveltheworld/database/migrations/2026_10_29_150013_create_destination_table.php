<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('Destination', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ciudadId');
            $table->string('nombre');
            $table->string('slug');
            $table->text('descripcion')->nullable();
            $table->string('direccion')->nullable();
            $table->decimal('latitud', 12, 2)->nullable();
            $table->decimal('longitud', 12, 2)->nullable();
            $table->string('imagenPortada')->nullable();
            $table->string('estado');
            $table->foreign('ciudadId')->references('id')->on('City')->restrictOnDelete();
            $table->timestamp('creadoEn')->nullable();
            $table->timestamp('actualizadoEn')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('Destination');
    }
};
