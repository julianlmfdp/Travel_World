<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('personaId')->nullable();
            $table->string('nombreUsuario')->nullable()->unique();
            $table->string('rol')->default('customer');
            $table->boolean('estado')->default(true);
            $table->foreign('personaId')->references('id')->on('Person')->nullOnDelete();
        });

        Schema::table('review', function (Blueprint $table) {
            $table->renameColumn('user_id', 'usuarioId');
            $table->renameColumn('destination_id', 'destinoId');
            $table->renameColumn('rating', 'calificacion');
            $table->renameColumn('comment', 'comentario');
            $table->renameColumn('created_at', 'creadoEn');
            $table->renameColumn('updated_at', 'actualizadoEn');
        });
    }

    public function down(): void
    {
        Schema::table('review', function (Blueprint $table) {
            $table->renameColumn('usuarioId', 'user_id');
            $table->renameColumn('destinoId', 'destination_id');
            $table->renameColumn('calificacion', 'rating');
            $table->renameColumn('comentario', 'comment');
            $table->renameColumn('creadoEn', 'created_at');
            $table->renameColumn('actualizadoEn', 'updated_at');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['personaId']);
            $table->dropUnique(['nombreUsuario']);
            $table->dropColumn(['personaId', 'nombreUsuario', 'rol', 'estado']);
        });
    }
};