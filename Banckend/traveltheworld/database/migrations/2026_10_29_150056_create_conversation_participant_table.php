<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ConversationParticipant', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('conversacionId');
            $table->unsignedBigInteger('usuarioId');
            $table->dateTime('fechaIngreso');
            $table->foreign('conversacionId')->references('id')->on('Conversation')->restrictOnDelete();
            $table->foreign('usuarioId')->references('id')->on('users')->restrictOnDelete();
            $table->timestamp('creadoEn')->nullable();
            $table->timestamp('actualizadoEn')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ConversationParticipant');
    }
};
