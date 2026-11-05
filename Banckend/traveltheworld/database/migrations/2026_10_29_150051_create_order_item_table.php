<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('OrderItem', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pedidoId');
            $table->unsignedBigInteger('productoId');
            $table->integer('cantidad');
            $table->decimal('precioUnitario', 12, 2);
            $table->decimal('totalLinea', 12, 2);
            $table->foreign('pedidoId')->references('id')->on('Order')->restrictOnDelete();
            $table->foreign('productoId')->references('id')->on('Product')->restrictOnDelete();
            $table->timestamp('creadoEn')->nullable();
            $table->timestamp('actualizadoEn')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('OrderItem');
    }
};
