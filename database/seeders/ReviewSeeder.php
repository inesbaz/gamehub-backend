<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reviews = [
            // hagne
            [
                'user_id'        => 1,
                'game_id'        => 51, // Cyberpunk 2077
                'title'          => 'Obra maestra de sci-fi',
                'body'           => 'Mundo brutalmente detallado, historia adulta y misiones que te dejan pensando.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 1,
                'game_id'        => 1, // Horizon Forbidden West
                'title'          => 'Aloy en su mejor momento',
                'body'           => 'Combate muy divertido y mundo precioso; la historia principal mantiene el nivel.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 1,
                'game_id'        => 58, // Ghost of Tsushima
                'title'          => 'Samuráis en modo postal',
                'body'           => 'Exploración súper satisfactoria y combate fluido; secundarias muy cuidadas.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 1,
                'game_id'        => 15, // Firewatch
                'title'          => 'Corto pero muy intenso',
                'body'           => 'Personajes y diálogos top; en pocas horas te deja tocado emocionalmente.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 1,
                'game_id'        => 4, // Disco Elysium
                'title'          => 'Texto, texto y más texto',
                'body'           => 'RPG conversacional increíble; si te gusta leer, es de lo mejor que hay.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 1,
                'game_id'        => 68, // The Long Dark
                'title'          => 'Supervivencia muy inmersiva',
                'body'           => 'La atmósfera y la tensión constante son geniales; a veces se hace un poco duro.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 1,
                'game_id'        => 34, // Dredge
                'title'          => 'Pescar nunca fue tan raro',
                'body'           => 'Loop simple pero adictivo, con un toque de terror muy bien llevado.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 1,
                'game_id'        => 14, // What Remains of Edith Finch
                'title'          => 'Historia preciosa y triste',
                'body'           => 'Se juega en una tarde y te deja con muchas sensaciones; muy recomendable.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 1,
                'game_id'        => 23, // Detroit: Become Human
                'title'          => 'QTE bien hechos',
                'body'           => 'Muchas decisiones y rutas; no es perfecto pero engancha muchísimo.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 1,
                'game_id'        => 50, // Hogwarts Legacy
                'title'          => 'Ir a Hogwarts por fin',
                'body'           => 'Explorar el castillo y alrededores es lo mejor; la historia cumple sin más.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 1,
                'game_id'        => 55, // Red Dead Redemption 2
                'title'          => 'Lento pero impresionante',
                'body'           => 'A nivel técnico es una locura, pero el ritmo me ha parecido demasiado pausado.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 1,
                'game_id'        => 37, // The Last of Us Part I
                'title'          => 'Buena historia, gameplay meh',
                'body'           => 'Narrativamente está muy bien, pero el gunplay y el sigilo se me hacen pesados.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 1,
                'game_id'        => 30, // Stray
                'title'          => 'Gatito ciberpunk',
                'body'           => 'Muy bonito visualmente, aunque la jugabilidad es sencilla y se acaba rápido.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 1,
                'game_id'        => 32, // Spiritfarer
                'title'          => 'Bonito pero repetitivo',
                'body'           => 'Mensaje muy emotivo sobre la muerte, pero el farmeo me ha cansado un poco.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 1,
                'game_id'        => 36, // A Plague Tale: Innocence
                'title'          => 'Ratas y drama medieval',
                'body'           => 'Buena ambientación y historia, pero jugablemente es bastante pasillero.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 1,
                'game_id'        => 29, // Death Stranding
                'title'          => 'Simulador de recadero',
                'body'           => 'La idea es curiosa pero al final se me ha hecho aburridísimo y repetitivo; no lo recomendaría.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 1,
                'game_id'        => 85, // Elden Ring
                'title'          => 'No es para mí',
                'body'           => 'El mundo es interesante pero la dificultad y el diseño no encajan con lo que busco.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 1,
                'game_id'        => 137, // Rust
                'title'          => 'Experiencia muy tóxica',
                'body'           => 'Entre el grindeo infinito y la comunidad, ha sido más frustrante que divertida.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],

            // RNG_12
            [
                'user_id'        => 2,
                'game_id'        => 204, // Counter-Strike 2
                'title'          => 'Puro nervio y precisión',
                'body'           => 'Cuando todo encaja (aim, timing y eco), es de lo más satisfactorio que existe. Cero concesiones: o mejoras o te comen.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 2,
                'game_id'        => 206, // Apex Legends
                'title'          => 'El battle royale más rápido',
                'body'           => 'Movimiento y gunplay muy finos, y cada leyenda cambia el ritmo de la partida. A veces el matchmaking te revienta, pero engancha.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 2,
                'game_id'        => 205, // Overwatch 2
                'title'          => 'Caos organizado (cuando hay equipo)',
                'body'           => 'Partidas intensas y roles con personalidad; cuando hay coordinación es una gozada. Si te toca gente tilt… te amarga la noche.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 2,
                'game_id'        => 181, // Street Fighter 6
                'title'          => 'Aprender duele, pero engancha',
                'body'           => 'Sistema muy pulido y con mil capas; cada victoria se siente ganada de verdad. Ideal si te mola mejorar poco a poco.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 2,
                'game_id'        => 190, // Assetto Corsa Competizione
                'title'          => 'Simracing serio',
                'body'           => 'Sensación de coche brutal y carreras tensas; es exigente pero recompensa. Aquí hay que currárselo de verdad.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 2,
                'game_id'        => 191, // EA SPORTS FC 26
                'title'          => 'El fútbol de siempre, pero me puede',
                'body'           => 'Partidos muy divertidos cuando el gameplay te fluye. Me engancha fácil aunque tenga sus cosas.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 2,
                'game_id'        => 182, // Tekken 8
                'title'          => 'Hostias bonitas y técnicas',
                'body'           => 'Impacto y animaciones de locos; cada personaje tiene su mundo. Online divertido, pero como te toque alguien muy pro… rezas.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 2,
                'game_id'        => 188, // F1 24
                'title'          => 'Buen vicio de carreras',
                'body'           => 'Echas dos y te quedas diez: ritmo ágil y sensación de velocidad muy lograda. No es el sim más puro, pero entretiene muchísimo.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 2,
                'game_id'        => 200, // Call of Duty: Warzone
                'title'          => 'Adrenalina en formato BR',
                'body'           => 'Gunplay súper satisfactorio y momentos de “película” constantemente. A veces la experiencia se ensucia por el meta y el sudor.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 2,
                'game_id'        => 187, // Gran Turismo 7
                'title'          => 'Coches y coleccionismo',
                'body'           => 'Muy disfrutable para echar carreras y probar coches distintos. No siempre me flipa el ritmo de progresión, pero es sólido.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 2,
                'game_id'        => 203, // Halo Infinite
                'title'          => 'Arena clásica, sin complicarse',
                'body'           => 'Gunplay agradable y partidas directas, de las que apetece repetir. Le falta “algo” para ser obsesión, pero cumple.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 2,
                'game_id'        => 198, // DOOM Eternal
                'title'          => 'Velocidad y agresividad',
                'body'           => 'Un FPS que te obliga a moverte y a jugar con cabeza; cuando entras en el flow es espectacular. Terminas sudando.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 2,
                'game_id'        => 194, // Madden NFL 24
                'title'          => 'Buen deporte para desconectar',
                'body'           => 'Partidos entretenidos y con bastante profundidad si te metes. No me cambia la vida, pero cumple y engancha por rachas.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 2,
                'game_id'        => 189, // Need for Speed Unbound
                'title'          => 'Estilo brutal, sensaciones mixtas',
                'body'           => 'Visualmente tiene personalidad y algunas carreras son muy divertidas. Pero a ratos se me hace más frustrante que redondo.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 2,
                'game_id'        => 186, // Forza Horizon 5
                'title'          => 'Sandbox de coches que no me atrapó',
                'body'           => 'Mapa enorme y variedad a saco; perfecto para sesiones cortas. Me divierte, pero no me enganchó como esperaba.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 2,
                'game_id'        => 16, // Gone Home
                'title'          => 'No era lo que buscaba',
                'body'           => 'Entiendo lo que intenta, pero se me hizo lento y con poca “chicha” jugable. No conecté con la experiencia.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 2,
                'game_id'        => 31, // Unpacking
                'title'          => 'Relax… pero me aburrí',
                'body'           => 'Tiene su encanto y es mono, pero me resultó repetitivo muy rápido. Para mí, se queda corto como juego.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 2,
                'game_id'        => 102, // A Short Hike
                'title'          => 'Demasiado “light”',
                'body'           => 'Es agradable y simpático, pero me dejó bastante fría. Lo veo más como experiencia corta que como algo memorable.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],

            // shadowex
            [
                'user_id'        => 3,
                'game_id'        => 175, // Silent Hill 2
                'title'          => 'Terror que se te queda dentro',
                'body'           => 'No es solo miedo: es culpa, niebla y símbolos que te persiguen días después. Cada detalle parece una pista de algo peor.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 3,
                'game_id'        => 171, // Resident Evil 7: Biohazard
                'title'          => 'Ansiedad en primera persona',
                'body'           => 'La tensión es constante y el diseño de sonido te rompe. Lo disfrutas… pero con el corazón en la garganta.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 3,
                'game_id'        => 173, // Alien: Isolation
                'title'          => 'El mejor “esconde y reza”',
                'body'           => 'La IA del xenomorfo te hace dudar de cada pasillo. Puro suspense: lento, cruel y absorbente.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 3,
                'game_id'        => 177, // SOMA
                'title'          => 'Existencialismo con cuchillo',
                'body'           => 'Te atrapa con misterio, pero lo que te destruye es lo que plantea. Sales con teorías y un mal cuerpo delicioso.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 3,
                'game_id'        => 178, // Dead Space (2008)
                'title'          => 'Tensión perfecta en un pasillo',
                'body'           => 'Cada sala es una trampa y cada sonido un aviso. Combate tenso y atmósfera opresiva como pocas.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 3,
                'game_id'        => 83, // Alan Wake 2
                'title'          => 'Thriller oscuro de manual',
                'body'           => 'Ambientación increíble, ritmo de pesadilla y narrativa para diseccionar. De esos juegos que piden hilos de teorías.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 3,
                'game_id'        => 172, // Resident Evil 2
                'title'          => 'Clásico moderno: tensión medida',
                'body'           => 'Exploración y recursos al límite, con sustos bien colocados. Una lección de pacing en survival horror.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 3,
                'game_id'        => 179, // The Evil Within
                'title'          => 'Pesadilla irregular pero potente',
                'body'           => 'Tiene momentos brillantes de horror visual y paranoia. No todo es fino, pero cuando funciona es una locura.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 3,
                'game_id'        => 174, // Outlast
                'title'          => 'Persecución constante',
                'body'           => 'Puro pánico a base de correr y esconderte. Te mete en un estado de alerta que cansa… y justo por eso funciona.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 3,
                'game_id'        => 176, // Amnesia: The Dark Descent
                'title'          => 'Terror psicológico clásico',
                'body'           => 'Oscuridad, sonidos y esa sensación de que mirar demasiado tiempo es un error. Envejece, pero sigue inquietando.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 3,
                'game_id'        => 25, // The Dark Pictures Anthology: House of Ashes
                'title'          => 'Mola en coop y con teorías',
                'body'           => 'Se disfruta más comentándolo: decisiones, pistas y finales para debatir. No es terror puro, pero tiene tensión.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 3,
                'game_id'        => 26, // The Dark Pictures Anthology: Little Hope
                'title'          => 'Buen mood, ejecución discutible',
                'body'           => 'La atmósfera está bien y da para sacar lecturas, pero no todo el conjunto remata como promete.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 3,
                'game_id'        => 180, // Phasmophobia
                'title'          => 'Paranoia compartida',
                'body'           => 'El terror aquí es la expectativa: cualquier crujido te dispara la imaginación. Con colegas, es oro.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 3,
                'game_id'        => 10, // Call of Cthulhu
                'title'          => 'Lovecraft con altibajos',
                'body'           => 'Tiene momentos muy de “misterio oscuro”, pero se queda corto en ritmo y pulido. Aun así, el rollo me gusta.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 3,
                'game_id'        => 73, // Alan Wake
                'title'          => 'El origen del bucle',
                'body'           => 'Narrativa y atmósfera por encima de todo. Se nota más viejo en lo jugable, pero el misterio sigue atrapando.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 3,
                'game_id'        => 107, // Ooblets
                'title'          => 'Demasiado alegre para mí',
                'body'           => 'Lo intento, pero la vibra “cute” me saca totalmente. No conecto con el tono ni con el tipo de progreso.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 3,
                'game_id'        => 95, // Mario Kart 8 Deluxe
                'title'          => 'Diversión… que me da igual',
                'body'           => 'Entiendo que es buen juego, pero no me genera nada. Prefiero tensión y atmósfera a carreras de colores.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 3,
                'game_id'        => 97, // Splatoon 3
                'title'          => 'Buen rollo que no me entra',
                'body'           => 'Es enérgico y bien hecho, pero el estilo y la propuesta no van conmigo. Me aburre rápido.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],

            // retroalex
            [
                'user_id'        => 4,
                'game_id'        => 77, // Portal 2
                'title'          => 'Diseño perfecto (y graciosísimo)',
                'body'           => 'Cada sala te enseña una idea, la retuerce y te la hace disfrutar. Pacing impecable y humor que no estorba al puzzle.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 4,
                'game_id'        => 13, // Return Of The Obra Dinn
                'title'          => 'El puzzle más elegante que he jugado',
                'body'           => 'Minimalista por fuera y un laberinto por dentro. Deducirlo todo con pistas visuales y audio es una delicia de diseñador.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 4,
                'game_id'        => 78, // The Stanley Parable
                'title'          => 'Meta, pero con intención',
                'body'           => 'Te trolea y a la vez te disecciona como jugador. Es de esos juegos que te obligan a pensar en “por qué hago lo que hago”.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 4,
                'game_id'        => 79, // Inscryption
                'title'          => 'Un “what the hell” constante',
                'body'           => 'Me encanta cuando un juego usa sus reglas para sorprenderte y contar algo raro. Tiene magia indie de la buena.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 4,
                'game_id'        => 7, // Thimbleweed Park
                'title'          => 'Point & click con mala leche',
                'body'           => 'Es un homenaje, sí, pero también una broma interna constante. Diálogos muy bien escritos y puzzles con personalidad.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 4,
                'game_id'        => 4, // Disco Elysium
                'title'          => 'Narrativa rara en su máxima expresión',
                'body'           => 'Es literatura interactiva con un sistema de rol brillante. Te recompensa por probar cosas y por meterte en personajes imposibles.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 4,
                'game_id'        => 6, // Return to Monkey Island
                'title'          => 'Nostalgia bien entendida',
                'body'           => 'Sabe lo que fue y juega con ello sin ponerse pesado. Puzzles agradables y un tono muy “Monkey”, con guiños que funcionan.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 4,
                'game_id'        => 8, // Deponia
                'title'          => 'Tiene encanto, pero se pasa de pesado',
                'body'           => 'Me gusta el mundo y el rollo cartoon, pero el humor a veces me chirría y algunos puzzles parecen estirar por estirar.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 4,
                'game_id'        => 28, // Botany Manor
                'title'          => 'Pequeño, fino y satisfactorio',
                'body'           => 'Puzzles suaves y muy bien integrados con el entorno. Es el típico indie que te deja con una sonrisita de “qué bien pensado”.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 4,
                'game_id'        => 27, // Call of the Sea
                'title'          => 'Buen mood, puzzles correctos',
                'body'           => 'Visualmente precioso y con una narrativa curiosa. No todos los rompecabezas me parecen brillantes, pero se disfruta.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 4,
                'game_id'        => 14, // What Remains of Edith Finch
                'title'          => 'Narrativa experimental muy cuidada',
                'body'           => 'Cada viñeta es una idea jugable distinta. Dura poco, pero es de esos juegos que justifican el medio.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 4,
                'game_id'        => 19, // Oxenfree
                'title'          => 'Diálogos naturales + misterio raro',
                'body'           => 'Me encanta cómo habla la gente “de verdad” y cómo el misterio se cocina sin explicarte todo. Buen indie de sofá mental.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 4,
                'game_id'        => 134, // Katana ZERO
                'title'          => 'Estilo brutal, ejecución milimétrica',
                'body'           => 'Corto, directo y con un flow increíble. No es mi top absoluto, pero como pieza de diseño y ritmo, chapó.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 4,
                'game_id'        => 102, // A Short Hike
                'title'          => 'Mono y agradable, sin más',
                'body'           => 'Está bien hecho y es calentito, pero no me voló la cabeza. Lo valoro más como experiencia ligera que como juegazo.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 4,
                'game_id'        => 81, // Split Fiction
                'title'          => 'Idea guay, pero me faltó chispa',
                'body'           => 'Tiene momentos creativos, aunque no me terminó de sorprender tanto como esperaba. Correcto, pero no memorable.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 4,
                'game_id'        => 194, // Madden NFL 24
                'title'          => 'No es para mí',
                'body'           => 'Lo veo como un producto súper específico: yo aquí no encuentro ni sorpresa ni diseño interesante. Me aburrí rápido.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 4,
                'game_id'        => 195, // WWE 2K25
                'title'          => 'Mucho espectáculo, poca gracia',
                'body'           => 'Entiendo el fandom, pero a mí se me hace tosco y repetitivo. No me aporta nada a nivel de sistemas.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 4,
                'game_id'        => 167, // Farming Simulator 22
                'title'          => 'Demasiado “curro”',
                'body'           => 'Respeto la simulación, pero me parece más trabajo que juego. No me da esa recompensa creativa que busco.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],

            // davidRios
            [
                'user_id'        => 6,
                'game_id'        => 37, // The Last of Us Part I
                'title'          => 'De los mejores “pelijuegos”',
                'body'           => 'Producción altísima, personajes memorables y una historia que te arrastra. Es de esos que terminas y te quedas pensando.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 6,
                'game_id'        => 43, // God of War I
                'title'          => 'Épico y muy bien dirigido',
                'body'           => 'Combina setpieces, combate contundente y una narrativa con peso emocional. Me encanta el tono y la sensación de viaje.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 6,
                'game_id'        => 55, // Red Dead Redemption 2
                'title'          => 'Una superproducción viva',
                'body'           => 'El nivel de detalle es absurdo y la historia tiene un drama que te va calando. Es lento, sí, pero merece la pena por lo que construye.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 6,
                'game_id'        => 2, // The Last of Us Part II
                'title'          => 'Duro, pero brutal',
                'body'           => 'Una narrativa valiente y muy intensa, con momentos que se te quedan grabados. No es “cómodo”, pero es potente.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 6,
                'game_id'        => 38, // Uncharted 4: A Thief\'s End
                'title'          => 'Blockbuster perfecto',
                'body'           => 'Ritmo, carisma y setpieces de cine. Es el ejemplo de campaña AAA que te hace sonreír y seguir jugando sin parar.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 6,
                'game_id'        => 191, // EA SPORTS FC 26
                'title'          => 'Modo carrera para desconectar',
                'body'           => 'Me da justo lo que busco: partidos entretenidos y progresión en carrera. No es perfecto, pero me engancha por temporadas.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 6,
                'game_id'        => 192, // NBA 2K26
                'title'          => 'Puro espectáculo',
                'body'           => 'Cuando estás metido en MyCareer o una temporada, es un vicio. Presentación top y sensación de partido muy lograda.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 6,
                'game_id'        => 58, // Ghost of Tsushima
                'title'          => 'Cine samurái jugable',
                'body'           => 'Visualmente es una barbaridad y el combate se siente muy bien. La historia cumple y los duelos son momentos de postal.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 6,
                'game_id'        => 53, // Horizon Zero Dawn
                'title'          => 'Gran aventura, gran mundo',
                'body'           => 'Buena producción y una historia de misterio sci-fi que engancha. Explorar y cazar máquinas sigue siendo súper satisfactorio.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 6,
                'game_id'        => 82, // Grand Theft Auto V
                'title'          => 'Espectáculo total',
                'body'           => 'Campaña muy entretenida, con misiones variadas y un ritmo que no decae. Se nota el músculo de producción en cada misión.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 6,
                'game_id'        => 83, // Alan Wake 2
                'title'          => 'Muy bueno, pero más raro de lo mío',
                'body'           => 'La atmósfera y la dirección son increíbles, pero el tono más experimental me sacó a ratos. Aun así, tiene momentos top.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 6,
                'game_id'        => 42, // Mafia: Definitive Edition
                'title'          => 'Historia de mafia muy disfrutable',
                'body'           => 'Campaña bien contada y con buen ritmo, tipo peli clásica. No innova, pero como experiencia narrativa funciona muy bien.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 6,
                'game_id'        => 61, // Star Wars Jedi: Fallen Order
                'title'          => 'Star Wars de campaña sólida',
                'body'           => 'Buen ritmo, momentos épicos y sensación de aventura. Algunas partes se me hicieron un poco de backtracking, pero me gustó.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 6,
                'game_id'        => 62, // Star Wars Jedi: Survivor
                'title'          => 'Más grande, más espectáculo',
                'body'           => 'Se nota el salto en ambición: más setpieces y más variedad. No todo está igual de pulido, pero como campaña engancha.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 6,
                'game_id'        => 29, // Death Stranding
                'title'          => 'Idea curiosa, ritmo demasiado lento',
                'body'           => 'Me gusta la producción y el concepto, pero se me hizo pesado y repetitivo. No conseguí entrar en el flow del juego.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 6,
                'game_id'        => 120, // Crypt of the NecroDancer
                'title'          => 'No conecté con el planteamiento',
                'body'           => 'La mezcla de ritmo y roguelike no es lo mío. Me frustró más de lo que me divirtió.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 6,
                'game_id'        => 121, // FTL: Faster Than Light
                'title'          => 'Demasiado “estrategia seca”',
                'body'           => 'Sé que es buenísimo, pero a mí no me engancha: lo siento frío y más de pensar que de vivir una historia.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 6,
                'game_id'        => 132, // Axiom Verge
                'title'          => 'Retro, pero no me atrapó',
                'body'           => 'Tiene mérito y buen diseño de exploración, pero no me enganchó ni por atmósfera ni por ritmo. Lo dejé a medias.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],

            // noaDev
            [
                'user_id'        => 7,
                'game_id'        => 68, // The Long Dark
                'title'          => 'Supervivencia pura, sin concesiones',
                'body'           => 'Frío, hambre, cansancio… y decisiones que importan. Me flipa esa tensión constante de “un error y a casa”.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 7,
                'game_id'        => 67, // Subnautica
                'title'          => 'Explorar con miedo real',
                'body'           => 'Progresión perfecta: empiezas curioso y acabas bajando a zonas que dan pánico. Crafting y base-building muy satisfactorios.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 7,
                'game_id'        => 135, // Valheim
                'title'          => 'Construir, morir, mejorar',
                'body'           => 'El loop es adictivo: farmeas, subes tier, te montas base y te vas a por el siguiente bioma. En coop es crema.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 7,
                'game_id'        => 140, // Project Zomboid
                'title'          => 'Aquí sobrevives… hasta que no',
                'body'           => 'Profundidad brutal de sistemas y una tensión que no te suelta. Gestionar peso, ruido, rutas y base es puro vicio.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 7,
                'game_id'        => 145, // Raft
                'title'          => 'Progresión agradable y base flotante',
                'body'           => 'Me encanta ir optimizando la balsa y automatizando. No es el survival más duro, pero engancha por el craft y la mejora constante.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 7,
                'game_id'        => 146, // Grounded
                'title'          => 'Sobrevivir en miniatura',
                'body'           => 'Sistemas muy bien montados y exploración guapa. La sensación de peligro con bichos “pequeños” es sorprendentemente intensa.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 7,
                'game_id'        => 147, // The Forest
                'title'          => 'Tensión + construir a la desesperada',
                'body'           => 'Lo mejor es esa paranoia de noche: fortificas, pones trampas y rezas. Tiene momentos muy buenos de supervivencia.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 7,
                'game_id'        => 139, // 7 Days to Die
                'title'          => 'Hordas y planificación',
                'body'           => 'Cuando preparas la base para la noche de horda y sale bien, es una satisfacción enorme. Tosco, pero con un loop potente.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 7,
                'game_id'        => 141, // Don\'t Starve Together
                'title'          => 'Aprender a palos (y repetir)',
                'body'           => 'Super exigente, pero cada run te enseña algo. En coop es genial para montar “roles” y estrategias de base.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 7,
                'game_id'        => 142, // Terraria
                'title'          => 'Progresión infinita de crafteo',
                'body'           => 'Me encanta cómo pasas de “tengo un pico” a builds y bosses con mil combinaciones. Muy absorbente si te gusta optimizar.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 7,
                'game_id'        => 143, // Minecraft
                'title'          => 'La caja de herramientas definitiva',
                'body'           => 'Si te mola construir y optimizar granjas/bases, es imposible aburrirse. El survival depende de cómo te lo montes.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 7,
                'game_id'        => 70, // Dying Light: The Following - Enhanced Edition
                'title'          => 'Buen survival-action con tensión nocturna',
                'body'           => 'De día vas sobrado, de noche te acuerdas de que eres de carne. Progresión y exploración entretenidas, con buen ritmo.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 7,
                'game_id'        => 69, // Stranded Deep
                'title'          => 'Idea buena, ejecución floja',
                'body'           => 'Tiene su punto de “me busco la vida”, pero se me queda corto en sistemas y pulido. Me cansó antes de engancharme.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 7,
                'game_id'        => 136, // ARK: Survival Evolved
                'title'          => 'Vicio de progresión, pero sufrimiento',
                'body'           => 'Tamear y progresar mola muchísimo, pero entre grindeo, bugs y balance… a veces es más frustrante que divertido.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 7,
                'game_id'        => 137, // Rust
                'title'          => 'Peligro constante (y gente peor)',
                'body'           => 'El sistema de supervivencia y bases está guay, pero el online puede ser durísimo por la comunidad. Te exige mucha paciencia.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 7,
                'game_id'        => 21, // Heavy Rain
                'title'          => 'Me saca totalmente del survival',
                'body'           => 'Está hecho para “ver” la historia y tomar decisiones, pero yo aquí no siento sistemas ni tensión de supervivencia. Me aburrió.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 7,
                'game_id'        => 22, // Beyond: Two Souls
                'title'          => 'Cinemático, pero no es lo mío',
                'body'           => 'Tiene producción, sí, pero como juego no me engancha: prefiero craft, peligro y progresión a QTEs y escenas.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 7,
                'game_id'        => 17, // Virginia
                'title'          => 'Demasiado “experiencia”',
                'body'           => 'Aprecio el intento artístico, pero me falta interacción real y sistemas. No conecté nada con esto.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],

            // fran_juego
            [
                'user_id'        => 8,
                'game_id'        => 186, // Forza Horizon 5
                'title'          => 'Diversión instantánea en ruedas',
                'body'           => 'Te subes a cualquier coche y ya estás sonriendo. Eventos por todas partes y sensación arcade perfecta para desconectar.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 8,
                'game_id'        => 189, // Need for Speed Unbound
                'title'          => 'Estilo a saco y buenas carreras',
                'body'           => 'Visualmente tiene un rollazo brutal y las carreras son muy disfrutonas. No es perfecto, pero me lo paso genial.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 8,
                'game_id'        => 187, // Gran Turismo 7
                'title'          => 'Más serio, pero engancha',
                'body'           => 'Cuando quiero algo más “de conducción” que arcade, es mi sitio. Coleccionar coches y mejorar tiempos es un vicio.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 8,
                'game_id'        => 95, // Mario Kart 8 Deluxe
                'title'          => 'Pique asegurado siempre',
                'body'           => 'Da igual con quién juegue: siempre acaba en risas y piques. Es el juego perfecto para echar un rato sin pensar.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 8,
                'game_id'        => 50, // Hogwarts Legacy
                'title'          => 'Pasear por Hogwarts es magia',
                'body'           => 'Explorar el castillo y volar por ahí es lo mejor. Historia ok, pero como aventura para fans, muy disfrutable.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 8,
                'game_id'        => 207, // Borderlands 3
                'title'          => 'Loot y tiros para el finde',
                'body'           => 'Gunplay muy divertido y loot infinito. Ideal para jugar chill, reírte y explotar cosas sin complicarte.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 8,
                'game_id'        => 112, // Hades
                'title'          => '“Una run más” y son las 3am',
                'body'           => 'Va finísimo y es súper adictivo. No soy ultra de roguelikes, pero este me atrapa por ritmo y sensación de progreso.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 8,
                'game_id'        => 190, // Assetto Corsa Competizione
                'title'          => 'Cuando me da por lo serio',
                'body'           => 'No es mi mood de siempre, pero cuando quiero sim de verdad, impresiona. Eso sí, exige tiempo y paciencia.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 8,
                'game_id'        => 188, // F1 24
                'title'          => 'Carreras rápidas y adrenalina',
                'body'           => 'Perfecto para echar unas carreras sin complicarse demasiado. Me lo paso bien aunque no sea el sim definitivo.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 8,
                'game_id'        => 80, // It Takes Two
                'title'          => 'Coop de risas y variedad',
                'body'           => 'Cada fase cambia el gameplay y siempre tiene alguna idea nueva. Ideal para jugar con alguien un finde.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 8,
                'game_id'        => 81, // Split Fiction
                'title'          => 'Buen coop para pasar el rato',
                'body'           => 'Tiene momentos guays y se deja jugar fácil. No me voló la cabeza, pero para sesiones chill cumple.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 8,
                'game_id'        => 51, // Cyberpunk 2077
                'title'          => 'Buen viaje, pero no mi prioridad',
                'body'           => 'La ciudad y la historia están guapas, pero a mí me tira más algo directo tipo carreras/tiros. Aun así, lo disfruté.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 8,
                'game_id'        => 196, // Riders Republic
                'title'          => 'Deporte arcade para desconectar',
                'body'           => 'Me lo paso bien haciendo el cabra y probando eventos. No es súper profundo, pero es divertido en plan “chill”.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 8,
                'game_id'        => 191, // EA SPORTS FC 26
                'title'          => 'Partiditos y ya',
                'body'           => 'Para echar un rato con colegas o modo carrera me vale, pero no es de mis imprescindibles. Bien sin más.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 8,
                'game_id'        => 205, // Overwatch 2
                'title'          => 'Divertido… hasta que te toca la peña',
                'body'           => 'Cuando salen buenas partidas es muy guay, pero online a veces me quita las ganas. Lo juego por rachas.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 8,
                'game_id'        => 16, // Gone Home
                'title'          => 'No es mi rollo',
                'body'           => 'Demasiado lento y narrativo para mí. Yo quiero gameplay directo, no pasearme leyendo cosas.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 8,
                'game_id'        => 110, // Littlewood
                'title'          => 'Me aburre rápido',
                'body'           => 'Es cuqui y relajado, pero no me engancha. Prefiero algo con más acción o sensación de progreso “rápida”.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 8,
                'game_id'        => 17, // Virginia
                'title'          => 'Demasiado “experiencia”',
                'body'           => 'No conecté nada: me faltó diversión inmediata y juego de verdad. Se me hizo pesado.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],

            // catPlayer
            [
                'user_id'        => 9,
                'game_id'        => 30, // Stray
                'title'          => 'Un abrazo en forma de juego',
                'body'           => 'Me hizo sentir en casa en un mundo extraño. Es cortito, precioso y muy humano… incluso siendo un gato.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 9,
                'game_id'        => 32, // Spiritfarer
                'title'          => 'Llorar bonito',
                'body'           => 'Cálido, tierno y devastador a la vez. Te encariñas, te despides, y al final te quedas agradecida por el viaje.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 9,
                'game_id'        => 14, // What Remains of Edith Finch
                'title'          => 'Melancolía perfecta en pocas horas',
                'body'           => 'Cada historia es una manera distinta de contar y sentir. Se termina rápido, pero se queda contigo mucho tiempo.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 9,
                'game_id'        => 18, // Night in the Woods
                'title'          => 'Tristeza suave y personajes reales',
                'body'           => 'Me tocó por cómo habla de crecer, sentirse perdida y volver a casa. Parece simple, pero tiene mucha alma.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 9,
                'game_id'        => 15, // Firewatch
                'title'          => 'Un verano que no se olvida',
                'body'           => 'Los diálogos y la atmósfera hacen magia. Es íntimo y humano, de esos que te dejan pensando en silencio.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 9,
                'game_id'        => 19, // Oxenfree
                'title'          => 'Misterio teen con corazón',
                'body'           => 'Me encanta el tono y cómo fluye la conversación. Da mal rollito, pero siempre desde algo muy emocional.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 9,
                'game_id'        => 16, // Gone Home
                'title'          => 'Casa vacía, corazón lleno',
                'body'           => 'Me gusta ir atando piezas con detalles pequeños. No tiene prisa y justo por eso se siente tan personal.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 9,
                'game_id'        => 45, // Brothers: A Tale of Two Sons
                'title'          => 'Corto y muy emotivo',
                'body'           => 'De esos juegos que te cuentan mucho sin necesidad de palabras. Me dejó un nudo en la garganta.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 9,
                'game_id'        => 24, // The Wolf Among Us
                'title'          => 'Cuento oscuro muy disfrutable',
                'body'           => 'Personajes con carisma y un misterio que te tira de la mano. No es “cálido”, pero engancha mucho.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 9,
                'game_id'        => 102, // A Short Hike
                'title'          => 'Una tarde tranquila',
                'body'           => 'Me sentó genial: ligero, simpático y con esa sensación de libertad pequeñita. Ideal para desconectar.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 9,
                'game_id'        => 31, // Unpacking
                'title'          => 'Contar una vida con cajas',
                'body'           => 'Me flipó cómo transmite tanto con tan poco. Ordenar cosas y, sin darte cuenta, entender a una persona.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 9,
                'game_id'        => 33, // Dave the Diver
                'title'          => 'Chill con sorpresa',
                'body'           => 'Es divertido y relajante, y encima tiene momentos raros muy graciosos. Perfecto para jugar a ratitos.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 9,
                'game_id'        => 34, // Dredge
                'title'          => 'Melancolía con toque inquietante',
                'body'           => 'Pescar y explorar con ese puntito de miedo suave me encantó. Es oscuro, pero de una forma muy bonita.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 9,
                'game_id'        => 23, // Detroit: Become Human
                'title'          => 'Decisiones que te remueven',
                'body'           => 'Me gustó mucho por la emoción y por lo fácil que es encariñarte. A veces es muy “película”, pero funciona.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 9,
                'game_id'        => 27, // Call of the Sea
                'title'          => 'Bonito, aunque me faltó algo',
                'body'           => 'La ambientación es preciosa y la historia tiene encanto, pero no me llegó tan fuerte como otros indies emotivos.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 9,
                'game_id'        => 137, // Rust
                'title'          => 'Demasiado agresivo para mí',
                'body'           => 'No puedo con la tensión “hostil” y la toxicidad típica. Me saca totalmente: no es el tipo de experiencia que busco.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 9,
                'game_id'        => 136, // ARK: Survival Evolved
                'title'          => 'Mucho grindeo, poca calidez',
                'body'           => 'Entiendo el atractivo, pero a mí me agota. Se me hace duro y repetitivo, y no conecto con el tono.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 9,
                'game_id'        => 139, // 7 Days to Die
                'title'          => 'Estrés que no disfruto',
                'body'           => 'Entre lo tosco y la presión constante, no lo paso bien. Prefiero historias humanas a supervivencia “a gritos”.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],

            // pixelNacho
            [
                'user_id'        => 10,
                'game_id'        => 125, // Hollow Knight
                'title'          => 'Control perfecto y reto justo',
                'body'           => 'Se siente increíble de jugar: cada salto y cada golpe están donde tienen que estar. Te frustra, pero de la forma buena: te obliga a dominarlo.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 10,
                'game_id'        => 126, // Celeste
                'title'          => 'Aprender a base de intentos',
                'body'           => 'Precisión y checkpoints perfectos para el “una más”. Cada pantalla es una lección, y cuando te sale, te sientes dios.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 10,
                'game_id'        => 127, // Dead Cells
                'title'          => 'Runs adictivas',
                'body'           => 'Combate rápido, builds y mejora constante. Es el típico juego que te pica a hacerlo “mejor” cada run.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 10,
                'game_id'        => 128, // Cuphead
                'title'          => 'Reto y estilo a partes iguales',
                'body'           => 'Jefes que te pisan hasta que te aprendes cada patrón. Pero el control es tan fino que sabes que el fallo es tuyo.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 10,
                'game_id'        => 63, // Ori and the Will of the Wisps
                'title'          => 'Fluidez brutal',
                'body'           => 'Moverte por el mapa es una delicia. No es el más duro del mundo, pero es tan agradable de controlar que da gusto perfeccionarlo.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 10,
                'game_id'        => 134, // Katana ZERO
                'title'          => 'Ritmo y precisión',
                'body'           => 'Cada nivel es un puzzle de ejecución: repetir, pulir, clavar. Corto, intenso y con un flow que engancha.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 10,
                'game_id'        => 131, // Blasphemous
                'title'          => 'Duro y con identidad',
                'body'           => 'Me gusta el peso del combate y la estética. A veces es más tosco que “fino”, pero el reto y el mood compensan.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 10,
                'game_id'        => 98, // Metroid Dread
                'title'          => 'Rápido, tenso, preciso',
                'body'           => 'Se controla de lujo y tiene momentos de tensión muy bien medidos. Cuando te aprendes el mapa, te entran ganas de speedrun.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 10,
                'game_id'        => 132, // Axiom Verge
                'title'          => 'Buen metroidvania, pero irregular',
                'body'           => 'Tiene ideas chulas y exploración agradecida, aunque no todo se siente igual de pulido. Aun así, lo disfruté.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 10,
                'game_id'        => 133, // Guacamelee! 2
                'title'          => 'Plataformas con flow',
                'body'           => 'Combate y movimiento muy divertidos, y los retos de plataformas cuando se ponen serios se disfrutan muchísimo.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 10,
                'game_id'        => 118, // Spelunky 2
                'title'          => 'Frustración bien entendida',
                'body'           => 'Te mata por tus decisiones y por confiarte. Duele, pero cuando sales vivo de una situación imposible, es pura dopamina.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 10,
                'game_id'        => 112, // Hades
                'title'          => 'Rogue con control finísimo',
                'body'           => 'Va como la seda y te pide mejorar tu ejecución. La narrativa está guay, pero lo que me engancha es el “flow” de combate.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 10,
                'game_id'        => 113, // The Binding of Isaac: Rebirth
                'title'          => 'Mil runs, mil decisiones',
                'body'           => 'Aprender items, sinergias y gestionar el riesgo es el juego. Es caos, sí, pero un caos que se domina con horas.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 10,
                'game_id'        => 124, // Returnal
                'title'          => 'Buen reto, pero no me atrapó del todo',
                'body'           => 'Tiene combate muy bueno, pero me cuesta entrar en el ritmo de runs aquí. Lo respeto, pero no me enganchó como otros.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 10,
                'game_id'        => 77, // Portal 2
                'title'          => 'Buen puzzle, pero yo soy de “runs”',
                'body'           => 'Me parece brillante, pero me pide otro tipo de foco. Yo disfruto más de ejecución y control que de resolver salas.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 10,
                'game_id'        => 155, // Crusader Kings III
                'title'          => 'Demasiado gestión para mí',
                'body'           => 'Entiendo que es profundo, pero me pierde entre menús y sistemas. No siento ese “reto justo” de dominar controles.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 10,
                'game_id'        => 168, // Microsoft Flight Simulator 2020
                'title'          => 'Impresionante, pero me aburre',
                'body'           => 'Técnicamente es una locura, pero no me da esa adrenalina de mejorar runs. Se me hace demasiado lento.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 10,
                'game_id'        => 170, // Anno 1800
                'title'          => 'No es mi tipo de reto',
                'body'           => 'Me gusta optimizar, pero aquí es todo gestión y estrategia a largo plazo. Yo necesito precisión y acción directa.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],

            // jnavarro
            [
                'user_id'        => 11,
                'game_id'        => 152, // Sid Meier’s Civilization VI
                'title'          => 'El “una turno más” definitivo',
                'body'           => 'Campañas larguísimas, decisiones con impacto y mil rutas para optimizar. Me encanta analizar aperturas, timing de distritos y condiciones de victoria.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 11,
                'game_id'        => 155, // Crusader Kings III
                'title'          => 'Complejidad con historias emergentes',
                'body'           => 'Es estrategia, pero también novela dinámica. Cada decisión política/ familiar te cambia la partida y te mete en bucles de obsesión.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 11,
                'game_id'        => 156, // Stellaris
                'title'          => '4X espacial para perder semanas',
                'body'           => 'Exploración, diplomacia, economía y guerras a gran escala. La gracia está en planificar builds y adaptarte a eventos que te rompen el plan.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 11,
                'game_id'        => 151, // Total War: WARHAMMER III
                'title'          => 'Macro + batallas espectaculares',
                'body'           => 'Campaña de mapa con decisiones y luego batallas enormes que cambian el resultado. Variedad de facciones y metas muy distintas.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 11,
                'game_id'        => 153, // XCOM 2
                'title'          => 'Táctica punitiva y brillante',
                'body'           => 'Gestión de campaña + decisiones tácticas que te castigan si te confías. Cuando una misión sale perfecta, es satisfacción pura.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 11,
                'game_id'        => 154, // Into the Breach
                'title'          => 'Ajedrez en formato compacto',
                'body'           => 'Información perfecta y puzzles tácticos limpísimos. Ideal para sesiones cortas con la cabeza a tope.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 11,
                'game_id'        => 157, // Frostpunk
                'title'          => 'Decisiones duras, consecuencias duras',
                'body'           => 'Te obliga a priorizar y asumir costes morales. La tensión de recursos y el clima lo convierten en una campaña súper absorbente.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 11,
                'game_id'        => 161, // RimWorld
                'title'          => 'Historias sistémicas infinitas',
                'body'           => 'Gestión emergente y caos controlado. Te vuelves obsesivo con optimizar colonos, defensas, rutas… y siempre pasa “algo”.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 11,
                'game_id'        => 170, // Anno 1800
                'title'          => 'Economía, cadenas y optimización',
                'body'           => 'Me encanta montar producción eficiente y ajustar la logística. Es menos “guerra” y más “gestión fina”, pero engancha.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 11,
                'game_id'        => 158, // Cities: Skylines
                'title'          => 'Planificación urbana terapéutica',
                'body'           => 'Diseñar, iterar y corregir tráfico/servicios es un puzzle enorme. No siempre es difícil, pero sí muy satisfactorio.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 11,
                'game_id'        => 148, // Age of Empires IV
                'title'          => 'RTS sólido para mejorar macro',
                'body'           => 'Buen ritmo y sensación de progreso. Me gusta practicar aperturas y optimizar economía para llegar a timings fuertes.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 11,
                'game_id'        => 149, // StarCraft II
                'title'          => 'El estándar de la ejecución',
                'body'           => 'Decisiones + mecánica pura: macro, micro, scouting. Si te obsesiona mejorar, aquí tienes juego para años.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 11,
                'game_id'        => 150, // Company of Heroes 3
                'title'          => 'Táctica interesante, pero irregular',
                'body'           => 'Tiene buenas ideas y combates con cobertura muy guapos, pero no todo está igual de fino/pulido. Aun así, se deja jugar.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 11,
                'game_id'        => 159, // Factorio
                'title'          => 'Optimización adictiva',
                'body'           => 'Es literalmente convertir problemas en líneas de producción. Si te gustan los cuellos de botella y la eficiencia, es una droga.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 11,
                'game_id'        => 160, // Satisfactory
                'title'          => 'Factorio en 3D, más chill',
                'body'           => 'Muy satisfactorio construir y escalar fábricas. Menos “hardcore” que Factorio, pero igual de absorbente si te gusta diseñar.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 11,
                'game_id'        => 108, // Coffee Talk
                'title'          => 'Demasiado pasivo',
                'body'           => 'Me falta toma de decisiones real y sistemas. Es más experiencia narrativa relajada que juego estratégico, y no conecté.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 11,
                'game_id'        => 31, // Unpacking
                'title'          => 'Bonito, pero sin “chicha” estratégica',
                'body'           => 'Es agradable, pero no me da complejidad ni problemas que resolver a medio/largo plazo. Se me queda muy ligero.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 11,
                'game_id'        => 19, // Oxenfree
                'title'          => 'Misterio que no me atrapó',
                'body'           => 'Tiene su encanto, pero prefiero juegos donde mis decisiones afectan sistemas y campañas. Aquí me resultó demasiado lineal.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],

            // lucia_m
            [
                'user_id'        => 12,
                'game_id'        => 10, // Call of Cthulhu
                'title'          => 'Misterio lovecraftiano con buen suspense',
                'body'           => 'Me encanta investigar, atar pistas y sentir esa inquietud constante. No es terror “a sustos”, es atmósfera y paranoia.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 12,
                'game_id'        => 11, // Sherlock Holmes: Chapter One
                'title'          => 'Detective total: pistas y deducciones',
                'body'           => 'El placer está en mirar bien, relacionar detalles y sacar conclusiones. Ideal si te gusta sentirte detective de verdad.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 12,
                'game_id'        => 13, // Return Of The Obra Dinn
                'title'          => 'Puro caso detectivesco',
                'body'           => 'Aquí todo es observar, escuchar y deducir. Me tuvo obsesionada con teorías y “espera, esto encaja con aquello”.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 12,
                'game_id'        => 12, // Sherlock Holmes The Awakened
                'title'          => 'Sherlock + horror suave (perfect match)',
                'body'           => 'Investigación con un toque inquietante muy narrativo. Justo el tipo de tensión que disfruto: misterio que se oscurece.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 12,
                'game_id'        => 73, // Alan Wake
                'title'          => 'Thriller con linterna',
                'body'           => 'Historia de misterio que engancha y ambientación inquietante. Me gusta ir avanzando como si fuera una serie rara.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 12,
                'game_id'        => 24, // The Wolf Among Us
                'title'          => 'Caso noir con personajes brutales',
                'body'           => 'Misterio, decisiones y un tono oscuro que engancha. Ideal para comentar teorías y sospechosos a cada capítulo.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 12,
                'game_id'        => 4, // Disco Elysium
                'title'          => 'Investigación rara, pero buenísima',
                'body'           => 'Es muy distinto, pero como “resolver un caso” y leer entre líneas es una pasada. Te hace pensar y reinterpretar todo.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 12,
                'game_id'        => 177, // SOMA
                'title'          => 'Inquietante y de ideas fuertes',
                'body'           => 'Más que miedo, me dio inquietud y preguntas. No es mi terror favorito, pero su misterio y lo que plantea me fascinó.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 12,
                'game_id'        => 175, // Silent Hill 2
                'title'          => 'Demasiado pesado para mí',
                'body'           => 'Entiendo que es un clásico, pero su terror es muy opresivo y me cuesta disfrutarlo. Me interesa más investigar que sufrir.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 12,
                'game_id'        => 77, // Portal 2
                'title'          => 'Puzzles buenísimos, pero otro mood',
                'body'           => 'Me parece brillante, pero yo busco más misterio narrativo y casos. Aun así, los puzzles están muy bien pensados.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 12,
                'game_id'        => 7, // Thimbleweed Park
                'title'          => 'Misterio retro con encanto',
                'body'           => 'Tiene vibra de “caso raro” y eso me encanta. Puzzles a veces rebuscados, pero me lo pasé bien investigando.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 12,
                'game_id'        => 6, // Return to Monkey Island
                'title'          => 'Aventura ligera para descansar',
                'body'           => 'Me gusta como aventura y por el tono, aunque no me da ese suspense/investigación que más me engancha.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 12,
                'game_id'        => 14, // What Remains of Edith Finch
                'title'          => 'Bonito, pero más emocional que caso',
                'body'           => 'Está muy bien contado y tiene momentos preciosos, pero yo lo disfruto más cuando hay misterio y deducción.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 12,
                'game_id'        => 23, // Detroit: Become Human
                'title'          => 'Cinemático y entretenido',
                'body'           => 'Me enganchó por las decisiones y el suspense, aunque a veces se siente más “peli” que investigación real.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 12,
                'game_id'        => 21, // Heavy Rain
                'title'          => 'Buen thriller, aunque irregular',
                'body'           => 'Tiene tensión y va de “resolver”, pero algunas partes se me hacen lentas. Aun así, me gusta el rollo caso/suspense.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 12,
                'game_id'        => 200, // Call of Duty: Warzone
                'title'          => 'No quiero tiros competitivos',
                'body'           => 'Cero interés en battle royale y estrés online. Yo quiero pistas, historia y misterio, no reflejos y meta.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 12,
                'game_id'        => 204, // Counter-Strike 2
                'title'          => 'No es mi mundo',
                'body'           => 'Demasiado competitivo y “puro shooter”. No me aporta nada de lo que busco en un juego.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 12,
                'game_id'        => 183, // Mortal Kombat 1
                'title'          => 'Peleas por peleas, paso',
                'body'           => 'Respeto el juego, pero no me interesa aprender combos ni el competitivo. Prefiero historias y casos.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],

            // pabloc
            [
                'user_id'        => 13,
                'game_id'        => 84, // The Witcher 3: Wild Hunt
                'title'          => 'Open world con misiones de verdad',
                'body'           => 'Lo comparo con casi todo: quest design, builds, ritmo y lore. Tiene secundarias que podrían ser juegos aparte y un mundo coherente que invita a explorar.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 13,
                'game_id'        => 89, // The Elder Scrolls V: Skyrim
                'title'          => 'Sandbox de builds infinito',
                'body'           => 'No es el más fino en combate, pero como sistema de exploración + rol es un pozo sin fondo. Siempre vuelvo con otra build.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 13,
                'game_id'        => 88, // Fallout: New Vegas
                'title'          => 'RPG sistémico con decisiones reales',
                'body'           => 'Facciones, reputación, builds y misiones con ramificaciones. A nivel de sistemas/elecciones, sigue siendo referencia.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 13,
                'game_id'        => 5, // NieR:Automata
                'title'          => 'Acción + narrativa + ideas',
                'body'           => 'Más allá del combate, lo que me flipa es cómo usa sistemas y rutas para contar algo. Tiene lore y momentos épicos a su manera.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 13,
                'game_id'        => 90, // Kingdom Come: Deliverance
                'title'          => 'RPG “simulacionista”',
                'body'           => 'No es cómodo: exige aprender combate y gestionar tu personaje. Pero como inmersión y progresión, es muy satisfactorio.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 13,
                'game_id'        => 51, // Cyberpunk 2077
                'title'          => 'Builds y ciudad con identidad',
                'body'           => 'La gracia está en montar build y recorrer Night City buscando gigs y misiones. Tiene altibajos, pero a nivel de atmósfera y sistemas me gusta.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 13,
                'game_id'        => 86, // Mass Effect: Legendary Edition
                'title'          => 'Trilogía muy bien envejecida',
                'body'           => 'Narrativa fuerte y progresión de personaje que engancha. No es “open world”, pero el lore y las decisiones compensan.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 13,
                'game_id'        => 58, // Ghost of Tsushima
                'title'          => 'Buen open world, pero más “limpio”',
                'body'           => 'Explorar se siente bien y el combate es sólido. Aun así, lo valoro más por experiencia que por profundidad de sistemas.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 13,
                'game_id'        => 53, // Horizon Zero Dawn
                'title'          => 'Mundo interesante, loop correcto',
                'body'           => 'Cazar máquinas mola y la historia engancha, aunque en sistemas RPG se queda más ligero. Cumple y se disfruta.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 13,
                'game_id'        => 55, // Red Dead Redemption 2
                'title'          => 'Producción brutal, sistemas lentos',
                'body'           => 'Como mundo y narrativa es top, pero a nivel “jugar por builds/sistemas” se me hace pesado. Aun así, es enorme.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 13,
                'game_id'        => 52, // Starfield
                'title'          => 'Buen sandbox, pero irregular',
                'body'           => 'Tiene builds y exploración, pero el pacing y la estructura por planetas me deja sensaciones mixtas. Me entretuvo, sin enamorarme.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 13,
                'game_id'        => 66, // The Outer Worlds 2
                'title'          => 'RPG simpático y con opciones',
                'body'           => 'Me gusta el enfoque a builds y diálogos, y el tono más satírico. No llega a New Vegas, pero como “sistemas” es disfrutable.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 13,
                'game_id'        => 91, // Diablo IV
                'title'          => 'Buildcrafting y loot, sin sorpresas',
                'body'           => 'Buen loop de progresión y teoría de builds, pero depende mucho del endgame y del balance de temporadas. Me engancha por ratos.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 13,
                'game_id'        => 192, // NBA 2K26
                'title'          => 'Para desconectar competitivo',
                'body'           => 'Partidos rápidos y modo carrera para desconectar del RPG. Me gusta optimizar stats y “rol” del jugador como si fuera una build.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 13,
                'game_id'        => 85, // Elden Ring
                'title'          => 'Buen mundo, pero el “souls” me frena',
                'body'           => 'La exploración y el diseño están muy bien, pero la dificultad y el enfoque no encajan con lo que busco en un RPG de sistemas.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 13,
                'game_id'        => 103, // Dorfromantik
                'title'          => 'Demasiado chill para mí',
                'body'           => 'Es bonito, pero no me da builds, misiones ni exploración. Lo siento como un puzzle relajante y ya.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 13,
                'game_id'        => 104, // Cozy Grove
                'title'          => 'No busco “tareas” diarias',
                'body'           => 'Entiendo el encanto, pero se me hace lento y rutinario. Prefiero mundos con sistemas RPG y progresión más intensa.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 13,
                'game_id'        => 110, // Littlewood
                'title'          => 'No conecto con lo cozy',
                'body'           => 'Me aburre rápido: no hay ese componente de builds, combate o lore que me engancha. No es mi vibra.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],

            // elenaRz
            [
                'user_id'        => 14,
                'game_id'        => 28, // Botany Manor
                'title'          => 'Elegante, corto y súper satisfactorio',
                'body'           => 'Puzzles suaves pero inteligentes, integrados con el entorno de forma preciosa. Me dejó esa sensación de “qué bien pensado está todo”.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 14,
                'game_id'        => 27, // Call of the Sea
                'title'          => 'Misterio bonito con buen ritmo',
                'body'           => 'Ambientación preciosa y un misterio que te empuja a seguir. Puzzles correctos y un “wow” suave cuando encajan las piezas.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 14,
                'game_id'        => 77, // Portal 2
                'title'          => 'Puzzles perfectos, ritmo perfecto',
                'body'           => 'Cada sala te enseña algo y lo eleva sin hacerse pesado. Es un masterclass de diseño y pacing, con humor que suma.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 14,
                'game_id'        => 13, // Return Of The Obra Dinn
                'title'          => 'Un puzzle de deducción brillante',
                'body'           => 'Te obliga a observar y deducir con paciencia, y cuando haces “click” es increíble. Muy de lista selecta.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 14,
                'game_id'        => 78, // The Stanley Parable
                'title'          => 'Un “wow” meta muy bien medido',
                'body'           => 'Corto, raro y con ideas. No es para jugarlo cien horas: es para vivirlo, reírte y pensar “vale, esto era el punto”.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 14,
                'game_id'        => 14, // What Remains of Edith Finch
                'title'          => 'Historia corta que se queda',
                'body'           => 'Cada segmento tiene una idea jugable distinta y un ritmo precioso. Me dejó melancólica, pero satisfecha.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 14,
                'game_id'        => 79, // Inscryption
                'title'          => 'Sorpresa constante',
                'body'           => 'Me encanta cuando un juego cambia las reglas sin avisar y aun así se siente coherente. Muy “wow” si te dejas llevar.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 14,
                'game_id'        => 24, // The Wolf Among Us
                'title'          => 'Thriller narrativo que engancha',
                'body'           => 'Buen misterio, buen ritmo por episodios y personajes con carisma. No es puzzle, pero como experiencia corta funciona.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 14,
                'game_id'        => 45, // Brothers: A Tale of Two Sons
                'title'          => 'Corto, simple, emotivo',
                'body'           => 'Una experiencia compacta que te deja huella. Me gusta que no se alargue: llega, hace su efecto y se va.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 14,
                'game_id'        => 30, // Stray
                'title'          => 'Bonito y muy agradable',
                'body'           => 'Estilo y atmósfera top, y encima dura lo justo. No es un puzzle difícil, pero es un paseo precioso.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 14,
                'game_id'        => 31, // Unpacking
                'title'          => 'Minimalista y con encanto',
                'body'           => 'Me flipa cómo cuenta una historia sin palabras. Es sencillo, pero cada nivel tiene un detalle que te hace sonreír.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 14,
                'game_id'        => 4, // Disco Elysium
                'title'          => 'Buenísimo, pero requiere energía',
                'body'           => 'Tiene ideas y escritura increíble, pero no es “experiencia corta”. Me lo guardo para cuando quiero algo denso y raro.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 14,
                'game_id'        => 102, // A Short Hike
                'title'          => 'Chill y simpático',
                'body'           => 'Muy agradable para una tarde. No me explotó la cabeza, pero está bien hecho y se disfruta sin esfuerzo.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 14,
                'game_id'        => 19, // Oxenfree
                'title'          => 'Misterio curioso, ritmo irregular',
                'body'           => 'Tiene un tono muy guay y diálogos naturales, aunque a ratos se me hizo un pelín lento. Aun así, me gustó.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 14,
                'game_id'        => 7, // Thimbleweed Park
                'title'          => 'Retro divertido, pero no tan fino',
                'body'           => 'Tiene buenas ideas y humor, pero algunos puzzles me parecen menos elegantes. Lo disfruté, pero no es mi top.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 14,
                'game_id'        => 91, // Diablo IV
                'title'          => 'Demasiado largo y de “grindeo”',
                'body'           => 'No es mi estilo: prefiero experiencias cortas con ideas claras, no loops infinitos de loot. Me cansó rápido.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 14,
                'game_id'        => 202, // Battlefield 2042
                'title'          => 'Ruido sin el “wow” que busco',
                'body'           => 'Demasiado caótico y repetitivo para mí. No me aporta diseño elegante ni una experiencia compacta.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 14,
                'game_id'        => 137, // Rust
                'title'          => 'No es mi mundo',
                'body'           => 'Hostilidad constante y sesiones largas: justo lo contrario de lo que disfruto. No conecté nada.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],

            // andres_m
            [
                'user_id'        => 15,
                'game_id'        => 159, // Factorio
                'title'          => 'La fábrica nunca es suficiente',
                'body'           => 'Optimizar cuellos de botella, escalar producción y rehacer líneas… es una obsesión maravillosa. Cada mejora se nota y te pide otra más.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 15,
                'game_id'        => 160, // Satisfactory
                'title'          => 'Factorio en 3D (y qué gusto)',
                'body'           => 'Planificar fábricas en vertical, rutas y ratios es un vicio. Más relajado que Factorio, pero igual de satisfactorio cuando lo dejas fino.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 15,
                'game_id'        => 161, // RimWorld
                'title'          => 'Gestión emergente y caos controlado',
                'body'           => 'Lo mejor es que siempre hay un problema “nuevo” que resolver: colonos, recursos, defensa, clima… y acabas optimizando hasta el último detalle.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 15,
                'game_id'        => 158, // Cities: Skylines
                'title'          => 'Tráfico = puzzle infinito',
                'body'           => 'Me flipa diseñar y luego corregir: rotondas, transporte público, zonas… Cuando la ciudad fluye, es una satisfacción enorme.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 15,
                'game_id'        => 170, // Anno 1800
                'title'          => 'Cadenas de producción finísimas',
                'body'           => 'Aquí la gracia es la logística: ratios, rutas, consumo y expansión. Es de los mejores para “ingeniería” de recursos.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 15,
                'game_id'        => 165, // Planet Zoo
                'title'          => 'Gestión bonita y detallista',
                'body'           => 'Me gusta porque mezcla eficiencia con estética. Optimizar recorridos, hábitats y economía mientras queda bonito: top.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 15,
                'game_id'        => 164, // Planet Coaster
                'title'          => 'Diseñar parques es un vicio',
                'body'           => 'Entre decoración y optimización de colas/ingresos, me puedo tirar horas. Más creativo que “duro”, pero engancha.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 15,
                'game_id'        => 162, // Dwarf Fortress
                'title'          => 'Complejidad absurda (en el buen sentido)',
                'body'           => 'Te abruma al principio, pero cuando entiendes sistemas y automatizas rutinas, es pura satisfacción. Juego para obsesivos.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 15,
                'game_id'        => 163, // Banished
                'title'          => 'Gestión dura y muy limpia',
                'body'           => 'No tiene mil capas, pero cada decisión pesa. Planificar stocks y expansión sin colapsar es lo que me gusta.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 15,
                'game_id'        => 157, // Frostpunk
                'title'          => 'Optimizar con moralidad (y frío)',
                'body'           => 'Me encanta porque no es solo números: también decisiones difíciles. La gestión de recursos bajo presión es súper absorbente.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 15,
                'game_id'        => 152, // Sid Meier’s Civilization VI
                'title'          => 'Estrategia larga para optimizar',
                'body'           => 'No es mi “main” como Factorio, pero me gusta planificar economía, ciencia y expansión. Buen juego para analizar turnos.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 15,
                'game_id'        => 169, // Euro Truck Simulator 2
                'title'          => 'Chill con sensación de rutina',
                'body'           => 'Lo juego para desconectar. No es optimización hardcore, pero tiene ese puntito de planificar rutas y gestionar el tiempo.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 15,
                'game_id'        => 167, // Farming Simulator 22
                'title'          => 'Satisfactorio, pero lento',
                'body'           => 'Me gusta la idea de eficiencia y maquinaria, pero el ritmo se me hace demasiado pausado. Lo disfruto por temporadas.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 15,
                'game_id'        => 156, // Stellaris
                'title'          => 'Buen 4X, pero se me dispersa',
                'body'           => 'Tiene sistemas interesantes, pero a veces siento que es más “gestión macro” que optimización fina. Aun así, está bien.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 15,
                'game_id'        => 140, // Project Zomboid
                'title'          => 'Sistemas brutales, estrés excesivo',
                'body'           => 'Me flipa la profundidad, pero para mí es demasiado castigo constante. Lo respeto, pero no me apetece siempre ese nivel de tensión.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 15,
                'game_id'        => 21, // Heavy Rain
                'title'          => 'Cinemático que no me aporta',
                'body'           => 'Me faltan sistemas y decisiones con impacto “mecánico”. Aquí siento que solo miro escenas, y me aburre.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 15,
                'game_id'        => 24, // The Wolf Among Us
                'title'          => 'Buen rollo narrativo, pero no es lo mío',
                'body'           => 'Tiene historia y estilo, pero yo busco optimizar y construir. No conecto con aventuras de decisiones rápidas.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 15,
                'game_id'        => 22, // Beyond: Two Souls
                'title'          => 'Demasiado “peli”',
                'body'           => 'Producción alta, pero como juego me deja frío. Prefiero cadenas de producción a QTEs y escenas largas.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],

            // irenec
            [
                'user_id'        => 16,
                'game_id'        => 32, // Spiritfarer
                'title'          => 'Me rompió y me curó a la vez',
                'body'           => 'Es un juego que te acompaña: te enseña a despedirte con cariño. Me dejó con el pecho apretado, pero también con paz.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 16,
                'game_id'        => 16, // Gone Home
                'title'          => 'Una casa que cuenta una vida',
                'body'           => 'Me encantó ir encontrando detalles pequeños y sentir que estaba leyendo a una persona. Íntimo, lento y muy humano.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 16,
                'game_id'        => 14, // What Remains of Edith Finch
                'title'          => 'Corto, precioso y triste',
                'body'           => 'Cada historia es distinta y te toca de una manera diferente. Lo terminé con lágrimas y esa sensación rara de gratitud.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 16,
                'game_id'        => 15, // Firewatch
                'title'          => 'Soledad que se siente real',
                'body'           => 'La atmósfera y los diálogos hacen que te metas de lleno. Es de esos juegos que parecen una conversación que necesitabas.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 16,
                'game_id'        => 18, // Night in the Woods
                'title'          => 'Volver a casa y no encajar',
                'body'           => 'Me tocó por lo cotidiano: amistades, ansiedad, crecer. Es melancólico, pero también cálido y esperanzador.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 16,
                'game_id'        => 45, // Brothers: A Tale of Two Sons
                'title'          => 'Te cuenta mucho sin palabras',
                'body'           => 'Es simple, pero muy efectivo. Me dejó un nudo en la garganta y una sensación de “qué bonito y qué duro”.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 16,
                'game_id'        => 23, // Detroit: Become Human
                'title'          => 'Emocional y muy de decisiones',
                'body'           => 'Me enganchó porque te hace sentir responsable. A veces es muy “película”, pero me importaron los personajes.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 16,
                'game_id'        => 21, // Heavy Rain
                'title'          => 'Thriller con momentos intensos',
                'body'           => 'Tiene escenas que te ponen nerviosa y otras más lentas. Aun así, me quedo con el drama y el tono humano.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 16,
                'game_id'        => 30, // Stray
                'title'          => 'Bonito y reconfortante',
                'body'           => 'Es un paseo precioso, con un tono muy cálido. Me dejó contenta, como después de ver una peli bonita.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 16,
                'game_id'        => 102, // A Short Hike
                'title'          => 'Una tarde ligera y bonita',
                'body'           => 'Me sentó genial: amable, simpático y con esa sensación de libertad pequeñita. Ideal para desconectar.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 16,
                'game_id'        => 19, // Oxenfree
                'title'          => 'Inquietante pero emocional',
                'body'           => 'Me gustó el misterio y los diálogos naturales. No da miedo fuerte, pero sí ese mal cuerpo suave que engancha.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 16,
                'game_id'        => 37, // The Last of Us Part I
                'title'          => 'Historia potente, pero me dejó tocada',
                'body'           => 'Es buenísima narrativamente, pero es tan dura que me costó. Aun así, los personajes y la atmósfera son top.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 16,
                'game_id'        => 31, // Unpacking
                'title'          => 'Sencillo y muy tierno',
                'body'           => 'Me gusta cómo cuenta una vida con objetos. Es calmado, corto y te deja una sensación bonita al terminar.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 16,
                'game_id'        => 4, // Disco Elysium
                'title'          => 'Brillante, pero demasiado denso',
                'body'           => 'La escritura es increíble, pero a mí me pide un estado mental muy concreto. Lo valoro, aunque no lo disfruté tanto.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 16,
                'game_id'        => 22, // Beyond: Two Souls
                'title'          => 'Emocional, pero irregular',
                'body'           => 'Tiene momentos que me tocaron, pero otros se me hicieron pesados. Aun así, me interesó por los personajes.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 16,
                'game_id'        => 198, // DOOM Eternal
                'title'          => 'Demasiado agresivo para mí',
                'body'           => 'Sé que está muy bien hecho, pero no disfruto esa velocidad y violencia constante. Me satura.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 16,
                'game_id'        => 182, // Tekken 8
                'title'          => 'No me apetece competitivo',
                'body'           => 'Entre combos y práctica, siento que es un juego para otra energía. Yo busco historias y atmósfera.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 16,
                'game_id'        => 206, // Apex Legends
                'title'          => 'Estrés online, no gracias',
                'body'           => 'Competitivo y rápido: justo lo contrario de lo que me apetece. Prefiero experiencias íntimas y calmadas.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],

            // oscarDG
            [
                'user_id'        => 17,
                'game_id'        => 198, // DOOM Eternal
                'title'          => 'Adrenalina pura, cero pausa',
                'body'           => 'Esto es el “flow” en estado puro: moverte, gestionar recursos y reventar todo sin parar. Cuando entras en ritmo, es droga.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 17,
                'game_id'        => 203, // Halo Infinite
                'title'          => 'Gunplay fino y partidas rápidas',
                'body'           => 'Se dispara de lujo y las partidas van al grano. Ideal para estar tenso y disfrutar la competición sin historias.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 17,
                'game_id'        => 209, // Half-Life: Alyx
                'title'          => 'VR que te vuela la cabeza',
                'body'           => 'Inmersión brutal y combate con una tensión increíble. Es de esos juegos que te hacen decir “ok, esto es otra liga”.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 17,
                'game_id'        => 208, // Metro Exodus
                'title'          => 'Acción con atmósfera y tensión',
                'body'           => 'Me gusta porque no es solo disparar: hay momentos de sigilo y supervivencia que te ponen nervioso. Muy disfrutable.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 17,
                'game_id'        => 189, // Need for Speed Unbound
                'title'          => 'Arcade con estilo y velocidad',
                'body'           => 'Carreras directas, derrapes y esa sensación de ir siempre al límite. Perfecto para desconectar y meterle caña.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 17,
                'game_id'        => 202, // Battlefield 2042
                'title'          => 'Caos de guerra (del bueno)',
                'body'           => 'Partidas enormes, explosiones y momentos locos cada dos minutos. No siempre está equilibrado, pero el espectáculo me encanta.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 17,
                'game_id'        => 65, // Deathloop
                'title'          => 'Acción con idea guapa',
                'body'           => 'Me divierte porque mezcla tiroteo con experimentar rutas. No es el shooter más puro, pero tiene personalidad.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 17,
                'game_id'        => 207, // Borderlands 3
                'title'          => 'Loot + tiros sin pensar',
                'body'           => 'Gunplay muy divertido y mil armas. Ideal para jugar en plan chill-agresivo: reventar cosas y a otra misión.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 17,
                'game_id'        => 205, // Overwatch 2
                'title'          => 'Buen pique por rachas',
                'body'           => 'Cuando hay buen matchmaking es muy divertido y rápido. Pero como la partida se tuerza por el equipo, me quita las ganas.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 17,
                'game_id'        => 206, // Apex Legends
                'title'          => 'Movimiento top, estrés también',
                'body'           => 'Tiene un ritmo brutal y se juega muy bien, pero es un battle royale: o entras a competir o te frustras. Yo lo juego por temporadas.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 17,
                'game_id'        => 200, // Call of Duty: Warzone
                'title'          => 'Adictivo, pero demasiado meta',
                'body'           => 'Gunplay muy bueno y momentos de locura, pero entre el meta y el sudor competitivo, a veces se me hace pesado.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 17,
                'game_id'        => 51, // Cyberpunk 2077
                'title'          => 'Buen mundo, ritmo irregular',
                'body'           => 'Tiene acción y una ciudad brutal, pero a ratos se me va a diálogos/lore y yo quiero más gameplay directo. Aun así, mola.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 17,
                'game_id'        => 70, // Dying Light: The Following - Enhanced Edition
                'title'          => 'Parkour + tensión nocturna',
                'body'           => 'De día vas fuerte, de noche te lo piensas. Me gusta esa mezcla de acción directa y momentos de “uh, cuidado”.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 17,
                'game_id'        => 182, // Tekken 8
                'title'          => 'Muy técnico para lo que busco',
                'body'           => 'Está guapísimo, pero me exige demasiado aprendizaje de combos. Yo soy más de entrar, pegar tiros o correr carreras y ya.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 17,
                'game_id'        => 204, // Counter-Strike 2
                'title'          => 'Demasiado seco y punitivo',
                'body'           => 'Entiendo el competitivo, pero me desespera: una bala y fuera, mucho “hold angle” y poca diversión inmediata para mí.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 17,
                'game_id'        => 104, // Cozy Grove
                'title'          => 'Me duermo',
                'body'           => 'Muy mono y calmado, pero yo necesito adrenalina. Aquí siento que no pasa nada.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 17,
                'game_id'        => 108, // Coffee Talk
                'title'          => 'Demasiado conversación',
                'body'           => 'Respeto el rollo, pero me falta gameplay. Yo quiero acción directa, no leer y servir cafés.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 17,
                'game_id'        => 31, // Unpacking
                'title'          => 'No es un juego para mí',
                'body'           => 'Está bien hecho, pero me aburre muchísimo. No me da tensión, ni acción, ni velocidad.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],

            // hectors
            [
                'user_id'        => 19,
                'game_id'        => 138, // DayZ
                'title'          => 'Hardcore de verdad',
                'body'           => 'Aquí sobrevives por decisiones y paranoia: sonido, líneas de visión, hambre, enfermedades… y el otro jugador es el peor evento aleatorio.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 19,
                'game_id'        => 137, // Rust
                'title'          => 'Caos PvP y adrenalina',
                'body'           => 'Construyes, farmeas, y en dos segundos te lo pueden borrar todo. Es frustrante, sí… por eso engancha. Buenas runs = dopamina.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 19,
                'game_id'        => 136, // ARK: Survival Evolved
                'title'          => 'Grindeo duro, sandbox enorme',
                'body'           => 'Tamear, progresar y defender base en PvP es una locura. Tiene sufrimiento y drama, pero cuando te sale, te sientes invencible.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 19,
                'game_id'        => 139, // 7 Days to Die
                'title'          => 'Preparar la horda es el juego',
                'body'           => 'La gracia está en planificar: base, trampas, munición y rutas. La noche de horda te pone a prueba y si aguantas, orgullo máximo.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 19,
                'game_id'        => 147, // The Forest
                'title'          => 'Supervivencia sucia y tensa',
                'body'           => 'Construir rápido y sobrevivir a la noche con esa tensión constante es lo mejor. No es “limpio”, pero es intenso.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 19,
                'game_id'        => 70, // Dying Light: The Following - Enhanced Edition
                'title'          => 'Acción survival con buen ritmo',
                'body'           => 'Parkour, craft y la noche que te obliga a ir con cuidado. No es tan hardcore como DayZ, pero es adrenalina constante.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 19,
                'game_id'        => 140, // Project Zomboid
                'title'          => 'Sistemas brutales, castigo constante',
                'body'           => 'Me flipa la profundidad, pero aquí un error tonto te mata. Justo eso lo hace bueno: aprender a no confiarte nunca.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 19,
                'game_id'        => 135, // Valheim
                'title'          => 'Survival más chill, pero cumple',
                'body'           => 'No es PvP caótico, pero tiene progreso y combate decente. Me sirve cuando quiero construir y pegarme sin sufrir tanto.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 19,
                'game_id'        => 142, // Terraria
                'title'          => 'Sandbox enorme, pero menos “hardcore”',
                'body'           => 'Tiene progresión y bosses, pero no me da esa tensión de perderlo todo. Aun así, es buen vicio si te pones.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 19,
                'game_id'        => 143, // Minecraft
                'title'          => 'Clásico sandbox, pero me falta peligro real',
                'body'           => 'Construir mola, pero salvo que te lo fuerces, no tiene la presión que busco. Lo juego más por rachas.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 19,
                'game_id'        => 67, // Subnautica
                'title'          => 'Buen survival, pero sin PvP',
                'body'           => 'Tiene tensión y exploración, pero yo disfruto más cuando hay caos y riesgo por otros jugadores. Está bien, pero no es mi top.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 19,
                'game_id'        => 68, // The Long Dark
                'title'          => 'Hardcore… pero demasiado lento',
                'body'           => 'La supervivencia está guay, pero el ritmo se me hace pausado. Yo necesito más caos y presión constante.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 19,
                'game_id'        => 180, // Phasmophobia
                'title'          => 'Tensión guay, pero no es mi main',
                'body'           => 'Da buen mal rollo y se disfruta con colegas, pero me falta el loop de supervivencia y progreso que me engancha.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 19,
                'game_id'        => 146, // Grounded
                'title'          => 'Demasiado “mono” para mí',
                'body'           => 'Está bien hecho, pero no me da esa sensación de peligro hardcore. Se me queda muy light.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 19,
                'game_id'        => 145, // Raft
                'title'          => 'Chill, pero me aburre',
                'body'           => 'Tiene su punto, pero es demasiado tranquilo. Yo quiero sufrir un poco y tener tensión de verdad.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 19,
                'game_id'        => 23, // Detroit: Become Human
                'title'          => 'Mucho cine, poco juego',
                'body'           => 'No me engancha: demasiadas escenas y decisiones de diálogo. Yo quiero gameplay, riesgo y sandbox.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 19,
                'game_id'        => 17, // Virginia
                'title'          => 'No es para mí',
                'body'           => 'Demasiado “experiencia” y nada de dificultad o sistemas. Me aburrí en seguida.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 19,
                'game_id'        => 31, // Unpacking
                'title'          => 'Cero adrenalina',
                'body'           => 'Entiendo que es relajante, pero yo busco tensión y reto. Aquí me desesperé de aburrimiento.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],

            // marta_k
            [
                'user_id'        => 5,
                'game_id'        => 3, // Stardew Valley
                'title'          => 'Mi lugar seguro',
                'body'           => 'Me lo pongo “de fondo” y de repente han pasado horas. Rutina bonita, progreso suave y esa calma que te arregla el día.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 5,
                'game_id'        => 104, // Cozy Grove
                'title'          => 'Cozy de manual',
                'body'           => 'Perfecto para desconectar: tareas diarias, decoración y una vibra tierna. Es como una mantita en forma de juego.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 5,
                'game_id'        => 105, // Disney Dreamlight Valley
                'title'          => 'Rutina bonita con Disney',
                'body'           => 'Me encanta por lo relajado y por la sensación de ir desbloqueando cositas poco a poco. Ideal para jugar sin prisa.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 5,
                'game_id'        => 103, // Dorfromantik
                'title'          => 'Puzzle zen',
                'body'           => 'Colocar piezas y ver cómo queda todo precioso es súper terapéutico. Me relaja muchísimo y el “score” pica lo justo.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 5,
                'game_id'        => 108, // Coffee Talk
                'title'          => 'Conversaciones calentitas',
                'body'           => 'Lo juego como si fuera una serie tranquila: música, café y personajes. Me deja una sensación muy bonita y nostálgica.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 5,
                'game_id'        => 109, // Potion Permit
                'title'          => 'Cozy con progresión suave',
                'body'           => 'Me gusta el loop de ir mejorando el pueblo y “curando” a la gente. No es súper profundo, pero se disfruta muchísimo.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 5,
                'game_id'        => 28, // Botany Manor
                'title'          => 'Puzzles suaves y preciosos',
                'body'           => 'Corto y muy agradable: cada puzzle te deja satisfecha sin estresarte. Me encanta la estética y el ritmo tranquilo.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 5,
                'game_id'        => 107, // Ooblets
                'title'          => 'Cuqui y rarito (en el buen sentido)',
                'body'           => 'Me hace sonreír: colores, humor y rutina ligera. Es el típico juego que te acompaña sin exigirte nada.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 5,
                'game_id'        => 102, // A Short Hike
                'title'          => 'Una tarde feliz',
                'body'           => 'Me lo pasé con una sonrisa. Es corto, simpático y te deja el corazón calentito. Perfecto para desconectar.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 5,
                'game_id'        => 106, // Palia
                'title'          => 'Cozy online para ir a tu ritmo',
                'body'           => 'Me gusta porque puedes hacer tus cositas sin presión. Construir/coleccionar y socializar un poco, muy chill.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 5,
                'game_id'        => 94, // Animal Crossing: New Horizons
                'title'          => 'Rutina dulce',
                'body'           => 'Decoración, colecciones y días tranquilitos. Es el típico juego que te da calma y te acompaña semanas.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 5,
                'game_id'        => 165, // Planet Zoo
                'title'          => 'Cozy para gente que decora',
                'body'           => 'Puedo pasarme horas colocando cosas y haciendo el zoo bonito. No siempre es “simple”, pero me relaja muchísimo.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 5,
                'game_id'        => 31, // Unpacking
                'title'          => 'Ordenar para curar el alma',
                'body'           => 'Es muy tierno y satisfactorio. Me encanta cómo cuenta una historia con objetos, sin prisas y sin ruido.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 5,
                'game_id'        => 33, // Dave the Diver
                'title'          => 'Chill con humor',
                'body'           => 'Me sorprendió: es relajante pero con mil detalles graciosos. Ideal para jugar a ratos y desconectar.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 5,
                'game_id'        => 80, // It Takes Two
                'title'          => 'Coop divertido, pero más intenso',
                'body'           => 'Me gustó mucho por la variedad, aunque no es tan “de fondo”: aquí tienes que estar más pendiente. Aun así, muy buen juego.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 5,
                'game_id'        => 198, // DOOM Eternal
                'title'          => 'Demasiado estrés',
                'body'           => 'Es demasiado rápido y agresivo para mí. Me pone nerviosa y no lo disfruto nada: yo busco calma.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 5,
                'game_id'        => 174, // Outlast
                'title'          => 'No gracias, qué ansiedad',
                'body'           => 'Me lo pasé fatal. No es miedo divertido: es estrés continuo. No es mi vibra para nada.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 5,
                'game_id'        => 138, // DayZ
                'title'          => 'Demasiado duro y hostil',
                'body'           => 'Me agobia: supervivencia hardcore, PvP y tensión constante. Yo quiero desconectar, no sufrir.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],

            // patriV
            [
                'user_id'        => 18,
                'game_id'        => 94, // Animal Crossing: New Horizons
                'title'          => 'Mi rutina feliz',
                'body'           => 'Es mi lugar de calma: decorar, coleccionar y hacer “cositas” cada día. Y con gente es todavía mejor: visitas, intercambios y vibes bonitas.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 18,
                'game_id'        => 106, // Palia
                'title'          => 'Cozy social a mi ritmo',
                'body'           => 'Me encanta porque puedes jugar con gente sin estrés: comunidad, colecciones, construir y decorar. Es muy “me quedo horas”.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 18,
                'game_id'        => 102, // A Short Hike
                'title'          => 'Feel-good perfecto',
                'body'           => 'Cortito, bonito y con una energía súper agradable. Me dejó una sonrisa y ganas de recomendarlo a todo el mundo.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 18,
                'game_id'        => 107, // Ooblets
                'title'          => 'Cuqui y rarito (me encanta)',
                'body'           => 'Es súper mono, con coleccionismo y rutina ligera. Ideal para desconectar y decorar/coleccionar sin pensar demasiado.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 18,
                'game_id'        => 105, // Disney Dreamlight Valley
                'title'          => 'Decoración + Disney = sí',
                'body'           => 'Me engancha por la progresión suave y por ir dejando el valle bonito. Es muy de jugar tranquila y perder la noción del tiempo.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 18,
                'game_id'        => 95, // Mario Kart 8 Deluxe
                'title'          => 'Party game de confianza',
                'body'           => 'Piques, risas y carreras rápidas. No es “cozy” como tal, pero es perfecto para jugar con gente y pasarlo bien.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 18,
                'game_id'        => 3, // Stardew Valley
                'title'          => 'Granjita y vida bonita',
                'body'           => 'Me relaja muchísimo: rutina, progreso y objetivos pequeñitos. Y en coop se vuelve todavía más acogedor.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 18,
                'game_id'        => 104, // Cozy Grove
                'title'          => 'Mantita y tareas suaves',
                'body'           => 'Me gusta su rollo diario y lo tierno que es. Perfecto para entrar un rato, hacer cositas y salir contenta.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 18,
                'game_id'        => 80, // It Takes Two
                'title'          => 'Coop buenísimo (aunque más intenso)',
                'body'           => 'Es súper divertido y creativo, pero no es “de chill total”: hay que estar pendiente. Aun así, es de los mejores coop.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 18,
                'game_id'        => 30, // Stray
                'title'          => 'Bonito y súper agradable',
                'body'           => 'Me encantó el ambiente y lo cortito que es. Es una experiencia muy “feel-good” aunque tenga su punto triste.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 18,
                'game_id'        => 31, // Unpacking
                'title'          => 'Ordenar con cariño',
                'body'           => 'Me da paz. Es sencillo, pero te cuenta una historia muy bonita con objetos. Ideal para una tarde tranquila.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 18,
                'game_id'        => 33, // Dave the Diver
                'title'          => 'Chill y gracioso',
                'body'           => 'Me sorprendió lo divertido que es. Tiene rutina y progresión, y encima momentos muy tontos que me sacaron risas.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 18,
                'game_id'        => 81, // Split Fiction
                'title'          => 'Bien para jugar con gente',
                'body'           => 'Cumple como coop y se deja jugar fácil. No me enamoró, pero para sesiones con alguien está guay.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 18,
                'game_id'        => 165, // Planet Zoo
                'title'          => 'Decoración bonita, pero exige',
                'body'           => 'Me gusta muchísimo por estética, aunque a veces me pide más gestión de la que me apetece. Aun así, lo disfruto.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 18,
                'game_id'        => 108, // Coffee Talk
                'title'          => 'Vibes cozy de noche',
                'body'           => 'Música tranquila, personajes y conversaciones. Es más “experiencia” que juego, pero me encanta para relajarse.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 18,
                'game_id'        => 171, // Resident Evil 7: Biohazard
                'title'          => 'Qué ansiedad, no puedo',
                'body'           => 'Me pone demasiado nerviosa. No disfruto ese terror y tensión constante; yo quiero calma y buen rollo.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 18,
                'game_id'        => 178, // Dead Space (2008)
                'title'          => 'No es miedo divertido para mí',
                'body'           => 'Es demasiado intenso y opresivo. Lo respeto, pero lo paso fatal, no me compensa.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 18,
                'game_id'        => 174, // Outlast
                'title'          => 'Ni loca',
                'body'           => 'Me da un estrés horrible. No puedo con persecuciones y sustos: cero mi vibra.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],

            // albita
            [
                'user_id'        => 25,
                'game_id'        => 31, // Unpacking
                'title'          => 'Ordenar para sentirte mejor',
                'body'           => 'Me da una paz increíble. Es simple, bonito y te cuenta una historia con detalles pequeñitos que te dejan el corazón calentito.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 25,
                'game_id'        => 30, // Stray
                'title'          => 'Gatito + mundo precioso',
                'body'           => 'Es de esos juegos que te dejan bien: cortito, con ambientación súper bonita y momentos muy tiernos. Me encantó pasear por ahí.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 25,
                'game_id'        => 102, // A Short Hike
                'title'          => 'Una tarde perfecta',
                'body'           => 'Simpático, ligero y con vibes súper buenas. Lo terminé con una sonrisa, como si me hubiera ido de excursión de verdad.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 25,
                'game_id'        => 32, // Spiritfarer
                'title'          => 'Triste bonito',
                'body'           => 'Me hizo llorar, pero de forma sana. Es cálido, humano y precioso; te deja nostálgica pero agradecida.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 25,
                'game_id'        => 33, // Dave the Diver
                'title'          => 'Loop amable y muy divertido',
                'body'           => 'Me encanta para desconectar: buceas un rato, mejoras el restaurante y siempre hay alguna sorpresa graciosa. Súper “una partida más”.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 25,
                'game_id'        => 28, // Botany Manor
                'title'          => 'Puzzles suaves, estética preciosa',
                'body'           => 'Me dejó muy satisfecha: es corto, elegante y nada estresante. Perfecto para una tarde tranquila.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 25,
                'game_id'        => 165, // Planet Zoo
                'title'          => 'Gestión light para decorar',
                'body'           => 'Me relaja mucho construir algo bonito y ver el zoo “vivir”. A veces exige más de lo que parece, pero yo lo juego chill.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 25,
                'game_id'        => 27, // Call of the Sea
                'title'          => 'Misterio bonito sin agobio',
                'body'           => 'Me gustó por la ambientación y el ritmo. Tiene puzzles y misterio, pero sigue siendo una experiencia suave y agradable.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 25,
                'game_id'        => 3, // Stardew Valley
                'title'          => 'Rutina feliz',
                'body'           => 'Es mi juego para días malos: progreso suave, granjita, objetivos pequeños y esa sensación de “todo va bien” mientras juegas.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 25,
                'game_id'        => 103, // Dorfromantik
                'title'          => 'Puzzle zen de paisajitos',
                'body'           => 'Me deja la mente en blanco de la forma buena. Pones piezas, queda bonito y te relajas sin darte cuenta.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 25,
                'game_id'        => 44, // Kena: Bridge of Spirits
                'title'          => 'Aventura preciosa y muy agradable',
                'body'           => 'Visualmente es una monada y se juega fácil. Tiene combate, pero sin volverse pesado. Me dejó muy buen sabor de boca.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 25,
                'game_id'        => 15, // Firewatch
                'title'          => 'Corto, íntimo y con atmósfera',
                'body'           => 'Me encanta para una tarde: diálogos buenísimos y sensación de estar viviendo una historia. Me dejó nostálgica.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 25,
                'game_id'        => 104, // Cozy Grove
                'title'          => 'Cozy diario para desconectar',
                'body'           => 'Me gusta su rutina y lo tierno que es. No me pide nada: entro, hago cositas, saco capturas y me voy feliz.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 25,
                'game_id'        => 80, // It Takes Two
                'title'          => 'Coop divertido, aunque menos chill',
                'body'           => 'Muy variado y creativo. No es tan “relajado” porque tienes que estar atenta, pero para jugar con alguien es genial.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 25,
                'game_id'        => 95, // Mario Kart 8 Deluxe
                'title'          => 'Risas y piques sanos',
                'body'           => 'No es “cozy” como tal, pero me encanta para jugar con gente. Es directo, divertido y te deja de buen humor.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 25,
                'game_id'        => 198, // DOOM Eternal
                'title'          => 'Demasiado estrés para mí',
                'body'           => 'Sé que es increíble, pero me satura: es rápido, agresivo y no lo disfruto. Yo busco calma y vibes bonitas.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 25,
                'game_id'        => 174, // Outlast
                'title'          => 'No puedo con esto',
                'body'           => 'Me da ansiedad. Persecuciones, sustos y tensión constante: cero mi rollo, lo paso fatal.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 25,
                'game_id'        => 138, // DayZ
                'title'          => 'Hostil y demasiado duro',
                'body'           => 'Me agobia muchísimo: supervivencia hardcore, PvP y tensión continua. No es lo que busco para desconectar.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],

            // claran
            [
                'user_id'        => 20,
                'game_id'        => 44, // Kena: Bridge of Spirits
                'title'          => 'Aventura preciosa con mucho encanto',
                'body'           => 'Es de esos juegos que te dejan con una sensación bonita: estética increíble, exploración agradable y combate/puzzles sin agobiar.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 20,
                'game_id'        => 27, // Call of the Sea
                'title'          => 'Misterio bonito, puzzles suaves',
                'body'           => 'Me encanta explorar con calma y resolver puzzles sin estrés. La ambientación es preciosa y la historia te lleva de la mano.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 20,
                'game_id'        => 28, // Botany Manor
                'title'          => 'Relax y “wow” elegante',
                'body'           => 'Todo está pensado con gusto: puzzles tranquilos, ritmo perfecto y una estética que dan ganas de sacar capturas cada dos minutos.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 20,
                'game_id'        => 30, // Stray
                'title'          => 'Un paseo precioso con un gatito',
                'body'           => 'Cortito, bonito y muy agradable. Me encantó explorar y simplemente “estar” en ese mundo sin sentir presión.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 20,
                'game_id'        => 77, // Portal 2
                'title'          => 'Diseño de puzzles top',
                'body'           => 'Me parece súper inteligente y con un ritmo genial. No es “cozy”, pero sí muy satisfactorio y nada estresante si vas a tu ritmo.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 20,
                'game_id'        => 102, // A Short Hike
                'title'          => 'Wholesome total',
                'body'           => 'Perfecto para una tarde: exploración ligera, personajes simpáticos y vibes buenas. Terminas con una sonrisa.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 20,
                'game_id'        => 31, // Unpacking
                'title'          => 'Tranquilo y muy tierno',
                'body'           => 'Ordenar y decorar con calma es súper satisfactorio. Me encanta que cuente una historia con detalles pequeñitos.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 20,
                'game_id'        => 105, // Disney Dreamlight Valley
                'title'          => 'Decoración y rutina bonita',
                'body'           => 'Me gusta para desconectar: coleccionar, decorar y avanzar poquito a poco. Es muy “me lo pongo y me relajo”.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 20,
                'game_id'        => 14, // What Remains of Edith Finch
                'title'          => 'Historia preciosa, muy emocional',
                'body'           => 'No es puzzle, pero es una experiencia cortita y con muchísimo corazón. Me dejó melancólica, en el buen sentido.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 20,
                'game_id'        => 15, // Firewatch
                'title'          => 'Atmósfera y diálogos que abrazan',
                'body'           => 'Se siente como una historia vivida. Corto, íntimo y con una exploración muy agradable, sin estrés.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 20,
                'game_id'        => 94, // Animal Crossing: New Horizons
                'title'          => 'Rutina chill para decorar',
                'body'           => 'Me encanta por lo calmado y por coleccionar cositas. No es mi top absoluto, pero es perfecto para desconectar.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 20,
                'game_id'        => 3, // Stardew Valley
                'title'          => 'Cozy clásico con progreso',
                'body'           => 'Me gusta mucho, aunque a veces me abruma tanta cosa. Aun así, es súper bonito para jugar sin prisa.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 20,
                'game_id'        => 95, // Mario Kart 8 Deluxe
                'title'          => 'Risas y piques sanos',
                'body'           => 'Para jugar con gente es perfecto: rápido, divertido y sin complicaciones. No es mi vibra principal, pero lo disfruto.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 20,
                'game_id'        => 80, // It Takes Two
                'title'          => 'Coop muy creativo',
                'body'           => 'Me gustó muchísimo por la variedad, aunque tiene momentos más “intensos”. En general, es súper disfrutable.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 20,
                'game_id'        => 32, // Spiritfarer
                'title'          => 'Bonito, pero me dejó tristona',
                'body'           => 'Es precioso y muy humano, pero me dio mucha melancolía. Lo valoro, aunque no siempre me apetece ese tono.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 20,
                'game_id'        => 183, // Mortal Kombat 1
                'title'          => 'Demasiado agresivo para mí',
                'body'           => 'No me apetece aprender combos ni competir. Yo busco calma, historia y puzzles suaves.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 20,
                'game_id'        => 204, // Counter-Strike 2
                'title'          => 'Estrés competitivo, paso',
                'body'           => 'Demasiada tensión y mal rollo online. No me relaja nada y no es lo que busco.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 20,
                'game_id'        => 174, // Outlast
                'title'          => 'Ansiedad pura',
                'body'           => 'No puedo con persecuciones y sustos. Lo paso fatal, cero diversión para mí.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],

            // rubenAg
            [
                'user_id'        => 21,
                'game_id'        => 112, // Hades
                'title'          => 'El estándar del “una run más”',
                'body'           => 'Gunplay perfecto, builds que se sienten distintas y progresión que engancha. Es el juego que pongo de referencia para todo roguelite.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 21,
                'game_id'        => 114, // Slay the Spire
                'title'          => 'Buildcrafting puro',
                'body'           => 'Cada run es un draft de decisiones. Te pica optimizar el mazo y exprimir sinergias; cuando sale “la build”, es gloria.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 21,
                'game_id'        => 113, // The Binding of Isaac: Rebirth
                'title'          => 'Caos con ciencia',
                'body'           => 'Mil ítems, mil sinergias y runs que pasan de “ok” a “soy un monstruo” en dos salas. Rejugabilidad absurda.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 21,
                'game_id'        => 122, // Vampire Survivors
                'title'          => 'Dopamina barata y efectiva',
                'body'           => 'Entras cinco minutos y sales una hora después. Progresión constante y builds simples pero muy adictivas.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 21,
                'game_id'        => 115, // Risk of Rain 2
                'title'          => 'Escalar o morir',
                'body'           => 'La gracia está en el ritmo: cuanto más tardas, más se te va de las manos. Cuando consigues una build rota, es espectáculo.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 21,
                'game_id'        => 124, // Returnal
                'title'          => 'Roguelite de ejecución seria',
                'body'           => 'Aquí la run no te la salva solo la build: te exige apuntar y moverte bien. Tenso, rápido y muy satisfactorio cuando mejoras.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 21,
                'game_id'        => 127, // Dead Cells
                'title'          => 'Velocidad y control',
                'body'           => 'Flow total: moverte rápido, tomar decisiones y castigo justo. Perfecto para jugar competitivo contigo mismo.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 21,
                'game_id'        => 117, // Enter the Gungeon
                'title'          => 'Bullet hell roguelite',
                'body'           => 'Runs duras pero muy justas. Si te gustan reflejos y aprender patrones, engancha muchísimo.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 21,
                'game_id'        => 116, // Rogue Legacy 2
                'title'          => 'Progresión y runs cortitas',
                'body'           => 'Me gusta porque siempre avanzas algo: mejoras el personaje y vuelves a intentarlo. Muy buen loop para sesiones rápidas.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 21,
                'game_id'        => 118, // Spelunky 2
                'title'          => 'Frustración feliz',
                'body'           => 'Te mata por confiado, siempre. Pero cuando sobrevives a una situación imposible, te sientes el mejor jugador del planeta.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 21,
                'game_id'        => 119, // Darkest Dungeon
                'title'          => 'Roguelike de estrés',
                'body'           => 'Gestión de riesgo y castigo constante. No siempre me apetece, pero cuando estoy en modo “sufrir”, es muy bueno.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 21,
                'game_id'        => 123, // Cult of the Lamb
                'title'          => 'Buen mix, pero menos “hardcore”',
                'body'           => 'Me divierte la mezcla de combate + gestión, aunque como roguelite puro se me queda más ligerito. Aun así, está guay.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 21,
                'game_id'        => 79, // Inscryption
                'title'          => 'Idea brutal, pero no mi “main” de runs',
                'body'           => 'Me parece genial por creatividad y sorpresas, pero yo busco rejugabilidad más “de ranking” y builds consistentes.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 21,
                'game_id'        => 198, // DOOM Eternal
                'title'          => 'Buen flow, pero no es roguelite',
                'body'           => 'Me lo paso bien por la adrenalina, pero me falta el bucle de run/build/progresión que es lo que me engancha de verdad.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 21,
                'game_id'        => 126, // Celeste
                'title'          => 'Reto fino, pero otro tipo de juego',
                'body'           => 'Me parece buenísimo y muy preciso, pero cuando juego quiero runs con builds y variación. Aun así, el reto es top.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 21,
                'game_id'        => 21, // Heavy Rain
                'title'          => 'Cine interactivo que me aburre',
                'body'           => 'Demasiado pasivo. Yo quiero gameplay, decisiones de build y rejugabilidad, no escenas y QTEs.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 21,
                'game_id'        => 16, // Gone Home
                'title'          => 'No me aporta nada',
                'body'           => 'Entiendo que sea íntimo, pero yo busco reto y sistemas. Aquí no tengo runs, ni builds, ni ganas de repetir.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 21,
                'game_id'        => 17, // Virginia
                'title'          => 'Demasiado “experiencia”',
                'body'           => 'No es lo mío: me falta juego, me falta reto y me falta rejugabilidad. Lo dejé rápido.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],

            // sara_iba
            [
                'user_id'        => 22,
                'game_id'        => 4, // Disco Elysium
                'title'          => 'El caso eres tú (y es glorioso)',
                'body'           => 'Diálogos afilados, humor ácido y decisiones que te retratan. Es un detective game donde el misterio es tan bueno como la voz en tu cabeza.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 22,
                'game_id'        => 7, // Thimbleweed Park
                'title'          => 'Misterio retro con mala leche',
                'body'           => 'Un caso raro, personajes aún más raros y humor que me compró desde el minuto uno. Puzzles a ratos rebuscados, pero me lo gocé.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 22,
                'game_id'        => 6, // Return to Monkey Island
                'title'          => 'Aventura con sonrisa constante',
                'body'           => 'Es puro diálogo y encanto. Me da igual lo “ligero”: el humor y el ritmo me funcionan perfecto para una sesión feliz.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 22,
                'game_id'        => 13, // Return Of The Obra Dinn
                'title'          => 'Deducción obsesiva',
                'body'           => 'Aquí vienes a pensar: observar, atar cabos y discutir teorías. Cuando encajas una pieza, sientes que te sube el IQ.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 22,
                'game_id'        => 11, // Sherlock Holmes: Chapter One
                'title'          => 'Detective vibes, buen caso',
                'body'           => 'Investigar está guay y tiene ese punto de deducir con estilo. No es tan brillante como mis tops, pero engancha.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 22,
                'game_id'        => 24, // The Wolf Among Us
                'title'          => 'Noir con decisiones y tensión',
                'body'           => 'Misterio, personajes con carisma y ritmo de serie. Perfecto para comentar teorías y sospechosos en cada capítulo.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 22,
                'game_id'        => 8, // Deponia
                'title'          => 'Aventura gamberra',
                'body'           => 'Humor y puzzles con mala baba. No todo me parece fino, pero como aventura “con carácter” me divierte.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 22,
                'game_id'        => 77, // Portal 2
                'title'          => 'Puzzles perfectos, sarcasmo perfecto',
                'body'           => 'Diseño impecable y humor que entra solo. No es detective, pero sí una experiencia redonda y muy bien escrita.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 22,
                'game_id'        => 78, // The Stanley Parable
                'title'          => 'Meta-humor para gente con odio',
                'body'           => 'Corto, raro y con narrador que te trolea. No es para “jugar”, es para discutirlo después con ironía.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 22,
                'game_id'        => 79, // Inscryption
                'title'          => 'Sorpresa constante, muy disfrutable',
                'body'           => 'Tiene ideas y giros de diseño que me encantan. No siempre es “caso detective”, pero el misterio te atrapa igual.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 22,
                'game_id'        => 10, // Call of Cthulhu
                'title'          => 'Investigación con inquietud',
                'body'           => 'Me funciona por atmósfera y por ir sacando pistas. No es el más fino, pero tiene buen suspense narrativo.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 22,
                'game_id'        => 73, // Alan Wake
                'title'          => 'Thriller curioso, algo irregular',
                'body'           => 'La historia y el tono me gustan, pero el ritmo jugable a veces se me hace repetitivo. Aun así, es buen material para teorías.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 22,
                'game_id'        => 14, // What Remains of Edith Finch
                'title'          => 'Bonito, pero me faltó “caso”',
                'body'           => 'Está muy bien contado, pero yo disfruto más cuando hay misterio a resolver y diálogos con mala leche. Aquí es más melancolía.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 22,
                'game_id'        => 28, // Botany Manor
                'title'          => 'Elegante, pero demasiado suave',
                'body'           => 'Es bonito y está bien diseñado, pero a mí me falta conflicto, sarcasmo y un caso que me pique. Me relajó, sin más.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 22,
                'game_id'        => 27, // Call of the Sea
                'title'          => 'Misterio agradable, poco ácido',
                'body'           => 'Está bien, pero lo siento demasiado “limpio”. Yo quiero más mala leche y diálogos que corten.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 22,
                'game_id'        => 191, // EA SPORTS FC 26
                'title'          => 'No me interesa en absoluto',
                'body'           => 'Cero ganas de deporte competitivo. Dame un caso raro, no un modo carrera.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 22,
                'game_id'        => 188, // F1 24
                'title'          => 'Velocidad sin historia',
                'body'           => 'Entiendo el atractivo, pero no me aporta nada: no hay misterio, ni diálogos, ni decisiones. Paso.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 22,
                'game_id'        => 194, // Madden NFL 24
                'title'          => 'Menús y deporte, no gracias',
                'body'           => 'No conecto con esto. Si voy a invertir tiempo, que sea en algo bien escrito y con un caso que resolver.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],

            // tomas_h
            [
                'user_id'        => 23,
                'game_id'        => 82, // Grand Theft Auto V
                'title'          => 'El blockbuster definitivo',
                'body'           => 'Siempre vuelvo. Campaña divertida, mundo enorme y mil cosas para hacer. Es el típico juego que te da “hype” solo con arrancarlo.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 23,
                'game_id'        => 2, // The Last of Us Part II
                'title'          => 'Te deja tocado (en el buen sentido)',
                'body'           => 'Historia durísima y súper bien dirigida. Producción altísima y momentos que se te quedan grabados.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 23,
                'game_id'        => 55, // Red Dead Redemption 2
                'title'          => 'Una peli de vaqueros de 60 horas',
                'body'           => 'Mundo vivo, personajes increíbles y una sensación de aventura épica. Se cuece lento, pero cuando te atrapa no te suelta.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 23,
                'game_id'        => 188, // F1 24
                'title'          => 'Para desconectar con adrenalina',
                'body'           => 'Carreras rápidas, sensación de velocidad y pique sano. Me lo pongo y se me va la tarde entre vueltas y mejoras.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 23,
                'game_id'        => 191, // EA SPORTS FC 26
                'title'          => 'El de siempre, pero funciona',
                'body'           => 'Modo carrera, Ultimate y partiditos con colegas. No necesito que reinvente la rueda: me vale con que enganche.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 23,
                'game_id'        => 83, // Alan Wake 2
                'title'          => 'Sorpresón: thriller a otro nivel',
                'body'           => 'Atmósfera brutal y momentos muy “what the hell”. Me encanta cuando un AAA se atreve con cosas raras y sale bien.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 23,
                'game_id'        => 37, // The Last of Us Part I
                'title'          => 'Clásico emocional',
                'body'           => 'Narrativa top y personajes que se te quedan. A nivel de producción es una pasada y siempre me da nostalgia.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 23,
                'game_id'        => 43, // God of War I
                'title'          => 'Acción de la vieja escuela',
                'body'           => 'Directo, épico y con setpieces muy guapos. Me flipa esa sensación arcade/AAA de antes: entras y repartes.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 23,
                'game_id'        => 202, // Battlefield 2042
                'title'          => 'Caos online para ratos',
                'body'           => 'No es perfecto, pero cuando sale buena partida es una película de guerra. Explosiones, vehículos y clips para el feed.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 23,
                'game_id'        => 186, // Forza Horizon 5
                'title'          => 'Arcade precioso para pasear',
                'body'           => 'Es de los mejores para desconectar: mapa bonito, coches y eventos sin parar. Me da vibes de “top del mes” fácil.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 23,
                'game_id'        => 198, // DOOM Eternal
                'title'          => 'Acción a cuchillo',
                'body'           => 'Rápido, intenso y súper satisfactorio. No siempre me apetece ese nivel de estrés, pero cuando sí, es una locura.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 23,
                'game_id'        => 51, // Cyberpunk 2077
                'title'          => 'Night City es pura vibra',
                'body'           => 'Me encanta la estética y la historia, aunque el ritmo a veces es irregular. Aun así, es un AAA que se siente diferente.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 23,
                'game_id'        => 38, // Uncharted 4: A Thief\'s End
                'title'          => 'Pelijuego perfecto',
                'body'           => 'Aventura súper bien dirigida, setpieces brutales y carisma a saco. De esos que te hacen decir “qué bien se juega esto”.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 23,
                'game_id'        => 192, // NBA 2K26
                'title'          => 'Partiditos y modo carrera',
                'body'           => 'Me sirve para variar entre campañas grandes. Me engancha el progreso del jugador y echar partidos cuando quiero algo rápido.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 23,
                'game_id'        => 172, // Resident Evil 2
                'title'          => 'Buen survival horror, pero no mi top',
                'body'           => 'Tiene tensión y está muy bien hecho, pero yo soy más de campañas “blockbuster” y espectáculo. Aun así, buen juego.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 23,
                'game_id'        => 132, // Axiom Verge
                'title'          => 'Se me hace cuesta arriba',
                'body'           => 'Respeto el indie, pero me cuesta el rollo 2D y la exploración más densa. No conecté.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 23,
                'game_id'        => 120, // Crypt of the NecroDancer
                'title'          => 'No es para mí',
                'body'           => 'Entre ritmo y dificultad, me frustra más que me divierte. Prefiero acción directa o campañas grandes.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 23,
                'game_id'        => 110, // Littlewood
                'title'          => 'Demasiado “cozy”',
                'body'           => 'Me aburre rápido. No tengo ese hype de campaña, ni la adrenalina de carreras/deporte. No es mi rollo.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],

            // miguelap
            [
                'user_id'        => 24,
                'game_id'        => 157, // Frostpunk
                'title'          => 'Sufrimiento optimizado (obra maestra)',
                'body'           => 'Es el juego que mejor convierte decisiones morales en números. Cada ley es “eficiente”, y aun así te sientes culpable. Perfecto.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 24,
                'game_id'        => 161, // RimWorld
                'title'          => 'Gestión emergente con tragedias',
                'body'           => 'Lo mejor es el caos controlado: priorizar, contener crisis y asumir pérdidas. Siempre terminas pensando “yo habría hecho…” y reiniciando con otra idea.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 24,
                'game_id'        => 163, // Banished
                'title'          => 'Minimalismo duro',
                'body'           => 'Parece simple, pero cualquier error en stocks o expansión te hunde. Me encanta por lo limpio que es: decisiones claras, castigo claro.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 24,
                'game_id'        => 162, // Dwarf Fortress
                'title'          => 'Complejidad absurda y deliciosa',
                'body'           => 'Aquí no “juegas”, administras un desastre vivo. El aprendizaje es duro, pero la satisfacción de ver un sistema funcionar es brutal.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 24,
                'game_id'        => 154, // Into the Breach
                'title'          => 'Estrategia perfecta en miniatura',
                'body'           => 'Turnos cortos, información clara y decisiones con impacto inmediato. Me encanta optimizar cada turno como si fuera un puzzle.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 24,
                'game_id'        => 119, // Darkest Dungeon
                'title'          => 'Estrés como mecánica',
                'body'           => 'Castigo, gestión de riesgo y decisiones horribles. Es injusto a veces… y por eso te engancha. Te obliga a pensar fríamente.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 24,
                'game_id'        => 159, // Factorio
                'title'          => 'Optimización pura, sin moral',
                'body'           => 'Aquí el sufrimiento es otro: ratios, cuellos de botella y escalado. Me gusta, aunque mi vicio real es cuando hay dilemas y escasez “humana”.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 24,
                'game_id'        => 152, // Sid Meier’s Civilization VI
                'title'          => 'Buen 4X, pero menos tenso',
                'body'           => 'Planificar está bien, pero a mí me gusta más la presión de recursos limitados y consecuencias inmediatas. Aun así, se disfruta.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 24,
                'game_id'        => 158, // Cities: Skylines
                'title'          => 'Optimizar una ciudad (sin sufrir tanto)',
                'body'           => 'Me divierte diseñar y arreglar tráfico, pero rara vez siento esa presión de “si te equivocas, mueres”. Es más sandbox.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 24,
                'game_id'        => 114, // Slay the Spire
                'title'          => 'Decisiones pequeñas, castigo grande',
                'body'           => 'Me gusta porque te obliga a optimizar con información incompleta. Cada carta que coges es un compromiso.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 24,
                'game_id'        => 140, // Project Zomboid
                'title'          => 'Buen castigo, ritmo lento',
                'body'           => 'Tiene esa tensión de recursos y peligro, pero a veces se me hace demasiado lento para lo que busco. Lo respeto, lo disfruto a ratos.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 24,
                'game_id'        => 68, // The Long Dark
                'title'          => 'Supervivencia dura, pero contemplativa',
                'body'           => 'Me gusta la gestión de frío/comida, pero echo de menos decisiones más complejas y sistemas más “crueles”. Aun así, está bien.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 24,
                'game_id'        => 170, // Anno 1800
                'title'          => 'Gestión sólida, poco drama',
                'body'           => 'Las cadenas de producción están muy bien, pero no me genera esa tensión moral o de escasez extrema. Lo juego más tranquilo.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 24,
                'game_id'        => 156, // Stellaris
                'title'          => 'Macro-estrategia curiosa, pero dispersa',
                'body'           => 'Tiene buenas ideas, pero a veces siento que la complejidad se va a mil frentes y pierde la “decisión dura” inmediata.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 24,
                'game_id'        => 112, // Hades
                'title'          => 'Buenísimo, pero no mi obsesión',
                'body'           => 'Está muy bien hecho, pero yo me engancho más cuando hay escasez, gestión y decisiones con culpa. Aquí es más “flow” y acción.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 24,
                'game_id'        => 95, // Mario Kart 8 Deluxe
                'title'          => 'No me dice nada',
                'body'           => 'Party y caos simpático, pero a mí me falta planificación y consecuencias. No conecto con este tipo de diversión.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 24,
                'game_id'        => 97, // Splatoon 3
                'title'          => 'Online competitivo que no busco',
                'body'           => 'Demasiado centrado en partidas y reflejos. Yo quiero decisiones difíciles y sistemas que me obliguen a optimizar.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 24,
                'game_id'        => 100, // Luigi\'s Mansion 3
                'title'          => 'Demasiado “mono”',
                'body'           => 'Está currado, pero no me genera tensión ni decisiones interesantes. Lo siento muy ligero para mi gusto.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],

            // diegolz
            [
                'user_id'        => 26,
                'game_id'        => 209, // Half-Life: Alyx
                'title'          => 'Presencia absoluta: “así debe ser la VR”',
                'body'           => 'Es el juego que enseñas para convertir a cualquiera. Interacción física, atmósfera y setpieces que te dejan hipnotizado. Top 1 VR.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 26,
                'game_id'        => 210, // Beat Saber
                'title'          => 'Dopamina en VR',
                'body'           => 'Perfecto para enseñar VR y para viciarte tú: sencillo, intenso, y te pone eufórico en 5 minutos. Imposible no sudar.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 26,
                'game_id'        => 211, // Boneworks
                'title'          => 'Física loca y libertad',
                'body'           => 'Esto es “sandbox VR”: te deja experimentar con el cuerpo, el peso y la interacción. No es para todo el mundo, pero si te gusta trastear, flipas.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 26,
                'game_id'        => 212, // Moss
                'title'          => 'VR adorable y mágica',
                'body'           => 'Más “cuento interactivo” que shooter, pero la sensación de estar ahí y ayudar al personaje es preciosa. Ideal para enseñar VR sin mareo.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 26,
                'game_id'        => 198, // DOOM Eternal
                'title'          => 'Adrenalina pura (aunque no sea VR)',
                'body'           => 'No es VR nativa, pero el ritmo y la intensidad me encantan. Lo pongo cuando quiero estar eufórico y con el corazón a 200.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 26,
                'game_id'        => 208, // Metro Exodus
                'title'          => 'Atmósfera que se siente en el cuerpo',
                'body'           => 'Me gusta por la inmersión: tensión, exploración y momentos de “presencia” aunque sea plano. En VR sería criminalmente perfecto.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 26,
                'game_id'        => 203, // Halo Infinite
                'title'          => 'Gunplay buenísimo para sesiones rápidas',
                'body'           => 'Se dispara genial y el ritmo es rápido. No es inmersión VR, pero como shooter directo me funciona para desconectar y competir un rato.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 26,
                'game_id'        => 65, // Deathloop
                'title'          => 'Idea guapa, inmersión “cool”',
                'body'           => 'Me divierte por estilo y por experimentar rutas. No me hipnotiza como VR, pero tiene ese punto de “vivir” un loop.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 26,
                'game_id'        => 180, // Phasmophobia
                'title'          => 'En VR da miedo de verdad',
                'body'           => 'En pantalla ya funciona, pero en VR el mal rollo se multiplica. Perfecto para clips y para sufrir con colegas.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 26,
                'game_id'        => 171, // Resident Evil 7: Biohazard
                'title'          => 'Demasiada ansiedad, pero respeto',
                'body'           => 'La inmersión está ahí y es buenísimo… justo por eso me supera a ratos. Me deja asombrado, pero también agotado.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 26,
                'game_id'        => 173, // Alien: Isolation
                'title'          => 'Atmósfera top, tensión demasiado constante',
                'body'           => 'La presencia y el miedo están muy bien hechos, pero se me hace un pelín lento. Aun así, es material perfecto para clips.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 26,
                'game_id'        => 205, // Overwatch 2
                'title'          => 'Pique rápido, poca “presencia”',
                'body'           => 'Me entretiene, pero lo siento más “esports” que inmersivo. Yo prefiero experiencias donde el cuerpo participa.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 26,
                'game_id'        => 77, // Portal 2
                'title'          => 'Diseño brillante (pero quiero VR)',
                'body'           => 'Como puzzle es perfecto, pero me deja pensando “esto en VR sería una locura”. En plano lo disfruto, sin más.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 26,
                'game_id'        => 79, // Inscryption
                'title'          => 'Buen misterio, pero poco físico',
                'body'           => 'Tiene ideas geniales, pero yo me engancho más a lo inmersivo y táctil. Aquí siento que me falta “presencia”.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 26,
                'game_id'        => 204, // Counter-Strike 2
                'title'          => 'Competitivo seco',
                'body'           => 'Entiendo el nivel, pero es demasiado rígido y punitivo para mí. Prefiero shooters con más “sensación” e inmersión.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 26,
                'game_id'        => 191, // EA SPORTS FC 26
                'title'          => 'No me dice nada',
                'body'           => 'Cero presencia, cero inmersión para mí. Deporte y menús: no es mi universo.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 26,
                'game_id'        => 192, // NBA 2K26
                'title'          => 'Deporte… paso',
                'body'           => 'Respeto el juego, pero no me interesa. Yo quiero experiencias que te metan dentro, no partidos.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 26,
                'game_id'        => 103, // Dorfromantik
                'title'          => 'Demasiado zen',
                'body'           => 'Es bonito, sí, pero me duerme. Yo busco estar asombrado o con adrenalina, no colocar piezas en silencio.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],

            // raquelP
            [
                'user_id'        => 27,
                'game_id'        => 182, // Tekken 8
                'title'          => 'Mindgame y ejecución: adictivo',
                'body'           => 'El 1v1 aquí es puro ajedrez a velocidad. Aprender matchups, castigar, adaptar… cuando ganas por lectura se siente increíble.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 27,
                'game_id'        => 181, // Street Fighter 6
                'title'          => 'Neutral y fundamentals de lujo',
                'body'           => 'Me flipa por el ritmo: footsies, whiff punish, decisiones. Ranked engancha y siempre sientes que puedes mejorar una cosa más.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 27,
                'game_id'        => 184, // Guilty Gear -Strive-
                'title'          => 'Explosivo y con estilo',
                'body'           => 'Visualmente es una locura y el combate es súper agresivo. Roman Cancel, presión, mindgames… y clips asegurados.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 27,
                'game_id'        => 183, // Mortal Kombat 1
                'title'          => 'Muy divertido, aunque menos fino',
                'body'           => 'Me lo paso bien y tiene hype, pero en competitivo me convence menos que Tekken/SF. Aun así, para ranked y clips cumple.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 27,
                'game_id'        => 185, // DRAGON BALL FighterZ
                'title'          => 'Team game con presión constante',
                'body'           => 'Combos largos, mixups y esa sensación de “una apertura y te explota la vida”. Es puro show y el mindgame es brutal.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 27,
                'game_id'        => 198, // DOOM Eternal
                'title'          => 'Para soltar adrenalina',
                'body'           => 'Cuando estoy tilt de ranked, me meto aquí: flow, agresividad y cero paciencia. Sales descargada.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 27,
                'game_id'        => 112, // Hades
                'title'          => 'Buen vicio entre sesiones',
                'body'           => 'Me gusta para desconectar sin dejar de sentir progreso. No es FGC, pero el “una run más” funciona.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 27,
                'game_id'        => 128, // Cuphead
                'title'          => 'Difícil pero justo',
                'body'           => 'Me pica por el reto y la ejecución. Es frustrante, pero te obliga a mejorar como en un fighting: práctica y consistencia.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 27,
                'game_id'        => 127, // Dead Cells
                'title'          => 'Buen flow, buen castigo',
                'body'           => 'Rápido y satisfactorio. Me gusta por la sensación de dominar mecánicas, aunque no me da el mindgame del 1v1.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 27,
                'game_id'        => 134, // Katana ZERO
                'title'          => 'Ejecución y ritmo',
                'body'           => 'Se siente como aprender una secuencia perfecta. Me gusta por lo “limpio” y por repetir hasta clavar el run.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 27,
                'game_id'        => 58, // Ghost of Tsushima
                'title'          => 'Bonito, pero me falta competitive',
                'body'           => 'Es muy disfrutable y el combate está guay, pero yo me engancho más cuando hay ranked y rival humano.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 27,
                'game_id'        => 186, // Forza Horizon 5
                'title'          => 'Bien para variar',
                'body'           => 'Está chulo para desconectar y echar carreras, pero no me da esa sensación de “matchup” y lectura que busco.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 27,
                'game_id'        => 80, // It Takes Two
                'title'          => 'Coop divertido, pero no mi main',
                'body'           => 'Está muy bien hecho y es creativo, pero yo soy de 1v1 competitivo. Lo juego con alguien y listo.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 27,
                'game_id'        => 205, // Overwatch 2
                'title'          => 'Pique por equipo (menos control)',
                'body'           => 'Me entretiene, pero me frustra depender de otros. En un 1v1 si pierdo, sé por qué. Aquí… no siempre.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 27,
                'game_id'        => 204, // Counter-Strike 2
                'title'          => 'Demasiado punitivo y lento',
                'body'           => 'Entiendo el nivel, pero no me engancha: prefiero juegos donde el “mindgame” sea más directo y constante, no esperar rondas.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 27,
                'game_id'        => 31, // Unpacking
                'title'          => 'No me aporta nada',
                'body'           => 'Demasiado tranquilo. Yo necesito tensión, práctica y mejora. Aquí me aburro en diez minutos.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 27,
                'game_id'        => 16, // Gone Home
                'title'          => 'Cero gameplay para mí',
                'body'           => 'Historia íntima y tal, pero yo vengo a jugar: mecánicas, ejecución, competir. No conecté.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 27,
                'game_id'        => 168, // Microsoft Flight Simulator 2020
                'title'          => 'Me duermo',
                'body'           => 'Entiendo la simulación, pero no es mi vibra. No hay matchups, no hay ranked, no hay adrenalina: paso.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],

            // brunocb
            [
                'user_id'        => 28,
                'game_id'        => 86, // Mass Effect: Legendary Edition
                'title'          => 'Sci-fi RPG definitivo: decisiones + companions',
                'body'           => 'Trilogía que define el “RPG de ciencia ficción”: builds, compañeros memorables y decisiones con peso. Lore enorme y un mundo que se siente coherente.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 28,
                'game_id'        => 51, // Cyberpunk 2077
                'title'          => 'Builds, Night City y dilemas (muy top)',
                'body'           => 'Me encanta por sistemas: builds que cambian el juego, misiones con opciones y una ciudad con identidad. Cuando la narrativa y el gameplay se alinean, es brutal.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 28,
                'game_id'        => 5, // NieR:Automata
                'title'          => 'Acción + filosofía: te deja pensando',
                'body'           => 'Es épico y reflexivo a la vez. La historia y temas están por encima de la media, y además se juega muy bien. Sci-fi con alma.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 28,
                'game_id'        => 52, // Starfield
                'title'          => 'Buen sandbox sci-fi, pero irregular',
                'body'           => 'Tiene el “vicio” de exploración y sistemas, pero no todo está al mismo nivel. Aun así, para builds y roleo espacial, me funciona.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 28,
                'game_id'        => 66, // The Outer Worlds 2
                'title'          => 'RPG de decisiones con humor (y sistemas)',
                'body'           => 'Me gusta por el enfoque en elecciones y por cómo plantea dilemas. Si te va el sci-fi con sátira y builds, entra solo.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 28,
                'game_id'        => 71, // The Alters
                'title'          => 'Sci-fi de dilemas: ideas buenísimas',
                'body'           => 'Me flipa cuando un juego usa ciencia ficción para hablar de identidad y decisiones. Muy curioso y con mucho potencial de “what if”.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 28,
                'game_id'        => 87, // Persona 5 Royal
                'title'          => 'Buen JRPG, aunque no es mi sci-fi',
                'body'           => 'Es larguísimo y con personajes muy guays, pero yo conecto más cuando hay ciencia ficción “dura” o dilemas tecnológicos. Aun así, está muy bien.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 28,
                'game_id'        => 54, // Fallout 4
                'title'          => 'Buen RPG de sistemas, narrativa más floja',
                'body'           => 'Me gusta por builds y progresión, pero a nivel de decisiones y dilemas se queda por debajo de otros. Aun así, el loop es sólido.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 28,
                'game_id'        => 84, // The Witcher 3: Wild Hunt
                'title'          => 'RPG enorme, decisiones muy bien escritas',
                'body'           => 'No es sci-fi, pero a nivel de narrativa y elecciones es referencia. Me engancha por misiones y moral gris.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 28,
                'game_id'        => 55, // Red Dead Redemption 2
                'title'          => 'Épico y humano, pero muy lento',
                'body'           => 'La historia y la producción son brutales, aunque como “sistema RPG” no es lo que busco. Aun así, me parece una experiencia enorme.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 28,
                'game_id'        => 4, // Disco Elysium
                'title'          => 'Narrativa top, menos “sci-fi systems”',
                'body'           => 'Es brillante escribiendo y en decisiones, pero yo vengo por builds y mundos sci-fi. Aun así, lo valoro muchísimo.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 28,
                'game_id'        => 198, // DOOM Eternal
                'title'          => 'Adrenalina, pero poco RPG',
                'body'           => 'Me gusta para soltar tensión, pero no me aporta lo que busco en un RPG largo: decisiones, companions y dilemas.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 28,
                'game_id'        => 77, // Portal 2
                'title'          => 'Puzzles perfectos, cero rol',
                'body'           => 'Me parece redondo como diseño, pero lo juego como “palate cleanser”. No es mi género, aunque es buenísimo.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 28,
                'game_id'        => 23, // Detroit: Become Human
                'title'          => 'Interesante, pero muy “pelijuego”',
                'body'           => 'Tiene dilemas y decisiones, sí, pero me falta profundidad de sistemas y builds. Me interesa más como narrativa que como juego.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 28,
                'game_id'        => 53, // Horizon Zero Dawn
                'title'          => 'Mundo guapo, pero menos rol',
                'body'           => 'Me gusta la ambientación sci-fi, pero el rol/buildcrafting es más limitado. Lo disfruto, pero no es mi obsesión.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 28,
                'game_id'        => 188, // F1 24
                'title'          => 'Cero interés',
                'body'           => 'Respeto el deporte, pero yo quiero mundos, companions y dilemas. Aquí no hay nada de eso.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 28,
                'game_id'        => 195, // WWE 2K25
                'title'          => 'No es mi rollo',
                'body'           => 'Me aburre rápido: prefiero campañas largas y sistemas RPG. Esto no me aporta.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 28,
                'game_id'        => 180, // Phasmophobia
                'title'          => 'Tensión sin “sistema”',
                'body'           => 'No me engancha: es más experiencia/party y sustos. Yo busco progresión, builds y narrativa larga.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],

            // nuriaS
            [
                'user_id'        => 29,
                'game_id'        => 92, // The Legend of Zelda: Breath of the Wild
                'title'          => 'Libertad pura en Switch',
                'body'           => 'Explorar y descubrir cosas a tu ritmo es magia. Todo se siente “gameplay primero” y cada paseo acaba en una aventura.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 29,
                'game_id'        => 93, // Super Mario Odyssey
                'title'          => 'Diversión perfecta y pulida',
                'body'           => 'Control increíble, creatividad constante y una alegría que se contagia. Es el típico juego que te hace sonreír jugando.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 29,
                'game_id'        => 95, // Mario Kart 8 Deluxe
                'title'          => 'Competitivo amable',
                'body'           => 'Es party, es pique sano y es “una más”. Perfecto para jugar con gente sin toxicidad y con gameplay súper pulido.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 29,
                'game_id'        => 97, // Splatoon 3
                'title'          => 'Online con color y buen rollo',
                'body'           => 'Me encanta porque es competitivo, pero con una vibra mucho más amable. Matches rápidos, estilo único y siempre quieres mejorar.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 29,
                'game_id'        => 98, // Metroid Dread
                'title'          => 'Plataformas y tensión bien medida',
                'body'           => 'Control finísimo y exploración muy satisfactoria. Tiene momentos intensos, pero nunca se me hace “horror”, es más reto.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 29,
                'game_id'        => 99, // Fire Emblem: Three Houses
                'title'          => 'Estrategia con cariño por los personajes',
                'body'           => 'Me encanta por la historia y el vínculo con el grupo. Es largo, pero engancha: decisiones, relaciones y combate táctico muy bien hecho.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 29,
                'game_id'        => 94, // Animal Crossing: New Horizons
                'title'          => 'Rutina cozy para días tranquilos',
                'body'           => 'Decoración, colecciones y vibes calmadas. Me sirve cuando quiero algo suave y bonito, sin presión.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 29,
                'game_id'        => 3, // Stardew Valley
                'title'          => 'Cozy clásico (y muy vicio)',
                'body'           => 'Me gusta por la rutina y el progreso. No es “Nintendo”, pero encaja perfecto en Switch para jugar tranquila.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 29,
                'game_id'        => 102, // A Short Hike
                'title'          => 'Corto, bonito, feel-good',
                'body'           => 'Ideal para una tarde: exploración ligera y vibra positiva. Me dejó encantada y con ganas de recomendárselo a todo el mundo.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 29,
                'game_id'        => 100, // Luigi's Mansion 3
                'title'          => 'Encanto Nintendo y puzzles simpáticos',
                'body'           => 'Es divertido, mono y muy bien animado. Me gusta porque es aventura ligera con puzzles sin estrés.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 29,
                'game_id'        => 125, // Hollow Knight
                'title'          => 'Buenísimo, pero más duro',
                'body'           => 'Me encanta la exploración y el control, pero me exige más de lo que suelo buscar. Aun así, es una joya.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 29,
                'game_id'        => 126, // Celeste
                'title'          => 'Reto justo y precioso',
                'body'           => 'Es difícil, pero con un control tan fino que te motiva a seguir. Me gusta cuando quiero modo “mejorar un poquito”.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 29,
                'game_id'        => 63, // Ori and the Will of the Wisps
                'title'          => 'Plataformas bonito a rabiar',
                'body'           => 'Visualmente es una pasada y se juega genial. No es Nintendo, pero en Switch entra perfecto por la vibra y el gameplay.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 29,
                'game_id'        => 77, // Portal 2
                'title'          => 'Puzzles brillantes',
                'body'           => 'Diseño súper inteligente y ritmo muy bueno. No es mi vibra principal, pero lo disfruto por lo bien hecho que está.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 29,
                'game_id'        => 80, // It Takes Two
                'title'          => 'Coop creativo para jugar con alguien',
                'body'           => 'Muy variado y divertido, aunque no siempre es “relax”. Lo juego por la experiencia compartida y porque sorprende.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 29,
                'game_id'        => 171, // Resident Evil 7: Biohazard
                'title'          => 'Terror que no disfruto',
                'body'           => 'Demasiada tensión y sustos. Yo quiero aventura, color y diversión; aquí lo paso fatal.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 29,
                'game_id'        => 174, // Outlast
                'title'          => 'No es para mí',
                'body'           => 'Ansiedad constante. No puedo con persecuciones y miedo sin pausa. Cero mi estilo.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 29,
                'game_id'        => 178, // Dead Space (2008)
                'title'          => 'Demasiado intenso',
                'body'           => 'Lo respeto, pero me supera: opresivo y muy de susto/tensión. Prefiero mil veces algo más amable.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],

            // gonzaleon
            [
                'user_id'        => 30,
                'game_id'        => 168, // Microsoft Flight Simulator 2020
                'title'          => 'Mi modo “cabina”: paz absoluta',
                'body'           => 'Me pongo una ruta, ajusto la cabina y desconecto. Es concentración tranquila, cielos bonitos y esa satisfacción de pilotar sin prisa.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 30,
                'game_id'        => 169, // Euro Truck Simulator 2
                'title'          => 'Rutas largas y mente en blanco',
                'body'           => 'Es terapéutico: conducción constante, paisaje, radio de fondo y cumplir entregas. Perfecto para relajarte a lo “chill”.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 30,
                'game_id'        => 167, // Farming Simulator 22
                'title'          => 'Rutina de campo (satisfacción pura)',
                'body'           => 'Planificar, sembrar, recoger y mejorar maquinaria es un vicio muy tranquilo. No hay prisa, solo progreso y orden.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 30,
                'game_id'        => 158, // Cities: Skylines
                'title'          => 'Construir sin estrés',
                'body'           => 'Me encanta porque puedo optimizar tráfico y crecer poco a poco. Es gestión suave: ver la ciudad funcionar da gusto.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 30,
                'game_id'        => 190, // Assetto Corsa Competizione
                'title'          => 'Sim racing serio para concentrarse',
                'body'           => 'Aquí entro en modo foco: líneas, frenadas y constancia. Con volante se siente increíble y te deja muy satisfecho cuando clavas vueltas.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 30,
                'game_id'        => 170, // Anno 1800
                'title'          => 'Gestión elegante, progreso constante',
                'body'           => 'Cadenas de producción y planificación con ritmo tranquilo. Me gusta porque construyes algo bonito y eficiente sin ir a mil.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 30,
                'game_id'        => 187, // Gran Turismo 7
                'title'          => 'Conducción fina y coleccionismo de coches',
                'body'           => 'Me gusta el tacto y el “coleccionar” coches y eventos. No es tan sim puro como ACC, pero es muy disfrutable y relajante.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 30,
                'game_id'        => 163, // Banished
                'title'          => 'Gestión lenta pero exigente',
                'body'           => 'Me gusta el ritmo calmado y la planificación de recursos. Te castiga si te aceleras, así que encaja perfecto con mi “sin prisa”.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 30,
                'game_id'        => 165, // Planet Zoo
                'title'          => 'Construir bonito (y entretenerte horas)',
                'body'           => 'Me gusta por decorar y ver el parque crecer. No siempre es “sim cabina”, pero como gestión relajada, entra genial.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 30,
                'game_id'        => 164, // Planet Coaster
                'title'          => 'Builder divertido para perder el tiempo',
                'body'           => 'Me lo paso genial haciendo parques y ajustando detalles. Es de esos juegos de “una cosa más” sin darte cuenta.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 30,
                'game_id'        => 186, // Forza Horizon 5
                'title'          => 'Arcade bonito para pasear',
                'body'           => 'Cuando no quiero sim estricto, Forza es perfecto: conduces, exploras y listo. Muy agradable, aunque menos “cabina”.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 30,
                'game_id'        => 159, // Factorio
                'title'          => 'Optimizar, pero me activa demasiado',
                'body'           => 'Me gusta la lógica, pero me acelera la cabeza. Para mí la simulación es más de relax; esto es más “modo obsesión”.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 30,
                'game_id'        => 103, // Dorfromantik
                'title'          => 'Zen visual',
                'body'           => 'Es tranquilísimo: pones piezas, queda bonito y te relajas. No es conducción, pero me sirve para desconectar igual.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 30,
                'game_id'        => 3, // Stardew Valley
                'title'          => 'Cozy para días de sofá',
                'body'           => 'Me gusta por el progreso suave y la rutina. No es sim de cabina, pero tiene esa misma vibra de “sin prisa”.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 30,
                'game_id'        => 189, // Need for Speed Unbound
                'title'          => 'Demasiado arcade para mi gusto',
                'body'           => 'Está divertido, pero yo busco conducción más calmada o más sim. Aquí siento que todo es demasiado rápido y caótico.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 30,
                'game_id'        => 182, // Tekken 8
                'title'          => 'No es mi vibra',
                'body'           => 'Demasiado competitivo y de reflejos. Yo quiero relax, rutas y gestión, no 1v1 a muerte.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 30,
                'game_id'        => 206, // Apex Legends
                'title'          => 'Battle royale = estrés',
                'body'           => 'No puedo desconectar aquí: demasiada presión, prisa y competitividad. No es mi estilo.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 30,
                'game_id'        => 174, // Outlast
                'title'          => 'Ansiedad, no gracias',
                'body'           => 'Cero relax. Sustos y persecuciones: justo lo contrario de lo que busco cuando juego.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],

            // paulaPnc
            [
                'user_id'        => 31,
                'game_id'        => 6, // Return to Monkey Island
                'title'          => 'Aventura con encanto (y nostalgia)',
                'body'           => 'Humor, personajes y puzzles “de los de antes” pero con ritmo moderno. Me lo bebí. De esos que te dejan con sonrisa.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 31,
                'game_id'        => 7, // Thimbleweed Park
                'title'          => 'Misterio retro con humor',
                'body'           => 'Me encanta ese sabor a point&click clásico: investigación, diálogos y chistes raros. Algún puzzle pica, pero es parte del pack.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 31,
                'game_id'        => 13, // Return Of The Obra Dinn
                'title'          => 'La deducción hecha vicio',
                'body'           => 'Es como resolver un caso gigante: observar, apuntar y sacar teorías. Cuando encajas varias identidades seguidas, es una satisfacción enorme.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 31,
                'game_id'        => 8, // Deponia
                'title'          => 'Aventura gamberra',
                'body'           => 'Humor con mala leche y puzzles de aventura clásicos. No todo es fino, pero el tono y el estilo me divierten muchísimo.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 31,
                'game_id'        => 27, // Call of the Sea
                'title'          => 'Puzzles suaves con misterio bonito',
                'body'           => 'Me funciona como aventura ligera: exploración, historia y puzzles sin estrés. Ideal para una tarde tranquila.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 31,
                'game_id'        => 4, // Disco Elysium
                'title'          => 'No es point&click, pero qué escritura',
                'body'           => 'Vengo por el “misterio” y me quedo por los diálogos. Es denso, sí, pero es de lo mejor que he leído en un juego.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 31,
                'game_id'        => 77, // Portal 2
                'title'          => 'Puzzles perfectos, humor perfecto',
                'body'           => 'No es aventura clásica, pero el diseño de puzzles y el humor me encantan. Es redondo y súper disfrutable.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 31,
                'game_id'        => 24, // The Wolf Among Us
                'title'          => 'Serie noir en forma de juego',
                'body'           => 'Me gusta por el misterio y el ritmo de episodios. No hay puzzles “de inventario”, pero engancha y da tema para comentar teorías.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 31,
                'game_id'        => 11, // Sherlock Holmes: Chapter One
                'title'          => 'Detective clásico que cumple',
                'body'           => 'Investigar está guay y tiene casos entretenidos. No es mi top absoluto, pero como “aventura de misterio” funciona.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 31,
                'game_id'        => 28, // Botany Manor
                'title'          => 'Elegante y agradable',
                'body'           => 'Puzzles suaves, estética preciosa y ritmo perfecto. No es “comedia de aventura”, pero como experiencia tranquila me encanta.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 31,
                'game_id'        => 102, // A Short Hike
                'title'          => 'Feel-good cortito',
                'body'           => 'No es point&click, pero tiene encanto a raudales. Perfecto para desconectar entre aventuras más largas.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 31,
                'game_id'        => 14, // What Remains of Edith Finch
                'title'          => 'Bonito, aunque más melancólico',
                'body'           => 'Me gustó mucho, pero es más “historia emocional” que aventura con humor. Aun así, se juega en una tarde y merece la pena.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 31,
                'game_id'        => 78, // The Stanley Parable
                'title'          => 'Meta-humor raro',
                'body'           => 'Me hizo gracia por lo absurdo y por el narrador, aunque como “aventura” se me queda más en experimento que en historia.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 31,
                'game_id'        => 79, // Inscryption
                'title'          => 'Misterio guapo, pero me despista',
                'body'           => 'Tiene una atmósfera y sorpresas muy chulas, pero yo venía buscando más aventura clásica. Aun así, me enganchó.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 31,
                'game_id'        => 19, // Oxenfree
                'title'          => 'Misterio teen con buen rollo',
                'body'           => 'Me gustó por diálogos y atmósfera. No es point&click puro, pero como historia de misterio ligera está muy bien.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 31,
                'game_id'        => 206, // Apex Legends
                'title'          => 'No es mi mundo',
                'body'           => 'Competitivo, rápido y a tiros. Yo quiero puzzles, humor y misterios, no battle royale.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 31,
                'game_id'        => 198, // DOOM Eternal
                'title'          => 'Demasiada adrenalina',
                'body'           => 'Respeto el gameplay, pero me agota. Cero puzzles tranquilos, cero historia con encanto: no es para mí.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 31,
                'game_id'        => 137, // Rust
                'title'          => 'Tóxico y estresante',
                'body'           => 'No puedo con el PvP y el caos. Yo busco aventuras con calma; aquí lo paso fatal.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],

            // lauraJRPG
            [
                'user_id'        => 32,
                'game_id'        => 87, // Persona 5 Royal
                'title'          => 'JRPG de “momentazos” (mi top)',
                'body'           => 'Personajes con carisma, estética brutal y una historia larguísima que te hace sentir parte del grupo. Cada arco tiene “momentazos” y el final me dejó hecha polvo.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 32,
                'game_id'        => 5, // NieR:Automata
                'title'          => 'Épico y reflexivo a la vez',
                'body'           => 'Me encanta cuando un juego te emociona y además te hace pensar. La música, los personajes y los temas… se queda contigo.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 32,
                'game_id'        => 86, // Mass Effect: Legendary Edition
                'title'          => 'Tu tripulación se vuelve familia',
                'body'           => 'El tipo de saga que te marca por personajes y decisiones. Es épica, sí, pero lo que me mata es el vínculo con los companions.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 32,
                'game_id'        => 76, // Clair Obscur: Expedition 33
                'title'          => 'Drama estilizado, me tiene dentro',
                'body'           => 'Me flipa la estética y ese tono de cuento oscuro. No todo es perfecto, pero tiene “vibes” muy fuertes y ganas de seguir la historia.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 32,
                'game_id'        => 51, // Cyberpunk 2077
                'title'          => 'Night City + drama = sí',
                'body'           => 'Lo mejor es la atmósfera y los personajes. Tiene misiones que son puro cine y decisiones que te dejan pensando.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 32,
                'game_id'        => 4, // Disco Elysium
                'title'          => 'Escritura brillante, pero densa',
                'body'           => 'Me fascina por lo bien escrito que está, aunque no siempre me apetece leer tanto. Aun así, tiene escenas y diálogos increíbles.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 32,
                'game_id'        => 52, // Starfield
                'title'          => 'Buen viaje, menos “momentazo”',
                'body'           => 'Me gusta explorar y el rollo espacial, pero a nivel de personajes/drama se me queda algo más frío que mis favoritos.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 32,
                'game_id'        => 66, // The Outer Worlds 2
                'title'          => 'RPG con diálogo y personalidad',
                'body'           => 'Me funciona por decisiones y humor, aunque no me llega al nivel emocional de un JRPG largo. Aun así, es entretenido.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 32,
                'game_id'        => 84, // The Witcher 3: Wild Hunt
                'title'          => 'Épico y muy bien escrito',
                'body'           => 'No es JRPG, pero es de esos mundos que te absorben. Misiones secundarias con calidad de historia principal.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 32,
                'game_id'        => 1, // Horizon Forbidden West
                'title'          => 'Aventura preciosa, historia ok',
                'body'           => 'Visualmente me encanta y se juega muy bien, pero el drama de personajes no me pega igual que mis tops. Aun así, muy disfrutable.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 32,
                'game_id'        => 58, // Ghost of Tsushima
                'title'          => 'Cine samurái precioso',
                'body'           => 'Me encanta la estética y los “momentos” épicos, aunque emocionalmente me llega menos que un JRPG centrado en party.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 32,
                'game_id'        => 23, // Detroit: Become Human
                'title'          => 'Decisiones y drama, pero muy pelijuego',
                'body'           => 'Tiene escenas potentes, pero a veces siento que estoy más viendo que jugando. Aun así, engancha por elecciones.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 32,
                'game_id'        => 83, // Alan Wake 2
                'title'          => 'Buen thriller, tono rarísimo',
                'body'           => 'Me gusta por atmósfera y dirección, pero me deja más “intrigada” que emocionada. Aun así, es muy único.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 32,
                'game_id'        => 112, // Hades
                'title'          => 'Vicio bueno, historia ligera',
                'body'           => 'Me divierte y el loop engancha, pero yo busco historias largas y personajes con drama. Aquí lo juego entre campañas.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 32,
                'game_id'        => 77, // Portal 2
                'title'          => 'Diseño perfecto, cero drama',
                'body'           => 'Me parece brillante como puzzles, pero emocionalmente no me llena. Lo valoro por lo bien hecho que está.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 32,
                'game_id'        => 188, // F1 24
                'title'          => 'No me interesa nada',
                'body'           => 'Deporte y carreras sin historia/party: no es mi vibra. Dame personajes y drama, por favor.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 32,
                'game_id'        => 137, // Rust
                'title'          => 'Estrés y toxicidad',
                'body'           => 'No puedo con el PvP y el caos constante. Yo quiero narrativa, no perderlo todo por un random.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 32,
                'game_id'        => 194, // Madden NFL 24
                'title'          => 'Menús, deporte… paso',
                'body'           => 'No conecto. Si voy a dedicar horas, que sea a una historia épica, no a un modo carrera deportivo.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],

            // vicspeed
            [
                'user_id'        => 33,
                'game_id'        => 190, // Assetto Corsa Competizione
                'title'          => 'Sim-racing de verdad: setup, constancia, tiempos',
                'body'           => 'Aquí es donde siento que compito de verdad: tacto del coche, neumáticos, trazadas y setups que cambian todo. Obsesivo en el mejor sentido.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 33,
                'game_id'        => 188, // F1 24
                'title'          => 'Vuelta a vuelta, mejora continua',
                'body'           => 'Me encanta porque te obliga a ser fino: frenadas, salidas de curva y consistencia. Te metes a ajustar y, sin darte cuenta, llevas horas.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 33,
                'game_id'        => 187, // Gran Turismo 7
                'title'          => 'Colección + conducción seria',
                'body'           => 'Buen tacto, variedad de coches y esa parte de “garaje” que engancha. No es ACC en sim puro, pero es un equilibrio muy redondo.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 33,
                'game_id'        => 186, // Forza Horizon 5
                'title'          => 'Arcade competente para soltar tensión',
                'body'           => 'No es sim, pero me gusta para variar: eventos rápidos, mapa bonito y sensación de velocidad. Ideal cuando no quiero grindear setups.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 33,
                'game_id'        => 189, // Need for Speed Unbound
                'title'          => 'Divertido, pero demasiado arcade',
                'body'           => 'Me lo paso bien, pero comparado con sim-racing se siente más “caos” que precisión. Lo juego cuando quiero algo rápido y ya.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 33,
                'game_id'        => 191, // EA SPORTS FC 26
                'title'          => 'Competitivo “puente”',
                'body'           => 'No es mi main, pero me gusta el pique competitivo. Cuando quiero competir sin volante, un par de partidos y listo.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 33,
                'game_id'        => 169, // Euro Truck Simulator 2
                'title'          => 'Sim relax entre tandas',
                'body'           => 'Después de una sesión intensa de vueltas, esto es terapia: ruta, cabina, música y desconectar. Muy “modo chill”.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 33,
                'game_id'        => 196, // Riders Republic
                'title'          => 'Buen arcade de deportes',
                'body'           => 'Me gusta por variedad y porque también tiene esa cosa de “mejorar tiempos”, aunque sea más arcade y caótico.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 33,
                'game_id'        => 95, // Mario Kart 8 Deluxe
                'title'          => 'Pique casual (pero pica)',
                'body'           => 'No es “de verdad”, pero hay competitividad y rutas memorables. Me sirve para jugar con gente y desconectar del sim.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 33,
                'game_id'        => 168, // Microsoft Flight Simulator 2020
                'title'          => 'Sim precioso, pero otro tipo de foco',
                'body'           => 'Me gusta por cabina y calma, aunque mi obsesión es la vuelta rápida. Esto es más de ruta y paisaje.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 33,
                'game_id'        => 158, // Cities: Skylines
                'title'          => 'Gestionar para desconectar',
                'body'           => 'Me entretiene optimizar tráfico y crecer la ciudad, pero lo juego más como relax que como “competir”.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 33,
                'game_id'        => 203, // Halo Infinite
                'title'          => 'Shooter correcto para variar',
                'body'           => 'Me entretiene, pero no es donde me obsesiono. Lo pongo cuando quiero competir sin volante.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 33,
                'game_id'        => 205, // Overwatch 2
                'title'          => 'Competitivo por equipo (a veces frustra)',
                'body'           => 'Tiene pique, pero depender del equipo me frustra. En sim-racing el error es mío y punto; aquí no siempre.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 33,
                'game_id'        => 192, // NBA 2K26
                'title'          => 'Partidos para desconectar',
                'body'           => 'Lo juego de vez en cuando, pero no me engancha tanto como carreras. Me vale para cambiar de registro.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 33,
                'game_id'        => 51, // Cyberpunk 2077
                'title'          => 'Historia guapa, pero no mi vicio',
                'body'           => 'Me gusta la ciudad y la narrativa, pero yo soy de “mejora continua” con tiempos. Aquí no me quedo tanto.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 33,
                'game_id'        => 16, // Gone Home
                'title'          => 'No es lo mío',
                'body'           => 'Me falta gameplay y reto. Yo quiero dominar una mecánica y ver mejora medible; aquí me aburro.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 33,
                'game_id'        => 32, // Spiritfarer
                'title'          => 'Demasiado lento para mí',
                'body'           => 'Es bonito, pero yo desconecto con cabina o con vueltas, no con narrativa tranquila. No conecté.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 33,
                'game_id'        => 18, // Night in the Woods
                'title'          => 'No me engancha',
                'body'           => 'Mucho diálogo y poca “acción/mejora”. No es mi estilo: prefiero algo más mecánico o competitivo.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],

            // loreSports
            [
                'user_id'        => 34,
                'game_id'        => 191, // EA SPORTS FC 26
                'title'          => 'Mi main: partidazos y modo carrera',
                'body'           => 'Me lo puedo poner a cualquier hora: carrera, online y coleccionar jugadores. Cuando sale partido clutch, es euforia pura.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 34,
                'game_id'        => 192, // NBA 2K26
                'title'          => 'Baloncesto a saco',
                'body'           => 'Modo carrera engancha muchísimo y el online pica. Me encanta construir el equipo y vivir el “partidazo” minuto a minuto.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 34,
                'game_id'        => 194, // Madden NFL 24
                'title'          => 'Estrategia + hype de partido',
                'body'           => 'Me flipa el rollo de play-calling y la tensión de cada drive. No siempre es fácil entrar, pero cuando conectas, vicio.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 34,
                'game_id'        => 195, // WWE 2K25
                'title'          => 'Show y pique',
                'body'           => 'Es puro espectáculo. Me encanta por el drama, los finishers y echar combates rápidos cuando quiero algo más arcade.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 34,
                'game_id'        => 186, // Forza Horizon 5
                'title'          => 'Carreras para variar (y clip fácil)',
                'body'           => 'Cuando me canso de deporte, Forza me da diversión directa: coches, mapa y eventos. Me lo paso genial sin pensar demasiado.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 34,
                'game_id'        => 196, // Riders Republic
                'title'          => 'Arcade competitivo y loco',
                'body'           => 'Me gusta por la adrenalina y el caos controlado. Ideal para sesiones cortas y para comentar “qué locura” con amigos.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 34,
                'game_id'        => 188, // F1 24
                'title'          => 'Me pica el online',
                'body'           => 'No soy de sim puro, pero engancha: mejorar tiempos y pelear posiciones. Cuando haces remontada es un subidón.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 34,
                'game_id'        => 187, // Gran Turismo 7
                'title'          => 'Conducción más seria, menos mi rollo',
                'body'           => 'Está guay y se nota el cuidado, pero me divierte más algo arcade o el pique de deportes. Aun así, cumple.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 34,
                'game_id'        => 95, // Mario Kart 8 Deluxe
                'title'          => 'Party competitivo',
                'body'           => 'Pique sano y partidas rápidas. No es mi main, pero cuando hay gente, siempre cae un “una más”.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 34,
                'game_id'        => 205, // Overwatch 2
                'title'          => 'Shooter para cambiar',
                'body'           => 'Me entretiene por el online y los picks, pero no me engancha como FC/NBA. Bien para ratos.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 34,
                'game_id'        => 206, // Apex Legends
                'title'          => 'Battle royale: subidón y tilt',
                'body'           => 'Cuando sale buena partida es euforia, pero también te tiltea fácil. Lo juego por el pique, sin más.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 34,
                'game_id'        => 82, // Grand Theft Auto V
                'title'          => 'Para hacer el cabra',
                'body'           => 'Me lo pongo cuando quiero desconectar del competitivo: mundo abierto, misiones y caos. Siempre apetece.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 34,
                'game_id'        => 37, // The Last of Us Part I
                'title'          => 'Buena historia, pero no es mi vicio',
                'body'           => 'Está muy bien hecho, pero yo soy de online y modos carrera. Me gusta, pero no me obsesiona.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 34,
                'game_id'        => 50, // Hogwarts Legacy
                'title'          => 'Bonito, pero lo dejo a medias',
                'body'           => 'Me encanta el mundo, pero al final vuelvo al online de deportes. Para ratos está bien, pero no me engancha tanto.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 34,
                'game_id'        => 189, // Need for Speed Unbound
                'title'          => 'Arcade rápido y resultón',
                'body'           => 'Me gusta por la velocidad y el estilo. No es mi top de coches, pero para echar carreras rápidas cumple.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 34,
                'game_id'        => 78, // The Stanley Parable
                'title'          => 'No entiendo el hype',
                'body'           => 'Demasiado raro/meta para mí. Yo quiero competir, progresar y jugar partidos, no “experimentos”.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 34,
                'game_id'        => 79, // Inscryption
                'title'          => 'Se me hace bola',
                'body'           => 'Tiene su rollo, pero no conecto. Prefiero deporte y competitivo directo; aquí me pierdo y me aburro.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 34,
                'game_id'        => 28, // Botany Manor
                'title'          => 'Demasiado tranquilo',
                'body'           => 'Bonito, sí, pero me duermo. Yo necesito pique y partidazos, no puzzles suaves.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],

            // sergioHard
            [
                'user_id'        => 35,
                'game_id'        => 85, // Elden Ring
                'title'          => 'Sufrir, aprender, reventar bosses (10/10)',
                'body'           => 'El mejor tipo de reto: te humilla, aprendes patrones, ajustas build y de repente lo clavas. Cuando cae un boss duro, es euforia pura.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 35,
                'game_id'        => 131, // Blasphemous
                'title'          => 'Castigo justo y estilo brutal',
                'body'           => 'Me encanta por el combate y por lo bien que se siente dominarlo. Va de morir, mejorar y avanzar con orgullo. Y la estética es increíble.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 35,
                'game_id'        => 125, // Hollow Knight
                'title'          => 'Precisión y paciencia',
                'body'           => 'Control finísimo, bosses que te obligan a aprender y sensación constante de progreso real. Es de mis “mejora o muere” favoritos.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 35,
                'game_id'        => 127, // Dead Cells
                'title'          => 'Runs y skill, perfecto para picarte',
                'body'           => 'Es adictivo: cada run aprendes algo, ajustas build y vuelves. Frustra (bien) y te deja satisfecho cuando mejoras tiempos y limpias biomas.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 35,
                'game_id'        => 43, // God of War I
                'title'          => 'Acción exigente con peso',
                'body'           => 'No es souls, pero tiene combate con carácter y momentos épicos. Me gusta porque exige y se siente contundente.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 35,
                'game_id'        => 58, // Ghost of Tsushima
                'title'          => 'Buen combate, menos castigo',
                'body'           => 'Me gusta, pero me falta ese punto de “dominar patrones o te vas a casa”. Aun así, el combate es muy disfrutable y elegante.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 35,
                'game_id'        => 128, // Cuphead
                'title'          => 'Boss-rush de paciencia',
                'body'           => 'Es puro patrón y ejecución: justo lo que me gusta. Te pica, te frustra, y cuando lo pasas te sientes invencible.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 35,
                'game_id'        => 134, // Katana ZERO
                'title'          => 'Reto rápido y limpio',
                'body'           => 'Me gusta por la precisión y repetir hasta que te sale perfecto. Es de esos juegos de “otra run y ya”.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 35,
                'game_id'        => 63, // Ori and the Will of the Wisps
                'title'          => 'Bonito y ágil',
                'body'           => 'No es el mismo sufrimiento, pero el movimiento es una delicia y tiene retos chulos. Me deja buen sabor.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 35,
                'game_id'        => 112, // Hades
                'title'          => 'Roguelite con progresión muy bien llevada',
                'body'           => 'Buenísimo para picarte con builds y runs. No es souls, pero sí de mejorar, optimizar y sentir progreso real.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 35,
                'game_id'        => 119, // Darkest Dungeon
                'title'          => 'Castigo psicológico',
                'body'           => 'Me gusta el sufrimiento táctico, pero aquí a veces el RNG te destroza y te deja con cara de “¿en serio?”. Aun así, engancha.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 35,
                'game_id'        => 124, // Returnal
                'title'          => 'Exigente y adictivo',
                'body'           => 'Buen combate y sensación de dominio, pero te exige constancia. Cuando entras en flow, es una pasada.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 35,
                'game_id'        => 198, // DOOM Eternal
                'title'          => 'Adrenalina y ejecución',
                'body'           => 'No es de patrones de boss, pero sí de dominar ritmo y recursos. Perfecto cuando quiero euforia directa.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 35,
                'game_id'        => 84, // The Witcher 3: Wild Hunt
                'title'          => 'Historia top, combate meh',
                'body'           => 'Me gusta el mundo y las misiones, pero el combate no me llena: lo siento menos técnico y menos exigente de lo que busco.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 35,
                'game_id'        => 61, // Star Wars Jedi: Fallen Order
                'title'          => 'Souls-lite entretenido',
                'body'           => 'Está bien y tiene su reto, pero para mí se queda a medio gas. Aun así, me sirve cuando quiero algo exigente sin ir al extremo.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 35,
                'game_id'        => 106, // Palia
                'title'          => 'Demasiado cozy',
                'body'           => 'No hay tensión ni reto. Yo necesito combate, bosses y mejora. Aquí me aburro rápido.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 35,
                'game_id'        => 104, // Cozy Grove
                'title'          => 'No es mi rollo',
                'body'           => 'Bonito y tranquilo, pero yo no juego para relajarme: juego para sufrir y mejorar.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 35,
                'game_id'        => 105, // Disney Dreamlight Valley
                'title'          => 'Cero desafío',
                'body'           => 'No conecto con esto. Prefiero mil veces un boss que me reviente a hacer recados sin presión.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],

            // celiaCoop
            [
                'user_id'        => 36,
                'game_id'        => 80, // It Takes Two
                'title'          => 'El co-op perfecto para jugar con alguien',
                'body'           => 'Es el típico juego que te une: variedad constante, mecánicas para dos súper bien pensadas y momentos que se comentan después. 10/10 en pareja/amigos.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 36,
                'game_id'        => 81, // Split Fiction
                'title'          => 'Co-op muy divertido y con ritmo',
                'body'           => 'Me encanta porque siempre está cambiando y te obliga a coordinarte. Ideal para “una sesión más” y reírte un rato.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 36,
                'game_id'        => 95, // Mario Kart 8 Deluxe
                'title'          => 'Pique sano asegurado',
                'body'           => 'Perfecto para jugar con gente sin complicaciones: carreras rápidas, risas, y ese competitivo light que no se vuelve tóxico.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 36,
                'game_id'        => 205, // Overwatch 2
                'title'          => 'Co-op/online para organizar partiditas',
                'body'           => 'Me gusta por jugar en equipo y coordinarse. Tiene momentos de tilt, pero en grupo con colegas se disfruta muchísimo.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 36,
                'game_id'        => 3, // Stardew Valley
                'title'          => 'Co-op cozy para tardes largas',
                'body'           => 'En cooperativo es una fantasía: granjita, progreso suave y conversación de fondo. De esos juegos que acompañan.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 36,
                'game_id'        => 50, // Hogwarts Legacy
                'title'          => 'Muy disfrutable (aunque lo juego más “sola”)',
                'body'           => 'Me encanta por la ambientación y explorar, pero no es mi favorito para co-op real. Aun así, lo recomiendo por lo bonito que es.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 36,
                'game_id'        => 207, // Borderlands 3
                'title'          => 'Co-op a tiros y risas',
                'body'           => 'En cooperativo brilla: loot, builds sencillas y caos divertido. Perfecto para jugar con alguien sin mucha historia pesada.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 36,
                'game_id'        => 94, // Animal Crossing: New Horizons
                'title'          => 'Visitar islas y compartir vibes',
                'body'           => 'Me encanta por lo social: decorar, enseñar la isla, intercambiar cosas. No es “co-op de campaña”, pero es súper compartible.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 36,
                'game_id'        => 102, // A Short Hike
                'title'          => 'Feel-good corto',
                'body'           => 'Me lo guardo como “juego de una tarde”: bonito, amable y perfecto para recomendar. No es co-op, pero encaja con mi vibra.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 36,
                'game_id'        => 31, // Unpacking
                'title'          => 'Relajante para desconectar',
                'body'           => 'Me gusta, pero es 100% “a tu rollo”. Lo pongo cuando quiero algo tranquilo, no tanto para jugar con alguien.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 36,
                'game_id'        => 106, // Palia
                'title'          => 'Cozy social ok',
                'body'           => 'Me gusta por el rollo de comunidad y hacer cositas sin presión. No me obsesiona, pero para jugar “en paralelo” con alguien está bien.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 36,
                'game_id'        => 186, // Forza Horizon 5
                'title'          => 'Carreras para jugar en grupo',
                'body'           => 'Me divierte cuando lo juego con gente: eventos, mapa y carreras sin demasiada seriedad. Buen plan de finde.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 36,
                'game_id'        => 191, // EA SPORTS FC 26
                'title'          => 'Pique rápido con colegas',
                'body'           => 'No es mi main, pero para echar partidos con amigos funciona. Competitivo light y listo.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 36,
                'game_id'        => 77, // Portal 2
                'title'          => 'Puzzles muy top (y el co-op está guay)',
                'body'           => 'Me gusta por el humor y los puzzles. El co-op es divertido si vas coordinándote, aunque no lo juego tanto como mis tops de party.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 36,
                'game_id'        => 33, // Dave the Diver
                'title'          => 'Loop amable y simpático',
                'body'           => 'Me encanta el rollo de “una inmersión más”. No es co-op, pero es de esos juegos que comentas mientras juegas al lado de alguien.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 36,
                'game_id'        => 177, // SOMA
                'title'          => 'Demasiado mal rollo',
                'body'           => 'La atmósfera me supera. Yo quiero jugar acompañada y pasarlo bien, no estar tensa y rayada.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 36,
                'game_id'        => 174, // Outlast
                'title'          => 'No puedo con el terror',
                'body'           => 'Ansiedad constante. No es el tipo de experiencia que quiero compartir: lo paso fatal.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 36,
                'game_id'        => 178, // Dead Space (2008)
                'title'          => 'Demasiado intenso',
                'body'           => 'Lo respeto, pero me agobia muchísimo. Prefiero mil veces algo party/cozy.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],

            // ismaLoot
            [
                'user_id'        => 37,
                'game_id'        => 91, // Diablo IV
                'title'          => 'Endgame + loot: “una build más”',
                'body'           => 'Es mi vicio: farmear, optimizar números y probar builds. Cuando te cae el drop bueno y la build despega, es dopamina pura.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 37,
                'game_id'        => 207, // Borderlands 3
                'title'          => 'Loot + coop + caos',
                'body'           => 'Disparos, habilidades y montones de armas. Perfecto para grindear y comparar builds/rolls. Muy disfrutable en sesiones largas.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 37,
                'game_id'        => 113, // The Binding of Isaac: Rebirth
                'title'          => 'Sinergias rotísimas (maravilla)',
                'body'           => 'El mejor “buildcrafting” en forma de roguelite: cada run es un puzzle de items y sinergias. Te pica a probar una combinación más.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 37,
                'game_id'        => 112, // Hades
                'title'          => 'Progresión perfecta, runs perfectas',
                'body'           => 'Me encanta por lo redondo que es: mejoras, armas, boons y un loop que engancha sin volverse pesado. Muy “una run más”.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 37,
                'game_id'        => 198, // DOOM Eternal
                'title'          => 'Adrenalina pura',
                'body'           => 'No es loot, pero me da la misma euforia: ritmo, ejecución y sentirte una máquina. Perfecto para soltar tensión.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 37,
                'game_id'        => 51, // Cyberpunk 2077
                'title'          => 'Builds guapas, historia mejor',
                'body'           => 'Me gusta porque también puedes montarte builds y optimizar, pero donde más brilla es en historia y mundo. Buen “puente” entre RPG y números.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 37,
                'game_id'        => 122, // Vampire Survivors
                'title'          => 'Números por pantalla, dopamina',
                'body'           => 'Es el vicio más simple y más efectivo: builds automáticas, desbloqueos y cada run se siente distinta. Ideal para farmear sin pensar.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 37,
                'game_id'        => 114, // Slay the Spire
                'title'          => 'Buildcrafting… pero de cartas',
                'body'           => 'Me engancha por lo mismo: optimizar, sinergias y decisiones. Cada mazo es una build y te pica a comparar rutas.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 37,
                'game_id'        => 115, // Risk of Rain 2
                'title'          => 'Escalado roto y runs infinitas',
                'body'           => 'Cuando empiezas a acumular items y el daño se va de madre, es una locura. Muy bueno para jugar competitivo con colegas y comparar builds.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 37,
                'game_id'        => 124, // Returnal
                'title'          => 'Skill + progreso, pero duro',
                'body'           => 'Me gusta, aunque es más “reflejos” que loot. Cuando entras en flow es increíble, pero no siempre me apetece ese nivel de castigo.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 37,
                'game_id'        => 65, // Deathloop
                'title'          => 'Entretenido, pero no me obsesiona',
                'body'           => 'Tiene estilo y se deja jugar, pero no tiene el endgame/loot que a mí me engancha. Bien para variar.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 37,
                'game_id'        => 206, // Apex Legends
                'title'          => 'Competitivo ok, pero no es mi vicio',
                'body'           => 'Me da pique competitivo, pero prefiero “progresión y números” a battle royale. Lo juego por clips y ranked de vez en cuando.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 37,
                'game_id'        => 84, // The Witcher 3: Wild Hunt
                'title'          => 'Historia increíble, sistemas simples',
                'body'           => 'Me gusta mucho, pero aquí no vengo por loot/endgame. Es más narrativa y mundo; lo valoro por eso.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 37,
                'game_id'        => 54, // Fallout 4
                'title'          => 'Buen loop, endgame flojo',
                'body'           => 'Me entretiene por progresión y exploración, pero no tiene ese “farm infinito” que me engancha. Aun así, está bien para perder horas.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 37,
                'game_id'        => 203, // Halo Infinite
                'title'          => 'Shooter correcto para ranked',
                'body'           => 'Me gusta por el online y el pique, pero no me da lo mismo que grindear loot. Lo uso como “descanso” del farmeo.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 37,
                'game_id'        => 16, // Gone Home
                'title'          => 'Me falta juego',
                'body'           => 'No hay builds, no hay números, no hay progresión. Para mí se queda en paseo narrativo y me aburre.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 37,
                'game_id'        => 102, // A Short Hike
                'title'          => 'Demasiado chill',
                'body'           => 'Es mono, pero yo necesito progresión y algo de “grindeo”. Aquí no me engancho nada.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 37,
                'game_id'        => 17, // Virginia
                'title'          => 'No conecto',
                'body'           => 'Experiencia rara y lenta. Yo vengo a optimizar builds y farmear, no a interpretar símbolos.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],

            // marinaHorror
            [
                'user_id'        => 38,
                'game_id'        => 180, // Phasmophobia
                'title'          => 'Horror con amigas: gritos y clips',
                'body'           => 'Es mi top para jugar con gente: tensión constante, sustos inesperados y cada partida sale una anécdota. Encima da para teorías y clips buenísimos.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 38,
                'game_id'        => 174, // Outlast
                'title'          => 'Sustos sin piedad',
                'body'           => 'Puro nervio. La atmósfera te aplasta y vas todo el rato en modo “no mires atrás”. Me fascina aunque lo pase fatal.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 38,
                'game_id'        => 172, // Resident Evil 2
                'title'          => 'Tensión perfecta',
                'body'           => 'Me encanta porque mezcla susto, exploración y esa paranoia de no ir sobrada de recursos. Es de los que comentas teorías después.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 38,
                'game_id'        => 179, // The Evil Within
                'title'          => 'Horror loco (me flipa)',
                'body'           => 'Tiene momentos muy intensos y un rollo raro que me engancha. No es “elegante”, pero sí muy adrenalina.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 38,
                'game_id'        => 83, // Alan Wake 2
                'title'          => 'Thriller/horror moderno de comentar',
                'body'           => 'Atmosferón y escenas para quedarte en silencio. Me encanta porque te deja pensando y da para comentar teorías a saco.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 38,
                'game_id'        => 25, // The Dark Pictures Anthology: House of Ashes
                'title'          => 'Perfecto para jugar “en grupo”',
                'body'           => 'Me lo paso genial decidiendo con gente y discutiendo qué haríamos. No da el miedo más puro, pero como experiencia compartida funciona muy bien.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 38,
                'game_id'        => 26, // The Dark Pictures Anthology: Little Hope
                'title'          => 'Misterio y sustos, buen plan de noche',
                'body'           => 'Me gusta por el rollo de investigar y comentar. No me parece tan top como otros, pero para una sesión con colegas cumple.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 38,
                'game_id'        => 171, // Resident Evil 7: Biohazard
                'title'          => 'Adrenalina pura (qué mal lo pasé)',
                'body'           => 'Súper inmersivo y agobiante. Me encanta el miedo “físico” que te mete, aunque necesito descansos.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 38,
                'game_id'        => 173, // Alien: Isolation
                'title'          => 'Paranoia constante',
                'body'           => 'El alien te vuelve loca: tensión sostenida y sensación de peligro real. Es de esos juegos que te dejan sin uñas.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 38,
                'game_id'        => 175, // Silent Hill 2
                'title'          => 'Más psicológico que susto',
                'body'           => 'Me gusta por el mal rollo y el tono, pero lo siento más lento. Aun así, es un clásico para comentar teoría y símbolos.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 38,
                'game_id'        => 177, // SOMA
                'title'          => 'Terror existencial',
                'body'           => 'Me inquieta más por lo que te deja pensando que por los sustos. No es mi tipo de “horror con gente”, pero me gustó.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 38,
                'game_id'        => 178, // Dead Space (2008)
                'title'          => 'Horror sci-fi muy intenso',
                'body'           => 'Me encanta por la atmósfera y la tensión, aunque es más acción-horror. Muy bueno para adrenalina.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 38,
                'game_id'        => 80, // It Takes Two
                'title'          => 'Co-op para “descansar” del terror',
                'body'           => 'Cuando me saturo de sustos, esto es perfecto: jugar con alguien, reírte y bajar pulsaciones. Buen puente.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 38,
                'game_id'        => 147, // The Forest
                'title'          => 'Supervivencia con mal rollo (en grupo mola)',
                'body'           => 'Me gusta porque mezclas base, exploración y sustos. En cooperativo es mucho más divertido: gritos, caos y “¿has visto eso?”.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 38,
                'game_id'        => 70, // Dying Light: The Following - Enhanced Edition
                'title'          => 'Acción con tensión nocturna',
                'body'           => 'Me gusta por la adrenalina y ese cambio cuando cae la noche. No es terror puro, pero sí tiene tensión y momentos intensos.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 38,
                'game_id'        => 3, // Stardew Valley
                'title'          => 'Demasiado “tranqui” para mí',
                'body'           => 'Sé que es buen cozy, pero me aburre. Yo quiero atmósfera, tensión y sustos, no granjita.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 38,
                'game_id'        => 165, // Planet Zoo
                'title'          => 'Gestión sin adrenalina',
                'body'           => 'No conecto: es demasiado calmado. A mí me gusta jugar con el pulso arriba.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 38,
                'game_id'        => 103, // Dorfromantik
                'title'          => 'Me duerme',
                'body'           => 'Bonito, sí, pero cero tensión. No es lo que busco cuando juego.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],

            // alvaroVR
            [
                'user_id'        => 39,
                'game_id'        => 209, // Half-Life: Alyx
                'title'          => 'VR que te rompe la cabeza (en el buen sentido)',
                'body'           => 'Esto es “la VR” para mí: inmersión real, interacción y tensión de shooter. Cada rato jugando parece magia. Para enseñar VR a alguien: este.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 39,
                'game_id'        => 210, // Beat Saber
                'title'          => 'Euforia instantánea',
                'body'           => 'Te lo pones y ya estás dentro: ritmo, sudor y “una canción más”. Perfecto para competir con amigos por puntuación y clips.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 39,
                'game_id'        => 211, // Boneworks
                'title'          => 'Física + acción: locura',
                'body'           => 'Me encanta por lo libre que te deja: experimentar, pegar tiros y sentirlo todo súper “real”. A veces es tosco, pero es muy VR.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 39,
                'game_id'        => 212, // Moss
                'title'          => 'VR bonita (y diferente)',
                'body'           => 'No es shooter, pero me sorprende lo bien que funciona: encanto, puzzles y esa sensación de “estar ahí” mirando un diorama vivo.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 39,
                'game_id'        => 203, // Halo Infinite
                'title'          => 'Shooter de siempre, pique asegurado',
                'body'           => 'Me gusta por lo directo: gunplay sólido y online para competir. Es mi “vengo del shooter” de manual.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 39,
                'game_id'        => 198, // DOOM Eternal
                'title'          => 'Adrenalina pura, modo bestia',
                'body'           => 'Cuando quiero acción sin pensar demasiado: esto. Ritmo, ejecución y sentirte invencible. Me sube el pulso siempre.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 39,
                'game_id'        => 208, // Metro Exodus
                'title'          => 'Buena atmósfera, ritmo más lento',
                'body'           => 'Me gusta por inmersión y ambientación, pero va más pausado. Lo disfruto, aunque prefiero acción más directa.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 39,
                'game_id'        => 65, // Deathloop
                'title'          => 'Estilo y gunplay guay',
                'body'           => 'Me entretiene por los tiroteos y el rollo de repetir/optimizar rutas. No es top VR, pero como shooter con personalidad, bien.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 39,
                'game_id'        => 204, // Counter-Strike 2
                'title'          => 'Competitivo duro, respeto',
                'body'           => 'Buen competitivo, pero demasiado seco para mí. Me mola ver clips, jugar alguna, pero no me caso.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 39,
                'game_id'        => 205, // Overwatch 2
                'title'          => 'Pique por equipo (según el día)',
                'body'           => 'Me gusta por el competitivo y los héroes, pero depende mucho del equipo. Aun así, para jugar con colegas y clips, cumple.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 39,
                'game_id'        => 206, // Apex Legends
                'title'          => 'BR de subidón y tilt',
                'body'           => 'Cuando sale buena partida, es euforia; cuando no, tilt. Lo juego por ranked y highlights.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 39,
                'game_id'        => 180, // Phasmophobia
                'title'          => 'Terror con gente, ok',
                'body'           => 'Me gusta con amigos por los sustos y las risas, pero no es lo que más busco. Soy más de acción directa.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 39,
                'game_id'        => 77, // Portal 2
                'title'          => 'Puzzles top para variar',
                'body'           => 'Me parece brillante, aunque no es mi “main”. Lo disfruto cuando quiero cambiar de tiros a pensar un poco.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 39,
                'game_id'        => 79, // Inscryption
                'title'          => 'Curioso, pero no me engancha',
                'body'           => 'Tiene rollo, pero yo quiero gameplay directo. Lo probé por el hype y me quedé a medias.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 39,
                'game_id'        => 189, // Need for Speed Unbound
                'title'          => 'Arcade para desconectar',
                'body'           => 'Me entretiene, pero no es prioridad. Si quiero “acción”, prefiero un shooter.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 39,
                'game_id'        => 94, // Animal Crossing: New Horizons
                'title'          => 'Me aburre',
                'body'           => 'Demasiado lento y cozy. Yo necesito adrenalina o inmersión intensa, no rutina.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 39,
                'game_id'        => 107, // Ooblets
                'title'          => 'No es mi vibra',
                'body'           => 'Demasiado cute/cozy. No conecto nada con el estilo ni con el loop.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 39,
                'game_id'        => 106, // Palia
                'title'          => 'Cero acción',
                'body'           => 'No me atrapa: quiero tiros, ritmo y sensación de “wow” inmersivo. Aquí me desconecto (para mal).',
                'is_recommended' => false,
                'spoiler'        => false,
            ],

            // hugoTycoon
            [
                'user_id'        => 40,
                'game_id'        => 164, // Planet Coaster
                'title'          => 'Construir algo bonito que funcione',
                'body'           => 'Mi tycoon favorito: diseño, decoración y optimización sin estrés extremo. Me pierdo ajustando colas, rutas y estética hasta que queda “perfecto”.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 40,
                'game_id'        => 165, // Planet Zoo
                'title'          => 'Gestión + creatividad (y capturas)',
                'body'           => 'Me encanta porque es gestionar y a la vez hacer algo precioso. Siempre acabo sacando capturas cuando el parque ya “respira” y se ve vivo.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 40,
                'game_id'        => 158, // Cities: Skylines
                'title'          => 'Urbanismo terapéutico',
                'body'           => 'Optimizar tráfico, expandir barrios y ver crecer la ciudad es satisfacción pura. Me obsesiono suave con rotondas y líneas de bus.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 40,
                'game_id'        => 170, // Anno 1800
                'title'          => 'Cadenas de producción sin volverse loco',
                'body'           => 'Me gusta el equilibrio: planificar, optimizar rutas y hacer que todo encaje. Tiene complejidad, pero la disfruto sin sentir “estrés hardcore”.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 40,
                'game_id'        => 3, // Stardew Valley
                'title'          => 'Progreso suave, buen mood',
                'body'           => 'Me relaja muchísimo: rutina bonita, objetivos pequeños y esa sensación de ir mejorando día a día. Perfecto para bajar revoluciones.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 40,
                'game_id'        => 103, // Dorfromantik
                'title'          => 'Puzzles zen',
                'body'           => 'Me lo pongo de fondo y me quedo horas: colocar piezas, optimizar puntuación y que quede “bonito”. Es mi desconexión total.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 40,
                'game_id'        => 163, // Banished
                'title'          => 'Gestión más dura, pero satisface',
                'body'           => 'Me gusta aunque aprieta más: si planificas mal, lo pagas. Aun así, cuando la ciudad se estabiliza, es satisfacción pura.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 40,
                'game_id'        => 161, // RimWorld
                'title'          => 'Demasiado caos para mi “sin estrés”',
                'body'           => 'Me divierte, pero a veces se vuelve una novela de desastres. Lo juego por historias emergentes, aunque prefiero algo más controlable.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 40,
                'game_id'        => 159, // Factorio
                'title'          => 'Optimización pura, pero intensa',
                'body'           => 'Me gusta la idea de mejorar fábricas, pero me exige demasiada cabeza cuando solo quiero construir bonito y relajarme.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 40,
                'game_id'        => 160, // Satisfactory
                'title'          => 'Construir factories 3D es un gustazo',
                'body'           => 'Me engancha por el placer visual de ver la fábrica funcionando. Aun así, cuando se complica, lo dejo para días de “modo obsesivo”.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 40,
                'game_id'        => 167, // Farming Simulator 22
                'title'          => 'Chill absoluto',
                'body'           => 'No es mi top, pero me relaja: tareas repetitivas y progreso lento. Ideal para desconectar con música/podcast.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 40,
                'game_id'        => 169, // Euro Truck Simulator 2
                'title'          => 'Ruta y cabina, modo relax',
                'body'           => 'Me encanta el rollo de conducción tranquila. No es “construir”, pero sí esa desconexión de hacer rutas sin prisas.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 40,
                'game_id'        => 105, // Disney Dreamlight Valley
                'title'          => 'Cozy para ratos',
                'body'           => 'Me gusta por decoración y tareas suaves, aunque no me engancha como los tycoon. Aun así, para relax está bien.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 40,
                'game_id'        => 107, // Ooblets
                'title'          => 'Cute y simpático',
                'body'           => 'Me parece agradable y ligero. No es mi “main”, pero me funciona como juego de buen rollo.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 40,
                'game_id'        => 102, // A Short Hike
                'title'          => 'Una tarde perfecta',
                'body'           => 'Corto, bonito y cero estrés. Lo recomiendo cuando quieres algo que te deje bien y listo.',
                'is_recommended' => true,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 40,
                'game_id'        => 182, // Tekken 8
                'title'          => 'No es lo mío',
                'body'           => 'Demasiado competitivo y exigente. Yo busco construir y optimizar tranquilo, no aprender combos y matchups.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 40,
                'game_id'        => 204, // Counter-Strike 2
                'title'          => 'Estrés puro',
                'body'           => 'Demasiada tensión y toxicidad para mí. No me relaja nada: prefiero mil veces un parque o una ciudad.',
                'is_recommended' => false,
                'spoiler'        => false,
            ],
            [
                'user_id'        => 40,
                'game_id'        => 174, // Outlast
                'title'          => 'Nope',
                'body'           => 'Terror y ansiedad. Yo juego para estar tranquilo, no para sufrir.',
                'is_recommended' => false,
                'spoiler'        => false,
            ]
        ];

        foreach ($reviews as $data) {
            Review::updateOrCreate(
                [
                    'user_id' => $data['user_id'],
                    'game_id' => $data['game_id'],
                ],
                [
                    'title'          => $data['title'],
                    'body'           => $data['body'],
                    'is_recommended' => (bool) $data['is_recommended'],
                    'spoiler'        => (bool) $data['spoiler'],
                ]
            );
        }

        // Parches de para añadir reseñas con spoiler
        $spoilers = [
            // hagne
            [
                'user_id' => 1,
                'game_id' => 15, // Firewatch
                'title'   => 'Corto pero muy intenso (con spoiler)',
                'body'    => 'Personajes y diálogos top; en pocas horas te deja tocado emocionalmente. Al final se revela que el misterio no era una conspiración: Ned Goodwin estuvo manipulando cosas para cubrir la muerte accidental de su hijo Brian en la cueva.',
            ],

            // davidRios
            [
                'user_id' => 6,
                'game_id' => 37, // The Last of Us Part I
                'title'   => 'Buena historia (spoiler gordo)',
                'body'    => 'Narrativamente está muy bien. El inicio con la muerte de Sarah te deja KO, y el final con Joel eligiendo salvar a Ellie y mintiéndole sobre lo del hospital es lo que más me marcó.',
            ],

            // tomas_h
            [
                'user_id' => 23,
                'game_id' => 2, // The Last of Us Part II
                'title'   => 'Hype + trauma (spoiler)',
                'body'    => 'Producción y setpieces brutales. Que maten a Joel tan pronto me destrozó, pero entiendo lo que buscaban: convertir el juego en una espiral de venganza y consecuencias.',
            ],

            // marinaHorror
            [
                'user_id' => 38,
                'game_id' => 177, // SOMA
                'title'   => 'Terror existencial (spoiler)',
                'body'    => 'Inquieta más por lo que te deja pensando que por los sustos. El golpe es entender que no “te transfieres”: se crea una copia. La parte final deja a una versión de Simon atrapada mientras otra sigue, y eso da un mal rollo increíble.',
            ],

            // retroAlex
            [
                'user_id' => 4,
                'game_id' => 4, // Disco Elysium
                'title'   => 'Texto, texto y más texto (spoiler)',
                'body'    => 'RPG conversacional increíble; si te gusta leer, es de lo mejor que hay. El asesino resulta ser el francotirador (el Deserter) escondido en la isla, y toda la resolución te pega por cómo conecta con el trasfondo político y personal.',
            ],

            // marinaHorror
            [
                'user_id' => 38,
                'game_id' => 25, // House of Ashes
                'title'   => 'Perfecto para jugar “en grupo” (spoiler)',
                'body'    => 'Como experiencia compartida funciona muy bien. Cuando descubres qué son realmente las “criaturas” y cómo se liga todo con la instalación y los experimentos, el juego sube mucho y da para debatir teorías.',
            ],
        ];

        foreach ($spoilers as $data) {
            Review::where('user_id', $data['user_id'])
                ->where('game_id', $data['game_id'])
                ->update([
                    'title'   => $data['title'],
                    'body'    => $data['body'],
                    'spoiler' => true,
                ]);
        }
    }
}
