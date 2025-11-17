<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // POST /login
    public function login(Request $request)
    {
        $data = $request->validate([
            'login'    => ['required', 'string'], // puede ser email o username
            'password' => ['required', 'string'],
        ]);

        // Detecta si es email o username
        $field = filter_var($data['login'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if (! Auth::attempt([$field => $data['login'], 'password' => $data['password']])) {
            // Devuelve credenciales inválidas
            return response()->json(['message' => 'Credenciales incorrectas'], 422);
        }
        
        // Cambia el ID de sesión tras un login correcto
        $request->session()->regenerate();

        // Devuelve el usuario autenticado serializado a JSON
        return response()->json(['user' => $request->user()]);
    }

    // POST /register
    public function register(Request $request)
    {
        $minBirthdate = now()->subYears(13)->toDateString();

        $data = $request->validate([
            'name'                  => ['required', 'string', 'min:2', 'max:60'],
            'username'              => ['required', 'string', 'regex:/^[A-Za-z0-9_]{3,20}$/', 'unique:users,username'],
            'email'                 => ['required', 'email', 'unique:users,email'],
            'password'              => ['required', 'string', 'min:8', 'confirmed'],
            'avatar_url'            => ['nullable', 'url'],
            'country'               => ['nullable', 'string', 'size:2'],
            'birthdate'             => ['nullable', 'date', 'before_or_equal:' . $minBirthdate],
        ]);

        $user = \App\Models\User::create([
            'name'       => $data['name'],
            'username'   => $data['username'],
            'email'      => $data['email'],
            'password'   => Hash::make($data['password']),
            'avatar_url' => $data['avatar_url'] ?? null,
            'country'    => $data['country'] ?? null,
            'birthdate'  => $data['birthdate'] ?? null,
        ]);

        // Autologin
        Auth::login($user);
        $request->session()->regenerate();

        return response()->json(['user' => $user], 201);
    }

    // POST /logout
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        // Invalida la sesión y regenera el token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Si todo sale bien, no se envían datos
        return response()->noContent();
    }

    // GET /api/me
    public function me(Request $request)
    {
        return response()->json($request->user());
    }
}
