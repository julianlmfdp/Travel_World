<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('PaymentReceipt', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pagoId');
            $table->string('numeroComprobante');
            $table->string('urlArchivo')->nullable();
            $table->date('fechaEmision');
            $table->foreign('pagoId')->references('id')->on('Payment')->restrictOnDelete();
            $table->timestamp('creadoEn')->nullable();
            $table->timestamp('actualizadoEn')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('PaymentReceipt');
    }
};
