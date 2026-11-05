<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    private function present(User $user): array
    {
        return [
            'id' => $user->id,
            'personaId' => $user->personaId,
            'nombreUsuario' => $user->nombreUsuario,
            'nombre' => $user->nombre,
            'correo' => $user->correo,
            'rol' => $user->rol,
            'estado' => $user->estado,
            'fechaVerificacionCorreo' => $user->fechaVerificacionCorreo,
            'creadoEn' => $user->creadoEn,
            'actualizadoEn' => $user->actualizadoEn,
        ];
    }

    public function index()
    {
        return response()->json(User::latest('creadoEn')->get()->map(fn (User $user) => $this->present($user)), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'personaId' => 'nullable|integer|exists:Person,id',
            'nombreUsuario' => 'nullable|string|max:255|unique:users,nombreUsuario',
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|max:255|unique:users,correo',
            'contrasena' => 'required|string|min:8',
            'rol' => 'sometimes|string|max:50',
            'estado' => 'sometimes|boolean',
            'fechaVerificacionCorreo' => 'nullable|date',
        ]);
        $data['contrasena'] = Hash::make($data['contrasena']);
        $user = User::create($data);

        return response()->json($this->present($user), 201);
    }

    public function show(User $user)
    {
        return response()->json($this->present($user), 200);
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'personaId' => 'sometimes|nullable|integer|exists:Person,id',
            'nombreUsuario' => ['sometimes', 'nullable', 'string', 'max:255', Rule::unique('users', 'nombreUsuario')->ignore($user->id)],
            'nombre' => 'sometimes|required|string|max:255',
            'correo' => ['sometimes', 'required', 'email', 'max:255', Rule::unique('users', 'correo')->ignore($user->id)],
            'contrasena' => 'sometimes|required|string|min:8',
            'rol' => 'sometimes|string|max:50',
            'estado' => 'sometimes|boolean',
            'fechaVerificacionCorreo' => 'sometimes|nullable|date',
        ]);
        if (array_key_exists('contrasena', $data)) {
            $data['contrasena'] = Hash::make($data['contrasena']);
        }
        $user->update($data);

        return response()->json($this->present($user->fresh()), 200);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return response()->json(['message' => 'Usuario eliminado'], 200);
    }
}
