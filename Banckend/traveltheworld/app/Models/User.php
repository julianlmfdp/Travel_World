<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public const CREATED_AT = 'creadoEn';
    public const UPDATED_AT = 'actualizadoEn';

    protected $fillable = ['personaId', 'nombreUsuario', 'nombre', 'correo', 'contrasena', 'rol', 'estado', 'fechaVerificacionCorreo'];
    protected $hidden = ['contrasena', 'tokenRecordar'];

    protected function casts(): array
    {
        return [
            'fechaVerificacionCorreo' => 'datetime',
            'contrasena' => 'hashed',
            'personaId' => 'integer',
            'estado' => 'boolean',
        ];
    }

    public function getAuthPasswordName(): string
    {
        return 'contrasena';
    }

    public function getEmailForPasswordReset(): string
    {
        return $this->correo;
    }

    public function getRememberTokenName(): string
    {
        return 'tokenRecordar';
    }
}
