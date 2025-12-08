<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Services\RawgClient;
use App\Services\ImportRawgGameService;

class RawgGameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Se obtienen los servicios desde el contenedor de Laravel
        $rawg     = app(RawgClient::class);
        $importer = app(ImportRawgGameService::class);

        $queries = [
            'Cyberpunk 2077',
            'The Witcher 3',
            'Elden Ring',
            'Hollow Knight',
            'Hades',
            'Red Dead Redemption 2',
            'Ghost of Tsushima',
            'The Long Dark',
            'Horizon Forbidden West',
            'God of War',
            'The Last of Us Part II',
            'Stardew Valley',
            'Celeste',
            'Disco Elysium',
            'NieR Automata',
            'Subnautica',
            'Terraria',
            'Minecraft',
        ];

        foreach ($queries as $query) {
            // Se busca el juego en RAWG
            $data    = $rawg->searchGames($query, 1);
            $results = $data['results'] ?? [];

            if (empty($results)) {
                continue;
            }

            // Se coge el primer resultado
            $first    = $results[0];
            $slugOrId = $first['slug'] ?? ($first['id'] ?? null);

            if (!$slugOrId) {
                continue;
            }

            // Se importa el juego a la BD
            $importer->importBySlugOrId($slugOrId);
        }
    }
}
