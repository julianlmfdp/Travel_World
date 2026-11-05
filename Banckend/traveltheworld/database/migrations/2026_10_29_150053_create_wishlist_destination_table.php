<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('WishlistDestination', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('listaDeseosId');
            $table->unsignedBigInteger('destinoId');
            $table->foreign('listaDeseosId')->references('id')->on('Wishlist')->restrictOnDelete();
            $table->foreign('destinoId')->references('id')->on('Destination')->restrictOnDelete();
            $table->unique(['listaDeseosId', 'destinoId'], 'wishlist_dest_unique');
            $table->timestamp('creadoEn')->nullable();
            $table->timestamp('actualizadoEn')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('WishlistDestination');
    }
};
