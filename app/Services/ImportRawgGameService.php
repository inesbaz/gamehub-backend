<?php

namespace App\Services;

use App\Models\Game;
use App\Models\Genre;
use App\Models\Platform;
use App\Models\Store;
use App\Models\Tag;
use App\Models\Requirement;
use App\Models\Screenshot;
use App\Models\Trailer;
use App\Models\GameRelation;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

/*
*
* Dada la slug o id de RAWG, trae el detalle y lo vuelca en la base de datos: juego + géneros + plataformas (+ requisitos PC) + tiendas (+ URL pivot) + tags + screenshots + trailer.
*
* Convierte el JSON completo de RAWG en un modelo de Laravel.
*
*/

class ImportRawgGameService
{
    // Inyecta el cliente de RAWG (clase que hace las peticiones HTTP)
    public function __construct(private RawgClient $rawg) {}

    // Importa un juego de RAWG por su slug o id numérico (lo crea o lo actualiza si ya existe en la BD)
    public function importBySlugOrId(string|int $idOrSlug): Game
    {
        // Llamada al cliente RAWG que devuelve un array con todos los datos del juego
        $payload = $this->rawg->getGameByIdOrSlug($idOrSlug);

        $extId   = $payload['id'] ?? null;

        // Llamadas fuera de la transacción para screenshots y trailers
        $screenshotsResults = [];
        $moviesResults      = [];

        if ($extId) {
            $screensRes = $this->rawg->getGameScreenshots($extId);
            $screenshotsResults = $screensRes['results'] ?? [];
            $moviesRes = $this->rawg->getGameMovies($extId);
            $moviesResults = $moviesRes['results'] ?? [];
        }

        // Se usa una transacción para que no quede nada a medias si algo falla
        return DB::transaction(function () use ($payload, $screenshotsResults, $moviesResults) {
            $extId   = $payload['id'] ?? null;
            $extSlug = $payload['slug'] ?? null;

            // updateOrCreate evita duplicados: si existe por external_id, lo actualiza
            $game = Game::updateOrCreate(
                ['external_id' => $extId],
                [
                    'external_slug'       => $extSlug,
                    'title'               => $payload['name'] ?? '',
                    'slug'                => $this->slugForLocal($payload),
                    'summary'             => $payload['description_raw'] ?? null,
                    'official_website'    => $payload['website'] ?? null,
                    'release_date'        => $payload['released'] ?? null,
                    'rawg_updated_at'     => isset($payload['updated']) ? Carbon::parse($payload['updated']) : null,
                    'avg_playtime_hours'  => $payload['playtime'] ?? null,
                    'cover_url'           => $payload['background_image'] ?? null,
                    'cover_thumb_url'     => $payload['background_image_additional'] ?? null,
                    'has_trailers'        => false,
                    'has_screenshots'     => false,
                    'rawg_rating_avg'     => $payload['rating'] ?? null,
                    'rawg_rating_count'   => $payload['ratings_count'] ?? 0,
                    'metacritic'          => $payload['metacritic'] ?? null,
                    'metacritic_url'      => $payload['metacritic_url'] ?? null,
                    'esrb_rating'         => $payload['esrb_rating']['name'] ?? null,
                    'last_synced_at'      => Carbon::now(),
                ]
            );

            // 1) Géneros (pivot)
            foreach (($payload['genres'] ?? []) as $g) {
                $genre = Genre::updateOrCreate(
                    ['external_id' => $g['id'] ?? null],
                    ['name' => $g['name'] ?? '', 'slug' => $g['slug'] ?? '', 'last_synced_at' => Carbon::now()]
                );
                $game->genres()->syncWithoutDetaching([$genre->id]);
            }

            // 2) Plataformas (pivot)
            $platformRefs = $payload['platforms'] ?? [];
            foreach ($platformRefs as $pRef) {
                $pData = $pRef['platform'] ?? null;
                if (!$pData) continue; // si no hay datos válidos, salta

                $platform = Platform::updateOrCreate(
                    ['external_id' => $pData['id'] ?? null],
                    ['name' => $pData['name'] ?? '', 'slug' => $pData['slug'] ?? '', 'last_synced_at' => Carbon::now()]
                );
                $game->platforms()->syncWithoutDetaching([$platform->id]);

                // 3) Requisitos
                $req = $pRef['requirements'] ?? $pRef['requirements_en'] ?? null;
                if ($req && $this->isPcPlatform($platform)) {
                    Requirement::updateOrCreate(
                        ['game_id' => $game->id, 'platform_id' => $platform->id],
                        ['minimum' => $req['minimum'] ?? null, 'recommended' => $req['recommended'] ?? null, 'source' => 'rawg']
                    );
                }
            }

            // 4) Tiendas (pivot con URL)
            foreach (($payload['stores'] ?? []) as $s) {
                $storeData = $s['store'] ?? null;
                if (!$storeData) continue;

                $store = Store::updateOrCreate(
                    ['external_id' => $storeData['id'] ?? null],
                    ['name' => $storeData['name'] ?? '', 'slug' => $storeData['slug'] ?? '', 'last_synced_at' => Carbon::now()]
                );

                // Sincroniza con la tabla intermedia (pivot) y añade la URL como campo extra
                $game->stores()->syncWithoutDetaching([
                    $store->id => ['url' => $s['url'] ?? $s['url_en'] ?? '']
                ]);
            }

            // 5) Tags (pivot)
            foreach (($payload['tags'] ?? []) as $t) {
                $tag = Tag::updateOrCreate(
                    ['external_id' => $t['id'] ?? null],
                    ['name' => $t['name'] ?? '', 'slug' => $t['slug'] ?? '', 'last_synced_at' => Carbon::now()]
                );
                $game->tags()->syncWithoutDetaching([$tag->id]);
            }

            // 6) Screenshots (desde /games/{id}/screenshots)
            Screenshot::where('game_id', $game->id)->delete();

            foreach ($screenshotsResults as $i => $shot) {
                Screenshot::create(
                    ['game_id' => $game->id, 'image_url' => $shot['image'] ?? '', 'width' => $shot['width'] ?? null, 'height' => $shot['height'] ?? null, 'ordering' => $i, 'external_id' => $shot['id'] ?? null]
                );
            }

            if (!empty($screenshotsResults)) {
                $game->has_screenshots = true;
                $game->save();
            }

            // 7) Trailers (desde /games/{id}/movies)
            Trailer::where('game_id', $game->id)->delete();

            foreach ($moviesResults as $i => $movie) {
                $videoUrl = $movie['data']['max'] ?? $movie['data']['480'] ?? null;

                if (!$videoUrl) {
                    continue;
                }

                Trailer::create(
                    ['game_id' => $game->id, 'name' => $movie['name'] ?? 'Trailer', 'preview_image' => $movie['preview'] ?? null, 'video_url' => $videoUrl, 'external_id' => $movie['id'] ?? null, 'ordering' => $i]
                );
            }

            if (!empty($moviesResults)) {
                $game->has_trailers = true;
                $game->save();
            }

            // Devuelve el juego con todas sus relaciones actualizadas
            return $game->fresh([
                'genres',
                'platforms',
                'tags',
                'stores',
                'screenshots',
                'trailers'
            ]);
        });
    }

    private function slugForLocal(array $payload): string
    {
        // Usa el slug de RAWG si existe o lo genera a partir del nombre
        $rawgSlug = $payload['slug'] ?? null;
        return $rawgSlug ? $rawgSlug : Str::slug(($payload['name'] ?? 'game') . '-' . ($payload['id'] ?? Str::random(6)));
    }

    // Comprueba si una plataforma corresponde a PC/Windows (para saber si hay que guardar los requisitos técnicos)
    private function isPcPlatform(Platform $p): bool
    {
        $slug = strtolower($p->slug ?? '');
        $name = strtolower($p->name ?? '');
        return str_contains($slug, 'pc') || str_contains($name, 'pc') || str_contains($name, 'windows');
    }
}
