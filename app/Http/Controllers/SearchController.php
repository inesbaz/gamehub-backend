<?php

namespace App\Http\Controllers;

use App\Services\RawgClient;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    // Recibe la query y cachea la respuesta (la guarda en caché) para que las búquedas repetidas sean insantáneas y reducir llamadas a la API
    public function search(Request $request, RawgClient $rawg)
    {
        // Obtiene el texto y la página
        $query = trim($request->get('q', ''));
        $page = (int)$request->get('page', 1);

        // Si no llega la query, responde con un 422 (faltan datos)
        abort_if($query === '', 422, 'q is required');

        // Se construye una clave de caché que depende del texto y de la página
        $key = "rawg:search:{$query}:{$page}";

        // Tiempo para conservar el resultado en caché (por defecto, 6 horas)
        $ttl = (int)config('services.rawg.cache_ttl', 21600);

        // Si no existe la clave en caché, llama a RAWG, guarda el resultado y lo devuelve
        $data = Cache::remember($key, $ttl, fn() => $rawg->searchGames($query, $page));
        return response()->json($data);
    }
}
