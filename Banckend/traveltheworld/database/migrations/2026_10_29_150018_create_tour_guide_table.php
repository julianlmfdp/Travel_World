<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('TourGuide', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('empleadoId');
            $table->string('numeroLicencia')->nullable();
            $table->text('idiomas')->nullable();
            $table->text('biografia')->nullable();
            $table->foreign('empleadoId')->references('id')->on('Employee')->restrictOnDelete();
            $table->timestamp('creadoEn')->nullable();
            $table->timestamp('actualizadoEn')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('TourGuide');
    }
};
