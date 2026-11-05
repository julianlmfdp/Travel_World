<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('Coupon', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('descuentoId');
            $table->string('codigo');
            $table->date('fechaInicio');
            $table->date('fechaFin');
            $table->integer('limiteUsos')->nullable();
            $table->integer('usosRealizados');
            $table->string('estado');
            $table->foreign('descuentoId')->references('id')->on('Discount')->restrictOnDelete();
            $table->timestamp('creadoEn')->nullable();
            $table->timestamp('actualizadoEn')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('Coupon');
    }
};
