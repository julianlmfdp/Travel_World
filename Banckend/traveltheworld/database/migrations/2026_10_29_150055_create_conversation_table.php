<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('Conversation', function (Blueprint $table) {
            $table->id();
            $table->string('asunto');
            $table->unsignedBigInteger('usuarioCreadorId');
            $table->string('estado');
            $table->foreign('usuarioCreadorId')->references('id')->on('users')->restrictOnDelete();
            $table->timestamp('creadoEn')->nullable();
            $table->timestamp('actualizadoEn')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('Conversation');
    }
};
