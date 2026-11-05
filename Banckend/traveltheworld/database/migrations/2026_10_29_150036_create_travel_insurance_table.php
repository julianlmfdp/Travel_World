<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('TravelInsurance', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('proveedorId')->nullable();
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->decimal('montoCobertura', 12, 2);
            $table->decimal('precio', 12, 2);
            $table->string('estado');
            $table->foreign('proveedorId')->references('id')->on('Provider')->nullOnDelete();
            $table->timestamp('creadoEn')->nullable();
            $table->timestamp('actualizadoEn')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('TravelInsurance');
    }
};
