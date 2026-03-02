<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Game;

/**
 * Comando de consola que traduce los summaries de juegos al español usando LibreTranslate
 * y guarda el resultado en summary_es, con opciones para limitar cantidad, pausar entre peticiones
 * y empezar a partir de un id concreto.
 */
class TranslateGameSummaries extends Command
{
    protected $signature = 'games:translate-summaries
        {--limit=0 : Máximo de juegos a traducir (0 = sin límite)}
        {--sleep=250 : Pausa en ms entre peticiones}
        {--from-id=501 : Se ejecuta a partir de un juego con cierto id}';

    protected $description = 'Traduce summary usando LibreTranslate y lo guarda en summary_es ';

    public function handle(): int
    {
        $fromId  = (int) $this->option('from-id');
        $limit   = (int) $this->option('limit');
        $sleepMs = (int) $this->option('sleep');

        $q = Game::query()
            ->whereNotNull('summary')
            ->where('summary', '!=', '');

        if ($fromId > 0) {
            $q->where('id', '>=', $fromId);
        }

        $total = $q->count();
        $this->info("Candidatos: {$total}");

        $done = 0;

        $q->orderBy('id')->chunkById(25, function ($games) use (&$done, $limit, $sleepMs) {
            foreach ($games as $game) {
                if ($limit > 0 && $done >= $limit) return false;

                $text = trim(strip_tags((string) $game->summary));
                if ($text === '') {
                    $game->summary_es = null;
                    $game->save();
                    continue;
                }

                $es = $this->translateToEs($text);

                if ($es !== '') {
                    $game->summary_es = $es;
                    $game->save();
                    $done++;
                    $this->line("OK #{$game->id} {$game->title}");
                } else {
                    $this->warn("FAIL #{$game->id} {$game->title}");
                }

                usleep(max(0, $sleepMs) * 1000);
            }
        });

        $this->info("Traducidos: {$done}");
        return self::SUCCESS;
    }

    private function translateToEs(string $text): string
    {
        try {
            $url = rtrim(config('services.translate.url'), '/');
            $key = config('services.translate.key');

            $payload = [
                'q'      => $text,
                'source' => 'auto',
                'target' => 'es',
                'format' => 'text',
            ];

            if (!empty($key)) {
                $payload['api_key'] = $key;
            }

            $res = Http::timeout(25)
                ->retry(2, 500)
                ->asForm()
                ->post($url . '/translate', $payload);

            return trim((string) ($res->json('translatedText') ?? ''));
        } catch (\Throwable $e) {
            return '';
        }
    }
}
