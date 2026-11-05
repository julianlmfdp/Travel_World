<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('Trip', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('destinoId');
            $table->unsignedBigInteger('tipoViajeId');
            $table->unsignedBigInteger('temporadaId')->nullable();
            $table->string('titulo');
            $table->text('descripcion')->nullable();
            $table->date('fechaInicio');
            $table->date('fechaFin');
            $table->decimal('precio', 12, 2);
            $table->integer('capacidad');
            $table->string('estado');
            $table->foreign('destinoId')->references('id')->on('Destination')->restrictOnDelete();
            $table->foreign('tipoViajeId')->references('id')->on('TripType')->restrictOnDelete();
            $table->foreign('temporadaId')->references('id')->on('Season')->nullOnDelete();
            $table->timestamp('creadoEn')->nullable();
            $table->timestamp('actualizadoEn')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('Trip');
    }
};
