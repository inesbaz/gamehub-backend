<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\GameController;
use App\Http\Controllers\RecommendationController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;

/* PÚBLICO */

// Búsqueda
Route::get('/search', [SearchController::class, 'search']);
// Route::get('/advanced-search', [SearchController::class, 'advancedSearch']); // sin implementar

// Juegos y catálogos
Route::get('/games', [GameController::class, 'showGames']);
Route::get('/games/{slug}', [GameController::class, 'show']);

Route::get('/genres', [GameController::class, 'showGenres']);
Route::get('/genres/top', [GameController::class, 'showTopGenres']);
Route::get('/genres/{slug}/games', [GameController::class, 'showGamesByGenre']);

Route::get('/tags/{slug}/games', [GameController::class, 'showGamesByTag']);

Route::get('/emotions', [GameController::class, 'showEmotions']);
Route::get('/emotions/{slug}/games', [GameController::class, 'showGamesByEmotion']);

Route::get('/trending-week', [GameController::class, 'showTrendingWeek']);
Route::get('/trending-week/{kind}', [GameController::class, 'showTrendingWeekList']);

Route::get('/games/{slug}/reviews', [GameController::class, 'showReviews']);

// Actividad y social
Route::get('/activity', [SocialController::class, 'showActivity']);
Route::get('/posts/{id}', [SocialController::class, 'showPost']);

// Perfiles
Route::get('/users/{username}', [ProfileController::class, 'show']); // incluye cabecera, destacados, gustos y social 
Route::get('/users/{username}/activity', [ProfileController::class, 'activity']);
Route::get('/users/{username}/reviews', [ProfileController::class, 'reviews']);
Route::get('/users/{username}/ratings', [ProfileController::class, 'ratings']);
Route::get('/users/{username}/posts', [ProfileController::class, 'posts']);
Route::get('/users/{username}/followers', [ProfileController::class, 'followers']);
Route::get('/users/{username}/following', [ProfileController::class, 'following']);

/* REQUIERE LOGIN */

Route::middleware('auth:sanctum')->group(function () {

    // Usuario autenticado
    Route::get('/me', fn (Request $r) => $r->user());

    // Reviews
    Route::post('/games/{slug}/review', [GameController::class, 'storeReview']);
    Route::put('/games/{slug}/review/{id}', [GameController::class, 'updateReview']);
    Route::delete('/games/{slug}/review/{id}', [GameController::class, 'deleteReview']);

    // Notas
    Route::get('/games/{slug}/rating', [GameController::class, 'showMyRating']);
    Route::post('/games/{slug}/rating', [GameController::class, 'upsertRating']);
    Route::delete('/games/{slug}/rating', [GameController::class, 'deleteRating']);

    // Likes y comentarios
    Route::post('/like', [SocialController::class, 'toggleLike']);
    Route::post('/posts/{id}/comment', [SocialController::class, 'storeComment']);
    Route::put('/comment/{id}', [SocialController::class, 'updateComment']);
    Route::delete('/comment/{id}', [SocialController::class, 'deleteComment']);

    // Recomendaciones y jugadores afines
    Route::get('/recommendations/blocks', [RecommendationController::class, 'showRecommendationBlocks']);
    Route::get('/recommendations/games', [RecommendationController::class, 'showRecommendationGames']);
    Route::get('/soulmates', [RecommendationController::class, 'showSoulmates']);
    Route::get('/soulmates/{id}/compare', [RecommendationController::class, 'showSoulmateCompare']);
    Route::get('/soulmates/{id}/recommended', [RecommendationController::class, 'showSoulmateRecommendedGames']);

    // Perfil y acciones del usuario
    Route::post('/users/{username}/follow', [ProfileController::class, 'follow']);
    Route::delete('/users/{username}/follow', [ProfileController::class, 'unfollow']);

    Route::put('/profile', [ProfileController::class, 'update']);

    Route::post('/post', [ProfileController::class, 'storePost']);
    Route::put('/post/{id}', [ProfileController::class, 'updatePost']);
    Route::delete('/post/{id}', [ProfileController::class, 'deletePost']);
});
