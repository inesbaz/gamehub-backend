<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// Devuelve el usuario autenticado que solo entra si tiene la cookie de sesión
Route::middleware('auth:sanctum')->get('/me', fn(Request $r) => $r->user());

// Endpoint público búsqueda que no requiere login
Route::get('/search', [\App\Http\Controllers\SearchController::class, 'search']);
