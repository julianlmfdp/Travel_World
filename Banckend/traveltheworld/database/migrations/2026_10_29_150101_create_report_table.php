<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('Report', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipoReporteId');
            $table->unsignedBigInteger('usuarioId');
            $table->string('titulo');
            $table->text('detalles')->nullable();
            $table->string('estado');
            $table->foreign('tipoReporteId')->references('id')->on('ReportType')->restrictOnDelete();
            $table->foreign('usuarioId')->references('id')->on('users')->restrictOnDelete();
            $table->timestamp('creadoEn')->nullable();
            $table->timestamp('actualizadoEn')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('Report');
    }
};
