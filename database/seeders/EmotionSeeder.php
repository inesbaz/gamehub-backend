<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Emotion;

class EmotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $emotions = [
            // Positivas
            ['slug' => 'joy',          'name' => 'Joy'],
            ['slug' => 'fun',          'name' => 'Fun'],
            ['slug' => 'satisfaction', 'name' => 'Satisfaction'],
            ['slug' => 'hope',         'name' => 'Hope'],
            ['slug' => 'relaxation',   'name' => 'Relaxation'],

            // Narrativas
            ['slug' => 'curiosity',    'name' => 'Curiosity'],
            ['slug' => 'inspiration',  'name' => 'Inspiration'],
            ['slug' => 'nostalgia',    'name' => 'Nostalgia'],
            ['slug' => 'melancholy',   'name' => 'Melancholy'],
            ['slug' => 'sadness',      'name' => 'Sadness'],

            // Negativas
            ['slug' => 'fear',         'name' => 'Fear'],
            ['slug' => 'tension',      'name' => 'Tension'],
            ['slug' => 'frustration',  'name' => 'Frustration'],
            ['slug' => 'anger',        'name' => 'Anger'],
        ];

        foreach ($emotions as $data) {
            Emotion::updateOrCreate(
                ['slug' => $data['slug']],
                ['name' => $data['name']]
            );
        }
    }
}
