<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rating;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ratings = [
            // hagne
            ['user_id' => 1, 'game_id' => 51,  'score' => 10], // Cyberpunk 2077
            ['user_id' => 1, 'game_id' => 1,   'score' => 9],  // Horizon Forbidden West
            ['user_id' => 1, 'game_id' => 58,  'score' => 9],  // Ghost of Tsushima
            ['user_id' => 1, 'game_id' => 15,  'score' => 9],  // Firewatch
            ['user_id' => 1, 'game_id' => 4,   'score' => 9],  // Disco Elysium
            ['user_id' => 1, 'game_id' => 68,  'score' => 8],  // The Long Dark
            ['user_id' => 1, 'game_id' => 34,  'score' => 8],  // Dredge
            ['user_id' => 1, 'game_id' => 14,  'score' => 8],  // What Remains of Edith Finch
            ['user_id' => 1, 'game_id' => 23,  'score' => 8],  // Detroit: Become Human
            ['user_id' => 1, 'game_id' => 50,  'score' => 8],  // Hogwarts Legacy
            ['user_id' => 1, 'game_id' => 55,  'score' => 7],  // Red Dead Redemption 2
            ['user_id' => 1, 'game_id' => 37,  'score' => 7],  // The Last of Us Part I
            ['user_id' => 1, 'game_id' => 30,  'score' => 7],  // Stray
            ['user_id' => 1, 'game_id' => 32,  'score' => 7],  // Spiritfarer
            ['user_id' => 1, 'game_id' => 36,  'score' => 7],  // A Plague Tale: Innocence
            ['user_id' => 1, 'game_id' => 29,  'score' => 4],  // Death Stranding
            ['user_id' => 1, 'game_id' => 85,  'score' => 2],  // Elden Ring
            ['user_id' => 1, 'game_id' => 137, 'score' => 1],  // Rust

            // RNG_12
            ['user_id' => 2, 'game_id' => 204, 'score' => 10], // Counter-Strike 2
            ['user_id' => 2, 'game_id' => 206, 'score' => 9],  // Apex Legends
            ['user_id' => 2, 'game_id' => 205, 'score' => 9],  // Overwatch 2
            ['user_id' => 2, 'game_id' => 181, 'score' => 9],  // Street Fighter 6
            ['user_id' => 2, 'game_id' => 190, 'score' => 9],  // Assetto Corsa Competizione
            ['user_id' => 2, 'game_id' => 191, 'score' => 9],  // EA SPORTS FC 26
            ['user_id' => 2, 'game_id' => 182, 'score' => 8],  // Tekken 8
            ['user_id' => 2, 'game_id' => 188, 'score' => 8],  // F1 24
            ['user_id' => 2, 'game_id' => 200, 'score' => 8],  // Call of Duty: Warzone
            ['user_id' => 2, 'game_id' => 187, 'score' => 7],  // Gran Turismo 7
            ['user_id' => 2, 'game_id' => 203, 'score' => 7],  // Halo Infinite
            ['user_id' => 2, 'game_id' => 198, 'score' => 7],  // DOOM Eternal
            ['user_id' => 2, 'game_id' => 194, 'score' => 7],  // Madden NFL 24
            ['user_id' => 2, 'game_id' => 189, 'score' => 6],  // Need for Speed Unbound
            ['user_id' => 2, 'game_id' => 186, 'score' => 6],  // Forza Horizon 5
            ['user_id' => 2, 'game_id' => 16,  'score' => 2],  // Gone Home
            ['user_id' => 2, 'game_id' => 31,  'score' => 1],  // Unpacking
            ['user_id' => 2, 'game_id' => 102, 'score' => 2],  // A Short Hike

            // shadowex
            ['user_id' => 3, 'game_id' => 175, 'score' => 10], // Silent Hill 2
            ['user_id' => 3, 'game_id' => 171, 'score' => 9],  // Resident Evil 7: Biohazard
            ['user_id' => 3, 'game_id' => 173, 'score' => 9],  // Alien: Isolation
            ['user_id' => 3, 'game_id' => 177, 'score' => 9],  // SOMA
            ['user_id' => 3, 'game_id' => 178, 'score' => 9],  // Dead Space (2008)
            ['user_id' => 3, 'game_id' => 83,  'score' => 9],  // Alan Wake 2
            ['user_id' => 3, 'game_id' => 172, 'score' => 8],  // Resident Evil 2
            ['user_id' => 3, 'game_id' => 179, 'score' => 8],  // The Evil Within
            ['user_id' => 3, 'game_id' => 174, 'score' => 8],  // Outlast
            ['user_id' => 3, 'game_id' => 176, 'score' => 7],  // Amnesia: The Dark Descent
            ['user_id' => 3, 'game_id' => 25,  'score' => 7],  // The Dark Pictures Anthology: House of Ashes
            ['user_id' => 3, 'game_id' => 26,  'score' => 7],  // The Dark Pictures Anthology: Little Hope
            ['user_id' => 3, 'game_id' => 180, 'score' => 7],  // Phasmophobia
            ['user_id' => 3, 'game_id' => 10,  'score' => 6],  // Call of Cthulhu
            ['user_id' => 3, 'game_id' => 73,  'score' => 7],  // Alan Wake
            ['user_id' => 3, 'game_id' => 107, 'score' => 2],  // Ooblets
            ['user_id' => 3, 'game_id' => 95,  'score' => 2],  // Mario Kart 8 Deluxe
            ['user_id' => 3, 'game_id' => 97,  'score' => 1],  // Splatoon 3

            // retroAlex
            ['user_id' => 4, 'game_id' => 77,  'score' => 10], // Portal 2
            ['user_id' => 4, 'game_id' => 13,  'score' => 10], // Return Of The Obra Dinn
            ['user_id' => 4, 'game_id' => 78,  'score' => 9],  // The Stanley Parable
            ['user_id' => 4, 'game_id' => 79,  'score' => 9],  // Inscryption
            ['user_id' => 4, 'game_id' => 7,   'score' => 9],  // Thimbleweed Park
            ['user_id' => 4, 'game_id' => 4,   'score' => 9],  // Disco Elysium
            ['user_id' => 4, 'game_id' => 6,   'score' => 8],  // Return to Monkey Island
            ['user_id' => 4, 'game_id' => 8,   'score' => 7],  // Deponia
            ['user_id' => 4, 'game_id' => 28,  'score' => 7],  // Botany Manor
            ['user_id' => 4, 'game_id' => 27,  'score' => 7],  // Call of the Sea
            ['user_id' => 4, 'game_id' => 14,  'score' => 7],  // What Remains of Edith Finch
            ['user_id' => 4, 'game_id' => 19,  'score' => 7],  // Oxenfree
            ['user_id' => 4, 'game_id' => 134, 'score' => 6],  // Katana ZERO
            ['user_id' => 4, 'game_id' => 102, 'score' => 6],  // A Short Hike
            ['user_id' => 4, 'game_id' => 81,  'score' => 6],  // Split Fiction
            ['user_id' => 4, 'game_id' => 194, 'score' => 2],  // Madden NFL 24
            ['user_id' => 4, 'game_id' => 195, 'score' => 2],  // WWE 2K25
            ['user_id' => 4, 'game_id' => 167, 'score' => 2],  // Farming Simulator 22

            // davidRios
            ['user_id' => 6, 'game_id' => 37,  'score' => 10], // The Last of Us Part I
            ['user_id' => 6, 'game_id' => 43,  'score' => 9],  // God of War I
            ['user_id' => 6, 'game_id' => 55,  'score' => 9],  // Red Dead Redemption 2
            ['user_id' => 6, 'game_id' => 2,   'score' => 9],  // The Last of Us Part II
            ['user_id' => 6, 'game_id' => 38,  'score' => 9],  // Uncharted 4: A Thief's End
            ['user_id' => 6, 'game_id' => 191, 'score' => 8],  // EA SPORTS FC 26
            ['user_id' => 6, 'game_id' => 192, 'score' => 8],  // NBA 2K26
            ['user_id' => 6, 'game_id' => 58,  'score' => 8],  // Ghost of Tsushima
            ['user_id' => 6, 'game_id' => 53,  'score' => 8],  // Horizon Zero Dawn
            ['user_id' => 6, 'game_id' => 82,  'score' => 8],  // Grand Theft Auto V
            ['user_id' => 6, 'game_id' => 83,  'score' => 7],  // Alan Wake 2
            ['user_id' => 6, 'game_id' => 42,  'score' => 7],  // Mafia: Definitive Edition
            ['user_id' => 6, 'game_id' => 61,  'score' => 7],  // Star Wars Jedi: Fallen Order
            ['user_id' => 6, 'game_id' => 62,  'score' => 7],  // Star Wars Jedi: Survivor
            ['user_id' => 6, 'game_id' => 29,  'score' => 6],  // Death Stranding
            ['user_id' => 6, 'game_id' => 120, 'score' => 2],  // Crypt of the NecroDancer
            ['user_id' => 6, 'game_id' => 121, 'score' => 2],  // FTL: Faster Than Light
            ['user_id' => 6, 'game_id' => 132, 'score' => 3],  // Axiom Verge

            // noaDev
            ['user_id' => 7, 'game_id' => 68,  'score' => 10], // The Long Dark
            ['user_id' => 7, 'game_id' => 67,  'score' => 10], // Subnautica
            ['user_id' => 7, 'game_id' => 135, 'score' => 9],  // Valheim
            ['user_id' => 7, 'game_id' => 140, 'score' => 9],  // Project Zomboid
            ['user_id' => 7, 'game_id' => 145, 'score' => 8],  // Raft
            ['user_id' => 7, 'game_id' => 146, 'score' => 8],  // Grounded
            ['user_id' => 7, 'game_id' => 147, 'score' => 8],  // The Forest
            ['user_id' => 7, 'game_id' => 139, 'score' => 7],  // 7 Days to Die
            ['user_id' => 7, 'game_id' => 141, 'score' => 7],  // Don't Starve Together
            ['user_id' => 7, 'game_id' => 142, 'score' => 7],  // Terraria
            ['user_id' => 7, 'game_id' => 143, 'score' => 7],  // Minecraft
            ['user_id' => 7, 'game_id' => 70,  'score' => 7],  // Dying Light: The Following - Enhanced Edition
            ['user_id' => 7, 'game_id' => 69,  'score' => 6],  // Stranded Deep
            ['user_id' => 7, 'game_id' => 136, 'score' => 6],  // ARK: Survival Evolved
            ['user_id' => 7, 'game_id' => 137, 'score' => 6],  // Rust
            ['user_id' => 7, 'game_id' => 21,  'score' => 2],  // Heavy Rain
            ['user_id' => 7, 'game_id' => 22,  'score' => 2],  // Beyond: Two Souls
            ['user_id' => 7, 'game_id' => 17,  'score' => 1],  // Virginia

            // fran_juego
            ['user_id' => 8, 'game_id' => 186, 'score' => 10], // Forza Horizon 5
            ['user_id' => 8, 'game_id' => 189, 'score' => 9],  // Need for Speed Unbound
            ['user_id' => 8, 'game_id' => 187, 'score' => 9],  // Gran Turismo 7
            ['user_id' => 8, 'game_id' => 95,  'score' => 9],  // Mario Kart 8 Deluxe
            ['user_id' => 8, 'game_id' => 50,  'score' => 8],  // Hogwarts Legacy
            ['user_id' => 8, 'game_id' => 207, 'score' => 8],  // Borderlands 3
            ['user_id' => 8, 'game_id' => 112, 'score' => 8],  // Hades
            ['user_id' => 8, 'game_id' => 190, 'score' => 7],  // Assetto Corsa Competizione
            ['user_id' => 8, 'game_id' => 188, 'score' => 7],  // F1 24
            ['user_id' => 8, 'game_id' => 80,  'score' => 7],  // It Takes Two
            ['user_id' => 8, 'game_id' => 81,  'score' => 7],  // Split Fiction
            ['user_id' => 8, 'game_id' => 51,  'score' => 7],  // Cyberpunk 2077
            ['user_id' => 8, 'game_id' => 196, 'score' => 6],  // Riders Republic
            ['user_id' => 8, 'game_id' => 191, 'score' => 6],  // EA SPORTS FC 26
            ['user_id' => 8, 'game_id' => 205, 'score' => 6],  // Overwatch 2
            ['user_id' => 8, 'game_id' => 16,  'score' => 2],  // Gone Home
            ['user_id' => 8, 'game_id' => 110, 'score' => 2],  // Littlewood
            ['user_id' => 8, 'game_id' => 17,  'score' => 2],  // Virginia

            // catPlayer
            ['user_id' => 9, 'game_id' => 30,  'score' => 10], // Stray
            ['user_id' => 9, 'game_id' => 32,  'score' => 9],  // Spiritfarer
            ['user_id' => 9, 'game_id' => 14,  'score' => 9],  // What Remains of Edith Finch
            ['user_id' => 9, 'game_id' => 18,  'score' => 9],  // Night in the Woods
            ['user_id' => 9, 'game_id' => 15,  'score' => 9],  // Firewatch
            ['user_id' => 9, 'game_id' => 19,  'score' => 8],  // Oxenfree
            ['user_id' => 9, 'game_id' => 16,  'score' => 8],  // Gone Home
            ['user_id' => 9, 'game_id' => 45,  'score' => 8],  // Brothers: A Tale of Two Sons
            ['user_id' => 9, 'game_id' => 24,  'score' => 7],  // The Wolf Among Us
            ['user_id' => 9, 'game_id' => 102, 'score' => 7],  // A Short Hike
            ['user_id' => 9, 'game_id' => 31,  'score' => 7],  // Unpacking
            ['user_id' => 9, 'game_id' => 33,  'score' => 7],  // Dave the Diver
            ['user_id' => 9, 'game_id' => 34,  'score' => 7],  // Dredge
            ['user_id' => 9, 'game_id' => 23,  'score' => 7],  // Detroit: Become Human
            ['user_id' => 9, 'game_id' => 27,  'score' => 6],  // Call of the Sea
            ['user_id' => 9, 'game_id' => 137, 'score' => 2],  // Rust
            ['user_id' => 9, 'game_id' => 136, 'score' => 2],  // ARK: Survival Evolved
            ['user_id' => 9, 'game_id' => 139, 'score' => 2],  // 7 Days to Die

            // pixelNacho
            ['user_id' => 10, 'game_id' => 125, 'score' => 10], // Hollow Knight
            ['user_id' => 10, 'game_id' => 126, 'score' => 9],  // Celeste
            ['user_id' => 10, 'game_id' => 127, 'score' => 9],  // Dead Cells
            ['user_id' => 10, 'game_id' => 128, 'score' => 9],  // Cuphead
            ['user_id' => 10, 'game_id' => 63,  'score' => 9],  // Ori and the Will of the Wisps
            ['user_id' => 10, 'game_id' => 134, 'score' => 8],  // Katana ZERO
            ['user_id' => 10, 'game_id' => 131, 'score' => 8],  // Blasphemous
            ['user_id' => 10, 'game_id' => 98,  'score' => 8],  // Metroid Dread
            ['user_id' => 10, 'game_id' => 132, 'score' => 7],  // Axiom Verge
            ['user_id' => 10, 'game_id' => 133, 'score' => 7],  // Guacamelee! 2
            ['user_id' => 10, 'game_id' => 118, 'score' => 7],  // Spelunky 2
            ['user_id' => 10, 'game_id' => 112, 'score' => 7],  // Hades
            ['user_id' => 10, 'game_id' => 113, 'score' => 7],  // The Binding of Isaac: Rebirth
            ['user_id' => 10, 'game_id' => 124, 'score' => 6],  // Returnal
            ['user_id' => 10, 'game_id' => 77,  'score' => 6],  // Portal 2
            ['user_id' => 10, 'game_id' => 155, 'score' => 2],  // Crusader Kings III
            ['user_id' => 10, 'game_id' => 168, 'score' => 2],  // Microsoft Flight Simulator 2020
            ['user_id' => 10, 'game_id' => 170, 'score' => 3],  // Anno 1800

            // jnavarro
            ['user_id' => 11, 'game_id' => 152, 'score' => 10], // Sid Meier’s Civilization VI
            ['user_id' => 11, 'game_id' => 155, 'score' => 9],  // Crusader Kings III
            ['user_id' => 11, 'game_id' => 156, 'score' => 9],  // Stellaris
            ['user_id' => 11, 'game_id' => 151, 'score' => 9],  // Total War: WARHAMMER III
            ['user_id' => 11, 'game_id' => 153, 'score' => 9],  // XCOM 2
            ['user_id' => 11, 'game_id' => 154, 'score' => 8],  // Into the Breach
            ['user_id' => 11, 'game_id' => 157, 'score' => 8],  // Frostpunk
            ['user_id' => 11, 'game_id' => 161, 'score' => 7],  // RimWorld
            ['user_id' => 11, 'game_id' => 170, 'score' => 7],  // Anno 1800
            ['user_id' => 11, 'game_id' => 158, 'score' => 7],  // Cities: Skylines
            ['user_id' => 11, 'game_id' => 148, 'score' => 7],  // Age of Empires IV
            ['user_id' => 11, 'game_id' => 149, 'score' => 7],  // StarCraft II
            ['user_id' => 11, 'game_id' => 150, 'score' => 6],  // Company of Heroes 3
            ['user_id' => 11, 'game_id' => 159, 'score' => 6],  // Factorio
            ['user_id' => 11, 'game_id' => 160, 'score' => 6],  // Satisfactory
            ['user_id' => 11, 'game_id' => 108, 'score' => 2],  // Coffee Talk
            ['user_id' => 11, 'game_id' => 31,  'score' => 2],  // Unpacking
            ['user_id' => 11, 'game_id' => 19,  'score' => 3],  // Oxenfree

            // lucia_m
            ['user_id' => 12, 'game_id' => 10,  'score' => 9],  // Call of Cthulhu
            ['user_id' => 12, 'game_id' => 11,  'score' => 9],  // Sherlock Holmes: Chapter One
            ['user_id' => 12, 'game_id' => 13,  'score' => 9],  // Return Of The Obra Dinn
            ['user_id' => 12, 'game_id' => 12,  'score' => 8],  // Sherlock Holmes The Awakened
            ['user_id' => 12, 'game_id' => 73,  'score' => 8],  // Alan Wake
            ['user_id' => 12, 'game_id' => 24,  'score' => 8],  // The Wolf Among Us
            ['user_id' => 12, 'game_id' => 4,   'score' => 7],  // Disco Elysium
            ['user_id' => 12, 'game_id' => 177, 'score' => 7],  // SOMA
            ['user_id' => 12, 'game_id' => 175, 'score' => 6],  // Silent Hill 2
            ['user_id' => 12, 'game_id' => 77,  'score' => 6],  // Portal 2
            ['user_id' => 12, 'game_id' => 7,   'score' => 6],  // Thimbleweed Park
            ['user_id' => 12, 'game_id' => 6,   'score' => 6],  // Return to Monkey Island
            ['user_id' => 12, 'game_id' => 14,  'score' => 6],  // What Remains of Edith Finch
            ['user_id' => 12, 'game_id' => 23,  'score' => 6],  // Detroit: Become Human
            ['user_id' => 12, 'game_id' => 21,  'score' => 6],  // Heavy Rain
            ['user_id' => 12, 'game_id' => 200, 'score' => 2],  // Call of Duty: Warzone
            ['user_id' => 12, 'game_id' => 204, 'score' => 2],  // Counter-Strike 2
            ['user_id' => 12, 'game_id' => 183, 'score' => 2],  // Mortal Kombat 1

            // pabloc
            ['user_id' => 13, 'game_id' => 84,  'score' => 10], // The Witcher 3: Wild Hunt
            ['user_id' => 13, 'game_id' => 89,  'score' => 9],  // The Elder Scrolls V: Skyrim
            ['user_id' => 13, 'game_id' => 88,  'score' => 9],  // Fallout: New Vegas
            ['user_id' => 13, 'game_id' => 5,   'score' => 9],  // NieR:Automata
            ['user_id' => 13, 'game_id' => 90,  'score' => 8],  // Kingdom Come: Deliverance
            ['user_id' => 13, 'game_id' => 51,  'score' => 8],  // Cyberpunk 2077
            ['user_id' => 13, 'game_id' => 86,  'score' => 8],  // Mass Effect: Legendary Edition
            ['user_id' => 13, 'game_id' => 58,  'score' => 7],  // Ghost of Tsushima
            ['user_id' => 13, 'game_id' => 53,  'score' => 7],  // Horizon Zero Dawn
            ['user_id' => 13, 'game_id' => 55,  'score' => 7],  // Red Dead Redemption 2
            ['user_id' => 13, 'game_id' => 52,  'score' => 7],  // Starfield
            ['user_id' => 13, 'game_id' => 66,  'score' => 7],  // The Outer Worlds 2
            ['user_id' => 13, 'game_id' => 91,  'score' => 7],  // Diablo IV
            ['user_id' => 13, 'game_id' => 192, 'score' => 7],  // NBA 2K26
            ['user_id' => 13, 'game_id' => 85,  'score' => 6],  // Elden Ring
            ['user_id' => 13, 'game_id' => 103, 'score' => 2],  // Dorfromantik
            ['user_id' => 13, 'game_id' => 104, 'score' => 2],  // Cozy Grove
            ['user_id' => 13, 'game_id' => 110, 'score' => 2],  // Littlewood

            // elenaRz
            ['user_id' => 14, 'game_id' => 28,  'score' => 10], // Botany Manor
            ['user_id' => 14, 'game_id' => 27,  'score' => 9],  // Call of the Sea
            ['user_id' => 14, 'game_id' => 77,  'score' => 9],  // Portal 2
            ['user_id' => 14, 'game_id' => 13,  'score' => 9],  // Return Of The Obra Dinn
            ['user_id' => 14, 'game_id' => 78,  'score' => 8],  // The Stanley Parable
            ['user_id' => 14, 'game_id' => 14,  'score' => 8],  // What Remains of Edith Finch
            ['user_id' => 14, 'game_id' => 79,  'score' => 8],  // Inscryption
            ['user_id' => 14, 'game_id' => 24,  'score' => 7],  // The Wolf Among Us
            ['user_id' => 14, 'game_id' => 45,  'score' => 7],  // Brothers: A Tale of Two Sons
            ['user_id' => 14, 'game_id' => 30,  'score' => 7],  // Stray
            ['user_id' => 14, 'game_id' => 31,  'score' => 7],  // Unpacking
            ['user_id' => 14, 'game_id' => 4,   'score' => 7],  // Disco Elysium
            ['user_id' => 14, 'game_id' => 102, 'score' => 7],  // A Short Hike
            ['user_id' => 14, 'game_id' => 19,  'score' => 6],  // Oxenfree
            ['user_id' => 14, 'game_id' => 7,   'score' => 6],  // Thimbleweed Park
            ['user_id' => 14, 'game_id' => 91,  'score' => 2],  // Diablo IV
            ['user_id' => 14, 'game_id' => 202, 'score' => 2],  // Battlefield 2042
            ['user_id' => 14, 'game_id' => 137, 'score' => 1],  // Rust

            // andres_m
            ['user_id' => 15, 'game_id' => 159, 'score' => 10], // Factorio
            ['user_id' => 15, 'game_id' => 160, 'score' => 9],  // Satisfactory
            ['user_id' => 15, 'game_id' => 161, 'score' => 9],  // RimWorld
            ['user_id' => 15, 'game_id' => 158, 'score' => 8],  // Cities: Skylines
            ['user_id' => 15, 'game_id' => 170, 'score' => 8],  // Anno 1800
            ['user_id' => 15, 'game_id' => 165, 'score' => 8],  // Planet Zoo
            ['user_id' => 15, 'game_id' => 164, 'score' => 7],  // Planet Coaster
            ['user_id' => 15, 'game_id' => 162, 'score' => 7],  // Dwarf Fortress
            ['user_id' => 15, 'game_id' => 163, 'score' => 7],  // Banished
            ['user_id' => 15, 'game_id' => 157, 'score' => 7],  // Frostpunk
            ['user_id' => 15, 'game_id' => 152, 'score' => 7],  // Sid Meier’s Civilization VI
            ['user_id' => 15, 'game_id' => 169, 'score' => 6],  // Euro Truck Simulator 2
            ['user_id' => 15, 'game_id' => 167, 'score' => 6],  // Farming Simulator 22
            ['user_id' => 15, 'game_id' => 156, 'score' => 6],  // Stellaris
            ['user_id' => 15, 'game_id' => 140, 'score' => 6],  // Project Zomboid
            ['user_id' => 15, 'game_id' => 21,  'score' => 2],  // Heavy Rain
            ['user_id' => 15, 'game_id' => 24,  'score' => 3],  // The Wolf Among Us
            ['user_id' => 15, 'game_id' => 22,  'score' => 2],  // Beyond: Two Souls

            // irenec
            ['user_id' => 16, 'game_id' => 32,  'score' => 10], // Spiritfarer
            ['user_id' => 16, 'game_id' => 16,  'score' => 9],  // Gone Home
            ['user_id' => 16, 'game_id' => 14,  'score' => 9],  // What Remains of Edith Finch
            ['user_id' => 16, 'game_id' => 15,  'score' => 9],  // Firewatch
            ['user_id' => 16, 'game_id' => 18,  'score' => 8],  // Night in the Woods
            ['user_id' => 16, 'game_id' => 45,  'score' => 8],  // Brothers: A Tale of Two Sons
            ['user_id' => 16, 'game_id' => 23,  'score' => 8],  // Detroit: Become Human
            ['user_id' => 16, 'game_id' => 21,  'score' => 7],  // Heavy Rain
            ['user_id' => 16, 'game_id' => 30,  'score' => 7],  // Stray
            ['user_id' => 16, 'game_id' => 102, 'score' => 7],  // A Short Hike
            ['user_id' => 16, 'game_id' => 19,  'score' => 7],  // Oxenfree
            ['user_id' => 16, 'game_id' => 37,  'score' => 7],  // The Last of Us Part I
            ['user_id' => 16, 'game_id' => 31,  'score' => 6],  // Unpacking
            ['user_id' => 16, 'game_id' => 4,   'score' => 6],  // Disco Elysium
            ['user_id' => 16, 'game_id' => 22,  'score' => 6],  // Beyond: Two Souls
            ['user_id' => 16, 'game_id' => 198, 'score' => 2],  // DOOM Eternal
            ['user_id' => 16, 'game_id' => 182, 'score' => 2],  // Tekken 8
            ['user_id' => 16, 'game_id' => 206, 'score' => 2],  // Apex Legends


            // oscarDG
            ['user_id' => 17, 'game_id' => 198, 'score' => 10], // DOOM Eternal
            ['user_id' => 17, 'game_id' => 203, 'score' => 9],  // Halo Infinite
            ['user_id' => 17, 'game_id' => 209, 'score' => 9],  // Half-Life: Alyx
            ['user_id' => 17, 'game_id' => 208, 'score' => 8],  // Metro Exodus
            ['user_id' => 17, 'game_id' => 189, 'score' => 8],  // Need for Speed Unbound
            ['user_id' => 17, 'game_id' => 202, 'score' => 8],  // Battlefield 2042
            ['user_id' => 17, 'game_id' => 65,  'score' => 8],  // Deathloop
            ['user_id' => 17, 'game_id' => 207, 'score' => 8],  // Borderlands 3
            ['user_id' => 17, 'game_id' => 205, 'score' => 7],  // Overwatch 2
            ['user_id' => 17, 'game_id' => 206, 'score' => 7],  // Apex Legends
            ['user_id' => 17, 'game_id' => 200, 'score' => 7],  // Call of Duty: Warzone
            ['user_id' => 17, 'game_id' => 51,  'score' => 7],  // Cyberpunk 2077
            ['user_id' => 17, 'game_id' => 70,  'score' => 7],  // Dying Light: The Following - Enhanced Edition
            ['user_id' => 17, 'game_id' => 182, 'score' => 6],  // Tekken 8
            ['user_id' => 17, 'game_id' => 204, 'score' => 6],  // Counter-Strike 2
            ['user_id' => 17, 'game_id' => 104, 'score' => 2],  // Cozy Grove
            ['user_id' => 17, 'game_id' => 108, 'score' => 2],  // Coffee Talk
            ['user_id' => 17, 'game_id' => 31,  'score' => 2],  // Unpacking

            // hectors
            ['user_id' => 19, 'game_id' => 138, 'score' => 10], // DayZ
            ['user_id' => 19, 'game_id' => 137, 'score' => 9],  // Rust
            ['user_id' => 19, 'game_id' => 136, 'score' => 8],  // ARK: Survival Evolved
            ['user_id' => 19, 'game_id' => 139, 'score' => 8],  // 7 Days to Die
            ['user_id' => 19, 'game_id' => 147, 'score' => 8],  // The Forest
            ['user_id' => 19, 'game_id' => 70,  'score' => 8],  // Dying Light: The Following - Enhanced Edition
            ['user_id' => 19, 'game_id' => 140, 'score' => 7],  // Project Zomboid
            ['user_id' => 19, 'game_id' => 135, 'score' => 7],  // Valheim
            ['user_id' => 19, 'game_id' => 142, 'score' => 6],  // Terraria
            ['user_id' => 19, 'game_id' => 143, 'score' => 6],  // Minecraft
            ['user_id' => 19, 'game_id' => 67,  'score' => 6],  // Subnautica
            ['user_id' => 19, 'game_id' => 68,  'score' => 6],  // The Long Dark
            ['user_id' => 19, 'game_id' => 180, 'score' => 6],  // Phasmophobia
            ['user_id' => 19, 'game_id' => 146, 'score' => 5],  // Grounded
            ['user_id' => 19, 'game_id' => 145, 'score' => 5],  // Raft
            ['user_id' => 19, 'game_id' => 23,  'score' => 2],  // Detroit: Become Human
            ['user_id' => 19, 'game_id' => 17,  'score' => 1],  // Virginia
            ['user_id' => 19, 'game_id' => 31,  'score' => 1],  // Unpacking

            // marta_k
            ['user_id' => 5, 'game_id' => 3,   'score' => 10], // Stardew Valley
            ['user_id' => 5, 'game_id' => 104, 'score' => 9],  // Cozy Grove
            ['user_id' => 5, 'game_id' => 105, 'score' => 9],  // Disney Dreamlight Valley
            ['user_id' => 5, 'game_id' => 103, 'score' => 8],  // Dorfromantik
            ['user_id' => 5, 'game_id' => 108, 'score' => 8],  // Coffee Talk
            ['user_id' => 5, 'game_id' => 109, 'score' => 8],  // Potion Permit
            ['user_id' => 5, 'game_id' => 28,  'score' => 8],  // Botany Manor
            ['user_id' => 5, 'game_id' => 107, 'score' => 8],  // Ooblets
            ['user_id' => 5, 'game_id' => 102, 'score' => 8],  // A Short Hike
            ['user_id' => 5, 'game_id' => 106, 'score' => 7],  // Palia
            ['user_id' => 5, 'game_id' => 94,  'score' => 7],  // Animal Crossing: New Horizons
            ['user_id' => 5, 'game_id' => 165, 'score' => 7],  // Planet Zoo
            ['user_id' => 5, 'game_id' => 31,  'score' => 7],  // Unpacking
            ['user_id' => 5, 'game_id' => 33,  'score' => 7],  // Dave the Diver
            ['user_id' => 5, 'game_id' => 80,  'score' => 6],  // It Takes Two
            ['user_id' => 5, 'game_id' => 198, 'score' => 2],  // DOOM Eternal
            ['user_id' => 5, 'game_id' => 174, 'score' => 1],  // Outlast
            ['user_id' => 5, 'game_id' => 138, 'score' => 1],  // DayZ

            // patriV
            ['user_id' => 18, 'game_id' => 94,  'score' => 10], // Animal Crossing: New Horizons
            ['user_id' => 18, 'game_id' => 106, 'score' => 9],  // Palia
            ['user_id' => 18, 'game_id' => 102, 'score' => 9],  // A Short Hike
            ['user_id' => 18, 'game_id' => 107, 'score' => 8],  // Ooblets
            ['user_id' => 18, 'game_id' => 105, 'score' => 8],  // Disney Dreamlight Valley
            ['user_id' => 18, 'game_id' => 95,  'score' => 8],  // Mario Kart 8 Deluxe
            ['user_id' => 18, 'game_id' => 3,   'score' => 8],  // Stardew Valley
            ['user_id' => 18, 'game_id' => 104, 'score' => 7],  // Cozy Grove
            ['user_id' => 18, 'game_id' => 80,  'score' => 7],  // It Takes Two
            ['user_id' => 18, 'game_id' => 30,  'score' => 7],  // Stray
            ['user_id' => 18, 'game_id' => 31,  'score' => 7],  // Unpacking
            ['user_id' => 18, 'game_id' => 33,  'score' => 7],  // Dave the Diver
            ['user_id' => 18, 'game_id' => 81,  'score' => 6],  // Split Fiction
            ['user_id' => 18, 'game_id' => 165, 'score' => 6],  // Planet Zoo
            ['user_id' => 18, 'game_id' => 108, 'score' => 6],  // Coffee Talk
            ['user_id' => 18, 'game_id' => 171, 'score' => 2],  // Resident Evil 7: Biohazard
            ['user_id' => 18, 'game_id' => 178, 'score' => 1],  // Dead Space (2008)
            ['user_id' => 18, 'game_id' => 174, 'score' => 1],  // Outlast

            // albita
            ['user_id' => 25, 'game_id' => 31,  'score' => 9],  // Unpacking
            ['user_id' => 25, 'game_id' => 30,  'score' => 9],  // Stray
            ['user_id' => 25, 'game_id' => 102, 'score' => 9],  // A Short Hike
            ['user_id' => 25, 'game_id' => 32,  'score' => 8],  // Spiritfarer
            ['user_id' => 25, 'game_id' => 33,  'score' => 8],  // Dave the Diver
            ['user_id' => 25, 'game_id' => 28,  'score' => 8],  // Botany Manor
            ['user_id' => 25, 'game_id' => 165, 'score' => 7],  // Planet Zoo
            ['user_id' => 25, 'game_id' => 27,  'score' => 7],  // Call of the Sea
            ['user_id' => 25, 'game_id' => 3,   'score' => 7],  // Stardew Valley
            ['user_id' => 25, 'game_id' => 103, 'score' => 7],  // Dorfromantik
            ['user_id' => 25, 'game_id' => 44,  'score' => 7],  // Kena: Bridge of Spirits
            ['user_id' => 25, 'game_id' => 15,  'score' => 7],  // Firewatch
            ['user_id' => 25, 'game_id' => 104, 'score' => 6],  // Cozy Grove
            ['user_id' => 25, 'game_id' => 80,  'score' => 6],  // It Takes Two
            ['user_id' => 25, 'game_id' => 95,  'score' => 6],  // Mario Kart 8 Deluxe
            ['user_id' => 25, 'game_id' => 198, 'score' => 2],  // DOOM Eternal
            ['user_id' => 25, 'game_id' => 174, 'score' => 1],  // Outlast
            ['user_id' => 25, 'game_id' => 138, 'score' => 1],  // DayZ

            // claran
            ['user_id' => 20, 'game_id' => 44,  'score' => 9],  // Kena: Bridge of Spirits
            ['user_id' => 20, 'game_id' => 27,  'score' => 9],  // Call of the Sea
            ['user_id' => 20, 'game_id' => 28,  'score' => 9],  // Botany Manor
            ['user_id' => 20, 'game_id' => 30,  'score' => 8],  // Stray
            ['user_id' => 20, 'game_id' => 77,  'score' => 8],  // Portal 2
            ['user_id' => 20, 'game_id' => 102, 'score' => 8],  // A Short Hike
            ['user_id' => 20, 'game_id' => 31,  'score' => 7],  // Unpacking
            ['user_id' => 20, 'game_id' => 105, 'score' => 7],  // Disney Dreamlight Valley
            ['user_id' => 20, 'game_id' => 14,  'score' => 7],  // What Remains of Edith Finch
            ['user_id' => 20, 'game_id' => 15,  'score' => 7],  // Firewatch
            ['user_id' => 20, 'game_id' => 94,  'score' => 6],  // Animal Crossing: New Horizons
            ['user_id' => 20, 'game_id' => 3,   'score' => 6],  // Stardew Valley
            ['user_id' => 20, 'game_id' => 95,  'score' => 6],  // Mario Kart 8 Deluxe
            ['user_id' => 20, 'game_id' => 80,  'score' => 6],  // It Takes Two
            ['user_id' => 20, 'game_id' => 32,  'score' => 6],  // Spiritfarer
            ['user_id' => 20, 'game_id' => 183, 'score' => 2],  // Mortal Kombat 1
            ['user_id' => 20, 'game_id' => 204, 'score' => 1],  // Counter-Strike 2
            ['user_id' => 20, 'game_id' => 174, 'score' => 1],  // Outlast

            // rubenAg
            ['user_id' => 21, 'game_id' => 112, 'score' => 10], // Hades
            ['user_id' => 21, 'game_id' => 114, 'score' => 9],  // Slay the Spire
            ['user_id' => 21, 'game_id' => 113, 'score' => 9],  // The Binding of Isaac: Rebirth
            ['user_id' => 21, 'game_id' => 122, 'score' => 9],  // Vampire Survivors
            ['user_id' => 21, 'game_id' => 115, 'score' => 8],  // Risk of Rain 2
            ['user_id' => 21, 'game_id' => 124, 'score' => 8],  // Returnal
            ['user_id' => 21, 'game_id' => 127, 'score' => 8],  // Dead Cells
            ['user_id' => 21, 'game_id' => 117, 'score' => 8],  // Enter the Gungeon
            ['user_id' => 21, 'game_id' => 116, 'score' => 7],  // Rogue Legacy 2
            ['user_id' => 21, 'game_id' => 118, 'score' => 7],  // Spelunky 2
            ['user_id' => 21, 'game_id' => 119, 'score' => 7],  // Darkest Dungeon
            ['user_id' => 21, 'game_id' => 123, 'score' => 7],  // Cult of the Lamb
            ['user_id' => 21, 'game_id' => 79,  'score' => 6],  // Inscryption
            ['user_id' => 21, 'game_id' => 198, 'score' => 6],  // DOOM Eternal
            ['user_id' => 21, 'game_id' => 126, 'score' => 6],  // Celeste
            ['user_id' => 21, 'game_id' => 21,  'score' => 2],  // Heavy Rain
            ['user_id' => 21, 'game_id' => 16,  'score' => 2],  // Gone Home
            ['user_id' => 21, 'game_id' => 17,  'score' => 1],  // Virginia

            //sara_iba
            ['user_id' => 22, 'game_id' => 4,   'score' => 10], // Disco Elysium
            ['user_id' => 22, 'game_id' => 7,   'score' => 9],  // Thimbleweed Park
            ['user_id' => 22, 'game_id' => 6,   'score' => 9],  // Return to Monkey Island
            ['user_id' => 22, 'game_id' => 13,  'score' => 9],  // Return Of The Obra Dinn
            ['user_id' => 22, 'game_id' => 11,  'score' => 8],  // Sherlock Holmes: Chapter One
            ['user_id' => 22, 'game_id' => 24,  'score' => 8],  // The Wolf Among Us
            ['user_id' => 22, 'game_id' => 8,   'score' => 8],  // Deponia
            ['user_id' => 22, 'game_id' => 77,  'score' => 7],  // Portal 2
            ['user_id' => 22, 'game_id' => 78,  'score' => 7],  // The Stanley Parable
            ['user_id' => 22, 'game_id' => 79,  'score' => 7],  // Inscryption
            ['user_id' => 22, 'game_id' => 10,  'score' => 7],  // Call of Cthulhu
            ['user_id' => 22, 'game_id' => 73,  'score' => 6],  // Alan Wake
            ['user_id' => 22, 'game_id' => 14,  'score' => 6],  // What Remains of Edith Finch
            ['user_id' => 22, 'game_id' => 28,  'score' => 6],  // Botany Manor
            ['user_id' => 22, 'game_id' => 27,  'score' => 6],  // Call of the Sea
            ['user_id' => 22, 'game_id' => 191, 'score' => 2],  // EA SPORTS FC 26
            ['user_id' => 22, 'game_id' => 188, 'score' => 2],  // F1 24
            ['user_id' => 22, 'game_id' => 194, 'score' => 1],  // Madden NFL 24

            // tomas_h
            ['user_id' => 23, 'game_id' => 82,  'score' => 10], // Grand Theft Auto V
            ['user_id' => 23, 'game_id' => 2,   'score' => 9],  // The Last of Us Part II
            ['user_id' => 23, 'game_id' => 55,  'score' => 9],  // Red Dead Redemption 2
            ['user_id' => 23, 'game_id' => 188, 'score' => 8],  // F1 24
            ['user_id' => 23, 'game_id' => 191, 'score' => 8],  // EA SPORTS FC 26
            ['user_id' => 23, 'game_id' => 83,  'score' => 8],  // Alan Wake 2
            ['user_id' => 23, 'game_id' => 37,  'score' => 8],  // The Last of Us Part I
            ['user_id' => 23, 'game_id' => 43,  'score' => 8],  // God of War I
            ['user_id' => 23, 'game_id' => 202, 'score' => 7],  // Battlefield 2042
            ['user_id' => 23, 'game_id' => 186, 'score' => 7],  // Forza Horizon 5
            ['user_id' => 23, 'game_id' => 198, 'score' => 7],  // DOOM Eternal
            ['user_id' => 23, 'game_id' => 51,  'score' => 7],  // Cyberpunk 2077
            ['user_id' => 23, 'game_id' => 38,  'score' => 7],  // Uncharted 4: A Thief's End
            ['user_id' => 23, 'game_id' => 192, 'score' => 6],  // NBA 2K26
            ['user_id' => 23, 'game_id' => 172, 'score' => 6],  // Resident Evil 2
            ['user_id' => 23, 'game_id' => 132, 'score' => 2],  // Axiom Verge
            ['user_id' => 23, 'game_id' => 120, 'score' => 2],  // Crypt of the NecroDancer
            ['user_id' => 23, 'game_id' => 110, 'score' => 1],  // Littlewood

            // miguelap
            ['user_id' => 24, 'game_id' => 157, 'score' => 10], // Frostpunk
            ['user_id' => 24, 'game_id' => 161, 'score' => 9],  // RimWorld
            ['user_id' => 24, 'game_id' => 163, 'score' => 8],  // Banished
            ['user_id' => 24, 'game_id' => 162, 'score' => 8],  // Dwarf Fortress
            ['user_id' => 24, 'game_id' => 154, 'score' => 8],  // Into the Breach
            ['user_id' => 24, 'game_id' => 119, 'score' => 8],  // Darkest Dungeon
            ['user_id' => 24, 'game_id' => 159, 'score' => 7],  // Factorio
            ['user_id' => 24, 'game_id' => 152, 'score' => 7],  // Sid Meier’s Civilization VI
            ['user_id' => 24, 'game_id' => 158, 'score' => 7],  // Cities: Skylines
            ['user_id' => 24, 'game_id' => 114, 'score' => 7],  // Slay the Spire
            ['user_id' => 24, 'game_id' => 140, 'score' => 6],  // Project Zomboid
            ['user_id' => 24, 'game_id' => 68,  'score' => 6],  // The Long Dark
            ['user_id' => 24, 'game_id' => 170, 'score' => 6],  // Anno 1800
            ['user_id' => 24, 'game_id' => 156, 'score' => 6],  // Stellaris
            ['user_id' => 24, 'game_id' => 112, 'score' => 6],  // Hades
            ['user_id' => 24, 'game_id' => 95,  'score' => 2],  // Mario Kart 8 Deluxe
            ['user_id' => 24, 'game_id' => 97,  'score' => 2],  // Splatoon 3
            ['user_id' => 24, 'game_id' => 100, 'score' => 2],  // Luigi's Mansion 3

            // diegolz
            ['user_id' => 26, 'game_id' => 209, 'score' => 10], // Half-Life: Alyx
            ['user_id' => 26, 'game_id' => 210, 'score' => 9],  // Beat Saber
            ['user_id' => 26, 'game_id' => 211, 'score' => 9],  // Boneworks
            ['user_id' => 26, 'game_id' => 212, 'score' => 8],  // Moss
            ['user_id' => 26, 'game_id' => 198, 'score' => 8],  // DOOM Eternal
            ['user_id' => 26, 'game_id' => 208, 'score' => 8],  // Metro Exodus
            ['user_id' => 26, 'game_id' => 203, 'score' => 8],  // Halo Infinite
            ['user_id' => 26, 'game_id' => 65,  'score' => 7],  // Deathloop
            ['user_id' => 26, 'game_id' => 180, 'score' => 7],  // Phasmophobia
            ['user_id' => 26, 'game_id' => 171, 'score' => 6],  // Resident Evil 7: Biohazard
            ['user_id' => 26, 'game_id' => 173, 'score' => 6],  // Alien: Isolation
            ['user_id' => 26, 'game_id' => 205, 'score' => 6],  // Overwatch 2
            ['user_id' => 26, 'game_id' => 77,  'score' => 6],  // Portal 2
            ['user_id' => 26, 'game_id' => 79,  'score' => 6],  // Inscryption
            ['user_id' => 26, 'game_id' => 204, 'score' => 5],  // Counter-Strike 2
            ['user_id' => 26, 'game_id' => 191, 'score' => 2],  // EA SPORTS FC 26
            ['user_id' => 26, 'game_id' => 192, 'score' => 2],  // NBA 2K26
            ['user_id' => 26, 'game_id' => 103, 'score' => 1],  // Dorfromantik

            // raquelP
            ['user_id' => 27, 'game_id' => 182, 'score' => 10], // Tekken 8
            ['user_id' => 27, 'game_id' => 181, 'score' => 9],  // Street Fighter 6
            ['user_id' => 27, 'game_id' => 184, 'score' => 9],  // Guilty Gear -Strive-
            ['user_id' => 27, 'game_id' => 183, 'score' => 8],  // Mortal Kombat 1
            ['user_id' => 27, 'game_id' => 185, 'score' => 8],  // DRAGON BALL FighterZ
            ['user_id' => 27, 'game_id' => 198, 'score' => 7],  // DOOM Eternal
            ['user_id' => 27, 'game_id' => 112, 'score' => 7],  // Hades
            ['user_id' => 27, 'game_id' => 128, 'score' => 6],  // Cuphead
            ['user_id' => 27, 'game_id' => 127, 'score' => 6],  // Dead Cells
            ['user_id' => 27, 'game_id' => 134, 'score' => 6],  // Katana ZERO
            ['user_id' => 27, 'game_id' => 58,  'score' => 6],  // Ghost of Tsushima
            ['user_id' => 27, 'game_id' => 186, 'score' => 6],  // Forza Horizon 5
            ['user_id' => 27, 'game_id' => 80,  'score' => 6],  // It Takes Two
            ['user_id' => 27, 'game_id' => 205, 'score' => 6],  // Overwatch 2
            ['user_id' => 27, 'game_id' => 204, 'score' => 5],  // Counter-Strike 2
            ['user_id' => 27, 'game_id' => 31,  'score' => 2],  // Unpacking
            ['user_id' => 27, 'game_id' => 16,  'score' => 1],  // Gone Home
            ['user_id' => 27, 'game_id' => 168, 'score' => 1],  // Microsoft Flight Simulator 2020

            // brunocb
            ['user_id' => 28, 'game_id' => 86,  'score' => 10],  // Mass Effect: Legendary Edition
            ['user_id' => 28, 'game_id' => 51,  'score' => 9],  // Cyberpunk 2077
            ['user_id' => 28, 'game_id' => 5,   'score' => 9],  // NieR:Automata
            ['user_id' => 28, 'game_id' => 52,  'score' => 8],  // Starfield
            ['user_id' => 28, 'game_id' => 66,  'score' => 8],  // The Outer Worlds 2
            ['user_id' => 28, 'game_id' => 71,  'score' => 8],  // The Alters
            ['user_id' => 28, 'game_id' => 87,  'score' => 7],  // Persona 5 Royal
            ['user_id' => 28, 'game_id' => 54,  'score' => 7],  // Fallout 4
            ['user_id' => 28, 'game_id' => 84,  'score' => 7],  // The Witcher 3: Wild Hunt
            ['user_id' => 28, 'game_id' => 55,  'score' => 7],  // Red Dead Redemption 2
            ['user_id' => 28, 'game_id' => 4,   'score' => 7],  // Disco Elysium
            ['user_id' => 28, 'game_id' => 198, 'score' => 6],  // DOOM Eternal
            ['user_id' => 28, 'game_id' => 77,  'score' => 6],  // Portal 2
            ['user_id' => 28, 'game_id' => 23,  'score' => 6],  // Detroit: Become Human
            ['user_id' => 28, 'game_id' => 53,  'score' => 6],  // Horizon Zero Dawn
            ['user_id' => 28, 'game_id' => 188, 'score' => 2],  // F1 24
            ['user_id' => 28, 'game_id' => 195, 'score' => 2],  // WWE 2K25
            ['user_id' => 28, 'game_id' => 180, 'score' => 2],  // Phasmophobia

            // nuriaS
            ['user_id' => 29, 'game_id' => 92,  'score' => 10], // The Legend of Zelda: Breath of the Wild
            ['user_id' => 29, 'game_id' => 93,  'score' => 9],  // Super Mario Odyssey
            ['user_id' => 29, 'game_id' => 95,  'score' => 9],  // Mario Kart 8 Deluxe
            ['user_id' => 29, 'game_id' => 97,  'score' => 8],  // Splatoon 3
            ['user_id' => 29, 'game_id' => 98,  'score' => 8],  // Metroid Dread
            ['user_id' => 29, 'game_id' => 99,  'score' => 8],  // Fire Emblem: Three Houses
            ['user_id' => 29, 'game_id' => 94,  'score' => 8],  // Animal Crossing: New Horizons
            ['user_id' => 29, 'game_id' => 3,   'score' => 7],  // Stardew Valley
            ['user_id' => 29, 'game_id' => 102, 'score' => 7],  // A Short Hike
            ['user_id' => 29, 'game_id' => 100, 'score' => 7],  // Luigi's Mansion 3
            ['user_id' => 29, 'game_id' => 125, 'score' => 7],  // Hollow Knight
            ['user_id' => 29, 'game_id' => 126, 'score' => 6],  // Celeste
            ['user_id' => 29, 'game_id' => 63,  'score' => 6],  // Ori and the Will of the Wisps
            ['user_id' => 29, 'game_id' => 77,  'score' => 6],  // Portal 2
            ['user_id' => 29, 'game_id' => 80,  'score' => 6],  // It Takes Two
            ['user_id' => 29, 'game_id' => 171, 'score' => 2],  // Resident Evil 7: Biohazard
            ['user_id' => 29, 'game_id' => 174, 'score' => 1],  // Outlast
            ['user_id' => 29, 'game_id' => 178, 'score' => 1],  // Dead Space (2008)

            // gonzaleon
            ['user_id' => 30, 'game_id' => 168, 'score' => 10], // Microsoft Flight Simulator 2020
            ['user_id' => 30, 'game_id' => 169, 'score' => 9],  // Euro Truck Simulator 2
            ['user_id' => 30, 'game_id' => 167, 'score' => 8],  // Farming Simulator 22
            ['user_id' => 30, 'game_id' => 158, 'score' => 8],  // Cities: Skylines
            ['user_id' => 30, 'game_id' => 190, 'score' => 8],  // Assetto Corsa Competizione
            ['user_id' => 30, 'game_id' => 170, 'score' => 7],  // Anno 1800
            ['user_id' => 30, 'game_id' => 187, 'score' => 7],  // Gran Turismo 7
            ['user_id' => 30, 'game_id' => 163, 'score' => 7],  // Banished
            ['user_id' => 30, 'game_id' => 165, 'score' => 6],  // Planet Zoo
            ['user_id' => 30, 'game_id' => 164, 'score' => 6],  // Planet Coaster
            ['user_id' => 30, 'game_id' => 186, 'score' => 6],  // Forza Horizon 5
            ['user_id' => 30, 'game_id' => 159, 'score' => 6],  // Factorio
            ['user_id' => 30, 'game_id' => 103, 'score' => 6],  // Dorfromantik
            ['user_id' => 30, 'game_id' => 3,   'score' => 6],  // Stardew Valley
            ['user_id' => 30, 'game_id' => 189, 'score' => 5],  // Need for Speed Unbound
            ['user_id' => 30, 'game_id' => 182, 'score' => 2],  // Tekken 8
            ['user_id' => 30, 'game_id' => 206, 'score' => 2],  // Apex Legends
            ['user_id' => 30, 'game_id' => 174, 'score' => 1],  // Outlast

            // paulaPnc
            ['user_id' => 31, 'game_id' => 6,   'score' => 10], // Return to Monkey Island
            ['user_id' => 31, 'game_id' => 7,   'score' => 9],  // Thimbleweed Park
            ['user_id' => 31, 'game_id' => 13,  'score' => 9],  // Return Of The Obra Dinn
            ['user_id' => 31, 'game_id' => 8,   'score' => 8],  // Deponia
            ['user_id' => 31, 'game_id' => 27,  'score' => 8],  // Call of the Sea
            ['user_id' => 31, 'game_id' => 4,   'score' => 8],  // Disco Elysium
            ['user_id' => 31, 'game_id' => 77,  'score' => 7],  // Portal 2
            ['user_id' => 31, 'game_id' => 24,  'score' => 7],  // The Wolf Among Us
            ['user_id' => 31, 'game_id' => 11,  'score' => 7],  // Sherlock Holmes: Chapter One
            ['user_id' => 31, 'game_id' => 28,  'score' => 7],  // Botany Manor
            ['user_id' => 31, 'game_id' => 102, 'score' => 6],  // A Short Hike
            ['user_id' => 31, 'game_id' => 14,  'score' => 6],  // What Remains of Edith Finch
            ['user_id' => 31, 'game_id' => 78,  'score' => 6],  // The Stanley Parable
            ['user_id' => 31, 'game_id' => 79,  'score' => 6],  // Inscryption
            ['user_id' => 31, 'game_id' => 19,  'score' => 6],  // Oxenfree
            ['user_id' => 31, 'game_id' => 206, 'score' => 2],  // Apex Legends
            ['user_id' => 31, 'game_id' => 198, 'score' => 2],  // DOOM Eternal
            ['user_id' => 31, 'game_id' => 137, 'score' => 1],  // Rust

            // lauraJRPG
            ['user_id' => 32, 'game_id' => 87,  'score' => 10], // Persona 5 Royal
            ['user_id' => 32, 'game_id' => 5,   'score' => 9],  // NieR:Automata
            ['user_id' => 32, 'game_id' => 86,   'score' => 9],  // // Mass Effect: Legendary Edition
            ['user_id' => 32, 'game_id' => 76,  'score' => 8],  // Clair Obscur: Expedition 33
            ['user_id' => 32, 'game_id' => 51,  'score' => 8],  // Cyberpunk 2077
            ['user_id' => 32, 'game_id' => 4,   'score' => 7],  // Disco Elysium
            ['user_id' => 32, 'game_id' => 52,  'score' => 7],  // Starfield
            ['user_id' => 32, 'game_id' => 66,  'score' => 7],  // The Outer Worlds 2
            ['user_id' => 32, 'game_id' => 84,  'score' => 7],  // The Witcher 3: Wild Hunt
            ['user_id' => 32, 'game_id' => 1,   'score' => 7],  // Horizon Forbidden West
            ['user_id' => 32, 'game_id' => 58,  'score' => 7],  // Ghost of Tsushima
            ['user_id' => 32, 'game_id' => 23,  'score' => 6],  // Detroit: Become Human
            ['user_id' => 32, 'game_id' => 83,  'score' => 6],  // Alan Wake 2
            ['user_id' => 32, 'game_id' => 112, 'score' => 6],  // Hades
            ['user_id' => 32, 'game_id' => 77,  'score' => 6],  // Portal 2
            ['user_id' => 32, 'game_id' => 188, 'score' => 2],  // F1 24
            ['user_id' => 32, 'game_id' => 137, 'score' => 2],  // Rust
            ['user_id' => 32, 'game_id' => 194, 'score' => 1],  // Madden NFL 24

            // vicspeed
            ['user_id' => 33, 'game_id' => 190, 'score' => 10], // Assetto Corsa Competizione
            ['user_id' => 33, 'game_id' => 188, 'score' => 9],  // F1 24
            ['user_id' => 33, 'game_id' => 187, 'score' => 9],  // Gran Turismo 7
            ['user_id' => 33, 'game_id' => 186, 'score' => 8],  // Forza Horizon 5
            ['user_id' => 33, 'game_id' => 189, 'score' => 7],  // Need for Speed Unbound
            ['user_id' => 33, 'game_id' => 191, 'score' => 7],  // EA SPORTS FC 26
            ['user_id' => 33, 'game_id' => 169, 'score' => 7],  // Euro Truck Simulator 2
            ['user_id' => 33, 'game_id' => 196, 'score' => 7],  // Riders Republic
            ['user_id' => 33, 'game_id' => 95,  'score' => 7],  // Mario Kart 8 Deluxe
            ['user_id' => 33, 'game_id' => 168, 'score' => 6],  // Microsoft Flight Simulator 2020
            ['user_id' => 33, 'game_id' => 158, 'score' => 6],  // Cities: Skylines
            ['user_id' => 33, 'game_id' => 203, 'score' => 6],  // Halo Infinite
            ['user_id' => 33, 'game_id' => 205, 'score' => 6],  // Overwatch 2
            ['user_id' => 33, 'game_id' => 192, 'score' => 6],  // NBA 2K26
            ['user_id' => 33, 'game_id' => 51,  'score' => 6],  // Cyberpunk 2077
            ['user_id' => 33, 'game_id' => 16,  'score' => 2],  // Gone Home
            ['user_id' => 33, 'game_id' => 32,  'score' => 2],  // Spiritfarer
            ['user_id' => 33, 'game_id' => 18,  'score' => 2],  // Night in the Woods

            // loreSports
            ['user_id' => 34, 'game_id' => 191, 'score' => 10], // EA SPORTS FC 26
            ['user_id' => 34, 'game_id' => 192, 'score' => 9],  // NBA 2K26
            ['user_id' => 34, 'game_id' => 194, 'score' => 8],  // Madden NFL 24
            ['user_id' => 34, 'game_id' => 195, 'score' => 7],  // WWE 2K25
            ['user_id' => 34, 'game_id' => 186, 'score' => 7],  // Forza Horizon 5
            ['user_id' => 34, 'game_id' => 196, 'score' => 7],  // Riders Republic
            ['user_id' => 34, 'game_id' => 188, 'score' => 7],  // F1 24
            ['user_id' => 34, 'game_id' => 187, 'score' => 6],  // Gran Turismo 7
            ['user_id' => 34, 'game_id' => 95,  'score' => 6],  // Mario Kart 8 Deluxe
            ['user_id' => 34, 'game_id' => 205, 'score' => 6],  // Overwatch 2
            ['user_id' => 34, 'game_id' => 206, 'score' => 6],  // Apex Legends
            ['user_id' => 34, 'game_id' => 82,  'score' => 6],  // Grand Theft Auto V
            ['user_id' => 34, 'game_id' => 37,  'score' => 6],  // The Last of Us Part I
            ['user_id' => 34, 'game_id' => 50,  'score' => 6],  // Hogwarts Legacy
            ['user_id' => 34, 'game_id' => 189, 'score' => 6],  // Need for Speed Unbound
            ['user_id' => 34, 'game_id' => 78,  'score' => 2],  // The Stanley Parable
            ['user_id' => 34, 'game_id' => 79,  'score' => 2],  // Inscryption
            ['user_id' => 34, 'game_id' => 28,  'score' => 1],  // Botany Manor

            // sergioHard
            ['user_id' => 35, 'game_id' => 85,  'score' => 10], // Elden Ring
            ['user_id' => 35, 'game_id' => 131, 'score' => 9],  // Blasphemous
            ['user_id' => 35, 'game_id' => 125, 'score' => 9],  // Hollow Knight
            ['user_id' => 35, 'game_id' => 127, 'score' => 8],  // Dead Cells
            ['user_id' => 35, 'game_id' => 43,  'score' => 8],  // God of War I
            ['user_id' => 35, 'game_id' => 58,  'score' => 7],  // Ghost of Tsushima
            ['user_id' => 35, 'game_id' => 128, 'score' => 7],  // Cuphead
            ['user_id' => 35, 'game_id' => 134, 'score' => 7],  // Katana ZERO
            ['user_id' => 35, 'game_id' => 63,  'score' => 7],  // Ori and the Will of the Wisps
            ['user_id' => 35, 'game_id' => 112, 'score' => 7],  // Hades
            ['user_id' => 35, 'game_id' => 119, 'score' => 6],  // Darkest Dungeon
            ['user_id' => 35, 'game_id' => 124, 'score' => 6],  // Returnal
            ['user_id' => 35, 'game_id' => 198, 'score' => 6],  // DOOM Eternal
            ['user_id' => 35, 'game_id' => 84,  'score' => 6],  // The Witcher 3: Wild Hunt
            ['user_id' => 35, 'game_id' => 61,  'score' => 6],  // Star Wars Jedi: Fallen Order
            ['user_id' => 35, 'game_id' => 106, 'score' => 2],  // Palia
            ['user_id' => 35, 'game_id' => 104, 'score' => 1],  // Cozy Grove
            ['user_id' => 35, 'game_id' => 105, 'score' => 1],  // Disney Dreamlight Valley

            // celiaCoop
            ['user_id' => 36, 'game_id' => 80,  'score' => 10], // It Takes Two
            ['user_id' => 36, 'game_id' => 81,  'score' => 9],  // Split Fiction
            ['user_id' => 36, 'game_id' => 95,  'score' => 8],  // Mario Kart 8 Deluxe
            ['user_id' => 36, 'game_id' => 205, 'score' => 8],  // Overwatch 2
            ['user_id' => 36, 'game_id' => 3,   'score' => 8],  // Stardew Valley
            ['user_id' => 36, 'game_id' => 50,  'score' => 7],  // Hogwarts Legacy
            ['user_id' => 36, 'game_id' => 207, 'score' => 7],  // Borderlands 3
            ['user_id' => 36, 'game_id' => 94,  'score' => 7],  // Animal Crossing: New Horizons
            ['user_id' => 36, 'game_id' => 102, 'score' => 7],  // A Short Hike
            ['user_id' => 36, 'game_id' => 31,  'score' => 6],  // Unpacking
            ['user_id' => 36, 'game_id' => 106, 'score' => 6],  // Palia
            ['user_id' => 36, 'game_id' => 186, 'score' => 6],  // Forza Horizon 5
            ['user_id' => 36, 'game_id' => 191, 'score' => 6],  // EA SPORTS FC 26
            ['user_id' => 36, 'game_id' => 77,  'score' => 6],  // Portal 2
            ['user_id' => 36, 'game_id' => 33,  'score' => 6],  // Dave the Diver
            ['user_id' => 36, 'game_id' => 177, 'score' => 2],  // SOMA
            ['user_id' => 36, 'game_id' => 174, 'score' => 1],  // Outlast
            ['user_id' => 36, 'game_id' => 178, 'score' => 1],  // Dead Space (2008)

            // ismaLoot
            ['user_id' => 37, 'game_id' => 91,  'score' => 9],  // Diablo IV
            ['user_id' => 37, 'game_id' => 207, 'score' => 9],  // Borderlands 3
            ['user_id' => 37, 'game_id' => 113, 'score' => 8],  // The Binding of Isaac: Rebirth
            ['user_id' => 37, 'game_id' => 112, 'score' => 8],  // Hades
            ['user_id' => 37, 'game_id' => 198, 'score' => 7],  // DOOM Eternal
            ['user_id' => 37, 'game_id' => 51,  'score' => 7],  // Cyberpunk 2077
            ['user_id' => 37, 'game_id' => 122, 'score' => 7],  // Vampire Survivors
            ['user_id' => 37, 'game_id' => 114, 'score' => 7],  // Slay the Spire
            ['user_id' => 37, 'game_id' => 115, 'score' => 7],  // Risk of Rain 2
            ['user_id' => 37, 'game_id' => 124, 'score' => 6],  // Returnal
            ['user_id' => 37, 'game_id' => 65,  'score' => 6],  // Deathloop
            ['user_id' => 37, 'game_id' => 206, 'score' => 6],  // Apex Legends
            ['user_id' => 37, 'game_id' => 84,  'score' => 6],  // The Witcher 3: Wild Hunt
            ['user_id' => 37, 'game_id' => 54,  'score' => 6],  // Fallout 4
            ['user_id' => 37, 'game_id' => 203, 'score' => 6],  // Halo Infinite
            ['user_id' => 37, 'game_id' => 16,  'score' => 2],  // Gone Home
            ['user_id' => 37, 'game_id' => 102, 'score' => 2],  // A Short Hike
            ['user_id' => 37, 'game_id' => 17,  'score' => 1],  // Virginia

            // marinaHorror
            ['user_id' => 38, 'game_id' => 180, 'score' => 9],  // Phasmophobia
            ['user_id' => 38, 'game_id' => 174, 'score' => 8],  // Outlast
            ['user_id' => 38, 'game_id' => 172, 'score' => 8],  // Resident Evil 2
            ['user_id' => 38, 'game_id' => 179, 'score' => 8],  // The Evil Within
            ['user_id' => 38, 'game_id' => 83,  'score' => 8],  // Alan Wake 2
            ['user_id' => 38, 'game_id' => 25,  'score' => 7],  // The Dark Pictures Anthology: House of Ashes
            ['user_id' => 38, 'game_id' => 26,  'score' => 7],  // The Dark Pictures Anthology: Little Hope
            ['user_id' => 38, 'game_id' => 171, 'score' => 7],  // Resident Evil 7: Biohazard
            ['user_id' => 38, 'game_id' => 173, 'score' => 7],  // Alien: Isolation
            ['user_id' => 38, 'game_id' => 175, 'score' => 6],  // Silent Hill 2
            ['user_id' => 38, 'game_id' => 177, 'score' => 6],  // SOMA
            ['user_id' => 38, 'game_id' => 178, 'score' => 6],  // Dead Space (2008)
            ['user_id' => 38, 'game_id' => 80,  'score' => 6],  // It Takes Two
            ['user_id' => 38, 'game_id' => 147, 'score' => 6],  // The Forest
            ['user_id' => 38, 'game_id' => 70,  'score' => 6],  // Dying Light: The Following - Enhanced Edition
            ['user_id' => 38, 'game_id' => 3,   'score' => 2],  // Stardew Valley
            ['user_id' => 38, 'game_id' => 165, 'score' => 2],  // Planet Zoo
            ['user_id' => 38, 'game_id' => 103, 'score' => 1],  // Dorfromantik

            // alvaroVR
            ['user_id' => 39, 'game_id' => 209, 'score' => 10], // Half-Life: Alyx
            ['user_id' => 39, 'game_id' => 210, 'score' => 9],  // Beat Saber
            ['user_id' => 39, 'game_id' => 211, 'score' => 8],  // Boneworks
            ['user_id' => 39, 'game_id' => 212, 'score' => 8],  // Moss
            ['user_id' => 39, 'game_id' => 203, 'score' => 8],  // Halo Infinite
            ['user_id' => 39, 'game_id' => 198, 'score' => 8],  // DOOM Eternal
            ['user_id' => 39, 'game_id' => 208, 'score' => 7],  // Metro Exodus
            ['user_id' => 39, 'game_id' => 65,  'score' => 7],  // Deathloop
            ['user_id' => 39, 'game_id' => 204, 'score' => 6],  // Counter-Strike 2
            ['user_id' => 39, 'game_id' => 205, 'score' => 6],  // Overwatch 2
            ['user_id' => 39, 'game_id' => 206, 'score' => 6],  // Apex Legends
            ['user_id' => 39, 'game_id' => 180, 'score' => 6],  // Phasmophobia
            ['user_id' => 39, 'game_id' => 77,  'score' => 6],  // Portal 2
            ['user_id' => 39, 'game_id' => 79,  'score' => 6],  // Inscryption
            ['user_id' => 39, 'game_id' => 189, 'score' => 5],  // Need for Speed Unbound
            ['user_id' => 39, 'game_id' => 94,  'score' => 2],  // Animal Crossing: New Horizons
            ['user_id' => 39, 'game_id' => 107, 'score' => 2],  // Ooblets
            ['user_id' => 39, 'game_id' => 106, 'score' => 1],  // Palia

            // hugoTycoon
            ['user_id' => 40, 'game_id' => 164, 'score' => 9],  // Planet Coaster
            ['user_id' => 40, 'game_id' => 165, 'score' => 9],  // Planet Zoo
            ['user_id' => 40, 'game_id' => 158, 'score' => 8],  // Cities: Skylines
            ['user_id' => 40, 'game_id' => 170, 'score' => 8],  // Anno 1800
            ['user_id' => 40, 'game_id' => 3,   'score' => 7],  // Stardew Valley
            ['user_id' => 40, 'game_id' => 103, 'score' => 7],  // Dorfromantik
            ['user_id' => 40, 'game_id' => 163, 'score' => 7],  // Banished
            ['user_id' => 40, 'game_id' => 161, 'score' => 6],  // RimWorld
            ['user_id' => 40, 'game_id' => 159, 'score' => 6],  // Factorio
            ['user_id' => 40, 'game_id' => 160, 'score' => 6],  // Satisfactory
            ['user_id' => 40, 'game_id' => 167, 'score' => 6],  // Farming Simulator 22
            ['user_id' => 40, 'game_id' => 169, 'score' => 6],  // Euro Truck Simulator 2
            ['user_id' => 40, 'game_id' => 105, 'score' => 6],  // Disney Dreamlight Valley
            ['user_id' => 40, 'game_id' => 107, 'score' => 6],  // Ooblets
            ['user_id' => 40, 'game_id' => 102, 'score' => 6],  // A Short Hike
            ['user_id' => 40, 'game_id' => 182, 'score' => 2],  // Tekken 8
            ['user_id' => 40, 'game_id' => 204, 'score' => 2],  // Counter-Strike 2
            ['user_id' => 40, 'game_id' => 174, 'score' => 1],  // Outlast
        ];

        foreach ($ratings as $data) {
            Rating::create([
                'user_id' => $data['user_id'],
                'game_id' => $data['game_id'],
                'score'   => (int) $data['score'],
            ]);
        }
    }
}
