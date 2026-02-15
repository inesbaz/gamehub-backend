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
            // Mis juegos
            'Return to Monkey Island',
            'Thimbleweed Park',
            'Deponia',
            'Disco Elysium',
            'Call of Cthulhu',
            'Sherlock Holmes: Chapter One',
            'Sherlock Holmes The Awakened',
            'Return of the Obra Dinn',
            'What Remains of Edith Finch',
            'Firewatch',
            'Gone Home',
            'Virginia',
            'Night in the Woods',
            'Oxenfree',
            'The Invincible',
            'Heavy Rain',
            'Beyond: Two Souls',
            'Detroit: Become Human',
            'The Wolf Among Us',
            'The Dark Pictures Anthology: House of Ashes',
            'The Dark Pictures Anthology: Little Hope',
            'Call of the Sea',
            'Botany Manor',
            'Death Stranding',
            'Stray',
            'Unpacking',
            'Spiritfarer',
            'Dave the Diver',
            'Dredge',
            'Wanderstop',
            'A Plague Tale: Innocence',
            'The Last of Us Part I',
            'Uncharted 4: A Thief\'s End',
            'Uncharted: The Lost Legacy',
            'Shadow of the Tomb Raider',
            'Indiana Jones and the Great Circle',
            'Mafia: Definitive Edition',
            'God of War',
            'Kena: Bridge of Spirits',
            'Brothers: A Tale of Two Sons',
            'Hellblade: Senua\'s Sacrifice',
            'Banishers: Ghosts of New Eden',
            'Eriksholm: The Stolen Dream',
            'Hell is Us',
            'Hogwarts Legacy',
            'Cyberpunk 2077',
            'Starfield',
            'Horizon Zero Dawn',
            'Horizon Forbidden West',
            'Fallout 4',
            'Red Dead Redemption 2',
            'Assassin\'s Creed Odyssey',
            'Watch Dogs 2',
            'Ghost of Tsushima',
            'Days Gone',
            'Rise of the Ronin',
            'Star Wars Jedi: Fallen Order',
            'Star Wars Jedi: Survivor',
            'Ori and the Will of the Wisps',
            'BioShock Infinite',
            'Deathloop',
            'The Outer Worlds 2',
            'Subnautica',
            'The Long Dark',
            'Stranded Deep',
            'Dying Light',
            'The Alters',
            'Cairn',
            'Alan Wake',
            'Silent Hill f',
            'Baldur\'s Gate 3',
            'Clair Obscur: Expedition 33',
            'Portal 2',
            'The Stanley Parable',
            'Inscryption',
            'It Takes Two',
            'Split fiction',

            // Acción / Aventura / RPG
            'The Last of Us Part II',
            'Grand Theft Auto V',
            'Alan Wake 2',
            'The Witcher 3: Wild Hunt',
            'Elden Ring',
            'Mass Effect Legendary Edition',
            'Persona 5 Royal',
            'Fallout: New Vegas',
            'The Elder Scrolls V: Skyrim',
            'Kingdom Come: Deliverance',
            'NieR:Automata',
            'Diablo IV',

            // Nintendo / Switch (variado)
            'The Legend of Zelda: Breath of the Wild',
            'Super Mario Odyssey',
            'Animal Crossing: New Horizons',
            'Mario Kart 8 Deluxe',
            'Super Smash Bros. Ultimate',
            'Splatoon 3',
            'Metroid Dread',
            'Fire Emblem: Three Houses',
            'Luigi\'s Mansion 3',
            'Xenoblade Chronicles 3',

            // Cozy
            'Stardew Valley',
            'A Short Hike',
            'Dorfromantik',
            'Cozy Grove',
            'Disney Dreamlight Valley',
            'Palia',
            'Ooblets',
            'Coffee Talk',
            'Potion Permit',
            'Littlewood',
            'Garden Story',

            // Roguelike / Roguelite
            'Hades',
            'The Binding of Isaac: Rebirth',
            'Slay the Spire',
            'Risk of Rain 2',
            'Rogue Legacy 2',
            'Enter the Gungeon',
            'Spelunky 2',
            'Darkest Dungeon',
            'Crypt of the NecroDancer',
            'FTL: Faster Than Light',
            'Vampire Survivors',
            'Cult of the Lamb',
            'Returnal',

            // Plataformas / Acción 2D
            'Hollow Knight',
            'Celeste',
            'Dead Cells',
            'Cuphead',
            'Shovel Knight: Treasure Trove',
            'Castlevania: Symphony of the Night',
            'Blasphemous',
            'Axiom Verge',
            'Guacamelee! 2',
            'Katana ZERO',

            // Supervivencia / Crafting
            'Valheim',
            'ARK: Survival Evolved',
            'Rust',
            'DayZ',
            '7 Days to Die',
            'Project Zomboid',
            'Don\'t Starve Together',
            'Terraria',
            'Minecraft',
            'No Man\'s Sky',
            'Raft',
            'Grounded',
            'The Forest',

            // Estrategia / Táctica
            'Age of Empires IV',
            'StarCraft II',
            'Company of Heroes 3',
            'Total War: Warhammer III',
            'Civilization VI',
            'XCOM 2',
            'Into the Breach',
            'Crusader Kings III',
            'Stellaris',
            'Frostpunk',

            // Gestión / Simulación / Construcción
            'Cities: Skylines',
            'Factorio',
            'Satisfactory',
            'RimWorld',
            'Dwarf Fortress',
            'Banished',
            'Planet Coaster',
            'Planet Zoo',
            'Two Point Hospital',
            'Farming Simulator 22',
            'Microsoft Flight Simulator',
            'Euro Truck Simulator 2',
            'Anno 1800',

            // Terror
            'Resident Evil 7: Biohazard',
            'Resident Evil 2',
            'Alien: Isolation',
            'Outlast',
            'Silent Hill 2',
            'Amnesia: The Dark Descent',
            'SOMA',
            'Dead Space',
            'The Evil Within',
            'Phasmophobia',

            // Lucha
            'Street Fighter 6',
            'Tekken 8',
            'Mortal Kombat 1',
            'Guilty Gear -Strive-',
            'Dragon Ball FighterZ',

            // Carreras
            'Forza Horizon 5',
            'Gran Turismo 7',
            'F1 24',
            'Need for Speed Unbound',
            'Assetto Corsa Competizione',

            // Deportes
            'EA SPORTS FC 26',
            'NBA 2K26',
            'Rematch',
            'Madden NFL 24',
            'WWE 2K25',
            'Riders Republic',
            'Tony Hawk\'s Pro Skater 1 + 2',

            // Shooter
            'DOOM Eternal',
            'Call of Duty: Modern Warfare II',
            'Call of Duty: Warzone',
            'Far Cry 5',
            'Battlefield 2042',
            'Halo Infinite',
            'Counter-Strike 2',
            'Overwatch 2',
            'Apex Legends',
            'Borderlands 3',
            'Metro Exodus',

            // VR
            'Half-Life: Alyx',
            'Beat Saber',
            'Boneworks',
            'Moss',
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
