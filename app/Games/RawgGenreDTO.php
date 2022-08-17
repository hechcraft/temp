<?php

namespace App\Games;


use Illuminate\Support\Collection;

class RawgGenreDTO
{
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly string $slug,
    )
    {
    }

    /**
     * @param $response
     * @return Collection<RawgGenreDTO>
     */
    public static function fromResponse($response): Collection
    {
        $genres = collect();
        foreach (data_get($response, 'genres') as $genre){
            $genres->push(
                new self(
                    data_get($genre, 'id'),
                    data_get($genre, 'name'),
                    data_get($genre, 'slug'),
                )
            );
        }

        return $genres;
    }
}
