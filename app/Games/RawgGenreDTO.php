<?php

namespace App\Games;


use Illuminate\Support\Collection;

class RawgGenreDTO
{
    public function __construct(
        public readonly int    $id,
        public readonly string $name,
        public readonly string $slug,
    )
    {
    }

    /**
     * @param $response
     * @return Collection<RawgGenreDTO>
     */
    public static function fromResponse($genre): RawgGenreDTO
    {
        return new self(
            data_get($genre, 'id'),
            data_get($genre, 'name'),
            data_get($genre, 'slug'),
        );

    }
}
