<?php

namespace App\Http\Controllers;

use App\Services\RawgClient;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    // Recibe la query y cachea la respuesta para que las búquedas repetidas sean inmediatas y no gasten cuota
    public function search(Request $request, RawgClient $rawg)
    {
        $query = trim($request->get('q', ''));
        $page = (int)$request->get('page', 1);
        abort_if($query === '', 422, 'q is required');

        $key = "rawg:search:{$query}:{$page}";
        $ttl = (int)config('services.rawg.cache_ttl', 21600); // 6h

        $data = Cache::remember($key, $ttl, fn() => $rawg->searchGames($query, $page));
        return response()->json($data);
    }
}
