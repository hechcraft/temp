<?php

namespace App\Games;

class RawgMetacriticDataDTO
{
    public function __construct(
        public readonly ?string $rating,
        public readonly string $url,
    ) {
    }

    public static function fromResponse(array $response): RawgMetacriticDataDTO
    {
        return new self(
            data_get($response, 'metacritic'),
            data_get($response, 'metacritic_url'),
        );
    }
}
