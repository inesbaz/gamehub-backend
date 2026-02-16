<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            // hagne
            [
                'user_id' => 1,
                'game_id' => 51, // Cyberpunk 2077
                'type'    => 'note',
                'text'    => "He vuelto a Night City y me está pasando LO DE SIEMPRE: entro 'a hacer una misión' y salgo 3 horas después.\nBuild netrunner + sigilo, ¿algún perk obligatorio que se me esté escapando?",
                'media_url' => null,
                'media_width' => null,
                'media_height' => null,
            ],
            [
                'user_id' => 1,
                'game_id' => 15, // Firewatch
                'type'    => 'screenshot',
                'text'    => "Caption + imagen: este juego es puro 'vibes'.\nLa paleta de colores en esta escena es una locura.",
                'media_url' => 'posts/screenshots/firewatch_tower_sunset.jpg',
                'media_width' => 1920,
                'media_height' => 1080,
            ],

            // RNG_12
            [
                'user_id' => 2,
                'game_id' => 204, // Counter-Strike 2
                'type'    => 'note',
                'text'    => "CS2 es mi comfort game: 10/10 cuando hay buen equipo y comunicación. Si hay rusheo sin callouts, me dan ganas de desinstalar.",
                'media_url' => null,
                'media_width' => null,
                'media_height' => null,
            ],
            [
                'user_id' => 2,
                'game_id' => 206, // Apex Legends
                'type'    => 'note',
                'text'    => "Apex sigue siendo de lo más divertido en ranked. Las rotaciones bien hechas valen más que el aim.",
                'media_url' => null,
                'media_width' => null,
                'media_height' => null,
            ],
            [
                'user_id' => 2,
                'game_id' => 206, // Apex Legends
                'type'    => 'screenshot',
                'text'    => "Apex ranked: rotación perfecta y final limpio.",
                'media_url'    => 'posts/screenshots/apex_ranked_01.jpg',
                'media_width'  => 1920,
                'media_height' => 1080,
            ],
            [
                'user_id' => 2,
                'game_id' => 102, // A Short Hike
                'type'    => 'note',
                'text'    => "A Short Hike no es mi rollo. Todo correcto, pero me aburre. Yo necesito adrenalina o competición 😅",
                'media_url' => null,
                'media_width' => null,
                'media_height' => null,
            ],

            // shadowex 
            [
                'user_id' => 3,
                'game_id' => 175, // Silent Hill 2
                'type'    => 'note',
                'text'    => "Silent Hill 2 es de esos juegos que no “asustan” solo: te dejan mal cuerpo. Obra maestra de atmósfera.",
                'media_url' => null,
                'media_width' => null,
                'media_height' => null,
            ],
            [
                'user_id' => 3,
                'game_id' => 173, // Alien: Isolation
                'type'    => 'clip',
                'text'    => "Cuando oyes pasos en el conducto y sabes que ya estás muerto.",
                'media_url'    => 'posts/clips/alien_close_call_01.mp4',
                'media_width'  => 1280,
                'media_height' => 720,
            ],
            [
                'user_id' => 3,
                'game_id' => 177, // Alan Wake 2
                'type'    => 'screenshot',
                'text'    => "Cuando quedan 5 minutos de examen y el código no compila.",
                'media_url' => 'posts/screenshots/alan_wake_2_glitch.jpg',
                'media_width' => null,
                'media_height' => null,
            ],
            [
                'user_id' => 3,
                'game_id' => null,
                'type'    => 'note',
                'text'    => "Hoy me he dado cuenta de que muchas veces entro a jugar por inercia, no porque tenga ganas de verdad. Abro el launcher, miro el catálogo, me pongo con algo 10 minutos y lo cierro.\n\nCreo que me pasa porque voy con la cabeza saturada y busco “desconectar”, pero a veces lo que necesito es justo lo contrario: algo simple. Un rato de música, ordenar el escritorio, o incluso ver un vídeo corto y ya.\n\n¿A alguien más le pasa esta fase de abrir mil cosas y no terminar ninguna? Estoy intentando volver a disfrutar sin obligarme a “aprovechar el tiempo”.",
                'media_url' => null,
                'media_width' => null,
                'media_height' => null,
            ],

            // brunocb
            [
                'user_id' => 28,
                'game_id' => null,
                'type'    => 'note',
                'text'    => "Busco algo corto para el finde: 6–10h, con historia y sin frustración.\n¿Mejor Firewatch / Stray / Dredge? (sin spoilers pls)",
                'media_url' => null,
                'media_width' => null,
                'media_height' => null,
            ],
            [
                'user_id' => 28,
                'game_id' => 51, // Cyberpunk 2077
                'type'    => 'clip',
                'text'    => "Persecución absurda pero salió sorprendentemente bien.\n(El minimapa me estaba gritando)",
                'media_url' => 'posts/clips/cp2077_chase_01.mp4',
                'media_width' => 1280,
                'media_height' => 720,
            ],
            [
                'user_id' => 28,
                'game_id' => 51, // Cyberpunk 2077
                'type'    => 'screenshot',
                'text'    => "Foto modo: me quedo con esta captura.\nLo que da de sí una esquina cualquiera cuando la iluminación acompaña.",
                // URL externa
                'media_url' => 'https://images8.alphacoders.com/112/1125856.jpg',
                'media_width' => 1600,
                'media_height' => 900,
            ],

            // irenec
            [
                'user_id' => 16,
                'game_id' => 15, // Firewatch
                'type'    => 'screenshot',
                'text'    => "Cuando el juego te suelta un plano y dices: ok, me paro.\nEste frame es wallpaper directo.",
                'media_url' => 'posts/screenshots/firewatch_wallpaper_01.jpg',
                'media_width' => 1920,
                'media_height' => 1080,
            ],
            [
                'user_id' => 16,
                'game_id' => null,
                'type'    => 'note',
                'text'    => "Actualización del backlog: he avanzado un 0% porque me he quedado mirando el catálogo.\n¿Os pasa o soy yo?",
                'media_url' => null,
                'media_width' => null,
                'media_height' => null,
            ],
            [
                'user_id' => 16,
                'game_id' => 15, // Firewatch
                'type'    => 'clip',
                'text'    => "Vídeo externo: prueba de cómo se verían clips embebidos en el feed.",
                // URL externa
                'media_url' => 'https://packaged-media.redd.it/xhlj55bwukig1/pb/m2-res_1080p.mp4?m=DASHPlaylist.mpd&v=1&e=1771189200&s=7fe4d953cdfb210158ede64d9e265b395b779a87',
                'media_width' => 1920,
                'media_height' => 1080,
            ],
        ];

        foreach ($posts as $data) {
            Post::firstOrCreate(
                [
                    'user_id'   => $data['user_id'],
                    'game_id'   => $data['game_id'],
                    'type'      => $data['type'],
                    'text'      => $data['text'],
                    'media_url' => $data['media_url'],
                ],
                [
                    'media_width'  => $data['media_width'],
                    'media_height' => $data['media_height'],
                ]
            );
        }
    }
}
