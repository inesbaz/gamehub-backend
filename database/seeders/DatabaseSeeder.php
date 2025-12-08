<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Desde aquí se llama solo a los seeders que se quieran ejecutar -> php artisan db:seed
        $this->call([
            UserSeeder::class,
            StaticRawgTaxonomiesSeeder::class,
            RawgGameSeeder::class
        ]);
    }
}
