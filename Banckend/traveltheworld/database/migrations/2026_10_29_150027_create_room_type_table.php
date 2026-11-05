<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('RoomType', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hotelId');
            $table->string('nombre');
            $table->integer('capacidad');
            $table->text('descripcion')->nullable();
            $table->foreign('hotelId')->references('id')->on('Hotel')->restrictOnDelete();
            $table->timestamp('creadoEn')->nullable();
            $table->timestamp('actualizadoEn')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('RoomType');
    }
};
