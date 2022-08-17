<?php

namespace App\Games;

use Illuminate\Support\Facades\Http;

class RawgResponse
{
    public function response(string $url = '', array $query = [])
    {
        $query['key'] = config('services.rawg.key');
        return Http::get('https://api.rawg.io/api/games' . $url, $query)->json();
    }
}
