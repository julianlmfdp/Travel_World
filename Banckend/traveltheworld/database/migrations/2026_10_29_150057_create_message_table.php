<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('Message', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('conversacionId');
            $table->unsignedBigInteger('usuarioRemitenteId');
            $table->text('contenido');
            $table->dateTime('fechaEnvio');
            $table->dateTime('fechaLectura')->nullable();
            $table->foreign('conversacionId')->references('id')->on('Conversation')->restrictOnDelete();
            $table->foreign('usuarioRemitenteId')->references('id')->on('users')->restrictOnDelete();
            $table->timestamp('creadoEn')->nullable();
            $table->timestamp('actualizadoEn')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('Message');
    }
};
