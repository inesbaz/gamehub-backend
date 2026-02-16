<?php

namespace Database\Seeders;

use App\Models\Review;
use App\Models\ReviewAspect;
use App\Services\AspectService;
use Illuminate\Database\Seeder;

class ReviewAspectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rows = [
            // hagne
            ['review_id' => 1,  'story_score' => 9,  'gameplay_score' => 8,  'exploration_score' => 8,  'art_score' => 9,  'difficulty_score' => 6],
            ['review_id' => 2,  'story_score' => 8,  'gameplay_score' => 9,  'exploration_score' => 9,  'art_score' => 9,  'difficulty_score' => 6],
            ['review_id' => 3,  'story_score' => 8,  'gameplay_score' => 9,  'exploration_score' => 9,  'art_score' => 10, 'difficulty_score' => 5],
            ['review_id' => 4,  'story_score' => 9,  'gameplay_score' => 6,  'exploration_score' => 7,  'art_score' => 9,  'difficulty_score' => 2],
            ['review_id' => 5,  'story_score' => 10, 'gameplay_score' => 7,  'exploration_score' => 6,  'art_score' => 9,  'difficulty_score' => 4],
            ['review_id' => 6,  'story_score' => 8,  'gameplay_score' => 8,  'exploration_score' => 8,  'art_score' => 8,  'difficulty_score' => 8],
            ['review_id' => 7,  'story_score' => 7,  'gameplay_score' => 8,  'exploration_score' => 7,  'art_score' => 8,  'difficulty_score' => 4],
            ['review_id' => 8,  'story_score' => 10, 'gameplay_score' => 5,  'exploration_score' => 7,  'art_score' => 9,  'difficulty_score' => 2],
            ['review_id' => 9,  'story_score' => 8,  'gameplay_score' => 7,  'exploration_score' => 5,  'art_score' => 8,  'difficulty_score' => 3],
            ['review_id' => 10, 'story_score' => 7,  'gameplay_score' => 8,  'exploration_score' => 9,  'art_score' => 9,  'difficulty_score' => 4],
            ['review_id' => 11, 'story_score' => 9,  'gameplay_score' => 8,  'exploration_score' => 10, 'art_score' => 10, 'difficulty_score' => 4],
            ['review_id' => 12, 'story_score' => 10, 'gameplay_score' => 6,  'exploration_score' => 5,  'art_score' => 9,  'difficulty_score' => 6],
            ['review_id' => 13, 'story_score' => 7,  'gameplay_score' => 6,  'exploration_score' => 7,  'art_score' => 9,  'difficulty_score' => 3],
            ['review_id' => 14, 'story_score' => 9,  'gameplay_score' => 7,  'exploration_score' => 7,  'art_score' => 9,  'difficulty_score' => 3],
            ['review_id' => 15, 'story_score' => 8,  'gameplay_score' => 6,  'exploration_score' => 4,  'art_score' => 8,  'difficulty_score' => 5],
            ['review_id' => 16, 'story_score' => 6,  'gameplay_score' => 4,  'exploration_score' => 7,  'art_score' => 9,  'difficulty_score' => 4],
            ['review_id' => 17, 'story_score' => 6,  'gameplay_score' => 8,  'exploration_score' => 9,  'art_score' => 9,  'difficulty_score' => 10],
            ['review_id' => 18, 'story_score' => null, 'gameplay_score' => 5,  'exploration_score' => 6,  'art_score' => 5,  'difficulty_score' => 9],


            // RNG_12
            ['review_id' => 19, 'story_score' => null, 'gameplay_score' => 10, 'exploration_score' => null, 'art_score' => 7,  'difficulty_score' => 9],  // CS2
            ['review_id' => 20, 'story_score' => null, 'gameplay_score' => 9,  'exploration_score' => 6,  'art_score' => 8,  'difficulty_score' => 8],  // Apex
            ['review_id' => 21, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => null, 'art_score' => 8,  'difficulty_score' => 7],  // OW2
            ['review_id' => 22, 'story_score' => 6,  'gameplay_score' => 10, 'exploration_score' => null, 'art_score' => 8,  'difficulty_score' => 9],  // SF6
            ['review_id' => 23, 'story_score' => null, 'gameplay_score' => 9,  'exploration_score' => null, 'art_score' => 7,  'difficulty_score' => 9],  // ACC
            ['review_id' => 24, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => null, 'art_score' => 7,  'difficulty_score' => 6],  // FC26
            ['review_id' => 25, 'story_score' => 6,  'gameplay_score' => 9,  'exploration_score' => null, 'art_score' => 8,  'difficulty_score' => 8],  // Tekken 8
            ['review_id' => 26, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => null, 'art_score' => 7,  'difficulty_score' => 7],  // F1 24
            ['review_id' => 27, 'story_score' => null, 'gameplay_score' => 9,  'exploration_score' => 6,  'art_score' => 7,  'difficulty_score' => 8],  // Warzone
            ['review_id' => 28, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => null, 'art_score' => 8,  'difficulty_score' => 7],  // GT7
            ['review_id' => 29, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => null, 'art_score' => 7,  'difficulty_score' => 7],  // Halo Infinite (arena)
            ['review_id' => 30, 'story_score' => 5,  'gameplay_score' => 10, 'exploration_score' => 4,  'art_score' => 8,  'difficulty_score' => 9],  // DOOM Eternal
            ['review_id' => 31, 'story_score' => null, 'gameplay_score' => 7,  'exploration_score' => null, 'art_score' => 7,  'difficulty_score' => 6],  // Madden 24
            ['review_id' => 32, 'story_score' => 5,  'gameplay_score' => 7,  'exploration_score' => 5,  'art_score' => 9,  'difficulty_score' => 6],  // NFS Unbound
            ['review_id' => 33, 'story_score' => null, 'gameplay_score' => 7,  'exploration_score' => 8,  'art_score' => 8,  'difficulty_score' => 5],  // Forza Horizon 5
            ['review_id' => 34, 'story_score' => 7,  'gameplay_score' => 4,  'exploration_score' => 7,  'art_score' => 7,  'difficulty_score' => 2],  // Gone Home
            ['review_id' => 35, 'story_score' => 6,  'gameplay_score' => 5,  'exploration_score' => 4,  'art_score' => 8,  'difficulty_score' => 1],  // Unpacking
            ['review_id' => 36, 'story_score' => 6,  'gameplay_score' => 6,  'exploration_score' => 7,  'art_score' => 8,  'difficulty_score' => 1],  // A Short Hike


            // shadowex
            ['review_id' => 37, 'story_score' => 10, 'gameplay_score' => 6,  'exploration_score' => 7,  'art_score' => 9,  'difficulty_score' => 6],  // SH2
            ['review_id' => 38, 'story_score' => 9,  'gameplay_score' => 7,  'exploration_score' => 7,  'art_score' => 9,  'difficulty_score' => 7],  // RE7
            ['review_id' => 39, 'story_score' => 9,  'gameplay_score' => 8,  'exploration_score' => 7,  'art_score' => 9,  'difficulty_score' => 8],  // Alien Isolation
            ['review_id' => 40, 'story_score' => 10, 'gameplay_score' => 6,  'exploration_score' => 6,  'art_score' => 8,  'difficulty_score' => 4],  // SOMA
            ['review_id' => 41, 'story_score' => 8,  'gameplay_score' => 8,  'exploration_score' => 7,  'art_score' => 8,  'difficulty_score' => 7],  // Dead Space
            ['review_id' => 42, 'story_score' => 9,  'gameplay_score' => 7,  'exploration_score' => 7,  'art_score' => 9,  'difficulty_score' => 6],  // Alan Wake 2
            ['review_id' => 43, 'story_score' => 8,  'gameplay_score' => 8,  'exploration_score' => 8,  'art_score' => 9,  'difficulty_score' => 7],  // RE2
            ['review_id' => 44, 'story_score' => 7,  'gameplay_score' => 7,  'exploration_score' => 6,  'art_score' => 8,  'difficulty_score' => 7],  // Evil Within
            ['review_id' => 45, 'story_score' => 7,  'gameplay_score' => 6,  'exploration_score' => 5,  'art_score' => 8,  'difficulty_score' => 7],  // Outlast
            ['review_id' => 46, 'story_score' => 8,  'gameplay_score' => 6,  'exploration_score' => 6,  'art_score' => 8,  'difficulty_score' => 6],  // Amnesia
            ['review_id' => 47, 'story_score' => 7,  'gameplay_score' => 6,  'exploration_score' => 5,  'art_score' => 7,  'difficulty_score' => 3],  // House of Ashes
            ['review_id' => 48, 'story_score' => 6,  'gameplay_score' => 5,  'exploration_score' => 5,  'art_score' => 7,  'difficulty_score' => 3],  // Little Hope
            ['review_id' => 49, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => 6,  'art_score' => 7,  'difficulty_score' => 7],  // Phasmophobia
            ['review_id' => 50, 'story_score' => 7,  'gameplay_score' => 6,  'exploration_score' => 6,  'art_score' => 7,  'difficulty_score' => 4],  // Call of Cthulhu
            ['review_id' => 51, 'story_score' => 8,  'gameplay_score' => 6,  'exploration_score' => 6,  'art_score' => 7,  'difficulty_score' => 5],  // Alan Wake
            ['review_id' => 52, 'story_score' => 4,  'gameplay_score' => 5,  'exploration_score' => 5,  'art_score' => 7,  'difficulty_score' => 2],  // Ooblets
            ['review_id' => 53, 'story_score' => null, 'gameplay_score' => 7,  'exploration_score' => null, 'art_score' => 8,  'difficulty_score' => 5],  // MK8
            ['review_id' => 54, 'story_score' => null, 'gameplay_score' => 7,  'exploration_score' => null, 'art_score' => 8,  'difficulty_score' => 6],  // Splatoon 3


            // retroAlex
            ['review_id' => 55, 'story_score' => 8,  'gameplay_score' => 10, 'exploration_score' => 7,  'art_score' => 8,  'difficulty_score' => 7],  // Portal 2
            ['review_id' => 56, 'story_score' => 9,  'gameplay_score' => 9,  'exploration_score' => 8,  'art_score' => 9,  'difficulty_score' => 8],  // Obra Dinn
            ['review_id' => 57, 'story_score' => 8,  'gameplay_score' => 7,  'exploration_score' => 8,  'art_score' => 8,  'difficulty_score' => 3],  // Stanley Parable
            ['review_id' => 58, 'story_score' => 8,  'gameplay_score' => 8,  'exploration_score' => 6,  'art_score' => 9,  'difficulty_score' => 6],  // Inscryption
            ['review_id' => 59, 'story_score' => 7,  'gameplay_score' => 8,  'exploration_score' => 7,  'art_score' => 7,  'difficulty_score' => 7],  // Thimbleweed
            ['review_id' => 60, 'story_score' => 10, 'gameplay_score' => 7,  'exploration_score' => 6,  'art_score' => 9,  'difficulty_score' => 5],  // Disco Elysium (otra visión)
            ['review_id' => 61, 'story_score' => 8,  'gameplay_score' => 7,  'exploration_score' => 7,  'art_score' => 8,  'difficulty_score' => 4],  // Monkey Island
            ['review_id' => 62, 'story_score' => 7,  'gameplay_score' => 7,  'exploration_score' => 6,  'art_score' => 7,  'difficulty_score' => 6],  // Deponia
            ['review_id' => 63, 'story_score' => 6,  'gameplay_score' => 8,  'exploration_score' => 7,  'art_score' => 9,  'difficulty_score' => 4],  // Botany Manor
            ['review_id' => 64, 'story_score' => 7,  'gameplay_score' => 7,  'exploration_score' => 7,  'art_score' => 9,  'difficulty_score' => 5],  // Call of the Sea
            ['review_id' => 65, 'story_score' => 9,  'gameplay_score' => 5,  'exploration_score' => 7,  'art_score' => 9,  'difficulty_score' => 2],  // Edith Finch
            ['review_id' => 66, 'story_score' => 8,  'gameplay_score' => 6,  'exploration_score' => 7,  'art_score' => 8,  'difficulty_score' => 3],  // Oxenfree
            ['review_id' => 67, 'story_score' => 7,  'gameplay_score' => 9,  'exploration_score' => 4,  'art_score' => 9,  'difficulty_score' => 7],  // Katana ZERO
            ['review_id' => 68, 'story_score' => 6,  'gameplay_score' => 6,  'exploration_score' => 7,  'art_score' => 8,  'difficulty_score' => 1],  // A Short Hike
            ['review_id' => 69, 'story_score' => 6,  'gameplay_score' => 6,  'exploration_score' => 5,  'art_score' => 7,  'difficulty_score' => 3],  // Split Fiction
            ['review_id' => 70, 'story_score' => null, 'gameplay_score' => 4,  'exploration_score' => null, 'art_score' => 6,  'difficulty_score' => 4],  // Madden 24 (no es para mí)
            ['review_id' => 71, 'story_score' => null, 'gameplay_score' => 4,  'exploration_score' => null, 'art_score' => 7,  'difficulty_score' => 4],  // WWE 2K25
            ['review_id' => 72, 'story_score' => null, 'gameplay_score' => 4,  'exploration_score' => 6,  'art_score' => 6,  'difficulty_score' => 6],  // Farming Sim 22


            // davidRios
            ['review_id' => 73,  'story_score' => 10, 'gameplay_score' => 7,  'exploration_score' => 5,  'art_score' => 9,  'difficulty_score' => 6],  // TLOU Part I
            ['review_id' => 74,  'story_score' => 9,  'gameplay_score' => 9,  'exploration_score' => 7,  'art_score' => 9,  'difficulty_score' => 6],  // God of War
            ['review_id' => 75,  'story_score' => 9,  'gameplay_score' => 8,  'exploration_score' => 10, 'art_score' => 10, 'difficulty_score' => 5],  // RDR2
            ['review_id' => 76,  'story_score' => 10, 'gameplay_score' => 7,  'exploration_score' => 5,  'art_score' => 9,  'difficulty_score' => 7],  // TLOU Part II
            ['review_id' => 77,  'story_score' => 8,  'gameplay_score' => 8,  'exploration_score' => 6,  'art_score' => 9,  'difficulty_score' => 5],  // Uncharted 4
            ['review_id' => 78,  'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => null, 'art_score' => 7,  'difficulty_score' => 6],  // FC 26
            ['review_id' => 79,  'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => null, 'art_score' => 7,  'difficulty_score' => 6],  // NBA 2K26
            ['review_id' => 80,  'story_score' => 8,  'gameplay_score' => 9,  'exploration_score' => 9,  'art_score' => 10, 'difficulty_score' => 5],  // Ghost of Tsushima
            ['review_id' => 81,  'story_score' => 8,  'gameplay_score' => 8,  'exploration_score' => 9,  'art_score' => 9,  'difficulty_score' => 6],  // Horizon Zero Dawn
            ['review_id' => 82,  'story_score' => 8,  'gameplay_score' => 8,  'exploration_score' => 9,  'art_score' => 8,  'difficulty_score' => 4],  // GTA V
            ['review_id' => 83,  'story_score' => 8,  'gameplay_score' => 7,  'exploration_score' => 6,  'art_score' => 9,  'difficulty_score' => 6],  // Alan Wake 2
            ['review_id' => 84,  'story_score' => 8,  'gameplay_score' => 6,  'exploration_score' => 5,  'art_score' => 8,  'difficulty_score' => 4],  // Mafia DE
            ['review_id' => 85,  'story_score' => 7,  'gameplay_score' => 8,  'exploration_score' => 7,  'art_score' => 8,  'difficulty_score' => 7],  // Jedi: Fallen Order
            ['review_id' => 86,  'story_score' => 7,  'gameplay_score' => 8,  'exploration_score' => 8,  'art_score' => 8,  'difficulty_score' => 7],  // Jedi: Survivor
            ['review_id' => 87,  'story_score' => 7,  'gameplay_score' => 5,  'exploration_score' => 9,  'art_score' => 9,  'difficulty_score' => 5],  // Death Stranding
            ['review_id' => 88,  'story_score' => null, 'gameplay_score' => 6,  'exploration_score' => 4,  'art_score' => 7,  'difficulty_score' => 9],  // Crypt of the NecroDancer
            ['review_id' => 89,  'story_score' => null, 'gameplay_score' => 7,  'exploration_score' => 5,  'art_score' => 6,  'difficulty_score' => 8],  // FTL
            ['review_id' => 90,  'story_score' => 6,  'gameplay_score' => 7,  'exploration_score' => 8,  'art_score' => 7,  'difficulty_score' => 6],  // Axiom Verge


            // noaDev
            ['review_id' => 91,  'story_score' => 8,  'gameplay_score' => 9,  'exploration_score' => 9,  'art_score' => 8,  'difficulty_score' => 9],  // The Long Dark
            ['review_id' => 92,  'story_score' => 8,  'gameplay_score' => 8,  'exploration_score' => 10, 'art_score' => 9,  'difficulty_score' => 7],  // Subnautica
            ['review_id' => 93,  'story_score' => 6,  'gameplay_score' => 8,  'exploration_score' => 8,  'art_score' => 8,  'difficulty_score' => 7],  // Valheim
            ['review_id' => 94,  'story_score' => 5,  'gameplay_score' => 9,  'exploration_score' => 8,  'art_score' => 7,  'difficulty_score' => 10], // Project Zomboid
            ['review_id' => 95,  'story_score' => 6,  'gameplay_score' => 8,  'exploration_score' => 7,  'art_score' => 7,  'difficulty_score' => 5],  // Raft
            ['review_id' => 96,  'story_score' => 7,  'gameplay_score' => 8,  'exploration_score' => 8,  'art_score' => 8,  'difficulty_score' => 7],  // Grounded
            ['review_id' => 97,  'story_score' => 7,  'gameplay_score' => 8,  'exploration_score' => 7,  'art_score' => 7,  'difficulty_score' => 7],  // The Forest
            ['review_id' => 98,  'story_score' => 6,  'gameplay_score' => 8,  'exploration_score' => 7,  'art_score' => 6,  'difficulty_score' => 7],  // 7 Days to Die
            ['review_id' => 99,  'story_score' => 6,  'gameplay_score' => 8,  'exploration_score' => 7,  'art_score' => 8,  'difficulty_score' => 9],  // Don't Starve Together
            ['review_id' => 100, 'story_score' => 5,  'gameplay_score' => 8,  'exploration_score' => 9,  'art_score' => 8,  'difficulty_score' => 6],  // Terraria
            ['review_id' => 101, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => 8,  'art_score' => 7,  'difficulty_score' => 4],  // Minecraft
            ['review_id' => 102, 'story_score' => 7,  'gameplay_score' => 9,  'exploration_score' => 8,  'art_score' => 7,  'difficulty_score' => 6],  // Dying Light
            ['review_id' => 103, 'story_score' => 5,  'gameplay_score' => 6,  'exploration_score' => 7,  'art_score' => 6,  'difficulty_score' => 6],  // Stranded Deep
            ['review_id' => 104, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => 8,  'art_score' => 7,  'difficulty_score' => 8],  // ARK
            ['review_id' => 105, 'story_score' => null, 'gameplay_score' => 7,  'exploration_score' => 7,  'art_score' => 6,  'difficulty_score' => 9],  // Rust
            ['review_id' => 106, 'story_score' => 6,  'gameplay_score' => 3,  'exploration_score' => 3,  'art_score' => 7,  'difficulty_score' => 2],  // Heavy Rain
            ['review_id' => 107, 'story_score' => 6,  'gameplay_score' => 3,  'exploration_score' => 3,  'art_score' => 7,  'difficulty_score' => 2],  // Beyond
            ['review_id' => 108, 'story_score' => 4,  'gameplay_score' => 2,  'exploration_score' => 3,  'art_score' => 7,  'difficulty_score' => 1],  // Virginia


            // fran_juego
            ['review_id' => 109, 'story_score' => null, 'gameplay_score' => 9,  'exploration_score' => 8,  'art_score' => 9,  'difficulty_score' => 5],  // Forza Horizon 5
            ['review_id' => 110, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => 7,  'art_score' => 10, 'difficulty_score' => 6],  // NFS Unbound
            ['review_id' => 111, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => null, 'art_score' => 8,  'difficulty_score' => 7],  // Gran Turismo 7
            ['review_id' => 112, 'story_score' => null, 'gameplay_score' => 9,  'exploration_score' => null, 'art_score' => 8,  'difficulty_score' => 4],  // Mario Kart 8
            ['review_id' => 113, 'story_score' => 7,  'gameplay_score' => 7,  'exploration_score' => 9,  'art_score' => 9,  'difficulty_score' => 4],  // Hogwarts Legacy
            ['review_id' => 114, 'story_score' => 6,  'gameplay_score' => 9,  'exploration_score' => 7,  'art_score' => 8,  'difficulty_score' => 5],  // Borderlands 3
            ['review_id' => 115, 'story_score' => 7,  'gameplay_score' => 9,  'exploration_score' => 4,  'art_score' => 9,  'difficulty_score' => 7],  // Hades
            ['review_id' => 116, 'story_score' => null, 'gameplay_score' => 7,  'exploration_score' => null, 'art_score' => 7,  'difficulty_score' => 9],  // ACC
            ['review_id' => 117, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => null, 'art_score' => 7,  'difficulty_score' => 7],  // F1 24
            ['review_id' => 118, 'story_score' => 7,  'gameplay_score' => 9,  'exploration_score' => 6,  'art_score' => 9,  'difficulty_score' => 5],  // It Takes Two
            ['review_id' => 119, 'story_score' => 6,  'gameplay_score' => 8,  'exploration_score' => 6,  'art_score' => 8,  'difficulty_score' => 4],  // Split Fiction
            ['review_id' => 120, 'story_score' => 7,  'gameplay_score' => 7,  'exploration_score' => 8,  'art_score' => 9,  'difficulty_score' => 5],  // Cyberpunk 2077
            ['review_id' => 121, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => 7,  'art_score' => 8,  'difficulty_score' => 4],  // Riders Republic
            ['review_id' => 122, 'story_score' => null, 'gameplay_score' => 7,  'exploration_score' => null, 'art_score' => 7,  'difficulty_score' => 6],  // FC 26
            ['review_id' => 123, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => null, 'art_score' => 7,  'difficulty_score' => 6],  // Overwatch 2
            ['review_id' => 124, 'story_score' => 5,  'gameplay_score' => 3,  'exploration_score' => 6,  'art_score' => 7,  'difficulty_score' => 1],  // Gone Home
            ['review_id' => 125, 'story_score' => 5,  'gameplay_score' => 3,  'exploration_score' => 5,  'art_score' => 7,  'difficulty_score' => 1],  // Littlewood
            ['review_id' => 126, 'story_score' => 4,  'gameplay_score' => 2,  'exploration_score' => 3,  'art_score' => 7,  'difficulty_score' => 1],  // Virginia


            // catPlayer
            ['review_id' => 127, 'story_score' => 8,  'gameplay_score' => 6,  'exploration_score' => 7,  'art_score' => 9,  'difficulty_score' => 2],  // Stray
            ['review_id' => 128, 'story_score' => 10, 'gameplay_score' => 7,  'exploration_score' => 7,  'art_score' => 9,  'difficulty_score' => 3],  // Spiritfarer
            ['review_id' => 129, 'story_score' => 10, 'gameplay_score' => 4,  'exploration_score' => 6,  'art_score' => 9,  'difficulty_score' => 1],  // Edith Finch
            ['review_id' => 130, 'story_score' => 9,  'gameplay_score' => 6,  'exploration_score' => 6,  'art_score' => 8,  'difficulty_score' => 2],  // Night in the Woods
            ['review_id' => 131, 'story_score' => 9,  'gameplay_score' => 5,  'exploration_score' => 6,  'art_score' => 9,  'difficulty_score' => 2],  // Firewatch
            ['review_id' => 132, 'story_score' => 8,  'gameplay_score' => 6,  'exploration_score' => 6,  'art_score' => 8,  'difficulty_score' => 3],  // Oxenfree
            ['review_id' => 133, 'story_score' => 8,  'gameplay_score' => 4,  'exploration_score' => 7,  'art_score' => 7,  'difficulty_score' => 1],  // Gone Home
            ['review_id' => 134, 'story_score' => 9,  'gameplay_score' => 6,  'exploration_score' => 5,  'art_score' => 8,  'difficulty_score' => 3],  // Brothers
            ['review_id' => 135, 'story_score' => 8,  'gameplay_score' => 6,  'exploration_score' => 5,  'art_score' => 8,  'difficulty_score' => 3],  // The Wolf Among Us
            ['review_id' => 136, 'story_score' => 6,  'gameplay_score' => 6,  'exploration_score' => 8,  'art_score' => 8,  'difficulty_score' => 1],  // A Short Hike
            ['review_id' => 137, 'story_score' => 8,  'gameplay_score' => 5,  'exploration_score' => 4,  'art_score' => 8,  'difficulty_score' => 1],  // Unpacking
            ['review_id' => 138, 'story_score' => 7,  'gameplay_score' => 8,  'exploration_score' => 7,  'art_score' => 8,  'difficulty_score' => 4],  // Dave the Diver
            ['review_id' => 139, 'story_score' => 7,  'gameplay_score' => 8,  'exploration_score' => 8,  'art_score' => 9,  'difficulty_score' => 5],  // Dredge
            ['review_id' => 140, 'story_score' => 8,  'gameplay_score' => 7,  'exploration_score' => 5,  'art_score' => 8,  'difficulty_score' => 3],  // Detroit
            ['review_id' => 141, 'story_score' => 7,  'gameplay_score' => 6,  'exploration_score' => 7,  'art_score' => 9,  'difficulty_score' => 3],  // Call of the Sea
            ['review_id' => 142, 'story_score' => null, 'gameplay_score' => 4,  'exploration_score' => 6,  'art_score' => 5,  'difficulty_score' => 9],  // Rust
            ['review_id' => 143, 'story_score' => null, 'gameplay_score' => 5,  'exploration_score' => 7,  'art_score' => 6,  'difficulty_score' => 8],  // ARK
            ['review_id' => 144, 'story_score' => null, 'gameplay_score' => 4,  'exploration_score' => 6,  'art_score' => 5,  'difficulty_score' => 8],  // 7 Days to Die


            // pixelNacho 
            ['review_id' => 145, 'story_score' => 7,  'gameplay_score' => 10, 'exploration_score' => 9,  'art_score' => 9,  'difficulty_score' => 9],  // Hollow Knight
            ['review_id' => 146, 'story_score' => 8,  'gameplay_score' => 10, 'exploration_score' => 5,  'art_score' => 8,  'difficulty_score' => 9],  // Celeste
            ['review_id' => 147, 'story_score' => 6,  'gameplay_score' => 10, 'exploration_score' => 6,  'art_score' => 8,  'difficulty_score' => 8],  // Dead Cells
            ['review_id' => 148, 'story_score' => 6,  'gameplay_score' => 9,  'exploration_score' => 3,  'art_score' => 10, 'difficulty_score' => 10], // Cuphead
            ['review_id' => 149, 'story_score' => 8,  'gameplay_score' => 9,  'exploration_score' => 8,  'art_score' => 10, 'difficulty_score' => 7],  // Ori WotW
            ['review_id' => 150, 'story_score' => 7,  'gameplay_score' => 9,  'exploration_score' => 4,  'art_score' => 9,  'difficulty_score' => 8],  // Katana ZERO
            ['review_id' => 151, 'story_score' => 7,  'gameplay_score' => 8,  'exploration_score' => 8,  'art_score' => 10, 'difficulty_score' => 8],  // Blasphemous
            ['review_id' => 152, 'story_score' => 7,  'gameplay_score' => 9,  'exploration_score' => 8,  'art_score' => 8,  'difficulty_score' => 8],  // Metroid Dread
            ['review_id' => 153, 'story_score' => 6,  'gameplay_score' => 7,  'exploration_score' => 8,  'art_score' => 7,  'difficulty_score' => 6],  // Axiom Verge
            ['review_id' => 154, 'story_score' => 6,  'gameplay_score' => 8,  'exploration_score' => 6,  'art_score' => 8,  'difficulty_score' => 6],  // Guacamelee 2
            ['review_id' => 155, 'story_score' => 5,  'gameplay_score' => 9,  'exploration_score' => 6,  'art_score' => 7,  'difficulty_score' => 10], // Spelunky 2
            ['review_id' => 156, 'story_score' => 8,  'gameplay_score' => 10, 'exploration_score' => 4,  'art_score' => 9,  'difficulty_score' => 7],  // Hades
            ['review_id' => 157, 'story_score' => 6,  'gameplay_score' => 9,  'exploration_score' => 4,  'art_score' => 7,  'difficulty_score' => 9],  // Isaac
            ['review_id' => 158, 'story_score' => 7,  'gameplay_score' => 9,  'exploration_score' => 5,  'art_score' => 8,  'difficulty_score' => 8],  // Returnal
            ['review_id' => 159, 'story_score' => 7,  'gameplay_score' => 8,  'exploration_score' => 6,  'art_score' => 7,  'difficulty_score' => 6],  // Portal 2
            ['review_id' => 160, 'story_score' => null, 'gameplay_score' => 3,  'exploration_score' => null, 'art_score' => 6,  'difficulty_score' => 8],  // CK3 
            ['review_id' => 161, 'story_score' => null, 'gameplay_score' => 3,  'exploration_score' => 9,  'art_score' => 9,  'difficulty_score' => 5],  // Flight Sim 2020
            ['review_id' => 162, 'story_score' => null, 'gameplay_score' => 4,  'exploration_score' => 6,  'art_score' => 8,  'difficulty_score' => 7],  // Anno 1800


            // jnavarro
            ['review_id' => 163, 'story_score' => null, 'gameplay_score' => 10, 'exploration_score' => 6,  'art_score' => 7,  'difficulty_score' => 8],  // Civ VI
            ['review_id' => 164, 'story_score' => 7,  'gameplay_score' => 9,  'exploration_score' => 5,  'art_score' => 7,  'difficulty_score' => 9],  // CK3
            ['review_id' => 165, 'story_score' => 6,  'gameplay_score' => 9,  'exploration_score' => 8,  'art_score' => 8,  'difficulty_score' => 9],  // Stellaris
            ['review_id' => 166, 'story_score' => 5,  'gameplay_score' => 9,  'exploration_score' => 6,  'art_score' => 8,  'difficulty_score' => 8],  // Total War WH3
            ['review_id' => 167, 'story_score' => 7,  'gameplay_score' => 10, 'exploration_score' => 4,  'art_score' => 7,  'difficulty_score' => 9],  // XCOM 2
            ['review_id' => 168, 'story_score' => null, 'gameplay_score' => 10, 'exploration_score' => 3,  'art_score' => 8,  'difficulty_score' => 8],  // Into the Breach
            ['review_id' => 169, 'story_score' => 8,  'gameplay_score' => 9,  'exploration_score' => 4,  'art_score' => 9,  'difficulty_score' => 8],  // Frostpunk
            ['review_id' => 170, 'story_score' => 8,  'gameplay_score' => 10, 'exploration_score' => 5,  'art_score' => 7,  'difficulty_score' => 9],  // RimWorld
            ['review_id' => 171, 'story_score' => null, 'gameplay_score' => 9,  'exploration_score' => 6,  'art_score' => 9,  'difficulty_score' => 8],  // Anno 1800
            ['review_id' => 172, 'story_score' => null, 'gameplay_score' => 9,  'exploration_score' => 5,  'art_score' => 8,  'difficulty_score' => 6],  // Cities: Skylines
            ['review_id' => 173, 'story_score' => 6,  'gameplay_score' => 8,  'exploration_score' => 4,  'art_score' => 7,  'difficulty_score' => 7],  // AoE IV
            ['review_id' => 174, 'story_score' => 7,  'gameplay_score' => 10, 'exploration_score' => 3,  'art_score' => 8,  'difficulty_score' => 9],  // StarCraft II
            ['review_id' => 175, 'story_score' => 6,  'gameplay_score' => 8,  'exploration_score' => 3,  'art_score' => 7,  'difficulty_score' => 8],  // Company of Heroes 3
            ['review_id' => 176, 'story_score' => null, 'gameplay_score' => 10, 'exploration_score' => 6,  'art_score' => 7,  'difficulty_score' => 9],  // Factorio
            ['review_id' => 177, 'story_score' => null, 'gameplay_score' => 9,  'exploration_score' => 7,  'art_score' => 8,  'difficulty_score' => 7],  // Satisfactory
            ['review_id' => 178, 'story_score' => 5,  'gameplay_score' => 2,  'exploration_score' => 1,  'art_score' => 8,  'difficulty_score' => 1],  // Coffee Talk
            ['review_id' => 179, 'story_score' => 6,  'gameplay_score' => 3,  'exploration_score' => 2,  'art_score' => 7,  'difficulty_score' => 1],  // Unpacking
            ['review_id' => 180, 'story_score' => 5,  'gameplay_score' => 3,  'exploration_score' => 4,  'art_score' => 7,  'difficulty_score' => 2],  // Oxenfree


            // lucia_m
            ['review_id' => 181, 'story_score' => 7,  'gameplay_score' => 5,  'exploration_score' => 6,  'art_score' => 7,  'difficulty_score' => 3],  // Call of Cthulhu
            ['review_id' => 182, 'story_score' => 8,  'gameplay_score' => 7,  'exploration_score' => 7,  'art_score' => 8,  'difficulty_score' => 6],  // Sherlock Chapter One
            ['review_id' => 183, 'story_score' => 9,  'gameplay_score' => 8,  'exploration_score' => 7,  'art_score' => 9,  'difficulty_score' => 8],  // Obra Dinn
            ['review_id' => 184, 'story_score' => 8,  'gameplay_score' => 6,  'exploration_score' => 6,  'art_score' => 8,  'difficulty_score' => 5],  // Sherlock The Awakened
            ['review_id' => 185, 'story_score' => 8,  'gameplay_score' => 6,  'exploration_score' => 5,  'art_score' => 7,  'difficulty_score' => 5],  // Alan Wake
            ['review_id' => 186, 'story_score' => 8,  'gameplay_score' => 5,  'exploration_score' => 3,  'art_score' => 8,  'difficulty_score' => 2],  // The Wolf Among Us
            ['review_id' => 187, 'story_score' => 10, 'gameplay_score' => 7,  'exploration_score' => 6,  'art_score' => 9,  'difficulty_score' => 6],  // Disco Elysium
            ['review_id' => 188, 'story_score' => 9,  'gameplay_score' => 4,  'exploration_score' => 5,  'art_score' => 8,  'difficulty_score' => 3],  // SOMA
            ['review_id' => 189, 'story_score' => 8,  'gameplay_score' => 4,  'exploration_score' => 6,  'art_score' => 8,  'difficulty_score' => 6],  // Silent Hill 2
            ['review_id' => 190, 'story_score' => 7,  'gameplay_score' => 9,  'exploration_score' => 4,  'art_score' => 8,  'difficulty_score' => 6],  // Portal 2
            ['review_id' => 191, 'story_score' => 7,  'gameplay_score' => 7,  'exploration_score' => 5,  'art_score' => 7,  'difficulty_score' => 7],  // Thimbleweed Park
            ['review_id' => 192, 'story_score' => 7,  'gameplay_score' => 6,  'exploration_score' => 5,  'art_score' => 8,  'difficulty_score' => 4],  // Return to Monkey Island
            ['review_id' => 193, 'story_score' => 9,  'gameplay_score' => 4,  'exploration_score' => 5,  'art_score' => 9,  'difficulty_score' => 1],  // Edith Finch
            ['review_id' => 194, 'story_score' => 8,  'gameplay_score' => 6,  'exploration_score' => 3,  'art_score' => 8,  'difficulty_score' => 3],  // Detroit
            ['review_id' => 195, 'story_score' => 7,  'gameplay_score' => 5,  'exploration_score' => 2,  'art_score' => 7,  'difficulty_score' => 3],  // Heavy Rain
            ['review_id' => 196, 'story_score' => null, 'gameplay_score' => 4,  'exploration_score' => 3,  'art_score' => 6,  'difficulty_score' => 8],  // Warzone
            ['review_id' => 197, 'story_score' => null, 'gameplay_score' => 3,  'exploration_score' => 2,  'art_score' => 5,  'difficulty_score' => 9],  // CS2
            ['review_id' => 198, 'story_score' => null, 'gameplay_score' => 4,  'exploration_score' => null, 'art_score' => 7,  'difficulty_score' => 8],  // Mortal Kombat 1


            // pabloc
            ['review_id' => 199, 'story_score' => 10, 'gameplay_score' => 8,  'exploration_score' => 9,  'art_score' => 9,  'difficulty_score' => 6],  // The Witcher 3
            ['review_id' => 200, 'story_score' => 7,  'gameplay_score' => 7,  'exploration_score' => 10, 'art_score' => 8,  'difficulty_score' => 5],  // Skyrim
            ['review_id' => 201, 'story_score' => 9,  'gameplay_score' => 7,  'exploration_score' => 8,  'art_score' => 7,  'difficulty_score' => 5],  // Fallout: New Vegas
            ['review_id' => 202, 'story_score' => 9,  'gameplay_score' => 8,  'exploration_score' => 6,  'art_score' => 9,  'difficulty_score' => 6],  // NieR:Automata
            ['review_id' => 203, 'story_score' => 8,  'gameplay_score' => 7,  'exploration_score' => 8,  'art_score' => 8,  'difficulty_score' => 8],  // Kingdom Come
            ['review_id' => 204, 'story_score' => 8,  'gameplay_score' => 8,  'exploration_score' => 8,  'art_score' => 9,  'difficulty_score' => 6],  // Cyberpunk 2077
            ['review_id' => 205, 'story_score' => 9,  'gameplay_score' => 7,  'exploration_score' => 5,  'art_score' => 8,  'difficulty_score' => 4],  // Mass Effect LE
            ['review_id' => 206, 'story_score' => 8,  'gameplay_score' => 8,  'exploration_score' => 8,  'art_score' => 10, 'difficulty_score' => 5],  // Ghost of Tsushima
            ['review_id' => 207, 'story_score' => 8,  'gameplay_score' => 8,  'exploration_score' => 8,  'art_score' => 9,  'difficulty_score' => 6],  // Horizon Zero Dawn
            ['review_id' => 208, 'story_score' => 9,  'gameplay_score' => 6,  'exploration_score' => 10, 'art_score' => 10, 'difficulty_score' => 4],  // RDR2
            ['review_id' => 209, 'story_score' => 7,  'gameplay_score' => 7,  'exploration_score' => 8,  'art_score' => 8,  'difficulty_score' => 5],  // Starfield
            ['review_id' => 210, 'story_score' => 7,  'gameplay_score' => 7,  'exploration_score' => 6,  'art_score' => 7,  'difficulty_score' => 4],  // The Outer Worlds 2
            ['review_id' => 211, 'story_score' => 6,  'gameplay_score' => 8,  'exploration_score' => 6,  'art_score' => 8,  'difficulty_score' => 7],  // Diablo IV
            ['review_id' => 212, 'story_score' => null, 'gameplay_score' => 7,  'exploration_score' => null, 'art_score' => 7,  'difficulty_score' => 6],  // NBA 2K26
            ['review_id' => 213, 'story_score' => 7,  'gameplay_score' => 8,  'exploration_score' => 9,  'art_score' => 9,  'difficulty_score' => 10], // Elden Ring
            ['review_id' => 214, 'story_score' => null, 'gameplay_score' => 4,  'exploration_score' => 5,  'art_score' => 9,  'difficulty_score' => 2],  // Dorfromantik
            ['review_id' => 215, 'story_score' => 5,  'gameplay_score' => 3,  'exploration_score' => 4,  'art_score' => 8,  'difficulty_score' => 1],  // Cozy Grove
            ['review_id' => 216, 'story_score' => 4,  'gameplay_score' => 3,  'exploration_score' => 4,  'art_score' => 7,  'difficulty_score' => 1],  // Littlewood


            // elenaRz
            ['review_id' => 217, 'story_score' => 6,  'gameplay_score' => 8,  'exploration_score' => 6,  'art_score' => 9,  'difficulty_score' => 4],  // Botany Manor
            ['review_id' => 218, 'story_score' => 7,  'gameplay_score' => 7,  'exploration_score' => 7,  'art_score' => 9,  'difficulty_score' => 5],  // Call of the Sea
            ['review_id' => 219, 'story_score' => 7,  'gameplay_score' => 10, 'exploration_score' => 4,  'art_score' => 8,  'difficulty_score' => 7],  // Portal 2
            ['review_id' => 220, 'story_score' => 8,  'gameplay_score' => 9,  'exploration_score' => 7,  'art_score' => 9,  'difficulty_score' => 8],  // Obra Dinn
            ['review_id' => 221, 'story_score' => 8,  'gameplay_score' => 6,  'exploration_score' => 6,  'art_score' => 8,  'difficulty_score' => 2],  // Stanley Parable
            ['review_id' => 222, 'story_score' => 9,  'gameplay_score' => 4,  'exploration_score' => 5,  'art_score' => 9,  'difficulty_score' => 1],  // Edith Finch
            ['review_id' => 223, 'story_score' => 8,  'gameplay_score' => 9,  'exploration_score' => 5,  'art_score' => 9,  'difficulty_score' => 7],  // Inscryption
            ['review_id' => 224, 'story_score' => 7,  'gameplay_score' => 5,  'exploration_score' => 3,  'art_score' => 8,  'difficulty_score' => 2],  // The Wolf Among Us
            ['review_id' => 225, 'story_score' => 8,  'gameplay_score' => 5,  'exploration_score' => 2,  'art_score' => 8,  'difficulty_score' => 2],  // Brothers
            ['review_id' => 226, 'story_score' => 7,  'gameplay_score' => 6,  'exploration_score' => 7,  'art_score' => 9,  'difficulty_score' => 3],  // Stray
            ['review_id' => 227, 'story_score' => 7,  'gameplay_score' => 5,  'exploration_score' => 2,  'art_score' => 8,  'difficulty_score' => 1],  // Unpacking
            ['review_id' => 228, 'story_score' => 10, 'gameplay_score' => 7,  'exploration_score' => 6,  'art_score' => 9,  'difficulty_score' => 6],  // Disco Elysium
            ['review_id' => 229, 'story_score' => 6,  'gameplay_score' => 6,  'exploration_score' => 8,  'art_score' => 8,  'difficulty_score' => 1],  // A Short Hike
            ['review_id' => 230, 'story_score' => 7,  'gameplay_score' => 5,  'exploration_score' => 5,  'art_score' => 7,  'difficulty_score' => 3],  // Oxenfree
            ['review_id' => 231, 'story_score' => 6,  'gameplay_score' => 6,  'exploration_score' => 5,  'art_score' => 7,  'difficulty_score' => 6],  // Thimbleweed Park
            ['review_id' => 232, 'story_score' => 4,  'gameplay_score' => 6,  'exploration_score' => 4,  'art_score' => 7,  'difficulty_score' => 6],  // Diablo IV
            ['review_id' => 233, 'story_score' => null, 'gameplay_score' => 4,  'exploration_score' => null, 'art_score' => 6,  'difficulty_score' => 7],  // Battlefield 2042
            ['review_id' => 234, 'story_score' => null, 'gameplay_score' => 3,  'exploration_score' => 5,  'art_score' => 5,  'difficulty_score' => 9],  // Rust


            // andres_m
            ['review_id' => 235, 'story_score' => null, 'gameplay_score' => 10, 'exploration_score' => 6,  'art_score' => 7,  'difficulty_score' => 9],  // Factorio
            ['review_id' => 236, 'story_score' => null, 'gameplay_score' => 9,  'exploration_score' => 7,  'art_score' => 8,  'difficulty_score' => 8],  // Satisfactory
            ['review_id' => 237, 'story_score' => 7,  'gameplay_score' => 10, 'exploration_score' => 5,  'art_score' => 7,  'difficulty_score' => 9],  // RimWorld
            ['review_id' => 238, 'story_score' => null, 'gameplay_score' => 9,  'exploration_score' => 5,  'art_score' => 8,  'difficulty_score' => 7],  // Cities: Skylines
            ['review_id' => 239, 'story_score' => null, 'gameplay_score' => 9,  'exploration_score' => 6,  'art_score' => 9,  'difficulty_score' => 8],  // Anno 1800
            ['review_id' => 240, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => 5,  'art_score' => 9,  'difficulty_score' => 6],  // Planet Zoo
            ['review_id' => 241, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => 5,  'art_score' => 9,  'difficulty_score' => 5],  // Planet Coaster
            ['review_id' => 242, 'story_score' => 6,  'gameplay_score' => 10, 'exploration_score' => 4,  'art_score' => 5,  'difficulty_score' => 10], // Dwarf Fortress
            ['review_id' => 243, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => 4,  'art_score' => 7,  'difficulty_score' => 7],  // Banished
            ['review_id' => 244, 'story_score' => 8,  'gameplay_score' => 8,  'exploration_score' => 4,  'art_score' => 9,  'difficulty_score' => 8],  // Frostpunk
            ['review_id' => 245, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => 6,  'art_score' => 7,  'difficulty_score' => 8],  // Civ VI
            ['review_id' => 246, 'story_score' => null, 'gameplay_score' => 6,  'exploration_score' => 6,  'art_score' => 7,  'difficulty_score' => 3],  // Euro Truck Sim 2
            ['review_id' => 247, 'story_score' => null, 'gameplay_score' => 6,  'exploration_score' => 5,  'art_score' => 7,  'difficulty_score' => 4],  // Farming Simulator 22
            ['review_id' => 248, 'story_score' => 6,  'gameplay_score' => 8,  'exploration_score' => 7,  'art_score' => 8,  'difficulty_score' => 8],  // Stellaris
            ['review_id' => 249, 'story_score' => 5,  'gameplay_score' => 9,  'exploration_score' => 7,  'art_score' => 7,  'difficulty_score' => 10], // Project Zomboid
            ['review_id' => 250, 'story_score' => 5,  'gameplay_score' => 2,  'exploration_score' => 2,  'art_score' => 6,  'difficulty_score' => 1],  // Heavy Rain
            ['review_id' => 251, 'story_score' => 6,  'gameplay_score' => 3,  'exploration_score' => 3,  'art_score' => 7,  'difficulty_score' => 1],  // The Wolf Among Us
            ['review_id' => 252, 'story_score' => 5,  'gameplay_score' => 3,  'exploration_score' => 2,  'art_score' => 7,  'difficulty_score' => 1],  // Beyond: Two Souls


            // irenec
            ['review_id' => 253, 'story_score' => 10, 'gameplay_score' => 7,  'exploration_score' => 6,  'art_score' => 9,  'difficulty_score' => 2],  // Spiritfarer
            ['review_id' => 254, 'story_score' => 8,  'gameplay_score' => 4,  'exploration_score' => 6,  'art_score' => 7,  'difficulty_score' => 1],  // Gone Home
            ['review_id' => 255, 'story_score' => 10, 'gameplay_score' => 4,  'exploration_score' => 5,  'art_score' => 9,  'difficulty_score' => 1],  // Edith Finch
            ['review_id' => 256, 'story_score' => 9,  'gameplay_score' => 5,  'exploration_score' => 6,  'art_score' => 9,  'difficulty_score' => 2],  // Firewatch
            ['review_id' => 257, 'story_score' => 9,  'gameplay_score' => 5,  'exploration_score' => 5,  'art_score' => 8,  'difficulty_score' => 2],  // Night in the Woods
            ['review_id' => 258, 'story_score' => 9,  'gameplay_score' => 6,  'exploration_score' => 2,  'art_score' => 8,  'difficulty_score' => 3],  // Brothers
            ['review_id' => 259, 'story_score' => 8,  'gameplay_score' => 6,  'exploration_score' => 3,  'art_score' => 8,  'difficulty_score' => 3],  // Detroit
            ['review_id' => 260, 'story_score' => 7,  'gameplay_score' => 5,  'exploration_score' => 2,  'art_score' => 7,  'difficulty_score' => 3],  // Heavy Rain
            ['review_id' => 261, 'story_score' => 7,  'gameplay_score' => 6,  'exploration_score' => 7,  'art_score' => 9,  'difficulty_score' => 2],  // Stray
            ['review_id' => 262, 'story_score' => 6,  'gameplay_score' => 6,  'exploration_score' => 8,  'art_score' => 8,  'difficulty_score' => 1],  // A Short Hike
            ['review_id' => 263, 'story_score' => 7,  'gameplay_score' => 5,  'exploration_score' => 5,  'art_score' => 7,  'difficulty_score' => 3],  // Oxenfree
            ['review_id' => 264, 'story_score' => 10, 'gameplay_score' => 7,  'exploration_score' => 4,  'art_score' => 9,  'difficulty_score' => 6],  // TLOU Part I
            ['review_id' => 265, 'story_score' => 7,  'gameplay_score' => 5,  'exploration_score' => 2,  'art_score' => 8,  'difficulty_score' => 1],  // Unpacking
            ['review_id' => 266, 'story_score' => 10, 'gameplay_score' => 6,  'exploration_score' => 6,  'art_score' => 9,  'difficulty_score' => 6],  // Disco Elysium
            ['review_id' => 267, 'story_score' => 7,  'gameplay_score' => 5,  'exploration_score' => 3,  'art_score' => 8,  'difficulty_score' => 2],  // Beyond: Two Souls
            ['review_id' => 268, 'story_score' => null, 'gameplay_score' => 4,  'exploration_score' => 2,  'art_score' => 8,  'difficulty_score' => 9],  // DOOM Eternal
            ['review_id' => 269, 'story_score' => null, 'gameplay_score' => 3,  'exploration_score' => null, 'art_score' => 7,  'difficulty_score' => 8],  // Tekken 8
            ['review_id' => 270, 'story_score' => null, 'gameplay_score' => 3,  'exploration_score' => null, 'art_score' => 7,  'difficulty_score' => 9],  // Apex Legends


            // oscarDG
            ['review_id' => 271, 'story_score' => 6,  'gameplay_score' => 10, 'exploration_score' => 3,  'art_score' => 9,  'difficulty_score' => 9],  // DOOM Eternal
            ['review_id' => 272, 'story_score' => 6,  'gameplay_score' => 9,  'exploration_score' => 4,  'art_score' => 8,  'difficulty_score' => 7],  // Halo Infinite
            ['review_id' => 273, 'story_score' => 9,  'gameplay_score' => 9,  'exploration_score' => 7,  'art_score' => 10, 'difficulty_score' => 6],  // Half-Life: Alyx
            ['review_id' => 274, 'story_score' => 8,  'gameplay_score' => 8,  'exploration_score' => 8,  'art_score' => 9,  'difficulty_score' => 7],  // Metro Exodus
            ['review_id' => 275, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => 5,  'art_score' => 10, 'difficulty_score' => 6],  // NFS Unbound
            ['review_id' => 276, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => null, 'art_score' => 7,  'difficulty_score' => 7],  // Battlefield 2042
            ['review_id' => 277, 'story_score' => 7,  'gameplay_score' => 8,  'exploration_score' => 6,  'art_score' => 8,  'difficulty_score' => 6],  // Deathloop
            ['review_id' => 278, 'story_score' => 6,  'gameplay_score' => 9,  'exploration_score' => 6,  'art_score' => 8,  'difficulty_score' => 5],  // Borderlands 3
            ['review_id' => 279, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => null, 'art_score' => 8,  'difficulty_score' => 7],  // Overwatch 2
            ['review_id' => 280, 'story_score' => null, 'gameplay_score' => 9,  'exploration_score' => 4,  'art_score' => 8,  'difficulty_score' => 8],  // Apex Legends
            ['review_id' => 281, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => 4,  'art_score' => 7,  'difficulty_score' => 8],  // Warzone
            ['review_id' => 282, 'story_score' => 7,  'gameplay_score' => 8,  'exploration_score' => 7,  'art_score' => 9,  'difficulty_score' => 6],  // Cyberpunk 2077
            ['review_id' => 283, 'story_score' => 6,  'gameplay_score' => 8,  'exploration_score' => 7,  'art_score' => 7,  'difficulty_score' => 7],  // Dying Light
            ['review_id' => 284, 'story_score' => null, 'gameplay_score' => 7,  'exploration_score' => null, 'art_score' => 9,  'difficulty_score' => 9],  // Tekken 8
            ['review_id' => 285, 'story_score' => null, 'gameplay_score' => 6,  'exploration_score' => 2,  'art_score' => 6,  'difficulty_score' => 9],  // CS2
            ['review_id' => 286, 'story_score' => 5,  'gameplay_score' => 2,  'exploration_score' => 2,  'art_score' => 8,  'difficulty_score' => 1],  // Cozy Grove
            ['review_id' => 287, 'story_score' => 5,  'gameplay_score' => 2,  'exploration_score' => 1,  'art_score' => 8,  'difficulty_score' => 1],  // Coffee Talk
            ['review_id' => 288, 'story_score' => 6,  'gameplay_score' => 2,  'exploration_score' => 2,  'art_score' => 7,  'difficulty_score' => 1],  // Unpacking


            // hectors
            ['review_id' => 289, 'story_score' => null, 'gameplay_score' => 9,  'exploration_score' => 7,  'art_score' => 6,  'difficulty_score' => 10], // DayZ
            ['review_id' => 290, 'story_score' => null, 'gameplay_score' => 9,  'exploration_score' => 6,  'art_score' => 7,  'difficulty_score' => 9],  // Rust
            ['review_id' => 291, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => 8,  'art_score' => 7,  'difficulty_score' => 8],  // ARK
            ['review_id' => 292, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => 7,  'art_score' => 6,  'difficulty_score' => 8],  // 7 Days to Die
            ['review_id' => 293, 'story_score' => 6,  'gameplay_score' => 8,  'exploration_score' => 6,  'art_score' => 7,  'difficulty_score' => 7],  // The Forest
            ['review_id' => 294, 'story_score' => 6,  'gameplay_score' => 8,  'exploration_score' => 7,  'art_score' => 7,  'difficulty_score' => 7],  // Dying Light (Following)
            ['review_id' => 295, 'story_score' => null, 'gameplay_score' => 10, 'exploration_score' => 7,  'art_score' => 7,  'difficulty_score' => 10], // Project Zomboid
            ['review_id' => 296, 'story_score' => 5,  'gameplay_score' => 7,  'exploration_score' => 7,  'art_score' => 8,  'difficulty_score' => 6],  // Valheim
            ['review_id' => 297, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => 7,  'art_score' => 8,  'difficulty_score' => 6],  // Terraria
            ['review_id' => 298, 'story_score' => null, 'gameplay_score' => 7,  'exploration_score' => 6,  'art_score' => 7,  'difficulty_score' => 3],  // Minecraft
            ['review_id' => 299, 'story_score' => 7,  'gameplay_score' => 8,  'exploration_score' => 9,  'art_score' => 9,  'difficulty_score' => 7],  // Subnautica
            ['review_id' => 300, 'story_score' => 7,  'gameplay_score' => 7,  'exploration_score' => 7,  'art_score' => 8,  'difficulty_score' => 9],  // The Long Dark
            ['review_id' => 301, 'story_score' => 5,  'gameplay_score' => 7,  'exploration_score' => 4,  'art_score' => 7,  'difficulty_score' => 6],  // Phasmophobia
            ['review_id' => 302, 'story_score' => 6,  'gameplay_score' => 7,  'exploration_score' => 7,  'art_score' => 8,  'difficulty_score' => 6],  // Grounded
            ['review_id' => 303, 'story_score' => 5,  'gameplay_score' => 6,  'exploration_score' => 6,  'art_score' => 7,  'difficulty_score' => 4],  // Raft
            ['review_id' => 304, 'story_score' => 8,  'gameplay_score' => 3,  'exploration_score' => 3,  'art_score' => 8,  'difficulty_score' => 1],  // Detroit
            ['review_id' => 305, 'story_score' => 6,  'gameplay_score' => 2,  'exploration_score' => 2,  'art_score' => 7,  'difficulty_score' => 1],  // Virginia
            ['review_id' => 306, 'story_score' => 6,  'gameplay_score' => 2,  'exploration_score' => 2,  'art_score' => 8,  'difficulty_score' => 1],  // Unpacking


            // marta_k
            ['review_id' => 307, 'story_score' => 7,  'gameplay_score' => 8,  'exploration_score' => 6,  'art_score' => 8,  'difficulty_score' => 2],  // Stardew Valley
            ['review_id' => 308, 'story_score' => 6,  'gameplay_score' => 6,  'exploration_score' => 4,  'art_score' => 8,  'difficulty_score' => 1],  // Cozy Grove
            ['review_id' => 309, 'story_score' => 5,  'gameplay_score' => 6,  'exploration_score' => 5,  'art_score' => 8,  'difficulty_score' => 1],  // Disney Dreamlight Valley
            ['review_id' => 310, 'story_score' => null, 'gameplay_score' => 7,  'exploration_score' => 2,  'art_score' => 9,  'difficulty_score' => 2],  // Dorfromantik
            ['review_id' => 311, 'story_score' => 7,  'gameplay_score' => 3,  'exploration_score' => 2,  'art_score' => 8,  'difficulty_score' => 1],  // Coffee Talk
            ['review_id' => 312, 'story_score' => 6,  'gameplay_score' => 6,  'exploration_score' => 5,  'art_score' => 7,  'difficulty_score' => 2],  // Potion Permit
            ['review_id' => 313, 'story_score' => 5,  'gameplay_score' => 7,  'exploration_score' => 4,  'art_score' => 9,  'difficulty_score' => 3],  // Botany Manor
            ['review_id' => 314, 'story_score' => 5,  'gameplay_score' => 6,  'exploration_score' => 5,  'art_score' => 8,  'difficulty_score' => 2],  // Ooblets
            ['review_id' => 315, 'story_score' => 6,  'gameplay_score' => 6,  'exploration_score' => 8,  'art_score' => 8,  'difficulty_score' => 1],  // A Short Hike
            ['review_id' => 316, 'story_score' => null, 'gameplay_score' => 6,  'exploration_score' => 6,  'art_score' => 8,  'difficulty_score' => 2],  // Palia
            ['review_id' => 317, 'story_score' => null, 'gameplay_score' => 6,  'exploration_score' => 4,  'art_score' => 8,  'difficulty_score' => 1],  // Animal Crossing
            ['review_id' => 318, 'story_score' => null, 'gameplay_score' => 7,  'exploration_score' => 3,  'art_score' => 9,  'difficulty_score' => 5],  // Planet Zoo
            ['review_id' => 319, 'story_score' => 7,  'gameplay_score' => 4,  'exploration_score' => 2,  'art_score' => 9,  'difficulty_score' => 1],  // Unpacking
            ['review_id' => 320, 'story_score' => 6,  'gameplay_score' => 8,  'exploration_score' => 7,  'art_score' => 8,  'difficulty_score' => 3],  // Dave the Diver
            ['review_id' => 321, 'story_score' => 7,  'gameplay_score' => 9,  'exploration_score' => 5,  'art_score' => 8,  'difficulty_score' => 5],  // It Takes Two
            ['review_id' => 322, 'story_score' => null, 'gameplay_score' => 10, 'exploration_score' => 3,  'art_score' => 8,  'difficulty_score' => 9],  // DOOM Eternal
            ['review_id' => 323, 'story_score' => 6,  'gameplay_score' => 4,  'exploration_score' => 5,  'art_score' => 7,  'difficulty_score' => 8],  // Outlast
            ['review_id' => 324, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => 7,  'art_score' => 6,  'difficulty_score' => 10], // DayZ


            // patriV
            ['review_id' => 325, 'story_score' => null, 'gameplay_score' => 6,  'exploration_score' => 4,  'art_score' => 8,  'difficulty_score' => 1],  // Animal Crossing
            ['review_id' => 326, 'story_score' => null, 'gameplay_score' => 6,  'exploration_score' => 6,  'art_score' => 8,  'difficulty_score' => 2],  // Palia
            ['review_id' => 327, 'story_score' => 6,  'gameplay_score' => 6,  'exploration_score' => 8,  'art_score' => 8,  'difficulty_score' => 1],  // A Short Hike
            ['review_id' => 328, 'story_score' => 5,  'gameplay_score' => 6,  'exploration_score' => 5,  'art_score' => 8,  'difficulty_score' => 2],  // Ooblets
            ['review_id' => 329, 'story_score' => 5,  'gameplay_score' => 6,  'exploration_score' => 5,  'art_score' => 8,  'difficulty_score' => 1],  // Dreamlight Valley
            ['review_id' => 330, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => 3,  'art_score' => 8,  'difficulty_score' => 4],  // Mario Kart 8
            ['review_id' => 331, 'story_score' => 7,  'gameplay_score' => 8,  'exploration_score' => 6,  'art_score' => 8,  'difficulty_score' => 2],  // Stardew Valley
            ['review_id' => 332, 'story_score' => 6,  'gameplay_score' => 6,  'exploration_score' => 4,  'art_score' => 8,  'difficulty_score' => 1],  // Cozy Grove
            ['review_id' => 333, 'story_score' => 7,  'gameplay_score' => 9,  'exploration_score' => 5,  'art_score' => 8,  'difficulty_score' => 5],  // It Takes Two
            ['review_id' => 334, 'story_score' => 7,  'gameplay_score' => 6,  'exploration_score' => 7,  'art_score' => 9,  'difficulty_score' => 2],  // Stray
            ['review_id' => 335, 'story_score' => 7,  'gameplay_score' => 4,  'exploration_score' => 2,  'art_score' => 9,  'difficulty_score' => 1],  // Unpacking
            ['review_id' => 336, 'story_score' => 6,  'gameplay_score' => 8,  'exploration_score' => 7,  'art_score' => 8,  'difficulty_score' => 3],  // Dave the Diver
            ['review_id' => 337, 'story_score' => 6,  'gameplay_score' => 6,  'exploration_score' => 4,  'art_score' => 7,  'difficulty_score' => 2],  // Split Fiction
            ['review_id' => 338, 'story_score' => null, 'gameplay_score' => 7,  'exploration_score' => 3,  'art_score' => 9,  'difficulty_score' => 5],  // Planet Zoo
            ['review_id' => 339, 'story_score' => 7,  'gameplay_score' => 3,  'exploration_score' => 2,  'art_score' => 8,  'difficulty_score' => 1],  // Coffee Talk
            ['review_id' => 340, 'story_score' => 7,  'gameplay_score' => 8,  'exploration_score' => 5,  'art_score' => 8,  'difficulty_score' => 7],  // RE7
            ['review_id' => 341, 'story_score' => 7,  'gameplay_score' => 8,  'exploration_score' => 5,  'art_score' => 8,  'difficulty_score' => 7],  // Dead Space 2008
            ['review_id' => 342, 'story_score' => 6,  'gameplay_score' => 4,  'exploration_score' => 5,  'art_score' => 7,  'difficulty_score' => 8],  // Outlast


            // albita
            ['review_id' => 343, 'story_score' => 7,  'gameplay_score' => 4,  'exploration_score' => 2,  'art_score' => 9,  'difficulty_score' => 1],  // Unpacking
            ['review_id' => 344, 'story_score' => 7,  'gameplay_score' => 6,  'exploration_score' => 7,  'art_score' => 9,  'difficulty_score' => 2],  // Stray
            ['review_id' => 345, 'story_score' => 6,  'gameplay_score' => 6,  'exploration_score' => 8,  'art_score' => 8,  'difficulty_score' => 1],  // A Short Hike
            ['review_id' => 346, 'story_score' => 10, 'gameplay_score' => 7,  'exploration_score' => 6,  'art_score' => 9,  'difficulty_score' => 2],  // Spiritfarer
            ['review_id' => 347, 'story_score' => 6,  'gameplay_score' => 8,  'exploration_score' => 7,  'art_score' => 8,  'difficulty_score' => 3],  // Dave the Diver
            ['review_id' => 348, 'story_score' => 5,  'gameplay_score' => 7,  'exploration_score' => 4,  'art_score' => 9,  'difficulty_score' => 3],  // Botany Manor
            ['review_id' => 349, 'story_score' => null, 'gameplay_score' => 7,  'exploration_score' => 3,  'art_score' => 9,  'difficulty_score' => 5],  // Planet Zoo
            ['review_id' => 350, 'story_score' => 7,  'gameplay_score' => 6,  'exploration_score' => 6,  'art_score' => 9,  'difficulty_score' => 4],  // Call of the Sea
            ['review_id' => 351, 'story_score' => 7,  'gameplay_score' => 8,  'exploration_score' => 6,  'art_score' => 8,  'difficulty_score' => 2],  // Stardew Valley
            ['review_id' => 352, 'story_score' => null, 'gameplay_score' => 7,  'exploration_score' => 2,  'art_score' => 9,  'difficulty_score' => 2],  // Dorfromantik
            ['review_id' => 353, 'story_score' => 7,  'gameplay_score' => 7,  'exploration_score' => 6,  'art_score' => 9,  'difficulty_score' => 4],  // Kena
            ['review_id' => 354, 'story_score' => 9,  'gameplay_score' => 5,  'exploration_score' => 6,  'art_score' => 9,  'difficulty_score' => 2],  // Firewatch
            ['review_id' => 355, 'story_score' => 6,  'gameplay_score' => 6,  'exploration_score' => 4,  'art_score' => 8,  'difficulty_score' => 1],  // Cozy Grove
            ['review_id' => 356, 'story_score' => 7,  'gameplay_score' => 9,  'exploration_score' => 5,  'art_score' => 8,  'difficulty_score' => 5],  // It Takes Two
            ['review_id' => 357, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => 3,  'art_score' => 8,  'difficulty_score' => 4],  // Mario Kart 8
            ['review_id' => 358, 'story_score' => null, 'gameplay_score' => 10, 'exploration_score' => 3,  'art_score' => 8,  'difficulty_score' => 9],  // DOOM Eternal
            ['review_id' => 359, 'story_score' => 6,  'gameplay_score' => 4,  'exploration_score' => 5,  'art_score' => 7,  'difficulty_score' => 8],  // Outlast
            ['review_id' => 360, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => 7,  'art_score' => 6,  'difficulty_score' => 10], // DayZ


            // claran
            ['review_id' => 361, 'story_score' => 7,  'gameplay_score' => 7,  'exploration_score' => 6,  'art_score' => 9,  'difficulty_score' => 4],  // Kena
            ['review_id' => 362, 'story_score' => 7,  'gameplay_score' => 6,  'exploration_score' => 6,  'art_score' => 9,  'difficulty_score' => 4],  // Call of the Sea
            ['review_id' => 363, 'story_score' => 5,  'gameplay_score' => 7,  'exploration_score' => 4,  'art_score' => 9,  'difficulty_score' => 3],  // Botany Manor
            ['review_id' => 364, 'story_score' => 7,  'gameplay_score' => 6,  'exploration_score' => 7,  'art_score' => 9,  'difficulty_score' => 2],  // Stray
            ['review_id' => 365, 'story_score' => 6,  'gameplay_score' => 10, 'exploration_score' => 4,  'art_score' => 8,  'difficulty_score' => 6],  // Portal 2
            ['review_id' => 366, 'story_score' => 6,  'gameplay_score' => 6,  'exploration_score' => 8,  'art_score' => 8,  'difficulty_score' => 1],  // A Short Hike
            ['review_id' => 367, 'story_score' => 7,  'gameplay_score' => 4,  'exploration_score' => 2,  'art_score' => 9,  'difficulty_score' => 1],  // Unpacking
            ['review_id' => 368, 'story_score' => 5,  'gameplay_score' => 6,  'exploration_score' => 5,  'art_score' => 8,  'difficulty_score' => 1],  // Dreamlight Valley
            ['review_id' => 369, 'story_score' => 9,  'gameplay_score' => 4,  'exploration_score' => 5,  'art_score' => 9,  'difficulty_score' => 1],  // Edith Finch
            ['review_id' => 370, 'story_score' => 9,  'gameplay_score' => 5,  'exploration_score' => 6,  'art_score' => 9,  'difficulty_score' => 2],  // Firewatch
            ['review_id' => 371, 'story_score' => null, 'gameplay_score' => 6,  'exploration_score' => 4,  'art_score' => 8,  'difficulty_score' => 1],  // Animal Crossing
            ['review_id' => 372, 'story_score' => 7,  'gameplay_score' => 8,  'exploration_score' => 6,  'art_score' => 8,  'difficulty_score' => 2],  // Stardew Valley
            ['review_id' => 373, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => 3,  'art_score' => 8,  'difficulty_score' => 4],  // Mario Kart 8
            ['review_id' => 374, 'story_score' => 7,  'gameplay_score' => 9,  'exploration_score' => 5,  'art_score' => 8,  'difficulty_score' => 5],  // It Takes Two
            ['review_id' => 375, 'story_score' => 10, 'gameplay_score' => 7,  'exploration_score' => 6,  'art_score' => 9,  'difficulty_score' => 2],  // Spiritfarer
            ['review_id' => 376, 'story_score' => null, 'gameplay_score' => 4,  'exploration_score' => null, 'art_score' => 7,  'difficulty_score' => 8],  // Mortal Kombat 1
            ['review_id' => 377, 'story_score' => null, 'gameplay_score' => 3,  'exploration_score' => null, 'art_score' => 6,  'difficulty_score' => 9],  // Counter-Strike 2
            ['review_id' => 378, 'story_score' => 6,  'gameplay_score' => 4,  'exploration_score' => 5,  'art_score' => 7,  'difficulty_score' => 8],  // Outlast


            // rubenAg
            ['review_id' => 379, 'story_score' => 8,  'gameplay_score' => 10, 'exploration_score' => 5,  'art_score' => 9,  'difficulty_score' => 7],  // Hades
            ['review_id' => 380, 'story_score' => null, 'gameplay_score' => 10, 'exploration_score' => 2,  'art_score' => 7,  'difficulty_score' => 7],  // Slay the Spire
            ['review_id' => 381, 'story_score' => null, 'gameplay_score' => 9,  'exploration_score' => 6,  'art_score' => 7,  'difficulty_score' => 8],  // The Binding of Isaac: Rebirth
            ['review_id' => 382, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => 4,  'art_score' => 6,  'difficulty_score' => 4],  // Vampire Survivors
            ['review_id' => 383, 'story_score' => 4,  'gameplay_score' => 9,  'exploration_score' => 6,  'art_score' => 7,  'difficulty_score' => 8],  // Risk of Rain 2
            ['review_id' => 384, 'story_score' => 8,  'gameplay_score' => 9,  'exploration_score' => 6,  'art_score' => 9,  'difficulty_score' => 9],  // Returnal
            ['review_id' => 385, 'story_score' => 5,  'gameplay_score' => 9,  'exploration_score' => 5,  'art_score' => 8,  'difficulty_score' => 8],  // Dead Cells
            ['review_id' => 386, 'story_score' => 4,  'gameplay_score' => 9,  'exploration_score' => 4,  'art_score' => 8,  'difficulty_score' => 8],  // Enter the Gungeon
            ['review_id' => 387, 'story_score' => 5,  'gameplay_score' => 8,  'exploration_score' => 5,  'art_score' => 7,  'difficulty_score' => 7],  // Rogue Legacy 2
            ['review_id' => 388, 'story_score' => 3,  'gameplay_score' => 8,  'exploration_score' => 6,  'art_score' => 7,  'difficulty_score' => 10], // Spelunky 2
            ['review_id' => 389, 'story_score' => 6,  'gameplay_score' => 8,  'exploration_score' => 4,  'art_score' => 9,  'difficulty_score' => 9],  // Darkest Dungeon
            ['review_id' => 390, 'story_score' => 6,  'gameplay_score' => 7,  'exploration_score' => 4,  'art_score' => 8,  'difficulty_score' => 6],  // Cult of the Lamb
            ['review_id' => 391, 'story_score' => 8,  'gameplay_score' => 7,  'exploration_score' => 5,  'art_score' => 9,  'difficulty_score' => 6],  // Inscryption
            ['review_id' => 392, 'story_score' => 6,  'gameplay_score' => 10, 'exploration_score' => 3,  'art_score' => 8,  'difficulty_score' => 9],  // DOOM Eternal
            ['review_id' => 393, 'story_score' => 9,  'gameplay_score' => 9,  'exploration_score' => 5,  'art_score' => 8,  'difficulty_score' => 9],  // Celeste
            ['review_id' => 394, 'story_score' => 5,  'gameplay_score' => 2,  'exploration_score' => 1,  'art_score' => 7,  'difficulty_score' => 1],  // Heavy Rain
            ['review_id' => 395, 'story_score' => 6,  'gameplay_score' => 2,  'exploration_score' => 3,  'art_score' => 7,  'difficulty_score' => 1],  // Gone Home
            ['review_id' => 396, 'story_score' => 5,  'gameplay_score' => 1,  'exploration_score' => 2,  'art_score' => 7,  'difficulty_score' => 1],  // Virginia


            // sara_iba
            ['review_id' => 397, 'story_score' => 10, 'gameplay_score' => 7,  'exploration_score' => 6,  'art_score' => 9,  'difficulty_score' => 4],  // Disco Elysium
            ['review_id' => 398, 'story_score' => 8,  'gameplay_score' => 7,  'exploration_score' => 5,  'art_score' => 8,  'difficulty_score' => 6],  // Thimbleweed Park
            ['review_id' => 399, 'story_score' => 8,  'gameplay_score' => 7,  'exploration_score' => 5,  'art_score' => 8,  'difficulty_score' => 4],  // Return to Monkey Island
            ['review_id' => 400, 'story_score' => 9,  'gameplay_score' => 9,  'exploration_score' => 6,  'art_score' => 9,  'difficulty_score' => 8],  // Return Of The Obra Dinn
            ['review_id' => 401, 'story_score' => 7,  'gameplay_score' => 7,  'exploration_score' => 6,  'art_score' => 8,  'difficulty_score' => 5],  // Sherlock Holmes: Chapter One
            ['review_id' => 402, 'story_score' => 8,  'gameplay_score' => 6,  'exploration_score' => 3,  'art_score' => 8,  'difficulty_score' => 2],  // The Wolf Among Us
            ['review_id' => 403, 'story_score' => 7,  'gameplay_score' => 7,  'exploration_score' => 4,  'art_score' => 7,  'difficulty_score' => 7],  // Deponia
            ['review_id' => 404, 'story_score' => 8,  'gameplay_score' => 10, 'exploration_score' => 5,  'art_score' => 8,  'difficulty_score' => 6],  // Portal 2
            ['review_id' => 405, 'story_score' => 8,  'gameplay_score' => 6,  'exploration_score' => 4,  'art_score' => 8,  'difficulty_score' => 2],  // The Stanley Parable
            ['review_id' => 406, 'story_score' => 8,  'gameplay_score' => 8,  'exploration_score' => 6,  'art_score' => 9,  'difficulty_score' => 7],  // Inscryption
            ['review_id' => 407, 'story_score' => 7,  'gameplay_score' => 6,  'exploration_score' => 4,  'art_score' => 7,  'difficulty_score' => 4],  // Call of Cthulhu
            ['review_id' => 408, 'story_score' => 8,  'gameplay_score' => 6,  'exploration_score' => 4,  'art_score' => 8,  'difficulty_score' => 5],  // Alan Wake
            ['review_id' => 409, 'story_score' => 8,  'gameplay_score' => 4,  'exploration_score' => 3,  'art_score' => 9,  'difficulty_score' => 1],  // Edith Finch
            ['review_id' => 410, 'story_score' => 5,  'gameplay_score' => 6,  'exploration_score' => 4,  'art_score' => 9,  'difficulty_score' => 2],  // Botany Manor
            ['review_id' => 411, 'story_score' => 6,  'gameplay_score' => 6,  'exploration_score' => 5,  'art_score' => 9,  'difficulty_score' => 3],  // Call of the Sea
            ['review_id' => 412, 'story_score' => null, 'gameplay_score' => 3,  'exploration_score' => null, 'art_score' => 7,  'difficulty_score' => 3],  // EA SPORTS FC 26
            ['review_id' => 413, 'story_score' => null, 'gameplay_score' => 3,  'exploration_score' => null, 'art_score' => 8,  'difficulty_score' => 5],  // F1 24
            ['review_id' => 414, 'story_score' => null, 'gameplay_score' => 2,  'exploration_score' => null, 'art_score' => 7,  'difficulty_score' => 6],  // Madden NFL 24


            // tomas_h
            ['review_id' => 415, 'story_score' => 8,  'gameplay_score' => 8,  'exploration_score' => 9,  'art_score' => 8,  'difficulty_score' => 4],  // GTA V
            ['review_id' => 416, 'story_score' => 10, 'gameplay_score' => 8,  'exploration_score' => 4,  'art_score' => 10, 'difficulty_score' => 7],  // The Last of Us Part II
            ['review_id' => 417, 'story_score' => 9,  'gameplay_score' => 7,  'exploration_score' => 10, 'art_score' => 10, 'difficulty_score' => 4],  // Red Dead Redemption 2
            ['review_id' => 418, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => 2,  'art_score' => 9,  'difficulty_score' => 7],  // F1 24
            ['review_id' => 419, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => null, 'art_score' => 8,  'difficulty_score' => 6],  // EA SPORTS FC 26
            ['review_id' => 420, 'story_score' => 9,  'gameplay_score' => 8,  'exploration_score' => 5,  'art_score' => 9,  'difficulty_score' => 7],  // Alan Wake 2
            ['review_id' => 421, 'story_score' => 9,  'gameplay_score' => 7,  'exploration_score' => 4,  'art_score' => 9,  'difficulty_score' => 6],  // The Last of Us Part I
            ['review_id' => 422, 'story_score' => 7,  'gameplay_score' => 8,  'exploration_score' => 4,  'art_score' => 7,  'difficulty_score' => 6],  // God of War I
            ['review_id' => 423, 'story_score' => null, 'gameplay_score' => 7,  'exploration_score' => 3,  'art_score' => 8,  'difficulty_score' => 6],  // Battlefield 2042
            ['review_id' => 424, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => 8,  'art_score' => 10, 'difficulty_score' => 4],  // Forza Horizon 5
            ['review_id' => 425, 'story_score' => 6,  'gameplay_score' => 10, 'exploration_score' => 3,  'art_score' => 8,  'difficulty_score' => 9],  // DOOM Eternal
            ['review_id' => 426, 'story_score' => 8,  'gameplay_score' => 8,  'exploration_score' => 8,  'art_score' => 9,  'difficulty_score' => 6],  // Cyberpunk 2077
            ['review_id' => 427, 'story_score' => 9,  'gameplay_score' => 7,  'exploration_score' => 4,  'art_score' => 10, 'difficulty_score' => 4],  // Uncharted 4
            ['review_id' => 428, 'story_score' => null, 'gameplay_score' => 7,  'exploration_score' => null, 'art_score' => 8,  'difficulty_score' => 6],  // NBA 2K26
            ['review_id' => 429, 'story_score' => 8,  'gameplay_score' => 8,  'exploration_score' => 5,  'art_score' => 9,  'difficulty_score' => 7],  // Resident Evil 2
            ['review_id' => 430, 'story_score' => 6,  'gameplay_score' => 4,  'exploration_score' => 5,  'art_score' => 6,  'difficulty_score' => 7],  // Axiom Verge
            ['review_id' => 431, 'story_score' => null, 'gameplay_score' => 3,  'exploration_score' => 2,  'art_score' => 7,  'difficulty_score' => 9],  // Crypt of the NecroDancer
            ['review_id' => 432, 'story_score' => 4,  'gameplay_score' => 3,  'exploration_score' => 4,  'art_score' => 7,  'difficulty_score' => 1],  // Littlewood


            // miguelap
            ['review_id' => 433, 'story_score' => 8,  'gameplay_score' => 9,  'exploration_score' => 4,  'art_score' => 9,  'difficulty_score' => 8],  // Frostpunk
            ['review_id' => 434, 'story_score' => 6,  'gameplay_score' => 9,  'exploration_score' => 6,  'art_score' => 7,  'difficulty_score' => 8],  // RimWorld
            ['review_id' => 435, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => 4,  'art_score' => 7,  'difficulty_score' => 7],  // Banished
            ['review_id' => 436, 'story_score' => null, 'gameplay_score' => 9,  'exploration_score' => 5,  'art_score' => 6,  'difficulty_score' => 10], // Dwarf Fortress
            ['review_id' => 437, 'story_score' => 4,  'gameplay_score' => 10, 'exploration_score' => 2,  'art_score' => 8,  'difficulty_score' => 8],  // Into the Breach
            ['review_id' => 438, 'story_score' => 7,  'gameplay_score' => 9,  'exploration_score' => 3,  'art_score' => 9,  'difficulty_score' => 9],  // Darkest Dungeon
            ['review_id' => 439, 'story_score' => null, 'gameplay_score' => 10, 'exploration_score' => 5,  'art_score' => 7,  'difficulty_score' => 8],  // Factorio
            ['review_id' => 440, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => 5,  'art_score' => 7,  'difficulty_score' => 6],  // Civilization VI
            ['review_id' => 441, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => 6,  'art_score' => 8,  'difficulty_score' => 5],  // Cities: Skylines
            ['review_id' => 442, 'story_score' => null, 'gameplay_score' => 9,  'exploration_score' => 2,  'art_score' => 7,  'difficulty_score' => 8],  // Slay the Spire
            ['review_id' => 443, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => 6,  'art_score' => 6,  'difficulty_score' => 9],  // Project Zomboid
            ['review_id' => 444, 'story_score' => 6,  'gameplay_score' => 7,  'exploration_score' => 7,  'art_score' => 8,  'difficulty_score' => 8],  // The Long Dark
            ['review_id' => 445, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => 5,  'art_score' => 9,  'difficulty_score' => 6],  // Anno 1800
            ['review_id' => 446, 'story_score' => null, 'gameplay_score' => 7,  'exploration_score' => 7,  'art_score' => 8,  'difficulty_score' => 6],  // Stellaris
            ['review_id' => 447, 'story_score' => 7,  'gameplay_score' => 8,  'exploration_score' => 5,  'art_score' => 9,  'difficulty_score' => 6],  // Hades
            ['review_id' => 448, 'story_score' => null, 'gameplay_score' => 3,  'exploration_score' => null, 'art_score' => 8,  'difficulty_score' => 3],  // Mario Kart 8
            ['review_id' => 449, 'story_score' => null, 'gameplay_score' => 4,  'exploration_score' => null, 'art_score' => 8,  'difficulty_score' => 7],  // Splatoon 3
            ['review_id' => 450, 'story_score' => 6,  'gameplay_score' => 4,  'exploration_score' => 4,  'art_score' => 9,  'difficulty_score' => 2],  // Luigi's Mansion 3


            // diegolz
            ['review_id' => 451, 'story_score' => 8,  'gameplay_score' => 9,  'exploration_score' => 7,  'art_score' => 10, 'difficulty_score' => 6],  // Half-Life: Alyx
            ['review_id' => 452, 'story_score' => null, 'gameplay_score' => 9,  'exploration_score' => null, 'art_score' => 8,  'difficulty_score' => 7],  // Beat Saber
            ['review_id' => 453, 'story_score' => 6,  'gameplay_score' => 8,  'exploration_score' => 7,  'art_score' => 8,  'difficulty_score' => 8],  // Boneworks
            ['review_id' => 454, 'story_score' => 8,  'gameplay_score' => 7,  'exploration_score' => 6,  'art_score' => 9,  'difficulty_score' => 4],  // Moss
            ['review_id' => 455, 'story_score' => 6,  'gameplay_score' => 10, 'exploration_score' => 3,  'art_score' => 8,  'difficulty_score' => 9],  // DOOM Eternal
            ['review_id' => 456, 'story_score' => 8,  'gameplay_score' => 7,  'exploration_score' => 7,  'art_score' => 9,  'difficulty_score' => 7],  // Metro Exodus
            ['review_id' => 457, 'story_score' => 6,  'gameplay_score' => 8,  'exploration_score' => 3,  'art_score' => 8,  'difficulty_score' => 6],  // Halo Infinite
            ['review_id' => 458, 'story_score' => 7,  'gameplay_score' => 7,  'exploration_score' => 6,  'art_score' => 8,  'difficulty_score' => 6],  // Deathloop
            ['review_id' => 459, 'story_score' => 5,  'gameplay_score' => 7,  'exploration_score' => 2,  'art_score' => 7,  'difficulty_score' => 6],  // Phasmophobia
            ['review_id' => 460, 'story_score' => 8,  'gameplay_score' => 7,  'exploration_score' => 4,  'art_score' => 9,  'difficulty_score' => 8],  // Resident Evil 7
            ['review_id' => 461, 'story_score' => 8,  'gameplay_score' => 7,  'exploration_score' => 4,  'art_score' => 9,  'difficulty_score' => 8],  // Alien: Isolation
            ['review_id' => 462, 'story_score' => null, 'gameplay_score' => 7,  'exploration_score' => null, 'art_score' => 8,  'difficulty_score' => 7],  // Overwatch 2
            ['review_id' => 463, 'story_score' => 8,  'gameplay_score' => 10, 'exploration_score' => 5,  'art_score' => 8,  'difficulty_score' => 6],  // Portal 2
            ['review_id' => 464, 'story_score' => 8,  'gameplay_score' => 7,  'exploration_score' => 5,  'art_score' => 9,  'difficulty_score' => 6],  // Inscryption
            ['review_id' => 465, 'story_score' => null, 'gameplay_score' => 6,  'exploration_score' => null, 'art_score' => 7,  'difficulty_score' => 8],  // Counter-Strike 2
            ['review_id' => 466, 'story_score' => null, 'gameplay_score' => 2,  'exploration_score' => null, 'art_score' => 7,  'difficulty_score' => 5],  // EA SPORTS FC 26
            ['review_id' => 467, 'story_score' => null, 'gameplay_score' => 2,  'exploration_score' => null, 'art_score' => 7,  'difficulty_score' => 6],  // NBA 2K26
            ['review_id' => 468, 'story_score' => null, 'gameplay_score' => 3,  'exploration_score' => 2,  'art_score' => 9,  'difficulty_score' => 2],  // Dorfromantik


            // raquelP
            ['review_id' => 469, 'story_score' => 6,  'gameplay_score' => 10, 'exploration_score' => 1,  'art_score' => 8,  'difficulty_score' => 9],  // Tekken 8
            ['review_id' => 470, 'story_score' => 6,  'gameplay_score' => 10, 'exploration_score' => 2,  'art_score' => 8,  'difficulty_score' => 9],  // Street Fighter 6
            ['review_id' => 471, 'story_score' => 6,  'gameplay_score' => 9,  'exploration_score' => 1,  'art_score' => 10, 'difficulty_score' => 8],  // Guilty Gear -Strive-
            ['review_id' => 472, 'story_score' => 7,  'gameplay_score' => 8,  'exploration_score' => 1,  'art_score' => 8,  'difficulty_score' => 7],  // Mortal Kombat 1
            ['review_id' => 473, 'story_score' => 6,  'gameplay_score' => 9,  'exploration_score' => 1,  'art_score' => 9,  'difficulty_score' => 8],  // DRAGON BALL FighterZ
            ['review_id' => 474, 'story_score' => 6,  'gameplay_score' => 10, 'exploration_score' => 3,  'art_score' => 8,  'difficulty_score' => 9],  // DOOM Eternal
            ['review_id' => 475, 'story_score' => 8,  'gameplay_score' => 9,  'exploration_score' => 5,  'art_score' => 9,  'difficulty_score' => 7],  // Hades
            ['review_id' => 476, 'story_score' => 5,  'gameplay_score' => 9,  'exploration_score' => 3,  'art_score' => 10, 'difficulty_score' => 10], // Cuphead
            ['review_id' => 477, 'story_score' => 5,  'gameplay_score' => 9,  'exploration_score' => 5,  'art_score' => 8,  'difficulty_score' => 8],  // Dead Cells
            ['review_id' => 478, 'story_score' => 8,  'gameplay_score' => 9,  'exploration_score' => 4,  'art_score' => 9,  'difficulty_score' => 7],  // Katana ZERO
            ['review_id' => 479, 'story_score' => 9,  'gameplay_score' => 8,  'exploration_score' => 8,  'art_score' => 10, 'difficulty_score' => 6],  // Ghost of Tsushima
            ['review_id' => 480, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => 7,  'art_score' => 10, 'difficulty_score' => 4],  // Forza Horizon 5
            ['review_id' => 481, 'story_score' => 8,  'gameplay_score' => 8,  'exploration_score' => 4,  'art_score' => 9,  'difficulty_score' => 5],  // It Takes Two
            ['review_id' => 482, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => null, 'art_score' => 8,  'difficulty_score' => 7],  // Overwatch 2
            ['review_id' => 483, 'story_score' => null, 'gameplay_score' => 7,  'exploration_score' => null, 'art_score' => 7,  'difficulty_score' => 9],  // Counter-Strike 2
            ['review_id' => 484, 'story_score' => 6,  'gameplay_score' => 2,  'exploration_score' => 2,  'art_score' => 8,  'difficulty_score' => 1],  // Unpacking
            ['review_id' => 485, 'story_score' => 7,  'gameplay_score' => 2,  'exploration_score' => 4,  'art_score' => 7,  'difficulty_score' => 1],  // Gone Home
            ['review_id' => 486, 'story_score' => null, 'gameplay_score' => 2,  'exploration_score' => 6,  'art_score' => 9,  'difficulty_score' => 4],  // Microsoft Flight Simulator 2020


            // brunocb
            ['review_id' => 487, 'story_score' => 10, 'gameplay_score' => 8,  'exploration_score' => 7,  'art_score' => 9,  'difficulty_score' => 6],  // Mass Effect: Legendary Edition
            ['review_id' => 488, 'story_score' => 9,  'gameplay_score' => 9,  'exploration_score' => 8,  'art_score' => 10, 'difficulty_score' => 7],  // Cyberpunk 2077
            ['review_id' => 489, 'story_score' => 10, 'gameplay_score' => 8,  'exploration_score' => 6,  'art_score' => 9,  'difficulty_score' => 6],  // NieR:Automata
            ['review_id' => 490, 'story_score' => 7,  'gameplay_score' => 8,  'exploration_score' => 9,  'art_score' => 8,  'difficulty_score' => 5],  // Starfield
            ['review_id' => 491, 'story_score' => 8,  'gameplay_score' => 8,  'exploration_score' => 7,  'art_score' => 8,  'difficulty_score' => 5],  // The Outer Worlds 2
            ['review_id' => 492, 'story_score' => 9,  'gameplay_score' => 7,  'exploration_score' => 6,  'art_score' => 9,  'difficulty_score' => 6],  // The Alters
            ['review_id' => 493, 'story_score' => 9,  'gameplay_score' => 8,  'exploration_score' => 5,  'art_score' => 9,  'difficulty_score' => 5],  // Persona 5 Royal
            ['review_id' => 494, 'story_score' => 7,  'gameplay_score' => 8,  'exploration_score' => 8,  'art_score' => 8,  'difficulty_score' => 6],  // Fallout 4
            ['review_id' => 495, 'story_score' => 10, 'gameplay_score' => 8,  'exploration_score' => 9,  'art_score' => 9,  'difficulty_score' => 6],  // The Witcher 3: Wild Hunt
            ['review_id' => 496, 'story_score' => 10, 'gameplay_score' => 7,  'exploration_score' => 9,  'art_score' => 10, 'difficulty_score' => 4],  // Red Dead Redemption 2
            ['review_id' => 497, 'story_score' => 10, 'gameplay_score' => 7,  'exploration_score' => 4,  'art_score' => 9,  'difficulty_score' => 4],  // Disco Elysium
            ['review_id' => 498, 'story_score' => 6,  'gameplay_score' => 10, 'exploration_score' => 3,  'art_score' => 8,  'difficulty_score' => 9],  // DOOM Eternal
            ['review_id' => 499, 'story_score' => 8,  'gameplay_score' => 10, 'exploration_score' => 5,  'art_score' => 8,  'difficulty_score' => 6],  // Portal 2
            ['review_id' => 500, 'story_score' => 8,  'gameplay_score' => 4,  'exploration_score' => 2,  'art_score' => 9,  'difficulty_score' => 2],  // Detroit: Become Human
            ['review_id' => 501, 'story_score' => 8,  'gameplay_score' => 8,  'exploration_score' => 7,  'art_score' => 9,  'difficulty_score' => 6],  // Horizon Zero Dawn
            ['review_id' => 502, 'story_score' => null, 'gameplay_score' => 2,  'exploration_score' => null, 'art_score' => 8,  'difficulty_score' => 5],  // F1 24
            ['review_id' => 503, 'story_score' => null, 'gameplay_score' => 2,  'exploration_score' => null, 'art_score' => 7,  'difficulty_score' => 5],  // WWE 2K25
            ['review_id' => 504, 'story_score' => 4,  'gameplay_score' => 4,  'exploration_score' => 2,  'art_score' => 6,  'difficulty_score' => 6],  // Phasmophobia


            // nuriaS
            ['review_id' => 505, 'story_score' => 7,  'gameplay_score' => 10, 'exploration_score' => 10, 'art_score' => 9,  'difficulty_score' => 6],  // Zelda: Breath of the Wild
            ['review_id' => 506, 'story_score' => 6,  'gameplay_score' => 10, 'exploration_score' => 8,  'art_score' => 9,  'difficulty_score' => 4],  // Super Mario Odyssey
            ['review_id' => 507, 'story_score' => null, 'gameplay_score' => 9,  'exploration_score' => null, 'art_score' => 8,  'difficulty_score' => 5],  // Mario Kart 8 Deluxe
            ['review_id' => 508, 'story_score' => 6,  'gameplay_score' => 9,  'exploration_score' => 3,  'art_score' => 9,  'difficulty_score' => 7],  // Splatoon 3
            ['review_id' => 509, 'story_score' => 7,  'gameplay_score' => 9,  'exploration_score' => 8,  'art_score' => 9,  'difficulty_score' => 8],  // Metroid Dread
            ['review_id' => 510, 'story_score' => 9,  'gameplay_score' => 9,  'exploration_score' => 5,  'art_score' => 8,  'difficulty_score' => 7],  // Fire Emblem: Three Houses
            ['review_id' => 511, 'story_score' => null, 'gameplay_score' => 7,  'exploration_score' => 6,  'art_score' => 9,  'difficulty_score' => 2],  // Animal Crossing: New Horizons
            ['review_id' => 512, 'story_score' => 6,  'gameplay_score' => 8,  'exploration_score' => 6,  'art_score' => 8,  'difficulty_score' => 3],  // Stardew Valley
            ['review_id' => 513, 'story_score' => 7,  'gameplay_score' => 8,  'exploration_score' => 8,  'art_score' => 9,  'difficulty_score' => 2],  // A Short Hike
            ['review_id' => 514, 'story_score' => 7,  'gameplay_score' => 8,  'exploration_score' => 6,  'art_score' => 9,  'difficulty_score' => 3],  // Luigi's Mansion 3
            ['review_id' => 515, 'story_score' => 8,  'gameplay_score' => 9,  'exploration_score' => 9,  'art_score' => 10, 'difficulty_score' => 9],  // Hollow Knight
            ['review_id' => 516, 'story_score' => 9,  'gameplay_score' => 9,  'exploration_score' => 4,  'art_score' => 9,  'difficulty_score' => 9],  // Celeste
            ['review_id' => 517, 'story_score' => 9,  'gameplay_score' => 9,  'exploration_score' => 8,  'art_score' => 10, 'difficulty_score' => 7],  // Ori and the Will of the Wisps
            ['review_id' => 518, 'story_score' => 8,  'gameplay_score' => 10, 'exploration_score' => 5,  'art_score' => 8,  'difficulty_score' => 6],  // Portal 2
            ['review_id' => 519, 'story_score' => 8,  'gameplay_score' => 8,  'exploration_score' => 4,  'art_score' => 9,  'difficulty_score' => 5],  // It Takes Two
            ['review_id' => 520, 'story_score' => 7,  'gameplay_score' => 3,  'exploration_score' => 3,  'art_score' => 8,  'difficulty_score' => 7],  // Resident Evil 7
            ['review_id' => 521, 'story_score' => 5,  'gameplay_score' => 2,  'exploration_score' => 2,  'art_score' => 7,  'difficulty_score' => 7],  // Outlast
            ['review_id' => 522, 'story_score' => 7,  'gameplay_score' => 3,  'exploration_score' => 3,  'art_score' => 9,  'difficulty_score' => 8],  // Dead Space (2008)


            // gonzaleon
            ['review_id' => 523, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => 9,  'art_score' => 10, 'difficulty_score' => 6],  // Microsoft Flight Simulator 2020
            ['review_id' => 524, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => 7,  'art_score' => 8,  'difficulty_score' => 3],  // Euro Truck Simulator 2
            ['review_id' => 525, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => 5,  'art_score' => 7,  'difficulty_score' => 4],  // Farming Simulator 22
            ['review_id' => 526, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => 4,  'art_score' => 8,  'difficulty_score' => 5],  // Cities: Skylines
            ['review_id' => 527, 'story_score' => null, 'gameplay_score' => 9,  'exploration_score' => 2,  'art_score' => 9,  'difficulty_score' => 8],  // Assetto Corsa Competizione
            ['review_id' => 528, 'story_score' => 6,  'gameplay_score' => 9,  'exploration_score' => 5,  'art_score' => 9,  'difficulty_score' => 7],  // Anno 1800
            ['review_id' => 529, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => 2,  'art_score' => 9,  'difficulty_score' => 6],  // Gran Turismo 7
            ['review_id' => 530, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => 3,  'art_score' => 7,  'difficulty_score' => 7],  // Banished
            ['review_id' => 531, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => 4,  'art_score' => 9,  'difficulty_score' => 6],  // Planet Zoo
            ['review_id' => 532, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => 4,  'art_score' => 9,  'difficulty_score' => 5],  // Planet Coaster
            ['review_id' => 533, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => 8,  'art_score' => 10, 'difficulty_score' => 4],  // Forza Horizon 5
            ['review_id' => 534, 'story_score' => null, 'gameplay_score' => 9,  'exploration_score' => 2,  'art_score' => 7,  'difficulty_score' => 8],  // Factorio
            ['review_id' => 535, 'story_score' => null, 'gameplay_score' => 7,  'exploration_score' => 3,  'art_score' => 9,  'difficulty_score' => 2],  // Dorfromantik
            ['review_id' => 536, 'story_score' => 6,  'gameplay_score' => 8,  'exploration_score' => 6,  'art_score' => 8,  'difficulty_score' => 3],  // Stardew Valley
            ['review_id' => 537, 'story_score' => 6,  'gameplay_score' => 7,  'exploration_score' => 5,  'art_score' => 9,  'difficulty_score' => 5],  // Need for Speed Unbound
            ['review_id' => 538, 'story_score' => 4,  'gameplay_score' => 2,  'exploration_score' => 1,  'art_score' => 7,  'difficulty_score' => 8],  // Tekken 8
            ['review_id' => 539, 'story_score' => null, 'gameplay_score' => 2,  'exploration_score' => null, 'art_score' => 7,  'difficulty_score' => 8],  // Apex Legends
            ['review_id' => 540, 'story_score' => 5,  'gameplay_score' => 2,  'exploration_score' => 2,  'art_score' => 7,  'difficulty_score' => 7],  // Outlast


            // paulaPnc
            ['review_id' => 541, 'story_score' => 8,  'gameplay_score' => 8,  'exploration_score' => 6,  'art_score' => 9,  'difficulty_score' => 4],  // Return to Monkey Island
            ['review_id' => 542, 'story_score' => 8,  'gameplay_score' => 8,  'exploration_score' => 5,  'art_score' => 8,  'difficulty_score' => 6],  // Thimbleweed Park
            ['review_id' => 543, 'story_score' => 9,  'gameplay_score' => 9,  'exploration_score' => 6,  'art_score' => 9,  'difficulty_score' => 8],  // Return Of The Obra Dinn
            ['review_id' => 544, 'story_score' => 7,  'gameplay_score' => 7,  'exploration_score' => 4,  'art_score' => 8,  'difficulty_score' => 7],  // Deponia
            ['review_id' => 545, 'story_score' => 7,  'gameplay_score' => 7,  'exploration_score' => 5,  'art_score' => 9,  'difficulty_score' => 4],  // Call of the Sea
            ['review_id' => 546, 'story_score' => 10, 'gameplay_score' => 7,  'exploration_score' => 4,  'art_score' => 9,  'difficulty_score' => 4],  // Disco Elysium
            ['review_id' => 547, 'story_score' => 8,  'gameplay_score' => 10, 'exploration_score' => 5,  'art_score' => 8,  'difficulty_score' => 6],  // Portal 2
            ['review_id' => 548, 'story_score' => 8,  'gameplay_score' => 6,  'exploration_score' => 3,  'art_score' => 8,  'difficulty_score' => 2],  // The Wolf Among Us
            ['review_id' => 549, 'story_score' => 7,  'gameplay_score' => 7,  'exploration_score' => 6,  'art_score' => 8,  'difficulty_score' => 5],  // Sherlock Holmes: Chapter One
            ['review_id' => 550, 'story_score' => 6,  'gameplay_score' => 7,  'exploration_score' => 4,  'art_score' => 9,  'difficulty_score' => 2],  // Botany Manor
            ['review_id' => 551, 'story_score' => 7,  'gameplay_score' => 8,  'exploration_score' => 8,  'art_score' => 9,  'difficulty_score' => 2],  // A Short Hike
            ['review_id' => 552, 'story_score' => 9,  'gameplay_score' => 4,  'exploration_score' => 3,  'art_score' => 9,  'difficulty_score' => 1],  // Edith Finch
            ['review_id' => 553, 'story_score' => 8,  'gameplay_score' => 6,  'exploration_score' => 4,  'art_score' => 8,  'difficulty_score' => 2],  // The Stanley Parable
            ['review_id' => 554, 'story_score' => 8,  'gameplay_score' => 8,  'exploration_score' => 6,  'art_score' => 9,  'difficulty_score' => 7],  // Inscryption
            ['review_id' => 555, 'story_score' => 8,  'gameplay_score' => 6,  'exploration_score' => 4,  'art_score' => 8,  'difficulty_score' => 3],  // Oxenfree
            ['review_id' => 556, 'story_score' => null, 'gameplay_score' => 2,  'exploration_score' => null, 'art_score' => 7,  'difficulty_score' => 8],  // Apex Legends
            ['review_id' => 557, 'story_score' => 6,  'gameplay_score' => 3,  'exploration_score' => 2,  'art_score' => 8,  'difficulty_score' => 9],  // DOOM Eternal
            ['review_id' => 558, 'story_score' => null, 'gameplay_score' => 2,  'exploration_score' => 3,  'art_score' => 6,  'difficulty_score' => 8],  // Rust


            // lauraJRPG
            ['review_id' => 559, 'story_score' => 10, 'gameplay_score' => 8,  'exploration_score' => 5,  'art_score' => 10, 'difficulty_score' => 6],  // Persona 5 Royal
            ['review_id' => 560, 'story_score' => 10, 'gameplay_score' => 8,  'exploration_score' => 6,  'art_score' => 9,  'difficulty_score' => 6],  // NieR:Automata
            ['review_id' => 561, 'story_score' => 10, 'gameplay_score' => 8,  'exploration_score' => 7,  'art_score' => 9,  'difficulty_score' => 5],  // Mass Effect: Legendary Edition
            ['review_id' => 562, 'story_score' => 9,  'gameplay_score' => 7,  'exploration_score' => 5,  'art_score' => 10, 'difficulty_score' => 6],  // Clair Obscur: Expedition 33
            ['review_id' => 563, 'story_score' => 9,  'gameplay_score' => 9,  'exploration_score' => 9,  'art_score' => 10, 'difficulty_score' => 6],  // Cyberpunk 2077
            ['review_id' => 564, 'story_score' => 10, 'gameplay_score' => 6,  'exploration_score' => 4,  'art_score' => 9,  'difficulty_score' => 3],  // Disco Elysium
            ['review_id' => 565, 'story_score' => 7,  'gameplay_score' => 8,  'exploration_score' => 9,  'art_score' => 8,  'difficulty_score' => 5],  // Starfield
            ['review_id' => 566, 'story_score' => 8,  'gameplay_score' => 8,  'exploration_score' => 7,  'art_score' => 8,  'difficulty_score' => 5],  // The Outer Worlds 2
            ['review_id' => 567, 'story_score' => 10, 'gameplay_score' => 8,  'exploration_score' => 9,  'art_score' => 9,  'difficulty_score' => 6],  // The Witcher 3: Wild Hunt
            ['review_id' => 568, 'story_score' => 7,  'gameplay_score' => 9,  'exploration_score' => 9,  'art_score' => 10, 'difficulty_score' => 6],  // Horizon Forbidden West
            ['review_id' => 569, 'story_score' => 8,  'gameplay_score' => 8,  'exploration_score' => 8,  'art_score' => 10, 'difficulty_score' => 5],  // Ghost of Tsushima
            ['review_id' => 570, 'story_score' => 8,  'gameplay_score' => 4,  'exploration_score' => 2,  'art_score' => 8,  'difficulty_score' => 2],  // Detroit: Become Human
            ['review_id' => 571, 'story_score' => 8,  'gameplay_score' => 7,  'exploration_score' => 6,  'art_score' => 10, 'difficulty_score' => 6],  // Alan Wake 2
            ['review_id' => 572, 'story_score' => 7,  'gameplay_score' => 9,  'exploration_score' => 4,  'art_score' => 9,  'difficulty_score' => 7],  // Hades
            ['review_id' => 573, 'story_score' => 6,  'gameplay_score' => 10, 'exploration_score' => 5,  'art_score' => 8,  'difficulty_score' => 6],  // Portal 2
            ['review_id' => 574, 'story_score' => null, 'gameplay_score' => 2,  'exploration_score' => null, 'art_score' => 7,  'difficulty_score' => 5],  // F1 24
            ['review_id' => 575, 'story_score' => null, 'gameplay_score' => 2,  'exploration_score' => 2,  'art_score' => 6,  'difficulty_score' => 8],  // Rust
            ['review_id' => 576, 'story_score' => null, 'gameplay_score' => 2,  'exploration_score' => null, 'art_score' => 6,  'difficulty_score' => 6],  // Madden NFL 24


            // vicspeed
            ['review_id' => 577, 'story_score' => null, 'gameplay_score' => 10, 'exploration_score' => 2,  'art_score' => 9,  'difficulty_score' => 9],  // Assetto Corsa Competizione
            ['review_id' => 578, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => 2,  'art_score' => 8,  'difficulty_score' => 7],  // F1 24
            ['review_id' => 579, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => 2,  'art_score' => 9,  'difficulty_score' => 6],  // Gran Turismo 7
            ['review_id' => 580, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => 8,  'art_score' => 10, 'difficulty_score' => 4],  // Forza Horizon 5
            ['review_id' => 581, 'story_score' => null, 'gameplay_score' => 7,  'exploration_score' => 6,  'art_score' => 8,  'difficulty_score' => 4],  // Need for Speed Unbound
            ['review_id' => 582, 'story_score' => null, 'gameplay_score' => 7,  'exploration_score' => null, 'art_score' => 7,  'difficulty_score' => 6],  // EA SPORTS FC 26
            ['review_id' => 583, 'story_score' => null, 'gameplay_score' => 7,  'exploration_score' => 5,  'art_score' => 8,  'difficulty_score' => 2],  // Euro Truck Simulator 2
            ['review_id' => 584, 'story_score' => null, 'gameplay_score' => 7,  'exploration_score' => 6,  'art_score' => 8,  'difficulty_score' => 5],  // Riders Republic
            ['review_id' => 585, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => null, 'art_score' => 8,  'difficulty_score' => 4],  // Mario Kart 8 Deluxe
            ['review_id' => 586, 'story_score' => null, 'gameplay_score' => 7,  'exploration_score' => 7,  'art_score' => 10, 'difficulty_score' => 6],  // Microsoft Flight Simulator 2020
            ['review_id' => 587, 'story_score' => null, 'gameplay_score' => 7,  'exploration_score' => 4,  'art_score' => 8,  'difficulty_score' => 5],  // Cities: Skylines
            ['review_id' => 588, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => null, 'art_score' => 7,  'difficulty_score' => 6],  // Halo Infinite
            ['review_id' => 589, 'story_score' => null, 'gameplay_score' => 7,  'exploration_score' => null, 'art_score' => 7,  'difficulty_score' => 7],  // Overwatch 2
            ['review_id' => 590, 'story_score' => null, 'gameplay_score' => 7,  'exploration_score' => null, 'art_score' => 7,  'difficulty_score' => 6],  // NBA 2K26
            ['review_id' => 591, 'story_score' => 7,  'gameplay_score' => 7,  'exploration_score' => 8,  'art_score' => 10, 'difficulty_score' => 5],  // Cyberpunk 2077
            ['review_id' => 592, 'story_score' => 7,  'gameplay_score' => 2,  'exploration_score' => 4,  'art_score' => 7,  'difficulty_score' => 1],  // Gone Home
            ['review_id' => 593, 'story_score' => 8,  'gameplay_score' => 3,  'exploration_score' => 4,  'art_score' => 9,  'difficulty_score' => 2],  // Spiritfarer
            ['review_id' => 594, 'story_score' => 8,  'gameplay_score' => 3,  'exploration_score' => 3,  'art_score' => 8,  'difficulty_score' => 1],  // Night in the Woods


            // loreSports
            ['review_id' => 595, 'story_score' => null, 'gameplay_score' => 9,  'exploration_score' => null, 'art_score' => 8,  'difficulty_score' => 7],  // EA SPORTS FC 26
            ['review_id' => 596, 'story_score' => null, 'gameplay_score' => 9,  'exploration_score' => null, 'art_score' => 8,  'difficulty_score' => 7],  // NBA 2K26
            ['review_id' => 597, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => null, 'art_score' => 7,  'difficulty_score' => 8],  // Madden NFL 24
            ['review_id' => 598, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => null, 'art_score' => 8,  'difficulty_score' => 6],  // WWE 2K25
            ['review_id' => 599, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => 8,  'art_score' => 10, 'difficulty_score' => 4],  // Forza Horizon 5
            ['review_id' => 600, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => 6,  'art_score' => 8,  'difficulty_score' => 6],  // Riders Republic
            ['review_id' => 601, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => 2,  'art_score' => 8,  'difficulty_score' => 6],  // F1 24
            ['review_id' => 602, 'story_score' => null, 'gameplay_score' => 7,  'exploration_score' => 2,  'art_score' => 9,  'difficulty_score' => 6],  // Gran Turismo 7
            ['review_id' => 603, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => null, 'art_score' => 8,  'difficulty_score' => 4],  // Mario Kart 8 Deluxe
            ['review_id' => 604, 'story_score' => null, 'gameplay_score' => 7,  'exploration_score' => null, 'art_score' => 7,  'difficulty_score' => 7],  // Overwatch 2
            ['review_id' => 605, 'story_score' => null, 'gameplay_score' => 7,  'exploration_score' => null, 'art_score' => 7,  'difficulty_score' => 8],  // Apex Legends
            ['review_id' => 606, 'story_score' => 8,  'gameplay_score' => 9,  'exploration_score' => 10, 'art_score' => 9,  'difficulty_score' => 5],  // Grand Theft Auto V
            ['review_id' => 607, 'story_score' => 9,  'gameplay_score' => 8,  'exploration_score' => 5,  'art_score' => 10, 'difficulty_score' => 6],  // The Last of Us Part I
            ['review_id' => 608, 'story_score' => 7,  'gameplay_score' => 8,  'exploration_score' => 8,  'art_score' => 9,  'difficulty_score' => 5],  // Hogwarts Legacy
            ['review_id' => 609, 'story_score' => null, 'gameplay_score' => 7,  'exploration_score' => 6,  'art_score' => 8,  'difficulty_score' => 4],  // Need for Speed Unbound
            ['review_id' => 610, 'story_score' => 7,  'gameplay_score' => 2,  'exploration_score' => 4,  'art_score' => 7,  'difficulty_score' => 1],  // The Stanley Parable
            ['review_id' => 611, 'story_score' => 6,  'gameplay_score' => 3,  'exploration_score' => 3,  'art_score' => 8,  'difficulty_score' => 6],  // Inscryption
            ['review_id' => 612, 'story_score' => 6,  'gameplay_score' => 2,  'exploration_score' => 2,  'art_score' => 9,  'difficulty_score' => 2],  // Botany Manor


            // sergioHard
            ['review_id' => 613, 'story_score' => 9,  'gameplay_score' => 10, 'exploration_score' => 10, 'art_score' => 10, 'difficulty_score' => 10], // Elden Ring
            ['review_id' => 614, 'story_score' => 8,  'gameplay_score' => 9,  'exploration_score' => 8,  'art_score' => 10, 'difficulty_score' => 9],  // Blasphemous
            ['review_id' => 615, 'story_score' => 8,  'gameplay_score' => 10, 'exploration_score' => 9,  'art_score' => 10, 'difficulty_score' => 9],  // Hollow Knight
            ['review_id' => 616, 'story_score' => 6,  'gameplay_score' => 10, 'exploration_score' => 5,  'art_score' => 8,  'difficulty_score' => 9],  // Dead Cells
            ['review_id' => 617, 'story_score' => 8,  'gameplay_score' => 8,  'exploration_score' => 4,  'art_score' => 8,  'difficulty_score' => 7],  // God of War I
            ['review_id' => 618, 'story_score' => 8,  'gameplay_score' => 8,  'exploration_score' => 8,  'art_score' => 10, 'difficulty_score' => 6],  // Ghost of Tsushima
            ['review_id' => 619, 'story_score' => 5,  'gameplay_score' => 9,  'exploration_score' => 2,  'art_score' => 10, 'difficulty_score' => 10], // Cuphead
            ['review_id' => 620, 'story_score' => 8,  'gameplay_score' => 9,  'exploration_score' => 4,  'art_score' => 9,  'difficulty_score' => 7],  // Katana ZERO
            ['review_id' => 621, 'story_score' => 8,  'gameplay_score' => 9,  'exploration_score' => 8,  'art_score' => 10, 'difficulty_score' => 6],  // Ori and the Will of the Wisps
            ['review_id' => 622, 'story_score' => 8,  'gameplay_score' => 9,  'exploration_score' => 4,  'art_score' => 9,  'difficulty_score' => 7],  // Hades
            ['review_id' => 623, 'story_score' => 7,  'gameplay_score' => 9,  'exploration_score' => 2,  'art_score' => 8,  'difficulty_score' => 9],  // Darkest Dungeon
            ['review_id' => 624, 'story_score' => 7,  'gameplay_score' => 9,  'exploration_score' => 5,  'art_score' => 9,  'difficulty_score' => 9],  // Returnal
            ['review_id' => 625, 'story_score' => 6,  'gameplay_score' => 10, 'exploration_score' => 3,  'art_score' => 8,  'difficulty_score' => 8],  // DOOM Eternal
            ['review_id' => 626, 'story_score' => 9,  'gameplay_score' => 6,  'exploration_score' => 9,  'art_score' => 9,  'difficulty_score' => 5],  // The Witcher 3: Wild Hunt
            ['review_id' => 627, 'story_score' => 7,  'gameplay_score' => 7,  'exploration_score' => 6,  'art_score' => 8,  'difficulty_score' => 6],  // Star Wars Jedi: Fallen Order
            ['review_id' => 628, 'story_score' => 6,  'gameplay_score' => 2,  'exploration_score' => 4,  'art_score' => 8,  'difficulty_score' => 1],  // Palia
            ['review_id' => 629, 'story_score' => 6,  'gameplay_score' => 2,  'exploration_score' => 3,  'art_score' => 9,  'difficulty_score' => 1],  // Cozy Grove
            ['review_id' => 630, 'story_score' => 5,  'gameplay_score' => 2,  'exploration_score' => 4,  'art_score' => 8,  'difficulty_score' => 1],  // Disney Dreamlight Valley


            // celiaCoop
            ['review_id' => 631, 'story_score' => 9,  'gameplay_score' => 9,  'exploration_score' => 6,  'art_score' => 9,  'difficulty_score' => 5],  // It Takes Two
            ['review_id' => 632, 'story_score' => 7,  'gameplay_score' => 8,  'exploration_score' => 5,  'art_score' => 8,  'difficulty_score' => 5],  // Split Fiction
            ['review_id' => 633, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => null, 'art_score' => 8,  'difficulty_score' => 4],  // Mario Kart 8 Deluxe
            ['review_id' => 634, 'story_score' => null, 'gameplay_score' => 7,  'exploration_score' => null, 'art_score' => 7,  'difficulty_score' => 7],  // Overwatch 2
            ['review_id' => 635, 'story_score' => 7,  'gameplay_score' => 8,  'exploration_score' => 8,  'art_score' => 8,  'difficulty_score' => 3],  // Stardew Valley
            ['review_id' => 636, 'story_score' => 7,  'gameplay_score' => 8,  'exploration_score' => 9,  'art_score' => 9,  'difficulty_score' => 5],  // Hogwarts Legacy
            ['review_id' => 637, 'story_score' => 6,  'gameplay_score' => 8,  'exploration_score' => 7,  'art_score' => 8,  'difficulty_score' => 5],  // Borderlands 3
            ['review_id' => 638, 'story_score' => 6,  'gameplay_score' => 7,  'exploration_score' => 8,  'art_score' => 9,  'difficulty_score' => 1],  // Animal Crossing: New Horizons
            ['review_id' => 639, 'story_score' => 7,  'gameplay_score' => 7,  'exploration_score' => 7,  'art_score' => 9,  'difficulty_score' => 1],  // A Short Hike
            ['review_id' => 640, 'story_score' => 7,  'gameplay_score' => 6,  'exploration_score' => 4,  'art_score' => 9,  'difficulty_score' => 1],  // Unpacking
            ['review_id' => 641, 'story_score' => 6,  'gameplay_score' => 6,  'exploration_score' => 7,  'art_score' => 8,  'difficulty_score' => 1],  // Palia
            ['review_id' => 642, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => 8,  'art_score' => 10, 'difficulty_score' => 4],  // Forza Horizon 5
            ['review_id' => 643, 'story_score' => null, 'gameplay_score' => 7,  'exploration_score' => null, 'art_score' => 7,  'difficulty_score' => 6],  // EA SPORTS FC 26
            ['review_id' => 644, 'story_score' => 6,  'gameplay_score' => 10, 'exploration_score' => 5,  'art_score' => 8,  'difficulty_score' => 6],  // Portal 2
            ['review_id' => 645, 'story_score' => 8,  'gameplay_score' => 9,  'exploration_score' => 7,  'art_score' => 9,  'difficulty_score' => 4],  // Dave the Diver
            ['review_id' => 646, 'story_score' => 8,  'gameplay_score' => 4,  'exploration_score' => 5,  'art_score' => 9,  'difficulty_score' => 3],  // SOMA
            ['review_id' => 647, 'story_score' => 7,  'gameplay_score' => 3,  'exploration_score' => 2,  'art_score' => 8,  'difficulty_score' => 7],  // Outlast
            ['review_id' => 648, 'story_score' => 7,  'gameplay_score' => 5,  'exploration_score' => 3,  'art_score' => 9,  'difficulty_score' => 7],  // Dead Space (2008)


            // ismaLoot
            ['review_id' => 649, 'story_score' => 6,  'gameplay_score' => 9,  'exploration_score' => 4,  'art_score' => 8,  'difficulty_score' => 6],  // Diablo IV
            ['review_id' => 650, 'story_score' => 6,  'gameplay_score' => 8,  'exploration_score' => 7,  'art_score' => 8,  'difficulty_score' => 5],  // Borderlands 3
            ['review_id' => 651, 'story_score' => 3,  'gameplay_score' => 9,  'exploration_score' => 3,  'art_score' => 7,  'difficulty_score' => 8],  // The Binding of Isaac: Rebirth
            ['review_id' => 652, 'story_score' => 7,  'gameplay_score' => 9,  'exploration_score' => 4,  'art_score' => 9,  'difficulty_score' => 7],  // Hades
            ['review_id' => 653, 'story_score' => 6,  'gameplay_score' => 10, 'exploration_score' => 3,  'art_score' => 8,  'difficulty_score' => 8],  // DOOM Eternal
            ['review_id' => 654, 'story_score' => 9,  'gameplay_score' => 9,  'exploration_score' => 9,  'art_score' => 10, 'difficulty_score' => 6],  // Cyberpunk 2077
            ['review_id' => 655, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => 2,  'art_score' => 7,  'difficulty_score' => 4],  // Vampire Survivors
            ['review_id' => 656, 'story_score' => null, 'gameplay_score' => 10, 'exploration_score' => 1,  'art_score' => 7,  'difficulty_score' => 8],  // Slay the Spire
            ['review_id' => 657, 'story_score' => null, 'gameplay_score' => 9,  'exploration_score' => 5,  'art_score' => 8,  'difficulty_score' => 8],  // Risk of Rain 2
            ['review_id' => 658, 'story_score' => 7,  'gameplay_score' => 9,  'exploration_score' => 4,  'art_score' => 9,  'difficulty_score' => 9],  // Returnal
            ['review_id' => 659, 'story_score' => 7,  'gameplay_score' => 7,  'exploration_score' => 6,  'art_score' => 8,  'difficulty_score' => 6],  // Deathloop
            ['review_id' => 660, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => null, 'art_score' => 7,  'difficulty_score' => 8],  // Apex Legends
            ['review_id' => 661, 'story_score' => 10, 'gameplay_score' => 7,  'exploration_score' => 9,  'art_score' => 9,  'difficulty_score' => 5],  // The Witcher 3: Wild Hunt
            ['review_id' => 662, 'story_score' => 7,  'gameplay_score' => 8,  'exploration_score' => 9,  'art_score' => 8,  'difficulty_score' => 5],  // Fallout 4
            ['review_id' => 663, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => null, 'art_score' => 7,  'difficulty_score' => 7],  // Halo Infinite
            ['review_id' => 664, 'story_score' => 7,  'gameplay_score' => 2,  'exploration_score' => 4,  'art_score' => 7,  'difficulty_score' => 1],  // Gone Home
            ['review_id' => 665, 'story_score' => 7,  'gameplay_score' => 3,  'exploration_score' => 5,  'art_score' => 9,  'difficulty_score' => 1],  // A Short Hike
            ['review_id' => 666, 'story_score' => 6,  'gameplay_score' => 2,  'exploration_score' => 3,  'art_score' => 7,  'difficulty_score' => 1],  // Virginia


            // marinaHorror
            ['review_id' => 667, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => 3,  'art_score' => 7,  'difficulty_score' => 7],  // Phasmophobia
            ['review_id' => 668, 'story_score' => 7,  'gameplay_score' => 6,  'exploration_score' => 3,  'art_score' => 9,  'difficulty_score' => 8],  // Outlast
            ['review_id' => 669, 'story_score' => 8,  'gameplay_score' => 8,  'exploration_score' => 6,  'art_score' => 9,  'difficulty_score' => 7],  // Resident Evil 2
            ['review_id' => 670, 'story_score' => 7,  'gameplay_score' => 7,  'exploration_score' => 5,  'art_score' => 8,  'difficulty_score' => 7],  // The Evil Within
            ['review_id' => 671, 'story_score' => 9,  'gameplay_score' => 7,  'exploration_score' => 6,  'art_score' => 10, 'difficulty_score' => 6],  // Alan Wake 2
            ['review_id' => 672, 'story_score' => 7,  'gameplay_score' => 4,  'exploration_score' => 2,  'art_score' => 8,  'difficulty_score' => 3],  // House of Ashes
            ['review_id' => 673, 'story_score' => 6,  'gameplay_score' => 4,  'exploration_score' => 2,  'art_score' => 8,  'difficulty_score' => 3],  // Little Hope
            ['review_id' => 674, 'story_score' => 8,  'gameplay_score' => 8,  'exploration_score' => 5,  'art_score' => 9,  'difficulty_score' => 8],  // Resident Evil 7: Biohazard
            ['review_id' => 675, 'story_score' => 8,  'gameplay_score' => 7,  'exploration_score' => 6,  'art_score' => 10, 'difficulty_score' => 9],  // Alien: Isolation
            ['review_id' => 676, 'story_score' => 10, 'gameplay_score' => 5,  'exploration_score' => 5,  'art_score' => 9,  'difficulty_score' => 5],  // Silent Hill 2
            ['review_id' => 677, 'story_score' => 9,  'gameplay_score' => 6,  'exploration_score' => 5,  'art_score' => 9,  'difficulty_score' => 4],  // SOMA
            ['review_id' => 678, 'story_score' => 8,  'gameplay_score' => 8,  'exploration_score' => 5,  'art_score' => 9,  'difficulty_score' => 8],  // Dead Space (2008)
            ['review_id' => 679, 'story_score' => 8,  'gameplay_score' => 9,  'exploration_score' => 6,  'art_score' => 9,  'difficulty_score' => 5],  // It Takes Two
            ['review_id' => 680, 'story_score' => 6,  'gameplay_score' => 8,  'exploration_score' => 8,  'art_score' => 8,  'difficulty_score' => 7],  // The Forest
            ['review_id' => 681, 'story_score' => 7,  'gameplay_score' => 8,  'exploration_score' => 8,  'art_score' => 8,  'difficulty_score' => 6],  // Dying Light: The Following - Enhanced Edition
            ['review_id' => 682, 'story_score' => 6,  'gameplay_score' => 2,  'exploration_score' => 4,  'art_score' => 8,  'difficulty_score' => 1],  // Stardew Valley
            ['review_id' => 683, 'story_score' => null, 'gameplay_score' => 3,  'exploration_score' => 3,  'art_score' => 8,  'difficulty_score' => 3],  // Planet Zoo
            ['review_id' => 684, 'story_score' => null, 'gameplay_score' => 2,  'exploration_score' => 2,  'art_score' => 9,  'difficulty_score' => 2],  // Dorfromantik


            // alvaroVR
            ['review_id' => 685, 'story_score' => 9,  'gameplay_score' => 10, 'exploration_score' => 7,  'art_score' => 10, 'difficulty_score' => 7],  // Half-Life: Alyx
            ['review_id' => 686, 'story_score' => null, 'gameplay_score' => 9,  'exploration_score' => null, 'art_score' => 8,  'difficulty_score' => 7],  // Beat Saber
            ['review_id' => 687, 'story_score' => 6,  'gameplay_score' => 9,  'exploration_score' => 6,  'art_score' => 8,  'difficulty_score' => 8],  // Boneworks
            ['review_id' => 688, 'story_score' => 8,  'gameplay_score' => 7,  'exploration_score' => 5,  'art_score' => 9,  'difficulty_score' => 4],  // Moss
            ['review_id' => 689, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => null, 'art_score' => 7,  'difficulty_score' => 7],  // Halo Infinite
            ['review_id' => 690, 'story_score' => 6,  'gameplay_score' => 10, 'exploration_score' => 3,  'art_score' => 8,  'difficulty_score' => 8],  // DOOM Eternal
            ['review_id' => 691, 'story_score' => 8,  'gameplay_score' => 7,  'exploration_score' => 8,  'art_score' => 9,  'difficulty_score' => 6],  // Metro Exodus
            ['review_id' => 692, 'story_score' => 7,  'gameplay_score' => 8,  'exploration_score' => 6,  'art_score' => 8,  'difficulty_score' => 6],  // Deathloop
            ['review_id' => 693, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => null, 'art_score' => 7,  'difficulty_score' => 9],  // Counter-Strike 2
            ['review_id' => 694, 'story_score' => null, 'gameplay_score' => 7,  'exploration_score' => null, 'art_score' => 7,  'difficulty_score' => 7],  // Overwatch 2
            ['review_id' => 695, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => null, 'art_score' => 7,  'difficulty_score' => 8],  // Apex Legends
            ['review_id' => 696, 'story_score' => null, 'gameplay_score' => 7,  'exploration_score' => 3,  'art_score' => 7,  'difficulty_score' => 7],  // Phasmophobia
            ['review_id' => 697, 'story_score' => 6,  'gameplay_score' => 10, 'exploration_score' => 5,  'art_score' => 8,  'difficulty_score' => 6],  // Portal 2
            ['review_id' => 698, 'story_score' => 8,  'gameplay_score' => 7,  'exploration_score' => 3,  'art_score' => 8,  'difficulty_score' => 6],  // Inscryption
            ['review_id' => 699, 'story_score' => null, 'gameplay_score' => 7,  'exploration_score' => 6,  'art_score' => 8,  'difficulty_score' => 4],  // Need for Speed Unbound
            ['review_id' => 700, 'story_score' => 6,  'gameplay_score' => 2,  'exploration_score' => 4,  'art_score' => 9,  'difficulty_score' => 1],  // Animal Crossing: New Horizons
            ['review_id' => 701, 'story_score' => 6,  'gameplay_score' => 2,  'exploration_score' => 4,  'art_score' => 8,  'difficulty_score' => 1],  // Ooblets
            ['review_id' => 702, 'story_score' => 6,  'gameplay_score' => 2,  'exploration_score' => 4,  'art_score' => 8,  'difficulty_score' => 1],  // Palia


            // hugoTycoon
            ['review_id' => 703, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => 4,  'art_score' => 9,  'difficulty_score' => 4],  // Planet Coaster
            ['review_id' => 704, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => 4,  'art_score' => 9,  'difficulty_score' => 5],  // Planet Zoo
            ['review_id' => 705, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => 4,  'art_score' => 8,  'difficulty_score' => 6],  // Cities: Skylines
            ['review_id' => 706, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => 4,  'art_score' => 9,  'difficulty_score' => 6],  // Anno 1800
            ['review_id' => 707, 'story_score' => 7,  'gameplay_score' => 8,  'exploration_score' => 8,  'art_score' => 8,  'difficulty_score' => 3],  // Stardew Valley
            ['review_id' => 708, 'story_score' => null, 'gameplay_score' => 7,  'exploration_score' => 2,  'art_score' => 9,  'difficulty_score' => 3],  // Dorfromantik
            ['review_id' => 709, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => 3,  'art_score' => 8,  'difficulty_score' => 7],  // Banished
            ['review_id' => 710, 'story_score' => null, 'gameplay_score' => 8,  'exploration_score' => 3,  'art_score' => 7,  'difficulty_score' => 8],  // RimWorld
            ['review_id' => 711, 'story_score' => null, 'gameplay_score' => 9,  'exploration_score' => 2,  'art_score' => 7,  'difficulty_score' => 9],  // Factorio
            ['review_id' => 712, 'story_score' => null, 'gameplay_score' => 9,  'exploration_score' => 5,  'art_score' => 8,  'difficulty_score' => 7],  // Satisfactory
            ['review_id' => 713, 'story_score' => null, 'gameplay_score' => 7,  'exploration_score' => 5,  'art_score' => 8,  'difficulty_score' => 3],  // Farming Simulator 22
            ['review_id' => 714, 'story_score' => null, 'gameplay_score' => 7,  'exploration_score' => 5,  'art_score' => 8,  'difficulty_score' => 2],  // Euro Truck Simulator 2
            ['review_id' => 715, 'story_score' => 6,  'gameplay_score' => 6,  'exploration_score' => 6,  'art_score' => 9,  'difficulty_score' => 2],  // Disney Dreamlight Valley
            ['review_id' => 716, 'story_score' => 6,  'gameplay_score' => 6,  'exploration_score' => 6,  'art_score' => 9,  'difficulty_score' => 2],  // Ooblets
            ['review_id' => 717, 'story_score' => 7,  'gameplay_score' => 7,  'exploration_score' => 7,  'art_score' => 9,  'difficulty_score' => 1],  // A Short Hike
            ['review_id' => 718, 'story_score' => null, 'gameplay_score' => 2,  'exploration_score' => null, 'art_score' => 8,  'difficulty_score' => 9],  // Tekken 8
            ['review_id' => 719, 'story_score' => null, 'gameplay_score' => 2,  'exploration_score' => null, 'art_score' => 7,  'difficulty_score' => 9],  // Counter-Strike 2
            ['review_id' => 720, 'story_score' => 6,  'gameplay_score' => 2,  'exploration_score' => 2,  'art_score' => 8,  'difficulty_score' => 8],  // Outlast
        ];

        foreach ($rows as $data) {
            ReviewAspect::updateOrCreate(
                ['review_id' => $data['review_id']],
                $data
            );
        }

        // foreach ($rows as $data) {
        //     $values = $data;
        //     unset($values['review_id']);

        //     ReviewAspect::updateOrCreate(
        //         ['review_id' => $data['review_id']],
        //         $values
        //     );
        // }

        $gameIds = Review::whereIn('id', array_column($rows, 'review_id'))
            ->pluck('game_id')
            ->unique();

        $service = app(AspectService::class);

        foreach ($gameIds as $gameId) {
            $service->recomputeGameAspects((int) $gameId);
        }
    }
}
