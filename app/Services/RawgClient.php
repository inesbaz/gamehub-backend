<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

/*
* Centraliza las llamadas HTTP a RAWG (búsquedas, detalle de juego, listados de plataformas, géneros, tiendas).
*
* Lee la URL base, API key y page_size de config. El get() hace la petición con timeout(15), retry(2, 500) y devuelve el JSON 
* ya parseado. Si RAWG devuelve error, lanza excepción.
*
* Varios métodos públicos y para sincronizar catálogos. Permite separar la lógica HTTP del resto del código 
* (proveedor de cliente).
*
*/

class RawgClient
{
    public function __construct(
        private string $base = '',
        private ?string $key = null,
        private int $pageSize = 40
    ) {
        $cfg = config('services.rawg');
        $this->base = $cfg['base'] ?? 'https://api.rawg.io/api';
        $this->key  = $cfg['key'] ?? null;
        $this->pageSize = (int)($cfg['page_size'] ?? 40);
    }

    private function get(string $path, array $params = [])
    {
        $params = array_filter($params + [
            'key' => $this->key,
        ], fn($v) => $v !== null && $v !== '');

        return Http::timeout(15)->retry(2, 500)
            ->get(rtrim($this->base, '/') . '/' . ltrim($path, '/'), $params)
            ->throw()
            ->json();
    }

    // Búsquedas y listados (cacheables) 
    public function searchGames(string $query, int $page = 1)
    {
        return $this->get('games', [
            'search'    => $query,
            'page'      => $page,
            'page_size' => $this->pageSize,
        ]);
    }

    // Detalle de juego (para lazy import) 
    public function getGameByIdOrSlug(string|int $idOrSlug)
    {
        return $this->get("games/{$idOrSlug}");
    }

    // Taxonomías (para sincornizar)
    public function listPlatforms(int $page = 1)
    {
        return $this->get('platforms', ['page' => $page, 'page_size' => $this->pageSize]);
    }
    public function listGenres(int $page = 1)
    {
        return $this->get('genres',    ['page' => $page, 'page_size' => $this->pageSize]);
    }
    public function listStores(int $page = 1)
    {
        return $this->get('stores',    ['page' => $page, 'page_size' => $this->pageSize]);
    }
}
