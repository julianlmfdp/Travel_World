<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ProviderContact', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('proveedorId');
            $table->string('nombre');
            $table->string('cargo')->nullable();
            $table->string('correo')->nullable();
            $table->string('telefono')->nullable();
            $table->foreign('proveedorId')->references('id')->on('Provider')->restrictOnDelete();
            $table->timestamp('creadoEn')->nullable();
            $table->timestamp('actualizadoEn')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ProviderContact');
    }
};
