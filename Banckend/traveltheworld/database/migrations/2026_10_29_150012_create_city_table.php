<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('City', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paisId');
            $table->string('nombre');
            $table->string('region')->nullable();
            $table->text('descripcion')->nullable();
            $table->foreign('paisId')->references('id')->on('Country')->restrictOnDelete();
            $table->timestamp('creadoEn')->nullable();
            $table->timestamp('actualizadoEn')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('City');
    }
};
