<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('TouristAttraction', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('destinoId');
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->string('direccion')->nullable();
            $table->text('horarioApertura')->nullable();
            $table->decimal('precioEntrada', 12, 2)->nullable();
            $table->foreign('destinoId')->references('id')->on('Destination')->restrictOnDelete();
            $table->timestamp('creadoEn')->nullable();
            $table->timestamp('actualizadoEn')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('TouristAttraction');
    }
};
