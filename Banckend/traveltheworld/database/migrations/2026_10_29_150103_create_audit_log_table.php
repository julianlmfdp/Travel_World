<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('AuditLog', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuarioId')->nullable();
            $table->string('accion');
            $table->string('nombreEntidad');
            $table->integer('entidadId');
            $table->json('valoresAnteriores')->nullable();
            $table->json('valoresNuevos')->nullable();
            $table->string('direccionIp')->nullable();
            $table->foreign('usuarioId')->references('id')->on('users')->nullOnDelete();
            $table->timestamp('creadoEn')->nullable();
            $table->timestamp('actualizadoEn')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('AuditLog');
    }
};
