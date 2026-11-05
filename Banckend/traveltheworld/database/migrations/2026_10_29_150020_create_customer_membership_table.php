<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('CustomerMembership', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('clienteId');
            $table->unsignedBigInteger('membresiaId');
            $table->date('fechaInicio');
            $table->date('fechaFin');
            $table->string('estado');
            $table->foreign('clienteId')->references('id')->on('Customer')->restrictOnDelete();
            $table->foreign('membresiaId')->references('id')->on('Membership')->restrictOnDelete();
            $table->timestamp('creadoEn')->nullable();
            $table->timestamp('actualizadoEn')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('CustomerMembership');
    }
};
