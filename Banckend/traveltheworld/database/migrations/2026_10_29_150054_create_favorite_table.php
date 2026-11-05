<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('Favorite', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('clienteId');
            $table->unsignedBigInteger('destinoId');
            $table->foreign('clienteId')->references('id')->on('Customer')->restrictOnDelete();
            $table->foreign('destinoId')->references('id')->on('Destination')->restrictOnDelete();
            $table->unique(['clienteId', 'destinoId'], 'favorite_dest_unique');
            $table->timestamp('creadoEn')->nullable();
            $table->timestamp('actualizadoEn')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('Favorite');
    }
};
