<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('Employee', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuarioId');
            $table->string('codigoEmpleado')->nullable();
            $table->string('cargo')->nullable();
            $table->date('fechaContratacion')->nullable();
            $table->foreign('usuarioId')->references('id')->on('users')->restrictOnDelete();
            $table->timestamp('creadoEn')->nullable();
            $table->timestamp('actualizadoEn')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('Employee');
    }
};
