<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('Room', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hotelId');
            $table->unsignedBigInteger('tipoHabitacionId');
            $table->string('numeroHabitacion');
            $table->decimal('precioPorNoche', 12, 2);
            $table->string('estado');
            $table->foreign('hotelId')->references('id')->on('Hotel')->restrictOnDelete();
            $table->foreign('tipoHabitacionId')->references('id')->on('RoomType')->restrictOnDelete();
            $table->timestamp('creadoEn')->nullable();
            $table->timestamp('actualizadoEn')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('Room');
    }
};
