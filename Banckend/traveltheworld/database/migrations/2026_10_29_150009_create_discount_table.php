<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('Discount', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('tipoDescuento');
            $table->decimal('valor', 12, 2);
            $table->date('fechaInicio');
            $table->date('fechaFin');
            $table->string('estado');
            $table->timestamp('creadoEn')->nullable();
            $table->timestamp('actualizadoEn')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('Discount');
    }
};
