<?php

namespace App\Games;

use Illuminate\Support\Facades\Http;

class RawgResponse
{
    /**
     * @param string $url
     * @param array $query
     * @return array<mixed>
     */
    /** @phpstan-ignore-next-line  */
    public function response(string $url = '', array $query = []): array
    {
        $query['key'] = config('services.rawg.key');
        return Http::get('https://api.rawg.io/api/games' . $url, $query)->json();
    }
}
