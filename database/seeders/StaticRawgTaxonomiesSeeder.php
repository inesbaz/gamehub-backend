<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genre;
use App\Models\Platform;
use App\Models\Store;

/*
*
* Las taxonomías sincronizadas con el comando SyncRawgTaxonomies se guardan en archivos JSON de forma que no sea necesario llamar a la API cada vez se rellenen las tablas.
*
*/
class StaticRawgTaxonomiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $platforms = json_decode(
            file_get_contents(database_path('rawg/platforms.json')),
            true
        );

        foreach ($platforms as $item) {
            Platform::updateOrCreate(
                ['external_id' => $item['external_id']],
                [
                    'name' => $item['name'],
                    'slug' => $item['slug'],
                ]
            );
        }

        $genres = json_decode(
            file_get_contents(database_path('rawg/genres.json')),
            true
        );

        foreach ($genres as $item) {
            Genre::updateOrCreate(
                ['external_id' => $item['external_id']],
                [
                    'name' => $item['name'],
                    'slug' => $item['slug'],
                ]
            );
        }

        $stores = json_decode(
            file_get_contents(database_path('rawg/stores.json')),
            true
        );

        foreach ($stores as $item) {
            Store::updateOrCreate(
                ['external_id' => $item['external_id']],
                [
                    'name' => $item['name'],
                    'slug' => $item['slug'],
                ]
            );
        }
    }
}
