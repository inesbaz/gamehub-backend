<?php

namespace App\Console\Commands;

use App\Models\Genre;
use App\Models\Platform;
use App\Models\Store;
use App\Services\RawgClient;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

/*
*
* Comando que sincroniza las taxonomías (conjuntos de categorías) de RAWG, de forma que puedan mantenerse actualizadas para relacionar y filtrar juegos.
*
*/

class SyncRawgTaxonomies extends Command
{
    // Si no se pasa --all solo sincroniza solo la primera página de cada taxonomía
    protected $signature = 'rawg:sync-taxonomies {--all}';
    protected $description = 'Sincroniza Platforms, Genres y Stores desde RAWG';

    public function handle(RawgClient $rawg)
    {
        $now = Carbon::now();

        $this->syncPaginated('platforms', fn($page) => $rawg->listPlatforms($page), function ($item) use ($now) {
            Platform::updateOrCreate(
                ['external_id' => $item['id'] ?? null],
                [
                    'name' => $item['name'] ?? '',
                    'slug' => $item['slug'] ?? '',
                    'last_synced_at' => $now,
                ]
            );
        });

        $this->syncPaginated('genres', fn($page) => $rawg->listGenres($page), function ($item) use ($now) {
            Genre::updateOrCreate(
                ['external_id' => $item['id'] ?? null],
                [
                    'name' => $item['name'] ?? '',
                    'slug' => $item['slug'] ?? '',
                    'last_synced_at' => $now,
                ]
            );
        });

        $this->syncPaginated('stores', fn($page) => $rawg->listStores($page), function ($item) use ($now) {
            Store::updateOrCreate(
                ['external_id' => $item['id'] ?? null],
                [
                    'name' => $item['name'] ?? '',
                    'slug' => $item['slug'] ?? '',
                    'last_synced_at' => $now,
                ]
            );
        });

        $this->info('Taxonomías RAWG sincronizadas.');
        return Command::SUCCESS;
    }

    // Simpre procesa la primera página y sigue cargando páginas hasta que "next" no sea vacío (en caso de haber pasado --all)
    private function syncPaginated(string $label, callable $fetch, callable $upsert): void
    {
        $page = 1;
        do {
            $res = $fetch($page);
            $items = $res['results'] ?? [];
            foreach ($items as $it) {
                $upsert($it);
            }
            $page++;
            $next = !empty($res['next']);
            $this->line("Synced {$label} page " . ($page - 1));
        } while ($next && $this->option('all'));
    }
}
