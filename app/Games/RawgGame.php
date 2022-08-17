<?php

namespace App\Games;

use Illuminate\Support\Collection;

class RawgGame
{
    /**
     * @param string $slug
     * @param string $name
     * @param string $released
     * @param int $rawgId
     * @param string $backgroundImage
     * @param Collection<RawgGenreDTO> $genres
     * @param Collection<RawgPlatformDTO>|null $platforms
     */
    public function __construct(
        public readonly string      $slug,
        public readonly string      $name,
        public readonly string      $released,
        public readonly int         $rawgId,
        public readonly string      $backgroundImage,
        public readonly Collection  $genres,
        public readonly ?Collection $platforms,
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
            RawgGenreDTO::fromResponse($response),
            RawgPlatformDTO::fromResponse($response),
        );
    }
}
