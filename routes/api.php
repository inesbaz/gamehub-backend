<?php

use Illuminate\Support\Facades\Route;

Route::get('/search', [\App\Http\Controllers\SearchController::class, 'search']);
