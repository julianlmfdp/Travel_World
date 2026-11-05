<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('TripHotel', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('viajeId');
            $table->unsignedBigInteger('hotelId');
            $table->unsignedBigInteger('tipoHabitacionId')->nullable();
            $table->date('fechaEntrada');
            $table->date('fechaSalida');
            $table->decimal('precio', 12, 2);
            $table->foreign('viajeId')->references('id')->on('Trip')->restrictOnDelete();
            $table->foreign('hotelId')->references('id')->on('Hotel')->restrictOnDelete();
            $table->foreign('tipoHabitacionId')->references('id')->on('RoomType')->nullOnDelete();
            $table->unique(['viajeId', 'hotelId'], 'trip_hotel_unique');
            $table->timestamp('creadoEn')->nullable();
            $table->timestamp('actualizadoEn')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('TripHotel');
    }
};
