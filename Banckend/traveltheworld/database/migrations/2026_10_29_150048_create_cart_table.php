<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('Cart', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('clienteId');
            $table->string('estado');
            $table->foreign('clienteId')->references('id')->on('Customer')->restrictOnDelete();
            $table->timestamp('creadoEn')->nullable();
            $table->timestamp('actualizadoEn')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('Cart');
    }
};
