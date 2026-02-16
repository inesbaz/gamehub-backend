<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $comments = [
            // Post 1 (hagne - Cyberpunk note)
            ['user_id' => 2,  'post_id' => 1, 'body' => 'Netrunner: prioriza perks de quickhacks + RAM, y si vas sigilo, lo de “reset de traza” te salva la vida.'],
            ['user_id' => 3, 'post_id' => 1, 'body' => 'Me pasa igual: entro “un momento” y acabo haciendo secundarias. Night City es una trampa.'],

            // Post 2 (hagne - Firewatch screenshot)
            ['user_id' => 16, 'post_id' => 2, 'body' => 'Ese atardecer es de los mejores planos del juego. Wallpaper directo.'],
            ['user_id' => 28, 'post_id' => 2, 'body' => 'La paleta es increíble. Este juego es puro chill con tensión.'],

            // Post 3 (RNG_12 - CS2 note)
            ['user_id' => 1, 'post_id' => 3, 'body' => 'Callouts o muerte. Cuando el equipo comunica, CS2 es otra cosa.'],
            ['user_id' => 3, 'post_id' => 3, 'body' => 'Yo lo intenté pero me supera el competitivo. Eso sí, cuando sale buena partida es adictivo.'],

            // Post 4 (RNG_12 - Apex note)
            ['user_id' => 28, 'post_id' => 4, 'body' => 'Total. Rotar bien gana más partidas que ir a lo loco a por kills.'],
            ['user_id' => 1,  'post_id' => 4, 'body' => 'Apex me gusta, pero cuando pillas malas randoms te drena el alma.'],

            // Post 5 (RNG_12 - Apex screenshot)
            ['user_id' => 16, 'post_id' => 5, 'body' => 'Ese final “limpio” se siente como droga. Buenísima captura.'],
            ['user_id' => 1,  'post_id' => 5, 'body' => 'Esto huele a partida perfecta. ¿Qué legend estabas jugando?'],

            // Post 6 (RNG_12 - A Short Hike note)
            ['user_id' => 28, 'post_id' => 6, 'body' => 'A mí me encantó justo por lo contrario: cero presión. Pero entiendo que si buscas adrenalina…'],
            ['user_id' => 16, 'post_id' => 6, 'body' => 'Es “cozy” total. Si vienes de shooters/competitivo, te puede saber a poco.'],

            // Post 7 (shadowex - Silent Hill 2 note)
            ['user_id' => 16, 'post_id' => 7, 'body' => 'Es que SH2 no se olvida. No es susto, es atmósfera + mal rollo constante.'],
            ['user_id' => 28, 'post_id' => 7, 'body' => 'Yo no puedo con esa vibra, me deja tocado. Pero como obra, es top.'],

            // Post 8 (shadowex - Alien clip)
            ['user_id' => 1, 'post_id' => 8, 'body' => 'El sonido de los conductos me mata. Ese juego es tensión pura.'],
            ['user_id' => 2, 'post_id' => 8, 'body' => 'Yo ahí habría pausado y me habría ido a beber agua. Qué ansiedad.'],

            // Post 9 (shadowex - Alan Wake 2 glitch screenshot)
            ['user_id' => 2,  'post_id' => 9, 'body' => 'Esto es literalmente yo antes de entregar: “no compila” y sudores fríos.'],
            ['user_id' => 28, 'post_id' => 9, 'body' => 'JAJA brutal. Esa frase describe media carrera.'],

            // Post 10 (shadowex - post no juego, medio largo)
            ['user_id' => 1,  'post_id' => 10, 'body' => 'Me pasa. A veces lo que necesito es algo “simple” y sin objetivos. Y ya.'],
            ['user_id' => 16, 'post_id' => 10, 'body' => '100%. Cuando estoy saturada, mirar catálogo ya me agota. Mejor parar y hacer otra cosa.'],
            ['user_id' => 28, 'post_id' => 10, 'body' => 'Sí. Me pongo metas absurdas y pierdo el disfrute. Últimamente intento jugar sin presión.'],

            // Post 11 (brunocb - buscando juego corto)
            ['user_id' => 1,  'post_id' => 11, 'body' => 'Firewatch si quieres historia intensa y corta. Stray si quieres algo más ligero.'],
            ['user_id' => 16, 'post_id' => 11, 'body' => 'Dredge si te apetece algo distinto, con atmósfera y sin frustración.'],
            ['user_id' => 3,  'post_id' => 11, 'body' => 'Si te va el terror/filosofía, SOMA (pero no es “relajado”).'],

            // Post 12 (brunocb - Cyberpunk clip persecución)
            ['user_id' => 2, 'post_id' => 12, 'body' => 'El minimapa gritando es real. Buen clip, se ve súper fluido.'],
            ['user_id' => 1, 'post_id' => 12, 'body' => 'Esto salió demasiado bien para ser improvisado 😂'],

            // Post 13 (brunocb - Cyberpunk screenshot externa)
            ['user_id' => 16, 'post_id' => 13, 'body' => 'La iluminación en Cyberpunk es obscena. Muy buena toma.'],
            ['user_id' => 1,  'post_id' => 13, 'body' => 'Modo foto en este juego es un pozo sin fondo.'],

            // Post 14 (irenec - Firewatch wallpaper)
            ['user_id' => 28, 'post_id' => 14, 'body' => 'Wallpaper directo, totalmente.'],
            ['user_id' => 1,  'post_id' => 14, 'body' => 'Firewatch tiene planos que parecen concept art.'],

            // Post 15 (irenec - backlog)
            ['user_id' => 1,  'post_id' => 15, 'body' => 'Te pasa porque el catálogo es infinito. Mirarlo ya es una actividad en sí 😂'],
            ['user_id' => 28, 'post_id' => 15, 'body' => 'Me pasa igual. Me hago listas y luego juego a… hacer más listas.'],

            // Post 16 (irenec - clip externo)
            ['user_id' => 1, 'post_id' => 16, 'body' => 'Buen ejemplo para probar el feed con vídeo. Se ve perfecto.'],
            ['user_id' => 2, 'post_id' => 16, 'body' => 'Si esto carga bien, ya tienes medio camino hecho.'],
        ];

        foreach ($comments as $data) {
            Comment::firstOrCreate(
                [
                    'user_id' => $data['user_id'],
                    'post_id' => $data['post_id'],
                    'body'    => $data['body'],
                ]
            );
        }
    }
}
