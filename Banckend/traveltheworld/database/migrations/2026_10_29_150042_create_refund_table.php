<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('Refund', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pagoId');
            $table->decimal('monto', 12, 2);
            $table->text('motivo');
            $table->string('estado');
            $table->dateTime('fechaReembolso')->nullable();
            $table->foreign('pagoId')->references('id')->on('Payment')->restrictOnDelete();
            $table->timestamp('creadoEn')->nullable();
            $table->timestamp('actualizadoEn')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('Refund');
    }
};
