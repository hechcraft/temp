<?php

namespace App\Games;

class RawgGame
{
    public function __construct(
        public readonly string $slug,
        public readonly string $name,
        public readonly string $released,
        public readonly int $rawgId,
        public readonly string $backgroundImage,
        public readonly array  $genres,
        public readonly array  $platforms,
        public readonly array  $stores,
    )
    {
    }

    public static function fromResponse($response): RawgGame
    {
        return new self(
            data_get($response, 'slug'),
            data_get($response, 'name'),
            data_get($response, 'released') ?? 'N/A',
            data_get($response, 'id'),
            data_get($response, 'background_image') ?? asset('storage.jpg/defaultImage.jpg'),
            data_get($response, 'genres'),
            data_get($response, 'platforms'),
            data_get($response, 'stores'),
        );
    }
}
