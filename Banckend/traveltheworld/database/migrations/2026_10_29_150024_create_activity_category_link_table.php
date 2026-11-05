<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ActivityCategoryLink', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('actividadTuristicaId');
            $table->unsignedBigInteger('categoriaActividadId');
            $table->foreign('actividadTuristicaId')->references('id')->on('TouristActivity')->restrictOnDelete();
            $table->foreign('categoriaActividadId')->references('id')->on('ActivityCategory')->restrictOnDelete();
            $table->unique(['actividadTuristicaId', 'categoriaActividadId'], 'act_cat_link_unique');
            $table->timestamp('creadoEn')->nullable();
            $table->timestamp('actualizadoEn')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ActivityCategoryLink');
    }
};
