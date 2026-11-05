<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('name', 'nombre');
            $table->renameColumn('email', 'correo');
            $table->renameColumn('email_verified_at', 'fechaVerificacionCorreo');
            $table->renameColumn('password', 'contrasena');
            $table->renameColumn('remember_token', 'tokenRecordar');
            $table->renameColumn('created_at', 'creadoEn');
            $table->renameColumn('updated_at', 'actualizadoEn');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('nombre', 'name');
            $table->renameColumn('correo', 'email');
            $table->renameColumn('fechaVerificacionCorreo', 'email_verified_at');
            $table->renameColumn('contrasena', 'password');
            $table->renameColumn('tokenRecordar', 'remember_token');
            $table->renameColumn('creadoEn', 'created_at');
            $table->renameColumn('actualizadoEn', 'updated_at');
        });
    }
};
