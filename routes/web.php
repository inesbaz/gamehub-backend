<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::post('/login',    [AuthController::class, 'login'])->middleware('web');
Route::post('/register', [AuthController::class, 'register'])->middleware('web');
Route::post('/logout',   [AuthController::class, 'logout'])->middleware(['web', 'auth:sanctum']);
