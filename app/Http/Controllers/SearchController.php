<?php

namespace App\Http\Controllers;

use App\Services\RawgClient;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /* BUSCADOR SIMPLE */

    /**
     * Recibe la query y guarda la respuesta en caché para reducir llamadas a la API.
     */
    public function search(Request $request, RawgClient $rawg)
    {
        // Obtiene el texto y la página
        $query = trim($request->get('q', ''));
        $page = (int)$request->get('page', 1);

        // Si no llega la query, responde con un 422
        abort_if($query === '', 422, 'q is required');

        // límites básicos
        $page = max(1, $page);
        $query = mb_substr($query, 0, 120);

        // Tiempo para conservar el resultado en caché (6 horas por defecto)
        $ttl = (int) config('services.rawg.cache_ttl', 21600);

        // Construye una clave de caché que depende del texto y de la página
        $key = "rawg:search:{$query}:{$page}";

        // Si no existe la clave en caché, llama a RAWG, guarda el resultado y lo devuelve
        $data = Cache::remember($key, $ttl, fn() => $rawg->searchGames($query, $page));

        return response()->json($data);
    }
}
