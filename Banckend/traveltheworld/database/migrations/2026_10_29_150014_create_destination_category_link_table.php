<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('DestinationCategoryLink', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('destinoId');
            $table->unsignedBigInteger('categoriaDestinoId');
            $table->foreign('destinoId')->references('id')->on('Destination')->restrictOnDelete();
            $table->foreign('categoriaDestinoId')->references('id')->on('DestinationCategory')->restrictOnDelete();
            $table->unique(['destinoId', 'categoriaDestinoId'], 'dest_cat_link_unique');
            $table->timestamp('creadoEn')->nullable();
            $table->timestamp('actualizadoEn')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('DestinationCategoryLink');
    }
};
