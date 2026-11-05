<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('Order', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('clienteId');
            $table->string('numeroPedido');
            $table->string('estado');
            $table->decimal('subtotal', 12, 2);
            $table->decimal('costoEnvio', 12, 2);
            $table->decimal('impuesto', 12, 2);
            $table->decimal('total', 12, 2);
            $table->dateTime('fechaPedido');
            $table->foreign('clienteId')->references('id')->on('Customer')->restrictOnDelete();
            $table->timestamp('creadoEn')->nullable();
            $table->timestamp('actualizadoEn')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('Order');
    }
};
