<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ReviewEmotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rows = [
            // hagne

            // 1: Cyberpunk 2077
            ['review_id' => 1,  'emotion_id' => 6],  // Curiosity
            ['review_id' => 1,  'emotion_id' => 7],  // Inspiration

            // 2: Horizon Forbidden West
            ['review_id' => 2,  'emotion_id' => 1],  // Joy
            ['review_id' => 2,  'emotion_id' => 4],  // Hope

            // 3: Ghost of Tsushima
            ['review_id' => 3,  'emotion_id' => 7],  // Inspiration
            ['review_id' => 3,  'emotion_id' => 5],  // Relaxation

            // 4: Firewatch
            ['review_id' => 4,  'emotion_id' => 9],  // Melancholy
            ['review_id' => 4,  'emotion_id' => 10], // Sadness

            // 5: Disco Elysium
            ['review_id' => 5,  'emotion_id' => 6],  // Curiosity
            ['review_id' => 5,  'emotion_id' => 7],  // Inspiration

            // 6: The Long Dark
            ['review_id' => 7,  'emotion_id' => 9],  // Melancholy
            ['review_id' => 6,  'emotion_id' => 11], // Fear

            // 7: Dredge
            ['review_id' => 7,  'emotion_id' => 6],  // Curiosity
            ['review_id' => 7,  'emotion_id' => 11], // Fear

            // 8: Edith Finch
            ['review_id' => 8,  'emotion_id' => 10], // Sadness
            ['review_id' => 8,  'emotion_id' => 9],  // Melancholy

            // 9: Detroit: Become Human
            ['review_id' => 9,  'emotion_id' => 6],  // Curiosity
            ['review_id' => 9,  'emotion_id' => 7],  // Inspiration

            // 10: Hogwarts Legacy
            ['review_id' => 10, 'emotion_id' => 8],  // Nostalgia
            ['review_id' => 10, 'emotion_id' => 1],  // Joy

            // 11: Red Dead Redemption 2
            ['review_id' => 11, 'emotion_id' => 8],  // Nostalgia
            ['review_id' => 11, 'emotion_id' => 9],  // Melancholy

            // 12: The Last of Us Part I
            ['review_id' => 12, 'emotion_id' => 10], // Sadness
            ['review_id' => 12, 'emotion_id' => 13], // Frustration

            // 13: Stray
            ['review_id' => 13, 'emotion_id' => 1],  // Joy
            ['review_id' => 13, 'emotion_id' => 6],  // Curiosity

            // 14: Spiritfarer
            ['review_id' => 14, 'emotion_id' => 10], // Sadness
            ['review_id' => 14, 'emotion_id' => 9],  // Melancholy

            // 15: A Plague Tale: Innocence
            ['review_id' => 15, 'emotion_id' => 12], // Tension
            ['review_id' => 15, 'emotion_id' => 11], // Fear

            // 16: Death Stranding
            ['review_id' => 16, 'emotion_id' => 13], // Frustration
            ['review_id' => 16, 'emotion_id' => 6],  // Curiosity

            // 17: Elden Ring
            ['review_id' => 17, 'emotion_id' => 13], // Frustration
            ['review_id' => 17, 'emotion_id' => 14], // Anger

            // 18: Rust
            ['review_id' => 18, 'emotion_id' => 13], // Frustration
            ['review_id' => 18, 'emotion_id' => 14], // Anger



            // RNG_12

            // 19: Counter-Strike 2
            ['review_id' => 19, 'emotion_id' => 12], // Tension
            ['review_id' => 19, 'emotion_id' => 13], // Frustration

            // 20: Apex Legends
            ['review_id' => 20, 'emotion_id' => 12], // Tension
            ['review_id' => 20, 'emotion_id' => 1],  // Joy

            // 21: Overwatch 2
            ['review_id' => 21, 'emotion_id' => 12], // Tension
            ['review_id' => 21, 'emotion_id' => 13], // Frustration

            // 22: Street Fighter 6
            ['review_id' => 22, 'emotion_id' => 3],  // Satisfaction
            ['review_id' => 22, 'emotion_id' => 14], // Anger

            // 23: Assetto Corsa Competizione
            ['review_id' => 23, 'emotion_id' => 3],  // Satisfaction
            ['review_id' => 23, 'emotion_id' => 5],  // Relaxation

            // 24: EA SPORTS FC 26
            ['review_id' => 24, 'emotion_id' => 4],  // Hope
            ['review_id' => 24, 'emotion_id' => 12], // Tension

            // 25: Tekken 8
            ['review_id' => 25, 'emotion_id' => 3],  // Satisfaction
            ['review_id' => 25, 'emotion_id' => 14], // Anger

            // 26: F1 24
            ['review_id' => 26, 'emotion_id' => 5],  // Relaxation
            ['review_id' => 26, 'emotion_id' => 3],  // Satisfaction

            // 27: Call of Duty: Warzone
            ['review_id' => 27, 'emotion_id' => 14], // Anger
            ['review_id' => 27, 'emotion_id' => 13], // Frustration

            // 28: Gran Turismo 7
            ['review_id' => 28, 'emotion_id' => 5],  // Relaxation
            ['review_id' => 28, 'emotion_id' => 3],  // Satisfaction

            // 29: Halo Infinite
            ['review_id' => 29, 'emotion_id' => 2],  // Fun
            ['review_id' => 29, 'emotion_id' => 3],  // Satisfaction

            // 30: DOOM Eternal
            ['review_id' => 30, 'emotion_id' => 2],  // Fun
            ['review_id' => 30, 'emotion_id' => 14], // Anger

            // 31: Madden NFL 24
            ['review_id' => 31, 'emotion_id' => 2],  // Fun
            ['review_id' => 31, 'emotion_id' => 5],  // Relaxation

            // 32: Need for Speed Unbound
            ['review_id' => 32, 'emotion_id' => 1],  // Joy
            ['review_id' => 32, 'emotion_id' => 2],  // Fun

            // 33: Forza Horizon 5
            ['review_id' => 33, 'emotion_id' => 1],  // Joy
            ['review_id' => 33, 'emotion_id' => 5],  // Relaxation

            // 34: Gone Home
            ['review_id' => 34, 'emotion_id' => 6],  // Curiosity
            ['review_id' => 34, 'emotion_id' => 9],  // Melancholy

            // 35: Unpacking
            ['review_id' => 35, 'emotion_id' => 5],  // Relaxation
            ['review_id' => 35, 'emotion_id' => 3],  // Satisfaction

            // 36: A Short Hike
            ['review_id' => 36, 'emotion_id' => 1],  // Joy
            ['review_id' => 36, 'emotion_id' => 5],  // Relaxation



            // shadowex

            // 37: Silent Hill 2
            ['review_id' => 37, 'emotion_id' => 11], // Fear
            ['review_id' => 37, 'emotion_id' => 10], // Sadness

            // 38: Resident Evil 7
            ['review_id' => 38, 'emotion_id' => 11], // Fear
            ['review_id' => 38, 'emotion_id' => 12], // Tension

            // 39: Alien: Isolation
            ['review_id' => 39, 'emotion_id' => 11], // Fear
            ['review_id' => 39, 'emotion_id' => 12], // Tension

            // 40: SOMA
            ['review_id' => 40, 'emotion_id' => 10], // Sadness
            ['review_id' => 40, 'emotion_id' => 9],  // Melancholy

            // 41: Dead Space (2008)
            ['review_id' => 41, 'emotion_id' => 11], // Fear
            ['review_id' => 41, 'emotion_id' => 12], // Tension

            // 42: Alan Wake 2
            ['review_id' => 42, 'emotion_id' => 7],  // Inspiration
            ['review_id' => 42, 'emotion_id' => 9],  // Melancholy

            // 43: Resident Evil 2
            ['review_id' => 43, 'emotion_id' => 11], // Fear
            ['review_id' => 43, 'emotion_id' => 3],  // Satisfaction

            // 44: The Evil Within
            ['review_id' => 44, 'emotion_id' => 11], // Fear
            ['review_id' => 44, 'emotion_id' => 12], // Tension

            // 45: Outlast
            ['review_id' => 45, 'emotion_id' => 11], // Fear
            ['review_id' => 45, 'emotion_id' => 12], // Tension

            // 46: Amnesia: The Dark Descent
            ['review_id' => 46, 'emotion_id' => 11], // Fear
            ['review_id' => 46, 'emotion_id' => 12], // Tension

            // 47: House of Ashes
            ['review_id' => 47, 'emotion_id' => 11], // Fear
            ['review_id' => 47, 'emotion_id' => 6],  // Curiosity

            // 48: Little Hope
            ['review_id' => 48, 'emotion_id' => 11], // Fear
            ['review_id' => 48, 'emotion_id' => 9],  // Melancholy

            // 49: Phasmophobia
            ['review_id' => 49, 'emotion_id' => 11], // Fear
            ['review_id' => 49, 'emotion_id' => 2],  // Fun

            // 50: Call of Cthulhu
            ['review_id' => 50, 'emotion_id' => 6],  // Curiosity
            ['review_id' => 50, 'emotion_id' => 11], // Fear

            // 51: Alan Wake
            ['review_id' => 51, 'emotion_id' => 9],  // Melancholy
            ['review_id' => 51, 'emotion_id' => 10], // Sadness

            // 52: Ooblets
            ['review_id' => 52, 'emotion_id' => 1],  // Joy
            ['review_id' => 52, 'emotion_id' => 2],  // Fun

            // 53: Mario Kart 8 Deluxe
            ['review_id' => 53, 'emotion_id' => 2],  // Fun
            ['review_id' => 53, 'emotion_id' => 1],  // Joy

            // 54: Splatoon 3
            ['review_id' => 54, 'emotion_id' => 2],  // Fun
            ['review_id' => 54, 'emotion_id' => 1],  // Joy



            // retroAlex

            // 55: Portal 2
            ['review_id' => 55, 'emotion_id' => 7],  // Inspiration
            ['review_id' => 55, 'emotion_id' => 3],  // Satisfaction

            // 56: Return Of The Obra Dinn
            ['review_id' => 56, 'emotion_id' => 6],  // Curiosity
            ['review_id' => 56, 'emotion_id' => 3],  // Satisfaction

            // 57: The Stanley Parable
            ['review_id' => 57, 'emotion_id' => 6],  // Curiosity
            ['review_id' => 57, 'emotion_id' => 7],  // Inspiration

            // 58: Inscryption
            ['review_id' => 58, 'emotion_id' => 11], // Fear
            ['review_id' => 58, 'emotion_id' => 13], // Frustration

            // 59: Thimbleweed Park
            ['review_id' => 59, 'emotion_id' => 8],  // Nostalgia
            ['review_id' => 59, 'emotion_id' => 6],  // Curiosity

            // 60: Disco Elysium
            ['review_id' => 60, 'emotion_id' => 7],  // Inspiration
            ['review_id' => 60, 'emotion_id' => 9],  // Melancholy

            // 61: Return to Monkey Island
            ['review_id' => 61, 'emotion_id' => 8],  // Nostalgia
            ['review_id' => 61, 'emotion_id' => 1],  // Joy

            // 62: Deponia
            ['review_id' => 62, 'emotion_id' => 2],  // Fun
            ['review_id' => 62, 'emotion_id' => 13], // Frustration

            // 63: Botany Manor
            ['review_id' => 63, 'emotion_id' => 5],  // Relaxation
            ['review_id' => 63, 'emotion_id' => 6],  // Curiosity

            // 64: Call of the Sea
            ['review_id' => 64, 'emotion_id' => 6],  // Curiosity
            ['review_id' => 64, 'emotion_id' => 8],  // Nostalgia

            // 65: What Remains of Edith Finch
            ['review_id' => 65, 'emotion_id' => 10], // Sadness
            ['review_id' => 65, 'emotion_id' => 9],  // Melancholy

            // 66: Oxenfree
            ['review_id' => 66, 'emotion_id' => 6],  // Curiosity
            ['review_id' => 66, 'emotion_id' => 9],  // Melancholy

            // 67: Katana ZERO
            ['review_id' => 67, 'emotion_id' => 3],  // Satisfaction
            ['review_id' => 67, 'emotion_id' => 13], // Frustration

            // 68: A Short Hike
            ['review_id' => 68, 'emotion_id' => 1],  // Joy
            ['review_id' => 68, 'emotion_id' => 5],  // Relaxation

            // 69: Split Fiction
            ['review_id' => 69, 'emotion_id' => 7],  // Inspiration
            ['review_id' => 69, 'emotion_id' => 6],  // Curiosity

            // 70: Madden NFL 24
            ['review_id' => 70, 'emotion_id' => 8],  // Nostalgia
            ['review_id' => 70, 'emotion_id' => 5],  // Relaxation

            // 71: WWE 2K25
            ['review_id' => 71, 'emotion_id' => 2],  // Fun
            ['review_id' => 71, 'emotion_id' => 14], // Anger

            // 72: Farming Simulator 22
            ['review_id' => 72, 'emotion_id' => 5],  // Relaxation
            ['review_id' => 72, 'emotion_id' => 3],  // Satisfaction



            // davidRios

            // 73: The Last of Us Part I
            ['review_id' => 73, 'emotion_id' => 10], // Sadness
            ['review_id' => 73, 'emotion_id' => 4],  // Hope

            // 74: God of War I
            ['review_id' => 74, 'emotion_id' => 14], // Anger
            ['review_id' => 74, 'emotion_id' => 7],  // Inspiration

            // 75: Red Dead Redemption 2
            ['review_id' => 75, 'emotion_id' => 10], // Sadness
            ['review_id' => 75, 'emotion_id' => 9],  // Melancholy

            // 76: The Last of Us Part II
            ['review_id' => 76, 'emotion_id' => 14], // Anger
            ['review_id' => 76, 'emotion_id' => 10], // Sadness

            // 77: Uncharted 4
            ['review_id' => 77, 'emotion_id' => 1],  // Joy
            ['review_id' => 77, 'emotion_id' => 3],  // Satisfaction

            // 78: EA SPORTS FC 26
            ['review_id' => 78, 'emotion_id' => 4],  // Hope
            ['review_id' => 78, 'emotion_id' => 3],  // Satisfaction

            // 79: NBA 2K26
            ['review_id' => 79, 'emotion_id' => 3],  // Satisfaction
            ['review_id' => 79, 'emotion_id' => 14], // Anger

            // 80: Ghost of Tsushima
            ['review_id' => 80, 'emotion_id' => 7],  // Inspiration
            ['review_id' => 80, 'emotion_id' => 4],  // Hope

            // 81: Horizon Zero Dawn
            ['review_id' => 81, 'emotion_id' => 4],  // Hope
            ['review_id' => 81, 'emotion_id' => 7],  // Inspiration

            // 82: Grand Theft Auto V
            ['review_id' => 82, 'emotion_id' => 2],  // Fun
            ['review_id' => 82, 'emotion_id' => 13], // Frustration

            // 83: Alan Wake 2
            ['review_id' => 83, 'emotion_id' => 9],  // Melancholy
            ['review_id' => 83, 'emotion_id' => 12], // Tension

            // 84: Mafia: Definitive Edition
            ['review_id' => 84, 'emotion_id' => 8],  // Nostalgia
            ['review_id' => 84, 'emotion_id' => 10], // Sadness

            // 85: Star Wars Jedi: Fallen Order
            ['review_id' => 85, 'emotion_id' => 4],  // Hope
            ['review_id' => 85, 'emotion_id' => 7],  // Inspiration

            // 86: Star Wars Jedi: Survivor
            ['review_id' => 86, 'emotion_id' => 4],  // Hope
            ['review_id' => 86, 'emotion_id' => 12], // Tension

            // 87: Death Stranding
            ['review_id' => 87, 'emotion_id' => 10], // Sadness
            ['review_id' => 87, 'emotion_id' => 7],  // Inspiration

            // 88: Crypt of the NecroDancer
            ['review_id' => 88, 'emotion_id' => 12], // Tension
            ['review_id' => 88, 'emotion_id' => 3],  // Satisfaction

            // 89: FTL: Faster Than Light
            ['review_id' => 89, 'emotion_id' => 12], // Tension
            ['review_id' => 89, 'emotion_id' => 13], // Frustration

            // 90: Axiom Verge
            ['review_id' => 90, 'emotion_id' => 8],  // Nostalgia
            ['review_id' => 90, 'emotion_id' => 9],  // Melancholy



            // noaDev

            // 91: The Long Dark
            ['review_id' => 91, 'emotion_id' => 12], // Tension
            ['review_id' => 91, 'emotion_id' => 4],  // Hope

            // 92: Subnautica
            ['review_id' => 92, 'emotion_id' => 6],  // Curiosity
            ['review_id' => 92, 'emotion_id' => 11], // Fear

            // 93: Valheim
            ['review_id' => 93, 'emotion_id' => 5],  // Relaxation
            ['review_id' => 93, 'emotion_id' => 4],  // Hope

            // 94: Project Zomboid
            ['review_id' => 94, 'emotion_id' => 12], // Tension
            ['review_id' => 94, 'emotion_id' => 11], // Fear

            // 95: Raft
            ['review_id' => 95, 'emotion_id' => 5],  // Relaxation
            ['review_id' => 95, 'emotion_id' => 4],  // Hope

            // 96: Grounded
            ['review_id' => 96, 'emotion_id' => 1],  // Joy
            ['review_id' => 96, 'emotion_id' => 4],  // Hope

            // 97: The Forest
            ['review_id' => 97, 'emotion_id' => 11], // Fear
            ['review_id' => 97, 'emotion_id' => 12], // Tension

            // 98: 7 Days to Die
            ['review_id' => 98, 'emotion_id' => 13], // Frustration
            ['review_id' => 98, 'emotion_id' => 14], // Anger

            // 99: Don't Starve Together
            ['review_id' => 99, 'emotion_id' => 13], // Frustration
            ['review_id' => 99, 'emotion_id' => 6],  // Curiosity

            // 100: Terraria
            ['review_id' => 100, 'emotion_id' => 6], // Curiosity
            ['review_id' => 100, 'emotion_id' => 1], // Joy

            // 101: Minecraft
            ['review_id' => 101, 'emotion_id' => 5], // Relaxation
            ['review_id' => 101, 'emotion_id' => 1], // Joy

            // 102: Dying Light: The Following
            ['review_id' => 102, 'emotion_id' => 11], // Fear
            ['review_id' => 102, 'emotion_id' => 14], // Anger

            // 103: Stranded Deep
            ['review_id' => 103, 'emotion_id' => 4], // Hope
            ['review_id' => 103, 'emotion_id' => 5], // Relaxation

            // 104: ARK: Survival Evolved
            ['review_id' => 104, 'emotion_id' => 12], // Tension
            ['review_id' => 104, 'emotion_id' => 13], // Frustration

            // 105: Rust
            ['review_id' => 105, 'emotion_id' => 14], // Anger
            ['review_id' => 105, 'emotion_id' => 13], // Frustration

            // 106: Heavy Rain
            ['review_id' => 106, 'emotion_id' => 10], // Sadness
            ['review_id' => 106, 'emotion_id' => 4],  // Hope

            // 107: Beyond: Two Souls
            ['review_id' => 107, 'emotion_id' => 4],  // Hope
            ['review_id' => 107, 'emotion_id' => 10], // Sadness

            // 108: Virginia
            ['review_id' => 108, 'emotion_id' => 7], // Inspiration
            ['review_id' => 108, 'emotion_id' => 9], // Melancholy



            // fran_juego

            // 109: Forza Horizon 5
            ['review_id' => 109, 'emotion_id' => 1], // Joy
            ['review_id' => 109, 'emotion_id' => 5], // Relaxation

            // 110: Need for Speed Unbound
            ['review_id' => 110, 'emotion_id' => 12], // Tension
            ['review_id' => 110, 'emotion_id' => 3],  // Satisfaction

            // 111: Gran Turismo 7
            ['review_id' => 111, 'emotion_id' => 3], // Satisfaction
            ['review_id' => 111, 'emotion_id' => 5], // Relaxation

            // 112: Mario Kart 8 Deluxe
            ['review_id' => 112, 'emotion_id' => 2], // Fun
            ['review_id' => 112, 'emotion_id' => 8], // Nostalgia

            // 113: Hogwarts Legacy
            ['review_id' => 113, 'emotion_id' => 8], // Nostalgia
            ['review_id' => 113, 'emotion_id' => 1], // Joy

            // 114: Borderlands 3
            ['review_id' => 114, 'emotion_id' => 2],  // Fun
            ['review_id' => 114, 'emotion_id' => 14], // Anger

            // 115: Hades
            ['review_id' => 115, 'emotion_id' => 12], // Tension
            ['review_id' => 115, 'emotion_id' => 3],  // Satisfaction

            // 116: Assetto Corsa Competizione
            ['review_id' => 116, 'emotion_id' => 3], // Satisfaction
            ['review_id' => 116, 'emotion_id' => 5], // Relaxation

            // 117: F1 24
            ['review_id' => 117, 'emotion_id' => 12], // Tension
            ['review_id' => 117, 'emotion_id' => 4],  // Hope

            // 118: It Takes Two
            ['review_id' => 118, 'emotion_id' => 1], // Joy
            ['review_id' => 118, 'emotion_id' => 7], // Inspiration

            // 119: Split Fiction
            ['review_id' => 119, 'emotion_id' => 6], // Curiosity
            ['review_id' => 119, 'emotion_id' => 7], // Inspiration

            // 120: Cyberpunk 2077
            ['review_id' => 120, 'emotion_id' => 7], // Inspiration
            ['review_id' => 120, 'emotion_id' => 6], // Curiosity

            // 121: Riders Republic
            ['review_id' => 121, 'emotion_id' => 2], // Fun
            ['review_id' => 121, 'emotion_id' => 1], // Joy

            // 122: EA SPORTS FC 26
            ['review_id' => 122, 'emotion_id' => 8], // Nostalgia
            ['review_id' => 122, 'emotion_id' => 3], // Satisfaction

            // 123: Overwatch 2
            ['review_id' => 123, 'emotion_id' => 12], // Tension
            ['review_id' => 123, 'emotion_id' => 13], // Frustration

            // 124: Gone Home
            ['review_id' => 124, 'emotion_id' => 6], // Curiosity
            ['review_id' => 124, 'emotion_id' => 8], // Nostalgia

            // 125: Littlewood
            ['review_id' => 125, 'emotion_id' => 5], // Relaxation
            ['review_id' => 125, 'emotion_id' => 8], // Nostalgia

            // 126: Virginia
            ['review_id' => 126, 'emotion_id' => 6], // Curiosity
            ['review_id' => 126, 'emotion_id' => 7], // Inspiration



            // catPlayer

            // 127: Stray
            ['review_id' => 127, 'emotion_id' => 1], // Joy
            ['review_id' => 127, 'emotion_id' => 5], // Relaxation

            // 128: Spiritfarer
            ['review_id' => 128, 'emotion_id' => 10], // Sadness
            ['review_id' => 128, 'emotion_id' => 9],  // Melancholy

            // 129: Edith Finch
            ['review_id' => 129, 'emotion_id' => 10], // Sadness
            ['review_id' => 129, 'emotion_id' => 9],  // Melancholy

            // 130: Night in the Woods
            ['review_id' => 130, 'emotion_id' => 9], // Melancholy
            ['review_id' => 130, 'emotion_id' => 8], // Nostalgia

            // 131: Firewatch
            ['review_id' => 131, 'emotion_id' => 9], // Melancholy
            ['review_id' => 131, 'emotion_id' => 8], // Nostalgia

            // 132: Oxenfree
            ['review_id' => 132, 'emotion_id' => 6],  // Curiosity
            ['review_id' => 132, 'emotion_id' => 12], // Tension

            // 133: Gone Home
            ['review_id' => 133, 'emotion_id' => 8], // Nostalgia
            ['review_id' => 133, 'emotion_id' => 6], // Curiosity

            // 134: Brothers: A Tale of Two Sons
            ['review_id' => 134, 'emotion_id' => 10], // Sadness
            ['review_id' => 134, 'emotion_id' => 4],  // Hope

            // 135: The Wolf Among Us
            ['review_id' => 135, 'emotion_id' => 12], // Tension
            ['review_id' => 135, 'emotion_id' => 6],  // Curiosity

            // 136: A Short Hike
            ['review_id' => 136, 'emotion_id' => 5], // Relaxation
            ['review_id' => 136, 'emotion_id' => 1], // Joy

            // 137: Unpacking
            ['review_id' => 137, 'emotion_id' => 5], // Relaxation
            ['review_id' => 137, 'emotion_id' => 8], // Nostalgia

            // 138: Dave the Diver
            ['review_id' => 138, 'emotion_id' => 2], // Fun
            ['review_id' => 138, 'emotion_id' => 3], // Satisfaction

            // 139: Dredge
            ['review_id' => 139, 'emotion_id' => 6],  // Curiosity
            ['review_id' => 139, 'emotion_id' => 12], // Tension

            // 140: Detroit: Become Human
            ['review_id' => 140, 'emotion_id' => 12], // Tension
            ['review_id' => 140, 'emotion_id' => 4],  // Hope

            // 141: Call of the Sea
            ['review_id' => 141, 'emotion_id' => 6], // Curiosity
            ['review_id' => 141, 'emotion_id' => 7], // Inspiration

            // 142: Rust
            ['review_id' => 142, 'emotion_id' => 12], // Tension
            ['review_id' => 142, 'emotion_id' => 14], // Anger

            // 143: ARK: Survival Evolved
            ['review_id' => 143, 'emotion_id' => 6], // Curiosity
            ['review_id' => 143, 'emotion_id' => 3], // Satisfaction

            // 144: 7 Days to Die
            ['review_id' => 144, 'emotion_id' => 11], // Fear
            ['review_id' => 144, 'emotion_id' => 12], // Tension



            // pixelNacho

            // 145: Hollow Knight
            ['review_id' => 145, 'emotion_id' => 9], // Melancholy
            ['review_id' => 145, 'emotion_id' => 7], // Inspiration

            // 146: Celeste
            ['review_id' => 146, 'emotion_id' => 4], // Hope
            ['review_id' => 146, 'emotion_id' => 7], // Inspiration

            // 147: Dead Cells
            ['review_id' => 147, 'emotion_id' => 2], // Fun
            ['review_id' => 147, 'emotion_id' => 3], // Satisfaction

            // 148: Cuphead
            ['review_id' => 148, 'emotion_id' => 13], // Frustration
            ['review_id' => 148, 'emotion_id' => 14], // Anger

            // 149: Ori and the Will of the Wisps
            ['review_id' => 149, 'emotion_id' => 1], // Joy
            ['review_id' => 149, 'emotion_id' => 7], // Inspiration

            // 150: Katana ZERO
            ['review_id' => 150, 'emotion_id' => 3],  // Satisfaction
            ['review_id' => 150, 'emotion_id' => 12], // Tension

            // 151: Blasphemous
            ['review_id' => 151, 'emotion_id' => 12], // Tension
            ['review_id' => 151, 'emotion_id' => 11], // Fear

            // 152: Metroid Dread
            ['review_id' => 152, 'emotion_id' => 12], // Tension
            ['review_id' => 152, 'emotion_id' => 11], // Fear

            // 153: Axiom Verge
            ['review_id' => 153, 'emotion_id' => 6], // Curiosity
            ['review_id' => 153, 'emotion_id' => 8], // Nostalgia

            // 154: Guacamelee! 2
            ['review_id' => 154, 'emotion_id' => 2], // Fun
            ['review_id' => 154, 'emotion_id' => 1], // Joy

            // 155: Spelunky 2
            ['review_id' => 155, 'emotion_id' => 13], // Frustration
            ['review_id' => 155, 'emotion_id' => 14], // Anger

            // 156: Hades
            ['review_id' => 156, 'emotion_id' => 2], // Fun
            ['review_id' => 156, 'emotion_id' => 3], // Satisfaction

            // 157: The Binding of Isaac: Rebirth
            ['review_id' => 157, 'emotion_id' => 6],  // Curiosity
            ['review_id' => 157, 'emotion_id' => 11], // Fear

            // 158: Returnal
            ['review_id' => 158, 'emotion_id' => 12], // Tension
            ['review_id' => 158, 'emotion_id' => 13], // Frustration

            // 159: Portal 2
            ['review_id' => 159, 'emotion_id' => 2], // Fun
            ['review_id' => 159, 'emotion_id' => 6], // Curiosity

            // 160: Crusader Kings III
            ['review_id' => 160, 'emotion_id' => 13], // Frustration
            ['review_id' => 160, 'emotion_id' => 6],  // Curiosity

            // 161: Microsoft Flight Simulator 2020
            ['review_id' => 161, 'emotion_id' => 5], // Relaxation
            ['review_id' => 161, 'emotion_id' => 6], // Curiosity

            // 162: Anno 1800
            ['review_id' => 162, 'emotion_id' => 5], // Relaxation
            ['review_id' => 162, 'emotion_id' => 3], // Satisfaction



            // jnavarro

            // 163: Civilization VI
            ['review_id' => 163, 'emotion_id' => 6], // Curiosity
            ['review_id' => 163, 'emotion_id' => 3], // Satisfaction

            // 164: Crusader Kings III
            ['review_id' => 164, 'emotion_id' => 6],  // Curiosity
            ['review_id' => 164, 'emotion_id' => 13], // Frustration

            // 165: Stellaris
            ['review_id' => 165, 'emotion_id' => 6], // Curiosity
            ['review_id' => 165, 'emotion_id' => 7], // Inspiration

            // 166: Total War: WARHAMMER III
            ['review_id' => 166, 'emotion_id' => 2],  // Fun
            ['review_id' => 166, 'emotion_id' => 12], // Tension

            // 167: XCOM 2
            ['review_id' => 167, 'emotion_id' => 12], // Tension
            ['review_id' => 167, 'emotion_id' => 13], // Frustration

            // 168: Into the Breach
            ['review_id' => 168, 'emotion_id' => 3], // Satisfaction
            ['review_id' => 168, 'emotion_id' => 6], // Curiosity

            // 169: Frostpunk
            ['review_id' => 169, 'emotion_id' => 12], // Tension
            ['review_id' => 169, 'emotion_id' => 9],  // Melancholy

            // 170: RimWorld
            ['review_id' => 170, 'emotion_id' => 6],  // Curiosity
            ['review_id' => 170, 'emotion_id' => 13], // Frustration

            // 171: Anno 1800
            ['review_id' => 171, 'emotion_id' => 5], // Relaxation
            ['review_id' => 171, 'emotion_id' => 3], // Satisfaction

            // 172: Cities: Skylines
            ['review_id' => 172, 'emotion_id' => 5], // Relaxation
            ['review_id' => 172, 'emotion_id' => 3], // Satisfaction

            // 173: Age of Empires IV
            ['review_id' => 173, 'emotion_id' => 2], // Fun
            ['review_id' => 173, 'emotion_id' => 3], // Satisfaction

            // 174: StarCraft II
            ['review_id' => 174, 'emotion_id' => 12], // Tension
            ['review_id' => 174, 'emotion_id' => 13], // Frustration

            // 175: Company of Heroes 3
            ['review_id' => 175, 'emotion_id' => 12], // Tension
            ['review_id' => 175, 'emotion_id' => 13], // Frustration

            // 176: Factorio
            ['review_id' => 176, 'emotion_id' => 3],  // Satisfaction
            ['review_id' => 176, 'emotion_id' => 13], // Frustration

            // 177: Satisfactory
            ['review_id' => 177, 'emotion_id' => 5], // Relaxation
            ['review_id' => 177, 'emotion_id' => 3], // Satisfaction

            // 178: Coffee Talk
            ['review_id' => 178, 'emotion_id' => 5], // Relaxation
            ['review_id' => 178, 'emotion_id' => 8], // Nostalgia

            // 179: Unpacking
            ['review_id' => 179, 'emotion_id' => 5], // Relaxation
            ['review_id' => 179, 'emotion_id' => 8], // Nostalgia

            // 180: Oxenfree
            ['review_id' => 180, 'emotion_id' => 12], // Tension
            ['review_id' => 180, 'emotion_id' => 6],  // Curiosity



            // lucia_m

            // 181: Call of Cthulhu
            ['review_id' => 181, 'emotion_id' => 11], // Fear
            ['review_id' => 181, 'emotion_id' => 6],  // Curiosity

            // 182: Sherlock Holmes: Chapter One
            ['review_id' => 182, 'emotion_id' => 6], // Curiosity
            ['review_id' => 182, 'emotion_id' => 3], // Satisfaction

            // 183: Return Of The Obra Dinn
            ['review_id' => 183, 'emotion_id' => 6], // Curiosity
            ['review_id' => 183, 'emotion_id' => 3], // Satisfaction

            // 184: Sherlock Holmes The Awakened
            ['review_id' => 184, 'emotion_id' => 12], // Tension
            ['review_id' => 184, 'emotion_id' => 11], // Fear

            // 185: Alan Wake
            ['review_id' => 185, 'emotion_id' => 12], // Tension
            ['review_id' => 185, 'emotion_id' => 11], // Fear

            // 186: The Wolf Among Us
            ['review_id' => 186, 'emotion_id' => 12], // Tension
            ['review_id' => 186, 'emotion_id' => 6],  // Curiosity

            // 187: Disco Elysium
            ['review_id' => 187, 'emotion_id' => 6], // Curiosity
            ['review_id' => 187, 'emotion_id' => 7], // Inspiration

            // 188: SOMA
            ['review_id' => 188, 'emotion_id' => 11], // Fear
            ['review_id' => 188, 'emotion_id' => 9],  // Melancholy

            // 189: Silent Hill 2
            ['review_id' => 189, 'emotion_id' => 11], // Fear
            ['review_id' => 189, 'emotion_id' => 9],  // Melancholy

            // 190: Portal 2
            ['review_id' => 190, 'emotion_id' => 2], // Fun
            ['review_id' => 190, 'emotion_id' => 3], // Satisfaction

            // 191: Thimbleweed Park
            ['review_id' => 191, 'emotion_id' => 8], // Nostalgia
            ['review_id' => 191, 'emotion_id' => 2], // Fun

            // 192: Return to Monkey Island
            ['review_id' => 192, 'emotion_id' => 8], // Nostalgia
            ['review_id' => 192, 'emotion_id' => 1], // Joy

            // 193: What Remains of Edith Finch
            ['review_id' => 193, 'emotion_id' => 10], // Sadness
            ['review_id' => 193, 'emotion_id' => 9],  // Melancholy

            // 194: Detroit: Become Human
            ['review_id' => 194, 'emotion_id' => 12], // Tension
            ['review_id' => 194, 'emotion_id' => 4],  // Hope

            // 195: Heavy Rain
            ['review_id' => 195, 'emotion_id' => 12], // Tension
            ['review_id' => 195, 'emotion_id' => 10], // Sadness

            // 196: Call of Duty: Warzone
            ['review_id' => 196, 'emotion_id' => 12], // Tension
            ['review_id' => 196, 'emotion_id' => 14], // Anger

            // 197: Counter-Strike 2
            ['review_id' => 197, 'emotion_id' => 12], // Tension
            ['review_id' => 197, 'emotion_id' => 14], // Anger

            // 198: Mortal Kombat 1
            ['review_id' => 198, 'emotion_id' => 14], // Anger
            ['review_id' => 198, 'emotion_id' => 2],  // Fun



            // pabloc

            // 199: The Witcher 3
            ['review_id' => 199, 'emotion_id' => 6], // Curiosity
            ['review_id' => 199, 'emotion_id' => 7], // Inspiration

            // 200: Skyrim
            ['review_id' => 200, 'emotion_id' => 8], // Nostalgia
            ['review_id' => 200, 'emotion_id' => 6], // Curiosity

            // 201: Fallout: New Vegas
            ['review_id' => 201, 'emotion_id' => 8], // Nostalgia
            ['review_id' => 201, 'emotion_id' => 7], // Inspiration

            // 202: NieR:Automata
            ['review_id' => 202, 'emotion_id' => 9], // Melancholy
            ['review_id' => 202, 'emotion_id' => 7], // Inspiration

            // 203: Kingdom Come: Deliverance
            ['review_id' => 203, 'emotion_id' => 12], // Tension
            ['review_id' => 203, 'emotion_id' => 3],  // Satisfaction

            // 204: Cyberpunk 2077
            ['review_id' => 204, 'emotion_id' => 3], // Satisfaction
            ['review_id' => 204, 'emotion_id' => 7], // Inspiration

            // 205: Mass Effect: Legendary Edition
            ['review_id' => 205, 'emotion_id' => 4], // Hope
            ['review_id' => 205, 'emotion_id' => 7], // Inspiration

            // 206: Ghost of Tsushima
            ['review_id' => 206, 'emotion_id' => 5], // Relaxation
            ['review_id' => 206, 'emotion_id' => 7], // Inspiration

            // 207: Horizon Zero Dawn
            ['review_id' => 207, 'emotion_id' => 6], // Curiosity
            ['review_id' => 207, 'emotion_id' => 4], // Hope

            // 208: Red Dead Redemption 2
            ['review_id' => 208, 'emotion_id' => 9],  // Melancholy
            ['review_id' => 208, 'emotion_id' => 10], // Sadness

            // 209: Starfield
            ['review_id' => 209, 'emotion_id' => 6], // Curiosity
            ['review_id' => 209, 'emotion_id' => 3], // Satisfaction

            // 210: The Outer Worlds 2
            ['review_id' => 210, 'emotion_id' => 4], // Hope
            ['review_id' => 210, 'emotion_id' => 2], // Fun

            // 211: Diablo IV
            ['review_id' => 211, 'emotion_id' => 12], // Tension
            ['review_id' => 211, 'emotion_id' => 3],  // Satisfaction

            // 212: NBA 2K26
            ['review_id' => 212, 'emotion_id' => 2], // Fun
            ['review_id' => 212, 'emotion_id' => 3], // Satisfaction

            // 213: Elden Ring
            ['review_id' => 213, 'emotion_id' => 12], // Tension
            ['review_id' => 213, 'emotion_id' => 13], // Frustration

            // 214: Dorfromantik
            ['review_id' => 214, 'emotion_id' => 5], // Relaxation
            ['review_id' => 214, 'emotion_id' => 3], // Satisfaction

            // 215: Cozy Grove
            ['review_id' => 215, 'emotion_id' => 5], // Relaxation
            ['review_id' => 215, 'emotion_id' => 1], // Joy

            // 216: Littlewood
            ['review_id' => 216, 'emotion_id' => 5], // Relaxation
            ['review_id' => 216, 'emotion_id' => 8], // Nostalgia



            // elenaRz

            // 217: Botany Manor
            ['review_id' => 217, 'emotion_id' => 5], // Relaxation
            ['review_id' => 217, 'emotion_id' => 6], // Curiosity

            // 218: Call of the Sea
            ['review_id' => 218, 'emotion_id' => 6], // Curiosity
            ['review_id' => 218, 'emotion_id' => 8], // Nostalgia

            // 219: Portal 2
            ['review_id' => 219, 'emotion_id' => 2], // Fun
            ['review_id' => 219, 'emotion_id' => 3], // Satisfaction

            // 220: Return Of The Obra Dinn
            ['review_id' => 220, 'emotion_id' => 6], // Curiosity
            ['review_id' => 220, 'emotion_id' => 12], // Tension

            // 221: The Stanley Parable
            ['review_id' => 221, 'emotion_id' => 6], // Curiosity
            ['review_id' => 221, 'emotion_id' => 7], // Inspiration

            // 222: What Remains of Edith Finch
            ['review_id' => 222, 'emotion_id' => 10], // Sadness
            ['review_id' => 222, 'emotion_id' => 9], // Melancholy

            // 223: Inscryption
            ['review_id' => 223, 'emotion_id' => 11], // Fear
            ['review_id' => 223, 'emotion_id' => 6], // Curiosity

            // 224: The Wolf Among Us
            ['review_id' => 224, 'emotion_id' => 12], // Tension
            ['review_id' => 224, 'emotion_id' => 6], // Curiosity

            // 225: Brothers: A Tale of Two Sons
            ['review_id' => 225, 'emotion_id' => 10], // Sadness
            ['review_id' => 225, 'emotion_id' => 4], // Hope

            // 226: Stray
            ['review_id' => 226, 'emotion_id' => 1], // Joy
            ['review_id' => 226, 'emotion_id' => 9], // Melancholy

            // 227: Unpacking
            ['review_id' => 227, 'emotion_id' => 8], // Nostalgia
            ['review_id' => 227, 'emotion_id' => 3], // Satisfaction

            // 228: Disco Elysium
            ['review_id' => 228, 'emotion_id' => 9], // Melancholy
            ['review_id' => 228, 'emotion_id' => 6], // Curiosity

            // 229: A Short Hike
            ['review_id' => 229, 'emotion_id' => 1], // Joy
            ['review_id' => 229, 'emotion_id' => 7], // Inspiration

            // 230: Oxenfree
            ['review_id' => 230, 'emotion_id' => 12], // Tension
            ['review_id' => 230, 'emotion_id' => 8], // Nostalgia

            // 231: Thimbleweed Park
            ['review_id' => 231, 'emotion_id' => 8], // Nostalgia
            ['review_id' => 231, 'emotion_id' => 2], // Fun

            // 232: Diablo IV
            ['review_id' => 232, 'emotion_id' => 12], // Tension
            ['review_id' => 232, 'emotion_id' => 3], // Satisfaction

            // 233: Battlefield 2042
            ['review_id' => 233, 'emotion_id' => 12], // Tension
            ['review_id' => 233, 'emotion_id' => 14], // Anger

            // 234: Rust
            ['review_id' => 234, 'emotion_id' => 14], // Anger
            ['review_id' => 234, 'emotion_id' => 13], // Frustration



            // andres_m

            // 235: Factorio
            ['review_id' => 235, 'emotion_id' => 3], // Satisfaction
            ['review_id' => 235, 'emotion_id' => 13], // Frustration

            // 236: Satisfactory
            ['review_id' => 236, 'emotion_id' => 3], // Satisfaction
            ['review_id' => 236, 'emotion_id' => 7], // Inspiration

            // 237: RimWorld
            ['review_id' => 237, 'emotion_id' => 6], // Curiosity
            ['review_id' => 237, 'emotion_id' => 7], // Inspiration

            // 238: Cities: Skylines
            ['review_id' => 238, 'emotion_id' => 5], // Relaxation
            ['review_id' => 238, 'emotion_id' => 3], // Satisfaction

            // 239: Anno 1800
            ['review_id' => 239, 'emotion_id' => 5], // Relaxation
            ['review_id' => 239, 'emotion_id' => 8], // Nostalgia

            // 240: Planet Zoo
            ['review_id' => 240, 'emotion_id' => 1], // Joy
            ['review_id' => 240, 'emotion_id' => 7], // Inspiration

            // 241: Planet Coaster
            ['review_id' => 241, 'emotion_id' => 1], // Joy
            ['review_id' => 241, 'emotion_id' => 7], // Inspiration

            // 242: Dwarf Fortress
            ['review_id' => 242, 'emotion_id' => 6], // Curiosity
            ['review_id' => 242, 'emotion_id' => 13], // Frustration

            // 243: Banished
            ['review_id' => 243, 'emotion_id' => 12], // Tension
            ['review_id' => 243, 'emotion_id' => 3], // Satisfaction

            // 244: Frostpunk
            ['review_id' => 244, 'emotion_id' => 12], // Tension
            ['review_id' => 244, 'emotion_id' => 9], // Melancholy

            // 245: Civilization VI
            ['review_id' => 245, 'emotion_id' => 6], // Curiosity
            ['review_id' => 245, 'emotion_id' => 3], // Satisfaction

            // 246: Euro Truck Simulator 2
            ['review_id' => 246, 'emotion_id' => 5], // Relaxation
            ['review_id' => 246, 'emotion_id' => 3], // Satisfaction

            // 247: Farming Simulator 22
            ['review_id' => 247, 'emotion_id' => 5], // Relaxation
            ['review_id' => 247, 'emotion_id' => 8], // Nostalgia

            // 248: Stellaris
            ['review_id' => 248, 'emotion_id' => 6], // Curiosity
            ['review_id' => 248, 'emotion_id' => 7], // Inspiration

            // 249: Project Zomboid
            ['review_id' => 249, 'emotion_id' => 11], // Fear
            ['review_id' => 249, 'emotion_id' => 12], // Tension

            // 250: Heavy Rain
            ['review_id' => 250, 'emotion_id' => 12], // Tension
            ['review_id' => 250, 'emotion_id' => 10], // Sadness

            // 251: The Wolf Among Us
            ['review_id' => 251, 'emotion_id' => 12], // Tension
            ['review_id' => 251, 'emotion_id' => 6], // Curiosity

            // 252: Beyond: Two Souls
            ['review_id' => 252, 'emotion_id' => 4], // Hope
            ['review_id' => 252, 'emotion_id' => 10], // Sadness



            // irenec

            // 253: Spiritfarer
            ['review_id' => 253, 'emotion_id' => 10], // Sadness
            ['review_id' => 253, 'emotion_id' => 4], // Hope

            // 254: Gone Home
            ['review_id' => 254, 'emotion_id' => 8], // Nostalgia
            ['review_id' => 254, 'emotion_id' => 6], // Curiosity

            // 255: Edith Finch
            ['review_id' => 255, 'emotion_id' => 10], // Sadness
            ['review_id' => 255, 'emotion_id' => 9], // Melancholy

            // 256: Firewatch
            ['review_id' => 256, 'emotion_id' => 9], // Melancholy
            ['review_id' => 256, 'emotion_id' => 8], // Nostalgia

            // 257: Night in the Woods
            ['review_id' => 257, 'emotion_id' => 9], // Melancholy
            ['review_id' => 257, 'emotion_id' => 4], // Hope

            // 258: Brothers
            ['review_id' => 258, 'emotion_id' => 10], // Sadness
            ['review_id' => 258, 'emotion_id' => 4], // Hope

            // 259: Detroit
            ['review_id' => 259, 'emotion_id' => 6], // Curiosity
            ['review_id' => 259, 'emotion_id' => 4], // Hope

            // 260: Heavy Rain
            ['review_id' => 260, 'emotion_id' => 12], // Tension
            ['review_id' => 260, 'emotion_id' => 10], // Sadness

            // 261: Stray
            ['review_id' => 261, 'emotion_id' => 1], // Joy
            ['review_id' => 261, 'emotion_id' => 9], // Melancholy

            // 262: A Short Hike
            ['review_id' => 262, 'emotion_id' => 1], // Joy
            ['review_id' => 262, 'emotion_id' => 5], // Relaxation

            // 263: Oxenfree
            ['review_id' => 263, 'emotion_id' => 12], // Tension
            ['review_id' => 263, 'emotion_id' => 8], // Nostalgia

            // 264: The Last of Us Part I
            ['review_id' => 264, 'emotion_id' => 10], // Sadness
            ['review_id' => 264, 'emotion_id' => 4], // Hope

            // 265: Unpacking
            ['review_id' => 265, 'emotion_id' => 8], // Nostalgia
            ['review_id' => 265, 'emotion_id' => 5], // Relaxation

            // 266: Disco Elysium
            ['review_id' => 266, 'emotion_id' => 6], // Curiosity
            ['review_id' => 266, 'emotion_id' => 9], // Melancholy

            // 267: Beyond: Two Souls
            ['review_id' => 267, 'emotion_id' => 4], // Hope
            ['review_id' => 267, 'emotion_id' => 7], // Inspiration

            // 268: DOOM Eternal
            ['review_id' => 268, 'emotion_id' => 2], // Fun
            ['review_id' => 268, 'emotion_id' => 12], // Tension

            // 269: Tekken 8
            ['review_id' => 269, 'emotion_id' => 12], // Tension
            ['review_id' => 269, 'emotion_id' => 3], // Satisfaction

            // 270: Apex Legends
            ['review_id' => 270, 'emotion_id' => 2], // Fun
            ['review_id' => 270, 'emotion_id' => 12], // Tension



            // oscarDG

            // 271: DOOM Eternal
            ['review_id' => 271, 'emotion_id' => 2], // Fun
            ['review_id' => 271, 'emotion_id' => 12], // Tension

            // 272: Halo Infinite
            ['review_id' => 272, 'emotion_id' => 2], // Fun
            ['review_id' => 272, 'emotion_id' => 3], // Satisfaction

            // 273: Half-Life: Alyx
            ['review_id' => 273, 'emotion_id' => 6], // Curiosity
            ['review_id' => 273, 'emotion_id' => 7], // Inspiration

            // 274: Metro Exodus
            ['review_id' => 274, 'emotion_id' => 12], // Tension
            ['review_id' => 274, 'emotion_id' => 9], // Melancholy

            // 275: Need for Speed Unbound
            ['review_id' => 275, 'emotion_id' => 2], // Fun
            ['review_id' => 275, 'emotion_id' => 1], // Joy

            // 276: Battlefield 2042
            ['review_id' => 276, 'emotion_id' => 12], // Tension
            ['review_id' => 276, 'emotion_id' => 14], // Anger

            // 277: Deathloop
            ['review_id' => 277, 'emotion_id' => 2], // Fun
            ['review_id' => 277, 'emotion_id' => 6], // Curiosity

            // 278: Borderlands 3
            ['review_id' => 278, 'emotion_id' => 2], // Fun
            ['review_id' => 278, 'emotion_id' => 1], // Joy

            // 279: Overwatch 2
            ['review_id' => 279, 'emotion_id' => 2], // Fun
            ['review_id' => 279, 'emotion_id' => 12], // Tension

            // 280: Apex Legends
            ['review_id' => 280, 'emotion_id' => 2], // Fun
            ['review_id' => 280, 'emotion_id' => 12], // Tension

            // 281: Warzone
            ['review_id' => 281, 'emotion_id' => 12], // Tension
            ['review_id' => 281, 'emotion_id' => 14], // Anger

            // 282: Cyberpunk 2077
            ['review_id' => 282, 'emotion_id' => 6], // Curiosity
            ['review_id' => 282, 'emotion_id' => 7], // Inspiration

            // 283: Dying Light (The Following)
            ['review_id' => 283, 'emotion_id' => 12], // Tension
            ['review_id' => 283, 'emotion_id' => 11], // Fear

            // 284: Tekken 8
            ['review_id' => 284, 'emotion_id' => 3], // Satisfaction
            ['review_id' => 284, 'emotion_id' => 12], // Tension

            // 285: Counter-Strike 2
            ['review_id' => 285, 'emotion_id' => 12], // Tension
            ['review_id' => 285, 'emotion_id' => 14], // Anger

            // 286: Cozy Grove
            ['review_id' => 286, 'emotion_id' => 5], // Relaxation
            ['review_id' => 286, 'emotion_id' => 1], // Joy

            // 287: Coffee Talk
            ['review_id' => 287, 'emotion_id' => 5], // Relaxation
            ['review_id' => 287, 'emotion_id' => 8], // Nostalgia

            // 288: Unpacking
            ['review_id' => 288, 'emotion_id' => 8], // Nostalgia
            ['review_id' => 288, 'emotion_id' => 3], // Satisfaction



            // hectors

            // 289: DayZ
            ['review_id' => 289, 'emotion_id' => 12], // Tension
            ['review_id' => 289, 'emotion_id' => 11], // Fear

            // 290: Rust
            ['review_id' => 290, 'emotion_id' => 14], // Anger
            ['review_id' => 290, 'emotion_id' => 12], // Tension

            // 291: ARK
            ['review_id' => 291, 'emotion_id' => 6], // Curiosity
            ['review_id' => 291, 'emotion_id' => 3], // Satisfaction

            // 292: 7 Days to Die
            ['review_id' => 292, 'emotion_id' => 12], // Tension
            ['review_id' => 292, 'emotion_id' => 13], // Frustration

            // 293: The Forest
            ['review_id' => 293, 'emotion_id' => 11], // Fear
            ['review_id' => 293, 'emotion_id' => 12], // Tension

            // 294: Dying Light (The Following)
            ['review_id' => 294, 'emotion_id' => 2], // Fun
            ['review_id' => 294, 'emotion_id' => 12], // Tension

            // 295: Project Zomboid
            ['review_id' => 295, 'emotion_id' => 11], // Fear
            ['review_id' => 295, 'emotion_id' => 12], // Tension

            // 296: Valheim
            ['review_id' => 296, 'emotion_id' => 3], // Satisfaction
            ['review_id' => 296, 'emotion_id' => 5], // Relaxation

            // 297: Terraria
            ['review_id' => 297, 'emotion_id' => 2], // Fun
            ['review_id' => 297, 'emotion_id' => 6], // Curiosity

            // 298: Minecraft
            ['review_id' => 298, 'emotion_id' => 5], // Relaxation
            ['review_id' => 298, 'emotion_id' => 6], // Curiosity

            // 299: Subnautica
            ['review_id' => 299, 'emotion_id' => 6], // Curiosity
            ['review_id' => 299, 'emotion_id' => 11], // Fear

            // 300: The Long Dark
            ['review_id' => 300, 'emotion_id' => 12], // Tension
            ['review_id' => 300, 'emotion_id' => 9], // Melancholy

            // 301: Phasmophobia
            ['review_id' => 301, 'emotion_id' => 11], // Fear
            ['review_id' => 301, 'emotion_id' => 2], // Fun

            // 302: Grounded
            ['review_id' => 302, 'emotion_id' => 6], // Curiosity
            ['review_id' => 302, 'emotion_id' => 2], // Fun

            // 303: Raft
            ['review_id' => 303, 'emotion_id' => 5], // Relaxation
            ['review_id' => 303, 'emotion_id' => 4], // Hope

            // 304: Detroit
            ['review_id' => 304, 'emotion_id' => 6], // Curiosity
            ['review_id' => 304, 'emotion_id' => 4], // Hope

            // 305: Virginia
            ['review_id' => 305, 'emotion_id' => 6], // Curiosity
            ['review_id' => 305, 'emotion_id' => 9], // Melancholy

            // 306: Unpacking
            ['review_id' => 306, 'emotion_id' => 8], // Nostalgia
            ['review_id' => 306, 'emotion_id' => 5], // Relaxation



            // marta_k

            // 307: Stardew Valley
            ['review_id' => 307, 'emotion_id' => 5], // Relaxation
            ['review_id' => 307, 'emotion_id' => 4], // Hope

            // 308: Cozy Grove
            ['review_id' => 308, 'emotion_id' => 5], // Relaxation
            ['review_id' => 308, 'emotion_id' => 8], // Nostalgia

            // 309: Disney Dreamlight Valley
            ['review_id' => 309, 'emotion_id' => 1], // Joy
            ['review_id' => 309, 'emotion_id' => 4], // Hope

            // 310: Dorfromantik
            ['review_id' => 310, 'emotion_id' => 5], // Relaxation
            ['review_id' => 310, 'emotion_id' => 3], // Satisfaction

            // 311: Coffee Talk
            ['review_id' => 311, 'emotion_id' => 5], // Relaxation
            ['review_id' => 311, 'emotion_id' => 8], // Nostalgia

            // 312: Potion Permit
            ['review_id' => 312, 'emotion_id' => 3], // Satisfaction
            ['review_id' => 312, 'emotion_id' => 4], // Hope

            // 313: Botany Manor
            ['review_id' => 313, 'emotion_id' => 5], // Relaxation
            ['review_id' => 313, 'emotion_id' => 6], // Curiosity

            // 314: Ooblets
            ['review_id' => 314, 'emotion_id' => 2], // Fun
            ['review_id' => 314, 'emotion_id' => 1], // Joy

            // 315: A Short Hike
            ['review_id' => 315, 'emotion_id' => 7], // Inspiration
            ['review_id' => 315, 'emotion_id' => 1], // Joy

            // 316: Palia
            ['review_id' => 316, 'emotion_id' => 4], // Hope
            ['review_id' => 316, 'emotion_id' => 1], // Joy

            // 317: Animal Crossing: New Horizons
            ['review_id' => 317, 'emotion_id' => 5], // Relaxation
            ['review_id' => 317, 'emotion_id' => 8], // Nostalgia

            // 318: Planet Zoo
            ['review_id' => 318, 'emotion_id' => 7], // Inspiration
            ['review_id' => 318, 'emotion_id' => 1], // Joy

            // 319: Unpacking
            ['review_id' => 319, 'emotion_id' => 8], // Nostalgia
            ['review_id' => 319, 'emotion_id' => 3], // Satisfaction

            // 320: Dave the Diver
            ['review_id' => 320, 'emotion_id' => 2], // Fun
            ['review_id' => 320, 'emotion_id' => 3], // Satisfaction

            // 321: It Takes Two
            ['review_id' => 321, 'emotion_id' => 2], // Fun
            ['review_id' => 321, 'emotion_id' => 1], // Joy

            // 322: DOOM Eternal
            ['review_id' => 322, 'emotion_id' => 2], // Fun
            ['review_id' => 322, 'emotion_id' => 12], // Tension

            // 323: Outlast
            ['review_id' => 323, 'emotion_id' => 11], // Fear
            ['review_id' => 323, 'emotion_id' => 12], // Tension

            // 324: DayZ
            ['review_id' => 324, 'emotion_id' => 11], // Fear
            ['review_id' => 324, 'emotion_id' => 12], // Tension



            // patriV

            // 325: Animal Crossing: New Horizons
            ['review_id' => 325, 'emotion_id' => 5], // Relaxation
            ['review_id' => 325, 'emotion_id' => 8], // Nostalgia

            // 326: Palia
            ['review_id' => 326, 'emotion_id' => 4], // Hope
            ['review_id' => 326, 'emotion_id' => 1], // Joy

            // 327: A Short Hike
            ['review_id' => 327, 'emotion_id' => 1], // Joy
            ['review_id' => 327, 'emotion_id' => 5], // Relaxation

            // 328: Ooblets
            ['review_id' => 328, 'emotion_id' => 2], // Fun
            ['review_id' => 328, 'emotion_id' => 1], // Joy

            // 329: Disney Dreamlight Valley
            ['review_id' => 329, 'emotion_id' => 1], // Joy
            ['review_id' => 329, 'emotion_id' => 4], // Hope

            // 330: Mario Kart 8 Deluxe
            ['review_id' => 330, 'emotion_id' => 2], // Fun
            ['review_id' => 330, 'emotion_id' => 8], // Nostalgia

            // 331: Stardew Valley
            ['review_id' => 331, 'emotion_id' => 5], // Relaxation
            ['review_id' => 331, 'emotion_id' => 4], // Hope

            // 332: Cozy Grove
            ['review_id' => 332, 'emotion_id' => 5], // Relaxation
            ['review_id' => 332, 'emotion_id' => 8], // Nostalgia

            // 333: It Takes Two
            ['review_id' => 333, 'emotion_id' => 2], // Fun
            ['review_id' => 333, 'emotion_id' => 1], // Joy

            // 334: Stray
            ['review_id' => 334, 'emotion_id' => 1], // Joy
            ['review_id' => 334, 'emotion_id' => 9], // Melancholy

            // 335: Unpacking
            ['review_id' => 335, 'emotion_id' => 8], // Nostalgia
            ['review_id' => 335, 'emotion_id' => 3], // Satisfaction

            // 336: Dave the Diver
            ['review_id' => 336, 'emotion_id' => 2], // Fun
            ['review_id' => 336, 'emotion_id' => 3], // Satisfaction

            // 337: Split Fiction
            ['review_id' => 337, 'emotion_id' => 6], // Curiosity
            ['review_id' => 337, 'emotion_id' => 2], // Fun

            // 338: Planet Zoo
            ['review_id' => 338, 'emotion_id' => 7], // Inspiration
            ['review_id' => 338, 'emotion_id' => 1], // Joy

            // 339: Coffee Talk
            ['review_id' => 339, 'emotion_id' => 5], // Relaxation
            ['review_id' => 339, 'emotion_id' => 8], // Nostalgia

            // 340: Resident Evil 7
            ['review_id' => 340, 'emotion_id' => 11], // Fear
            ['review_id' => 340, 'emotion_id' => 12], // Tension

            // 341: Dead Space (2008)
            ['review_id' => 341, 'emotion_id' => 11], // Fear
            ['review_id' => 341, 'emotion_id' => 12], // Tension

            // 342: Outlast
            ['review_id' => 342, 'emotion_id' => 11], // Fear
            ['review_id' => 342, 'emotion_id' => 12], // Tension



            // albita

            // 343: Unpacking
            ['review_id' => 343, 'emotion_id' => 8], // Nostalgia
            ['review_id' => 343, 'emotion_id' => 5], // Relaxation

            // 344: Stray
            ['review_id' => 344, 'emotion_id' => 1], // Joy
            ['review_id' => 344, 'emotion_id' => 9], // Melancholy

            // 345: A Short Hike
            ['review_id' => 345, 'emotion_id' => 1], // Joy
            ['review_id' => 345, 'emotion_id' => 7], // Inspiration

            // 346: Spiritfarer
            ['review_id' => 346, 'emotion_id' => 10], // Sadness
            ['review_id' => 346, 'emotion_id' => 4], // Hope

            // 347: Dave the Diver
            ['review_id' => 347, 'emotion_id' => 2], // Fun
            ['review_id' => 347, 'emotion_id' => 3], // Satisfaction

            // 348: Botany Manor
            ['review_id' => 348, 'emotion_id' => 5], // Relaxation
            ['review_id' => 348, 'emotion_id' => 6], // Curiosity

            // 349: Planet Zoo
            ['review_id' => 349, 'emotion_id' => 7], // Inspiration
            ['review_id' => 349, 'emotion_id' => 1], // Joy

            // 350: Call of the Sea
            ['review_id' => 350, 'emotion_id' => 6], // Curiosity
            ['review_id' => 350, 'emotion_id' => 8], // Nostalgia

            // 351: Stardew Valley
            ['review_id' => 351, 'emotion_id' => 5], // Relaxation
            ['review_id' => 351, 'emotion_id' => 4], // Hope

            // 352: Dorfromantik
            ['review_id' => 352, 'emotion_id' => 5], // Relaxation
            ['review_id' => 352, 'emotion_id' => 3], // Satisfaction

            // 353: Kena: Bridge of Spirits
            ['review_id' => 353, 'emotion_id' => 1], // Joy
            ['review_id' => 353, 'emotion_id' => 7], // Inspiration

            // 354: Firewatch
            ['review_id' => 354, 'emotion_id' => 9], // Melancholy
            ['review_id' => 354, 'emotion_id' => 8], // Nostalgia

            // 355: Cozy Grove
            ['review_id' => 355, 'emotion_id' => 5], // Relaxation
            ['review_id' => 355, 'emotion_id' => 8], // Nostalgia

            // 356: It Takes Two
            ['review_id' => 356, 'emotion_id' => 2], // Fun
            ['review_id' => 356, 'emotion_id' => 1], // Joy

            // 357: Mario Kart 8 Deluxe
            ['review_id' => 357, 'emotion_id' => 2], // Fun
            ['review_id' => 357, 'emotion_id' => 1], // Joy

            // 358: DOOM Eternal
            ['review_id' => 358, 'emotion_id' => 2], // Fun
            ['review_id' => 358, 'emotion_id' => 12], // Tension

            // 359: Outlast
            ['review_id' => 359, 'emotion_id' => 11], // Fear
            ['review_id' => 359, 'emotion_id' => 12], // Tension

            // 360: DayZ
            ['review_id' => 360, 'emotion_id' => 11], // Fear
            ['review_id' => 360, 'emotion_id' => 12], // Tension



            // claran

            // 361: Kena
            ['review_id' => 361, 'emotion_id' => 1], // Joy
            ['review_id' => 361, 'emotion_id' => 7], // Inspiration

            // 362: Call of the Sea
            ['review_id' => 362, 'emotion_id' => 6], // Curiosity
            ['review_id' => 362, 'emotion_id' => 8], // Nostalgia

            // 363: Botany Manor
            ['review_id' => 363, 'emotion_id' => 5], // Relaxation
            ['review_id' => 363, 'emotion_id' => 6], // Curiosity

            // 364: Stray
            ['review_id' => 364, 'emotion_id' => 1], // Joy
            ['review_id' => 364, 'emotion_id' => 9], // Melancholy

            // 365: Portal 2
            ['review_id' => 365, 'emotion_id' => 2], // Fun
            ['review_id' => 365, 'emotion_id' => 3], // Satisfaction

            // 366: A Short Hike
            ['review_id' => 366, 'emotion_id' => 1], // Joy
            ['review_id' => 366, 'emotion_id' => 5], // Relaxation

            // 367: Unpacking
            ['review_id' => 367, 'emotion_id' => 8], // Nostalgia
            ['review_id' => 367, 'emotion_id' => 3], // Satisfaction

            // 368: Disney Dreamlight Valley
            ['review_id' => 368, 'emotion_id' => 1], // Joy
            ['review_id' => 368, 'emotion_id' => 4], // Hope

            // 369: Edith Finch
            ['review_id' => 369, 'emotion_id' => 10], // Sadness
            ['review_id' => 369, 'emotion_id' => 9], // Melancholy

            // 370: Firewatch
            ['review_id' => 370, 'emotion_id' => 9], // Melancholy
            ['review_id' => 370, 'emotion_id' => 8], // Nostalgia

            // 371: Animal Crossing
            ['review_id' => 371, 'emotion_id' => 5], // Relaxation
            ['review_id' => 371, 'emotion_id' => 8], // Nostalgia

            // 372: Stardew Valley
            ['review_id' => 372, 'emotion_id' => 5], // Relaxation
            ['review_id' => 372, 'emotion_id' => 4], // Hope

            // 373: Mario Kart 8 Deluxe
            ['review_id' => 373, 'emotion_id' => 2], // Fun
            ['review_id' => 373, 'emotion_id' => 1], // Joy

            // 374: It Takes Two
            ['review_id' => 374, 'emotion_id' => 2], // Fun
            ['review_id' => 374, 'emotion_id' => 1], // Joy

            // 375: Spiritfarer
            ['review_id' => 375, 'emotion_id' => 10], // Sadness
            ['review_id' => 375, 'emotion_id' => 4], // Hope

            // 376: Mortal Kombat 1
            ['review_id' => 376, 'emotion_id' => 14], // Anger
            ['review_id' => 376, 'emotion_id' => 12], // Tension

            // 377: Counter-Strike 2
            ['review_id' => 377, 'emotion_id' => 14], // Anger
            ['review_id' => 377, 'emotion_id' => 12], // Tension

            // 378: Outlast
            ['review_id' => 378, 'emotion_id' => 11], // Fear
            ['review_id' => 378, 'emotion_id' => 12], // Tension



            // rubenAg

            // 379: Hades
            ['review_id' => 379, 'emotion_id' => 2], // Fun
            ['review_id' => 379, 'emotion_id' => 3], // Satisfaction

            // 380: Slay the Spire
            ['review_id' => 380, 'emotion_id' => 6], // Curiosity
            ['review_id' => 380, 'emotion_id' => 3], // Satisfaction

            // 381: The Binding of Isaac
            ['review_id' => 381, 'emotion_id' => 6], // Curiosity
            ['review_id' => 381, 'emotion_id' => 12], // Tension

            // 382: Vampire Survivors
            ['review_id' => 382, 'emotion_id' => 2], // Fun
            ['review_id' => 382, 'emotion_id' => 1], // Joy

            // 383: Risk of Rain 2
            ['review_id' => 383, 'emotion_id' => 12], // Tension
            ['review_id' => 383, 'emotion_id' => 2], // Fun

            // 384: Returnal
            ['review_id' => 384, 'emotion_id' => 12], // Tension
            ['review_id' => 384, 'emotion_id' => 13], // Frustration

            // 385: Dead Cells
            ['review_id' => 385, 'emotion_id' => 2], // Fun
            ['review_id' => 385, 'emotion_id' => 3], // Satisfaction

            // 386: Enter the Gungeon
            ['review_id' => 386, 'emotion_id' => 2], // Fun
            ['review_id' => 386, 'emotion_id' => 12], // Tension

            // 387: Rogue Legacy 2
            ['review_id' => 387, 'emotion_id' => 2], // Fun
            ['review_id' => 387, 'emotion_id' => 3], // Satisfaction

            // 388: Spelunky 2
            ['review_id' => 388, 'emotion_id' => 13], // Frustration
            ['review_id' => 388, 'emotion_id' => 12], // Tension

            // 389: Darkest Dungeon
            ['review_id' => 389, 'emotion_id' => 12], // Tension
            ['review_id' => 389, 'emotion_id' => 9], // Melancholy

            // 390: Cult of the Lamb
            ['review_id' => 390, 'emotion_id' => 2], // Fun
            ['review_id' => 390, 'emotion_id' => 6], // Curiosity

            // 391: Inscryption
            ['review_id' => 391, 'emotion_id' => 6], // Curiosity
            ['review_id' => 391, 'emotion_id' => 11], // Fear

            // 392: DOOM Eternal
            ['review_id' => 392, 'emotion_id' => 12], // Tension
            ['review_id' => 392, 'emotion_id' => 2], // Fun

            // 393: Celeste
            ['review_id' => 393, 'emotion_id' => 4], // Hope
            ['review_id' => 393, 'emotion_id' => 3], // Satisfaction

            // 394: Heavy Rain
            ['review_id' => 394, 'emotion_id' => 12], // Tension
            ['review_id' => 394, 'emotion_id' => 10], // Sadness

            // 395: Gone Home
            ['review_id' => 395, 'emotion_id' => 8], // Nostalgia
            ['review_id' => 395, 'emotion_id' => 6], // Curiosity

            // 396: Virginia
            ['review_id' => 396, 'emotion_id' => 6], // Curiosity
            ['review_id' => 396, 'emotion_id' => 9], // Melancholy



            // sara_iba

            // 397: Disco Elysium
            ['review_id' => 397, 'emotion_id' => 6], // Curiosity
            ['review_id' => 397, 'emotion_id' => 9], // Melancholy

            // 398: Thimbleweed Park
            ['review_id' => 398, 'emotion_id' => 8], // Nostalgia
            ['review_id' => 398, 'emotion_id' => 2], // Fun

            // 399: Return to Monkey Island
            ['review_id' => 399, 'emotion_id' => 8], // Nostalgia
            ['review_id' => 399, 'emotion_id' => 1], // Joy

            // 400: Return Of The Obra Dinn
            ['review_id' => 400, 'emotion_id' => 6], // Curiosity
            ['review_id' => 400, 'emotion_id' => 12], // Tension

            // 401: Sherlock Holmes: Chapter One
            ['review_id' => 401, 'emotion_id' => 6], // Curiosity
            ['review_id' => 401, 'emotion_id' => 3], // Satisfaction

            // 402: The Wolf Among Us
            ['review_id' => 402, 'emotion_id' => 12], // Tension
            ['review_id' => 402, 'emotion_id' => 6], // Curiosity

            // 403: Deponia
            ['review_id' => 403, 'emotion_id' => 2], // Fun
            ['review_id' => 403, 'emotion_id' => 3], // Satisfaction

            // 404: Portal 2
            ['review_id' => 404, 'emotion_id' => 2], // Fun
            ['review_id' => 404, 'emotion_id' => 6], // Curiosity

            // 405: The Stanley Parable
            ['review_id' => 405, 'emotion_id' => 6], // Curiosity
            ['review_id' => 405, 'emotion_id' => 7], // Inspiration

            // 406: Inscryption
            ['review_id' => 406, 'emotion_id' => 6], // Curiosity
            ['review_id' => 406, 'emotion_id' => 11], // Fear

            // 407: Call of Cthulhu
            ['review_id' => 407, 'emotion_id' => 11], // Fear
            ['review_id' => 407, 'emotion_id' => 12], // Tension

            // 408: Alan Wake
            ['review_id' => 408, 'emotion_id' => 12], // Tension
            ['review_id' => 408, 'emotion_id' => 11], // Fear

            // 409: Edith Finch
            ['review_id' => 409, 'emotion_id' => 10], // Sadness
            ['review_id' => 409, 'emotion_id' => 9], // Melancholy

            // 410: Botany Manor
            ['review_id' => 410, 'emotion_id' => 5], // Relaxation
            ['review_id' => 410, 'emotion_id' => 6], // Curiosity

            // 411: Call of the Sea
            ['review_id' => 411, 'emotion_id' => 6], // Curiosity
            ['review_id' => 411, 'emotion_id' => 8], // Nostalgia



            // tomas_h

            // 415: GTA V
            ['review_id' => 415, 'emotion_id' => 2], // Fun
            ['review_id' => 415, 'emotion_id' => 1], // Joy

            // 416: The Last of Us Part II
            ['review_id' => 416, 'emotion_id' => 10], // Sadness
            ['review_id' => 416, 'emotion_id' => 12], // Tension

            // 417: Red Dead Redemption 2
            ['review_id' => 417, 'emotion_id' => 8], // Nostalgia
            ['review_id' => 417, 'emotion_id' => 9], // Melancholy

            // 418: F1 24
            ['review_id' => 418, 'emotion_id' => 2], // Fun
            ['review_id' => 418, 'emotion_id' => 12], // Tension

            // 419: EA SPORTS FC 26
            ['review_id' => 419, 'emotion_id' => 2], // Fun
            ['review_id' => 419, 'emotion_id' => 3], // Satisfaction

            // 420: Alan Wake 2
            ['review_id' => 420, 'emotion_id' => 12], // Tension
            ['review_id' => 420, 'emotion_id' => 6], // Curiosity

            // 421: The Last of Us Part I
            ['review_id' => 421, 'emotion_id' => 10], // Sadness
            ['review_id' => 421, 'emotion_id' => 4], // Hope

            // 422: God of War I
            ['review_id' => 422, 'emotion_id' => 3], // Satisfaction
            ['review_id' => 422, 'emotion_id' => 7], // Inspiration

            // 423: Battlefield 2042
            ['review_id' => 423, 'emotion_id' => 12], // Tension
            ['review_id' => 423, 'emotion_id' => 14], // Anger

            // 424: Forza Horizon 5
            ['review_id' => 424, 'emotion_id' => 2], // Fun
            ['review_id' => 424, 'emotion_id' => 1], // Joy

            // 425: DOOM Eternal
            ['review_id' => 425, 'emotion_id' => 12], // Tension
            ['review_id' => 425, 'emotion_id' => 2], // Fun

            // 426: Cyberpunk 2077
            ['review_id' => 426, 'emotion_id' => 6], // Curiosity
            ['review_id' => 426, 'emotion_id' => 7], // Inspiration

            // 427: Uncharted 4
            ['review_id' => 427, 'emotion_id' => 2], // Fun
            ['review_id' => 427, 'emotion_id' => 3], // Satisfaction

            // 428: NBA 2K26
            ['review_id' => 428, 'emotion_id' => 2], // Fun
            ['review_id' => 428, 'emotion_id' => 3], // Satisfaction

            // 429: Resident Evil 2
            ['review_id' => 429, 'emotion_id' => 11], // Fear
            ['review_id' => 429, 'emotion_id' => 12], // Tension

            // 430: Axiom Verge (no recomendado)
            ['review_id' => 430, 'emotion_id' => 13], // Frustration
            ['review_id' => 430, 'emotion_id' => 6], // Curiosity

            // 431: Crypt of the NecroDancer (no recomendado)
            ['review_id' => 431, 'emotion_id' => 12], // Tension
            ['review_id' => 431, 'emotion_id' => 13], // Frustration

            // 432: Littlewood (no recomendado)
            ['review_id' => 432, 'emotion_id' => 13], // Frustration
            ['review_id' => 432, 'emotion_id' => 10], // Sadness



            // miguelap

            // 433: Frostpunk
            ['review_id' => 433, 'emotion_id' => 12], // Tension
            ['review_id' => 433, 'emotion_id' => 9], // Melancholy

            // 434: RimWorld
            ['review_id' => 434, 'emotion_id' => 6], // Curiosity
            ['review_id' => 434, 'emotion_id' => 7], // Inspiration

            // 435: Banished
            ['review_id' => 435, 'emotion_id' => 12], // Tension
            ['review_id' => 435, 'emotion_id' => 3], // Satisfaction

            // 436: Dwarf Fortress
            ['review_id' => 436, 'emotion_id' => 6], // Curiosity
            ['review_id' => 436, 'emotion_id' => 13], // Frustration

            // 437: Into the Breach
            ['review_id' => 437, 'emotion_id' => 3], // Satisfaction
            ['review_id' => 437, 'emotion_id' => 12], // Tension

            // 438: Darkest Dungeon
            ['review_id' => 438, 'emotion_id' => 11], // Fear
            ['review_id' => 438, 'emotion_id' => 12], // Tension

            // 439: Factorio
            ['review_id' => 439, 'emotion_id' => 3], // Satisfaction
            ['review_id' => 439, 'emotion_id' => 13], // Frustration

            // 440: Civilization VI
            ['review_id' => 440, 'emotion_id' => 6], // Curiosity
            ['review_id' => 440, 'emotion_id' => 3], // Satisfaction

            // 441: Cities: Skylines
            ['review_id' => 441, 'emotion_id' => 5], // Relaxation
            ['review_id' => 441, 'emotion_id' => 7], // Inspiration

            // 442: Slay the Spire
            ['review_id' => 442, 'emotion_id' => 6], // Curiosity
            ['review_id' => 442, 'emotion_id' => 12], // Tension

            // 443: Project Zomboid
            ['review_id' => 443, 'emotion_id' => 11], // Fear
            ['review_id' => 443, 'emotion_id' => 12], // Tension

            // 444: The Long Dark
            ['review_id' => 444, 'emotion_id' => 12], // Tension
            ['review_id' => 444, 'emotion_id' => 9], // Melancholy

            // 445: Anno 1800
            ['review_id' => 445, 'emotion_id' => 5], // Relaxation
            ['review_id' => 445, 'emotion_id' => 3], // Satisfaction

            // 446: Stellaris
            ['review_id' => 446, 'emotion_id' => 6], // Curiosity
            ['review_id' => 446, 'emotion_id' => 7], // Inspiration

            // 447: Hades
            ['review_id' => 447, 'emotion_id' => 2], // Fun
            ['review_id' => 447, 'emotion_id' => 3], // Satisfaction

            // 450: Luigi's Mansion 3 (no recomendado)
            ['review_id' => 450, 'emotion_id' => 2], // Fun
            ['review_id' => 450, 'emotion_id' => 13], // Frustration

            

            // diegolz

            // 451: Half-Life: Alyx
            ['review_id' => 451, 'emotion_id' => 6], // Curiosity
            ['review_id' => 451, 'emotion_id' => 7], // Inspiration

            // 452: Beat Saber
            ['review_id' => 452, 'emotion_id' => 2], // Fun
            ['review_id' => 452, 'emotion_id' => 1], // Joy

            // 453: Boneworks
            ['review_id' => 453, 'emotion_id' => 6], // Curiosity
            ['review_id' => 453, 'emotion_id' => 12], // Tension

            // 454: Moss
            ['review_id' => 454, 'emotion_id' => 1], // Joy
            ['review_id' => 454, 'emotion_id' => 5], // Relaxation

            // 455: DOOM Eternal
            ['review_id' => 455, 'emotion_id' => 12], // Tension
            ['review_id' => 455, 'emotion_id' => 2], // Fun

            // 456: Metro Exodus
            ['review_id' => 456, 'emotion_id' => 12], // Tension
            ['review_id' => 456, 'emotion_id' => 6], // Curiosity

            // 457: Halo Infinite
            ['review_id' => 457, 'emotion_id' => 2], // Fun
            ['review_id' => 457, 'emotion_id' => 3], // Satisfaction

            // 458: Deathloop
            ['review_id' => 458, 'emotion_id' => 2], // Fun
            ['review_id' => 458, 'emotion_id' => 6], // Curiosity

            // 459: Phasmophobia
            ['review_id' => 459, 'emotion_id' => 11], // Fear
            ['review_id' => 459, 'emotion_id' => 12], // Tension

            // 460: Resident Evil 7
            ['review_id' => 460, 'emotion_id' => 11], // Fear
            ['review_id' => 460, 'emotion_id' => 12], // Tension

            // 461: Alien: Isolation
            ['review_id' => 461, 'emotion_id' => 11], // Fear
            ['review_id' => 461, 'emotion_id' => 12], // Tension

            // 462: Overwatch 2
            ['review_id' => 462, 'emotion_id' => 2], // Fun
            ['review_id' => 462, 'emotion_id' => 12], // Tension

            // 463: Portal 2
            ['review_id' => 463, 'emotion_id' => 2], // Fun
            ['review_id' => 463, 'emotion_id' => 6], // Curiosity

            // 464: Inscryption
            ['review_id' => 464, 'emotion_id' => 6], // Curiosity
            ['review_id' => 464, 'emotion_id' => 11], // Fear

            // 465: Counter-Strike 2
            ['review_id' => 465, 'emotion_id' => 12], // Tension
            ['review_id' => 465, 'emotion_id' => 14], // Anger


            // raquelP

            // 469: Tekken 8
            ['review_id' => 469, 'emotion_id' => 12], // Tension
            ['review_id' => 469, 'emotion_id' => 3], // Satisfaction

            // 470: Street Fighter 6
            ['review_id' => 470, 'emotion_id' => 2], // Fun
            ['review_id' => 470, 'emotion_id' => 3], // Satisfaction

            // 471: Guilty Gear -Strive-
            ['review_id' => 471, 'emotion_id' => 2], // Fun
            ['review_id' => 471, 'emotion_id' => 12], // Tension

            // 472: Mortal Kombat 1
            ['review_id' => 472, 'emotion_id' => 14], // Anger
            ['review_id' => 472, 'emotion_id' => 12], // Tension

            // 473: DRAGON BALL FighterZ
            ['review_id' => 473, 'emotion_id' => 2], // Fun
            ['review_id' => 473, 'emotion_id' => 1], // Joy

            // 474: DOOM Eternal
            ['review_id' => 474, 'emotion_id' => 12], // Tension
            ['review_id' => 474, 'emotion_id' => 2], // Fun

            // 475: Hades
            ['review_id' => 475, 'emotion_id' => 2], // Fun
            ['review_id' => 475, 'emotion_id' => 3], // Satisfaction

            // 476: Cuphead
            ['review_id' => 476, 'emotion_id' => 13], // Frustration
            ['review_id' => 476, 'emotion_id' => 3], // Satisfaction

            // 477: Dead Cells
            ['review_id' => 477, 'emotion_id' => 3], // Satisfaction
            ['review_id' => 477, 'emotion_id' => 12], // Tension

            // 478: Katana ZERO
            ['review_id' => 478, 'emotion_id' => 12], // Tension
            ['review_id' => 478, 'emotion_id' => 3], // Satisfaction

            // 479: Ghost of Tsushima
            ['review_id' => 479, 'emotion_id' => 7], // Inspiration
            ['review_id' => 479, 'emotion_id' => 5], // Relaxation

            // 480: Forza Horizon 5
            ['review_id' => 480, 'emotion_id' => 2], // Fun
            ['review_id' => 480, 'emotion_id' => 5], // Relaxation

            // 481: It Takes Two
            ['review_id' => 481, 'emotion_id' => 1], // Joy
            ['review_id' => 481, 'emotion_id' => 2], // Fun

            // 482: Overwatch 2
            ['review_id' => 482, 'emotion_id' => 2], // Fun
            ['review_id' => 482, 'emotion_id' => 12], // Tension

            // 483: Counter-Strike 2
            ['review_id' => 483, 'emotion_id' => 12], // Tension
            ['review_id' => 483, 'emotion_id' => 14], // Anger



            // brunocb

            // 487: Mass Effect: Legendary Edition
            ['review_id' => 487, 'emotion_id' => 7], // Inspiration
            ['review_id' => 487, 'emotion_id' => 4], // Hope

            // 488: Cyberpunk 2077
            ['review_id' => 488, 'emotion_id' => 6], // Curiosity
            ['review_id' => 488, 'emotion_id' => 12], // Tension

            // 489: NieR:Automata
            ['review_id' => 489, 'emotion_id' => 7], // Inspiration
            ['review_id' => 489, 'emotion_id' => 9], // Melancholy

            // 490: Starfield
            ['review_id' => 490, 'emotion_id' => 6],  // Curiosity
            ['review_id' => 490, 'emotion_id' => 13], // Frustration

            // 491: The Outer Worlds 2
            ['review_id' => 491, 'emotion_id' => 6], // Curiosity
            ['review_id' => 491, 'emotion_id' => 2], // Fun

            // 492: The Alters
            ['review_id' => 492, 'emotion_id' => 6], // Curiosity
            ['review_id' => 492, 'emotion_id' => 9], // Melancholy

            // 493: Persona 5 Royal
            ['review_id' => 493, 'emotion_id' => 7], // Inspiration
            ['review_id' => 493, 'emotion_id' => 3], // Satisfaction

            // 494: Fallout 4
            ['review_id' => 494, 'emotion_id' => 6], // Curiosity
            ['review_id' => 494, 'emotion_id' => 3], // Satisfaction

            // 495: The Witcher 3: Wild Hunt
            ['review_id' => 495, 'emotion_id' => 6], // Curiosity
            ['review_id' => 495, 'emotion_id' => 7], // Inspiration

            // 496: Red Dead Redemption 2
            ['review_id' => 496, 'emotion_id' => 9], // Melancholy
            ['review_id' => 496, 'emotion_id' => 8], // Nostalgia

            // 497: Disco Elysium
            ['review_id' => 497, 'emotion_id' => 6], // Curiosity
            ['review_id' => 497, 'emotion_id' => 9], // Melancholy

            // 498: DOOM Eternal
            ['review_id' => 498, 'emotion_id' => 2],  // Fun
            ['review_id' => 498, 'emotion_id' => 12], // Tension

            // 499: Portal 2
            ['review_id' => 499, 'emotion_id' => 2], // Fun
            ['review_id' => 499, 'emotion_id' => 3], // Satisfaction

            // 500: Detroit: Become Human
            ['review_id' => 500, 'emotion_id' => 12], // Tension
            ['review_id' => 500, 'emotion_id' => 4],  // Hope

            // 501: Horizon Zero Dawn
            ['review_id' => 501, 'emotion_id' => 7], // Inspiration
            ['review_id' => 501, 'emotion_id' => 3], // Satisfaction

            // 504: Phasmophobia
            ['review_id' => 504, 'emotion_id' => 11], // Fear
            ['review_id' => 504, 'emotion_id' => 12], // Tension



            // nuriaS

            // 505: The Legend of Zelda: Breath of the Wild
            ['review_id' => 505, 'emotion_id' => 6], // Curiosity
            ['review_id' => 505, 'emotion_id' => 1], // Joy

            // 506: Super Mario Odyssey
            ['review_id' => 506, 'emotion_id' => 1], // Joy
            ['review_id' => 506, 'emotion_id' => 2], // Fun

            // 507: Mario Kart 8 Deluxe
            ['review_id' => 507, 'emotion_id' => 2], // Fun
            ['review_id' => 507, 'emotion_id' => 12], // Tension

            // 508: Splatoon 3
            ['review_id' => 508, 'emotion_id' => 2], // Fun
            ['review_id' => 508, 'emotion_id' => 1], // Joy

            // 509: Metroid Dread
            ['review_id' => 509, 'emotion_id' => 12], // Tension
            ['review_id' => 509, 'emotion_id' => 3],  // Satisfaction

            // 510: Fire Emblem: Three Houses
            ['review_id' => 510, 'emotion_id' => 9],  // Melancholy
            ['review_id' => 510, 'emotion_id' => 7],  // Inspiration

            // 511: Animal Crossing: New Horizons
            ['review_id' => 511, 'emotion_id' => 5], // Relaxation
            ['review_id' => 511, 'emotion_id' => 8], // Nostalgia

            // 512: Stardew Valley
            ['review_id' => 512, 'emotion_id' => 5], // Relaxation
            ['review_id' => 512, 'emotion_id' => 4], // Hope

            // 513: A Short Hike
            ['review_id' => 513, 'emotion_id' => 1], // Joy
            ['review_id' => 513, 'emotion_id' => 7], // Inspiration

            // 514: Luigi's Mansion 3
            ['review_id' => 514, 'emotion_id' => 2], // Fun
            ['review_id' => 514, 'emotion_id' => 12], // Tension

            // 515: Hollow Knight
            ['review_id' => 515, 'emotion_id' => 12], // Tension
            ['review_id' => 515, 'emotion_id' => 13], // Frustration

            // 516: Celeste
            ['review_id' => 516, 'emotion_id' => 4],  // Hope
            ['review_id' => 516, 'emotion_id' => 3],  // Satisfaction

            // 517: Ori and the Will of the Wisps
            ['review_id' => 517, 'emotion_id' => 7], // Inspiration
            ['review_id' => 517, 'emotion_id' => 4], // Hope

            // 518: Portal 2
            ['review_id' => 518, 'emotion_id' => 2], // Fun
            ['review_id' => 518, 'emotion_id' => 3], // Satisfaction

            // 519: It Takes Two
            ['review_id' => 519, 'emotion_id' => 2], // Fun
            ['review_id' => 519, 'emotion_id' => 1], // Joy

            // 520: Resident Evil 7: Biohazard (no recomendado)
            ['review_id' => 520, 'emotion_id' => 11], // Fear
            ['review_id' => 520, 'emotion_id' => 12], // Tension

            // 521: Outlast (no recomendado)
            ['review_id' => 521, 'emotion_id' => 11], // Fear
            ['review_id' => 521, 'emotion_id' => 12], // Tension

            // 522: Dead Space (2008) (no recomendado)
            ['review_id' => 522, 'emotion_id' => 11], // Fear
            ['review_id' => 522, 'emotion_id' => 12], // Tension


            // gonzaleon

            // 523: Microsoft Flight Simulator 2020
            ['review_id' => 523, 'emotion_id' => 5], // Relaxation
            ['review_id' => 523, 'emotion_id' => 3], // Satisfaction

            // 524: Euro Truck Simulator 2
            ['review_id' => 524, 'emotion_id' => 5], // Relaxation
            ['review_id' => 524, 'emotion_id' => 3], // Satisfaction

            // 525: Farming Simulator 22
            ['review_id' => 525, 'emotion_id' => 5], // Relaxation
            ['review_id' => 525, 'emotion_id' => 3], // Satisfaction

            // 526: Cities: Skylines
            ['review_id' => 526, 'emotion_id' => 5], // Relaxation
            ['review_id' => 526, 'emotion_id' => 3], // Satisfaction

            // 527: Assetto Corsa Competizione
            ['review_id' => 527, 'emotion_id' => 12], // Tension
            ['review_id' => 527, 'emotion_id' => 3],  // Satisfaction

            // 528: Anno 1800
            ['review_id' => 528, 'emotion_id' => 5], // Relaxation
            ['review_id' => 528, 'emotion_id' => 8], // Nostalgia

            // 529: Gran Turismo 7
            ['review_id' => 529, 'emotion_id' => 2], // Fun
            ['review_id' => 529, 'emotion_id' => 3], // Satisfaction

            // 530: Banished
            ['review_id' => 530, 'emotion_id' => 12], // Tension
            ['review_id' => 530, 'emotion_id' => 3],  // Satisfaction

            // 531: Planet Zoo
            ['review_id' => 531, 'emotion_id' => 7], // Inspiration
            ['review_id' => 531, 'emotion_id' => 1], // Joy

            // 532: Planet Coaster
            ['review_id' => 532, 'emotion_id' => 2], // Fun
            ['review_id' => 532, 'emotion_id' => 1], // Joy

            // 533: Forza Horizon 5
            ['review_id' => 533, 'emotion_id' => 2], // Fun
            ['review_id' => 533, 'emotion_id' => 1], // Joy

            // 534: Factorio
            ['review_id' => 534, 'emotion_id' => 3], // Satisfaction
            ['review_id' => 534, 'emotion_id' => 6], // Curiosity

            // 535: Dorfromantik
            ['review_id' => 535, 'emotion_id' => 5], // Relaxation
            ['review_id' => 535, 'emotion_id' => 3], // Satisfaction

            // 536: Stardew Valley
            ['review_id' => 536, 'emotion_id' => 5], // Relaxation
            ['review_id' => 536, 'emotion_id' => 4], // Hope

            // 537: Need for Speed Unbound
            ['review_id' => 537, 'emotion_id' => 2],  // Fun
            ['review_id' => 537, 'emotion_id' => 12], // Tension

            // 538: Tekken 8 (no recomendado)
            ['review_id' => 538, 'emotion_id' => 13], // Frustration
            ['review_id' => 538, 'emotion_id' => 14], // Anger

            // 539: Apex Legends (no recomendado)
            ['review_id' => 539, 'emotion_id' => 12], // Tension
            ['review_id' => 539, 'emotion_id' => 13], // Frustration

            // 540: Outlast (no recomendado)
            ['review_id' => 540, 'emotion_id' => 11], // Fear
            ['review_id' => 540, 'emotion_id' => 12], // Tension


            // paulaPnc

            // 541: Return to Monkey Island
            ['review_id' => 541, 'emotion_id' => 8], // Nostalgia
            ['review_id' => 541, 'emotion_id' => 1], // Joy

            // 542: Thimbleweed Park
            ['review_id' => 542, 'emotion_id' => 6], // Curiosity
            ['review_id' => 542, 'emotion_id' => 8], // Nostalgia

            // 543: Return Of The Obra Dinn
            ['review_id' => 543, 'emotion_id' => 6], // Curiosity
            ['review_id' => 543, 'emotion_id' => 12], // Tension

            // 544: Deponia
            ['review_id' => 544, 'emotion_id' => 2], // Fun
            ['review_id' => 544, 'emotion_id' => 3], // Satisfaction

            // 545: Call of the Sea
            ['review_id' => 545, 'emotion_id' => 6], // Curiosity
            ['review_id' => 545, 'emotion_id' => 8], // Nostalgia

            // 546: Disco Elysium
            ['review_id' => 546, 'emotion_id' => 6], // Curiosity
            ['review_id' => 546, 'emotion_id' => 9], // Melancholy

            // 547: Portal 2
            ['review_id' => 547, 'emotion_id' => 2], // Fun
            ['review_id' => 547, 'emotion_id' => 3], // Satisfaction

            // 548: The Wolf Among Us
            ['review_id' => 548, 'emotion_id' => 12], // Tension
            ['review_id' => 548, 'emotion_id' => 6],  // Curiosity

            // 549: Sherlock Holmes: Chapter One
            ['review_id' => 549, 'emotion_id' => 6], // Curiosity
            ['review_id' => 549, 'emotion_id' => 3], // Satisfaction

            // 550: Botany Manor
            ['review_id' => 550, 'emotion_id' => 5], // Relaxation
            ['review_id' => 550, 'emotion_id' => 6], // Curiosity

            // 551: A Short Hike
            ['review_id' => 551, 'emotion_id' => 1], // Joy
            ['review_id' => 551, 'emotion_id' => 7], // Inspiration

            // 552: What Remains of Edith Finch
            ['review_id' => 552, 'emotion_id' => 10], // Sadness
            ['review_id' => 552, 'emotion_id' => 9],  // Melancholy

            // 553: The Stanley Parable
            ['review_id' => 553, 'emotion_id' => 6], // Curiosity
            ['review_id' => 553, 'emotion_id' => 7], // Inspiration

            // 554: Inscryption
            ['review_id' => 554, 'emotion_id' => 11], // Fear
            ['review_id' => 554, 'emotion_id' => 6],  // Curiosity

            // 555: Oxenfree
            ['review_id' => 555, 'emotion_id' => 12], // Tension
            ['review_id' => 555, 'emotion_id' => 8],  // Nostalgia

            // 556: Apex Legends (no recomendado)
            ['review_id' => 556, 'emotion_id' => 12], // Tension
            ['review_id' => 556, 'emotion_id' => 14], // Anger

            // 557: DOOM Eternal (no recomendado)
            ['review_id' => 557, 'emotion_id' => 12], // Tension
            ['review_id' => 557, 'emotion_id' => 13], // Frustration

            // 558: Rust (no recomendado)
            ['review_id' => 558, 'emotion_id' => 14], // Anger
            ['review_id' => 558, 'emotion_id' => 13], // Frustration



            // lauraJRPG

            // 559: Persona 5 Royal
            ['review_id' => 559, 'emotion_id' => 7], // Inspiration
            ['review_id' => 559, 'emotion_id' => 3], // Satisfaction

            // 560: NieR:Automata
            ['review_id' => 560, 'emotion_id' => 7], // Inspiration
            ['review_id' => 560, 'emotion_id' => 9], // Melancholy

            // 561: Mass Effect: Legendary Edition
            ['review_id' => 561, 'emotion_id' => 7], // Inspiration
            ['review_id' => 561, 'emotion_id' => 4], // Hope

            // 562: Clair Obscur: Expedition 33
            ['review_id' => 562, 'emotion_id' => 6], // Curiosity
            ['review_id' => 562, 'emotion_id' => 9], // Melancholy

            // 563: Cyberpunk 2077
            ['review_id' => 563, 'emotion_id' => 6],  // Curiosity
            ['review_id' => 563, 'emotion_id' => 12], // Tension

            // 564: Disco Elysium
            ['review_id' => 564, 'emotion_id' => 6], // Curiosity
            ['review_id' => 564, 'emotion_id' => 9], // Melancholy

            // 565: Starfield
            ['review_id' => 565, 'emotion_id' => 6],  // Curiosity
            ['review_id' => 565, 'emotion_id' => 13], // Frustration

            // 566: The Outer Worlds 2
            ['review_id' => 566, 'emotion_id' => 6], // Curiosity
            ['review_id' => 566, 'emotion_id' => 2], // Fun

            // 567: The Witcher 3: Wild Hunt
            ['review_id' => 567, 'emotion_id' => 6], // Curiosity
            ['review_id' => 567, 'emotion_id' => 7], // Inspiration

            // 568: Horizon Forbidden West
            ['review_id' => 568, 'emotion_id' => 7], // Inspiration
            ['review_id' => 568, 'emotion_id' => 3], // Satisfaction

            // 569: Ghost of Tsushima
            ['review_id' => 569, 'emotion_id' => 7], // Inspiration
            ['review_id' => 569, 'emotion_id' => 3], // Satisfaction

            // 570: Detroit: Become Human
            ['review_id' => 570, 'emotion_id' => 12], // Tension
            ['review_id' => 570, 'emotion_id' => 4],  // Hope

            // 571: Alan Wake 2
            ['review_id' => 571, 'emotion_id' => 12], // Tension
            ['review_id' => 571, 'emotion_id' => 11], // Fear

            // 572: Hades
            ['review_id' => 572, 'emotion_id' => 2], // Fun
            ['review_id' => 572, 'emotion_id' => 3], // Satisfaction

            // 573: Portal 2
            ['review_id' => 573, 'emotion_id' => 2], // Fun
            ['review_id' => 573, 'emotion_id' => 3], // Satisfaction



            // vicspeed

            // 577: Assetto Corsa Competizione
            ['review_id' => 577, 'emotion_id' => 12], // Tension
            ['review_id' => 577, 'emotion_id' => 3],  // Satisfaction

            // 578: F1 24
            ['review_id' => 578, 'emotion_id' => 12], // Tension
            ['review_id' => 578, 'emotion_id' => 3],  // Satisfaction

            // 579: Gran Turismo 7
            ['review_id' => 579, 'emotion_id' => 2], // Fun
            ['review_id' => 579, 'emotion_id' => 3], // Satisfaction

            // 580: Forza Horizon 5
            ['review_id' => 580, 'emotion_id' => 2], // Fun
            ['review_id' => 580, 'emotion_id' => 1], // Joy

            // 581: Need for Speed Unbound
            ['review_id' => 581, 'emotion_id' => 2],  // Fun
            ['review_id' => 581, 'emotion_id' => 12], // Tension

            // 582: EA SPORTS FC 26
            ['review_id' => 582, 'emotion_id' => 2], // Fun
            ['review_id' => 582, 'emotion_id' => 3], // Satisfaction

            // 583: Euro Truck Simulator 2
            ['review_id' => 583, 'emotion_id' => 5], // Relaxation
            ['review_id' => 583, 'emotion_id' => 3], // Satisfaction

            // 584: Riders Republic
            ['review_id' => 584, 'emotion_id' => 2], // Fun
            ['review_id' => 584, 'emotion_id' => 1], // Joy

            // 585: Mario Kart 8 Deluxe
            ['review_id' => 585, 'emotion_id' => 2], // Fun
            ['review_id' => 585, 'emotion_id' => 1], // Joy

            // 586: Microsoft Flight Simulator 2020
            ['review_id' => 586, 'emotion_id' => 5], // Relaxation
            ['review_id' => 586, 'emotion_id' => 3], // Satisfaction

            // 587: Cities: Skylines
            ['review_id' => 587, 'emotion_id' => 5], // Relaxation
            ['review_id' => 587, 'emotion_id' => 3], // Satisfaction

            // 588: Halo Infinite
            ['review_id' => 588, 'emotion_id' => 2],  // Fun
            ['review_id' => 588, 'emotion_id' => 12], // Tension

            // 589: Overwatch 2
            ['review_id' => 589, 'emotion_id' => 12], // Tension
            ['review_id' => 589, 'emotion_id' => 13], // Frustration

            // 590: NBA 2K26
            ['review_id' => 590, 'emotion_id' => 2], // Fun
            ['review_id' => 590, 'emotion_id' => 3], // Satisfaction

            // 591: Cyberpunk 2077
            ['review_id' => 591, 'emotion_id' => 6],  // Curiosity
            ['review_id' => 591, 'emotion_id' => 12], // Tension

            // 592: Gone Home
            ['review_id' => 592, 'emotion_id' => 8],  // Nostalgia
            ['review_id' => 592, 'emotion_id' => 10], // Sadness

            // 593: Spiritfarer
            ['review_id' => 593, 'emotion_id' => 10], // Sadness
            ['review_id' => 593, 'emotion_id' => 4],  // Hope

            // 594: Night in the Woods
            ['review_id' => 594, 'emotion_id' => 9], // Melancholy
            ['review_id' => 594, 'emotion_id' => 4], // Hope



            // loreSports

            // 595: EA SPORTS FC 26
            ['review_id' => 595, 'emotion_id' => 1], // Joy
            ['review_id' => 595, 'emotion_id' => 2], // Fun

            // 596: NBA 2K26
            ['review_id' => 596, 'emotion_id' => 2], // Fun
            ['review_id' => 596, 'emotion_id' => 1], // Joy

            // 597: Madden NFL 24
            ['review_id' => 597, 'emotion_id' => 2], // Fun
            ['review_id' => 597, 'emotion_id' => 3], // Satisfaction

            // 598: WWE 2K25
            ['review_id' => 598, 'emotion_id' => 2], // Fun
            ['review_id' => 598, 'emotion_id' => 1], // Joy

            // 599: Forza Horizon 5
            ['review_id' => 599, 'emotion_id' => 2], // Fun
            ['review_id' => 599, 'emotion_id' => 1], // Joy

            // 600: Riders Republic
            ['review_id' => 600, 'emotion_id' => 2],  // Fun
            ['review_id' => 600, 'emotion_id' => 12], // Tension

            // 601: F1 24
            ['review_id' => 601, 'emotion_id' => 2], // Fun
            ['review_id' => 601, 'emotion_id' => 3], // Satisfaction

            // 602: Gran Turismo 7
            ['review_id' => 602, 'emotion_id' => 3], // Satisfaction
            ['review_id' => 602, 'emotion_id' => 2], // Fun

            // 603: Mario Kart 8 Deluxe
            ['review_id' => 603, 'emotion_id' => 2], // Fun
            ['review_id' => 603, 'emotion_id' => 1], // Joy

            // 604: Overwatch 2
            ['review_id' => 604, 'emotion_id' => 2],  // Fun
            ['review_id' => 604, 'emotion_id' => 12], // Tension

            // 605: Apex Legends
            ['review_id' => 605, 'emotion_id' => 12], // Tension
            ['review_id' => 605, 'emotion_id' => 13], // Frustration

            // 606: Grand Theft Auto V
            ['review_id' => 606, 'emotion_id' => 2], // Fun
            ['review_id' => 606, 'emotion_id' => 1], // Joy

            // 607: The Last of Us Part I
            ['review_id' => 607, 'emotion_id' => 7],  // Inspiration
            ['review_id' => 607, 'emotion_id' => 9],  // Melancholy

            // 608: Hogwarts Legacy
            ['review_id' => 608, 'emotion_id' => 1], // Joy
            ['review_id' => 608, 'emotion_id' => 6], // Curiosity

            // 609: Need for Speed Unbound
            ['review_id' => 609, 'emotion_id' => 2],  // Fun
            ['review_id' => 609, 'emotion_id' => 12], // Tension

            // 610: The Stanley Parable (no recomendado)
            ['review_id' => 610, 'emotion_id' => 13], // Frustration
            ['review_id' => 610, 'emotion_id' => 6],  // Curiosity

            // 611: Inscryption (no recomendado)
            ['review_id' => 611, 'emotion_id' => 13], // Frustration
            ['review_id' => 611, 'emotion_id' => 12], // Tension

            // 612: Botany Manor (no recomendado)
            ['review_id' => 612, 'emotion_id' => 13], // Frustration
            ['review_id' => 612, 'emotion_id' => 5],  // Relaxation



            // sergioHard

            // 613: Elden Ring
            ['review_id' => 613, 'emotion_id' => 12], // Tension
            ['review_id' => 613, 'emotion_id' => 3],  // Satisfaction

            // 614: Blasphemous
            ['review_id' => 614, 'emotion_id' => 3],  // Satisfaction
            ['review_id' => 614, 'emotion_id' => 12], // Tension

            // 615: Hollow Knight
            ['review_id' => 615, 'emotion_id' => 12], // Tension
            ['review_id' => 615, 'emotion_id' => 3],  // Satisfaction

            // 616: Dead Cells
            ['review_id' => 616, 'emotion_id' => 2], // Fun
            ['review_id' => 616, 'emotion_id' => 3], // Satisfaction

            // 617: God of War I
            ['review_id' => 617, 'emotion_id' => 2], // Fun
            ['review_id' => 617, 'emotion_id' => 3], // Satisfaction

            // 618: Ghost of Tsushima
            ['review_id' => 618, 'emotion_id' => 7], // Inspiration
            ['review_id' => 618, 'emotion_id' => 3], // Satisfaction

            // 619: Cuphead
            ['review_id' => 619, 'emotion_id' => 12], // Tension
            ['review_id' => 619, 'emotion_id' => 13], // Frustration

            // 620: Katana ZERO
            ['review_id' => 620, 'emotion_id' => 2], // Fun
            ['review_id' => 620, 'emotion_id' => 3], // Satisfaction

            // 621: Ori and the Will of the Wisps
            ['review_id' => 621, 'emotion_id' => 7], // Inspiration
            ['review_id' => 621, 'emotion_id' => 4], // Hope

            // 622: Hades
            ['review_id' => 622, 'emotion_id' => 2], // Fun
            ['review_id' => 622, 'emotion_id' => 3], // Satisfaction

            // 623: Darkest Dungeon
            ['review_id' => 623, 'emotion_id' => 12], // Tension
            ['review_id' => 623, 'emotion_id' => 11], // Fear

            // 624: Returnal
            ['review_id' => 624, 'emotion_id' => 12], // Tension
            ['review_id' => 624, 'emotion_id' => 3],  // Satisfaction

            // 625: DOOM Eternal
            ['review_id' => 625, 'emotion_id' => 12], // Tension
            ['review_id' => 625, 'emotion_id' => 2],  // Fun

            // 626: The Witcher 3: Wild Hunt
            ['review_id' => 626, 'emotion_id' => 6], // Curiosity
            ['review_id' => 626, 'emotion_id' => 7], // Inspiration

            // 627: Star Wars Jedi: Fallen Order
            ['review_id' => 627, 'emotion_id' => 2], // Fun
            ['review_id' => 627, 'emotion_id' => 4], // Hope

            // 628: Palia (no recomendado)
            ['review_id' => 628, 'emotion_id' => 13], // Frustration
            ['review_id' => 628, 'emotion_id' => 5],  // Relaxation

            // 629: Cozy Grove (no recomendado)
            ['review_id' => 629, 'emotion_id' => 13], // Frustration
            ['review_id' => 629, 'emotion_id' => 5],  // Relaxation

            // 630: Disney Dreamlight Valley (no recomendado)
            ['review_id' => 630, 'emotion_id' => 13], // Frustration
            ['review_id' => 630, 'emotion_id' => 14], // Anger



            // celiaCoop

            // 631: It Takes Two
            ['review_id' => 631, 'emotion_id' => 1], // Joy
            ['review_id' => 631, 'emotion_id' => 2], // Fun

            // 632: Split Fiction
            ['review_id' => 632, 'emotion_id' => 2], // Fun
            ['review_id' => 632, 'emotion_id' => 1], // Joy

            // 633: Mario Kart 8 Deluxe
            ['review_id' => 633, 'emotion_id' => 2], // Fun
            ['review_id' => 633, 'emotion_id' => 1], // Joy

            // 634: Overwatch 2
            ['review_id' => 634, 'emotion_id' => 2],  // Fun
            ['review_id' => 634, 'emotion_id' => 13], // Frustration

            // 635: Stardew Valley
            ['review_id' => 635, 'emotion_id' => 5], // Relaxation
            ['review_id' => 635, 'emotion_id' => 1], // Joy

            // 636: Hogwarts Legacy
            ['review_id' => 636, 'emotion_id' => 1], // Joy
            ['review_id' => 636, 'emotion_id' => 4], // Hope

            // 637: Borderlands 3
            ['review_id' => 637, 'emotion_id' => 2], // Fun
            ['review_id' => 637, 'emotion_id' => 3], // Satisfaction

            // 638: Animal Crossing: New Horizons
            ['review_id' => 638, 'emotion_id' => 5], // Relaxation
            ['review_id' => 638, 'emotion_id' => 1], // Joy

            // 639: A Short Hike
            ['review_id' => 639, 'emotion_id' => 1], // Joy
            ['review_id' => 639, 'emotion_id' => 5], // Relaxation

            // 640: Unpacking
            ['review_id' => 640, 'emotion_id' => 5], // Relaxation
            ['review_id' => 640, 'emotion_id' => 3], // Satisfaction

            // 641: Palia
            ['review_id' => 641, 'emotion_id' => 5], // Relaxation
            ['review_id' => 641, 'emotion_id' => 1], // Joy

            // 642: Forza Horizon 5
            ['review_id' => 642, 'emotion_id' => 2], // Fun
            ['review_id' => 642, 'emotion_id' => 1], // Joy

            // 643: EA SPORTS FC 26
            ['review_id' => 643, 'emotion_id' => 2], // Fun
            ['review_id' => 643, 'emotion_id' => 3], // Satisfaction

            // 644: Portal 2
            ['review_id' => 644, 'emotion_id' => 3], // Satisfaction
            ['review_id' => 644, 'emotion_id' => 2], // Fun

            // 645: Dave the Diver
            ['review_id' => 645, 'emotion_id' => 5], // Relaxation
            ['review_id' => 645, 'emotion_id' => 2], // Fun

            // 646: SOMA (no recomendado)
            ['review_id' => 646, 'emotion_id' => 12], // Tension
            ['review_id' => 646, 'emotion_id' => 11], // Fear

            // 647: Outlast (no recomendado)
            ['review_id' => 647, 'emotion_id' => 11], // Fear
            ['review_id' => 647, 'emotion_id' => 12], // Tension

            // 648: Dead Space (2008) (no recomendado)
            ['review_id' => 648, 'emotion_id' => 11], // Fear
            ['review_id' => 648, 'emotion_id' => 12], // Tension



            // ismaLoot

            // 649: Diablo IV
            ['review_id' => 649, 'emotion_id' => 3], // Satisfaction
            ['review_id' => 649, 'emotion_id' => 2], // Fun

            // 650: Borderlands 3
            ['review_id' => 650, 'emotion_id' => 2], // Fun
            ['review_id' => 650, 'emotion_id' => 3], // Satisfaction

            // 651: The Binding of Isaac: Rebirth
            ['review_id' => 651, 'emotion_id' => 6], // Curiosity
            ['review_id' => 651, 'emotion_id' => 2], // Fun

            // 652: Hades
            ['review_id' => 652, 'emotion_id' => 2], // Fun
            ['review_id' => 652, 'emotion_id' => 3], // Satisfaction

            // 653: DOOM Eternal
            ['review_id' => 653, 'emotion_id' => 12], // Tension
            ['review_id' => 653, 'emotion_id' => 2],  // Fun

            // 654: Cyberpunk 2077
            ['review_id' => 654, 'emotion_id' => 6], // Curiosity
            ['review_id' => 654, 'emotion_id' => 3], // Satisfaction

            // 655: Vampire Survivors
            ['review_id' => 655, 'emotion_id' => 2], // Fun
            ['review_id' => 655, 'emotion_id' => 3], // Satisfaction

            // 656: Slay the Spire
            ['review_id' => 656, 'emotion_id' => 3], // Satisfaction
            ['review_id' => 656, 'emotion_id' => 6], // Curiosity

            // 657: Risk of Rain 2
            ['review_id' => 657, 'emotion_id' => 2], // Fun
            ['review_id' => 657, 'emotion_id' => 3], // Satisfaction

            // 658: Returnal
            ['review_id' => 658, 'emotion_id' => 12], // Tension
            ['review_id' => 658, 'emotion_id' => 3],  // Satisfaction

            // 659: Deathloop
            ['review_id' => 659, 'emotion_id' => 2], // Fun
            ['review_id' => 659, 'emotion_id' => 6], // Curiosity

            // 660: Apex Legends
            ['review_id' => 660, 'emotion_id' => 12], // Tension
            ['review_id' => 660, 'emotion_id' => 2],  // Fun

            // 661: The Witcher 3: Wild Hunt
            ['review_id' => 661, 'emotion_id' => 7], // Inspiration
            ['review_id' => 661, 'emotion_id' => 6], // Curiosity

            // 662: Fallout 4
            ['review_id' => 662, 'emotion_id' => 2], // Fun
            ['review_id' => 662, 'emotion_id' => 6], // Curiosity

            // 663: Halo Infinite
            ['review_id' => 663, 'emotion_id' => 2],  // Fun
            ['review_id' => 663, 'emotion_id' => 12], // Tension



            // marinaHorror

            // 667: Phasmophobia
            ['review_id' => 667, 'emotion_id' => 11], // Fear
            ['review_id' => 667, 'emotion_id' => 12], // Tension

            // 668: Outlast
            ['review_id' => 668, 'emotion_id' => 11], // Fear
            ['review_id' => 668, 'emotion_id' => 12], // Tension

            // 669: Resident Evil 2
            ['review_id' => 669, 'emotion_id' => 12], // Tension
            ['review_id' => 669, 'emotion_id' => 11], // Fear

            // 670: The Evil Within
            ['review_id' => 670, 'emotion_id' => 11], // Fear
            ['review_id' => 670, 'emotion_id' => 12], // Tension

            // 671: Alan Wake 2
            ['review_id' => 671, 'emotion_id' => 6],  // Curiosity
            ['review_id' => 671, 'emotion_id' => 12], // Tension

            // 672: The Dark Pictures Anthology: House of Ashes
            ['review_id' => 672, 'emotion_id' => 11], // Fear
            ['review_id' => 672, 'emotion_id' => 12], // Tension

            // 673: The Dark Pictures Anthology: Little Hope
            ['review_id' => 673, 'emotion_id' => 11], // Fear
            ['review_id' => 673, 'emotion_id' => 12], // Tension

            // 674: Resident Evil 7: Biohazard
            ['review_id' => 674, 'emotion_id' => 11], // Fear
            ['review_id' => 674, 'emotion_id' => 12], // Tension

            // 675: Alien: Isolation
            ['review_id' => 675, 'emotion_id' => 11], // Fear
            ['review_id' => 675, 'emotion_id' => 12], // Tension

            // 676: Silent Hill 2
            ['review_id' => 676, 'emotion_id' => 9],  // Melancholy
            ['review_id' => 676, 'emotion_id' => 12], // Tension

            // 677: SOMA
            ['review_id' => 677, 'emotion_id' => 6],  // Curiosity
            ['review_id' => 677, 'emotion_id' => 12], // Tension

            // 678: Dead Space (2008)
            ['review_id' => 678, 'emotion_id' => 11], // Fear
            ['review_id' => 678, 'emotion_id' => 12], // Tension

            // 679: It Takes Two
            ['review_id' => 679, 'emotion_id' => 5], // Relaxation
            ['review_id' => 679, 'emotion_id' => 1], // Joy

            // 680: The Forest
            ['review_id' => 680, 'emotion_id' => 11], // Fear
            ['review_id' => 680, 'emotion_id' => 12], // Tension

            // 681: Dying Light: The Following - Enhanced Edition
            ['review_id' => 681, 'emotion_id' => 12], // Tension
            ['review_id' => 681, 'emotion_id' => 2],  // Fun
        ];

        DB::table('review_emotion')->insert($rows);
    }
}
