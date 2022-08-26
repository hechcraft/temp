<?php

namespace App\Games;

use Illuminate\Support\Collection;

class RawgGame
{
    /**
     * @param  string  $slug
     * @param  string  $name
     * @param  string  $released
     * @param  int  $rawgId
     * @param  string  $backgroundImage
     * @param  Collection<RawgGenreDTO>  $genres
     * @param  Collection<RawgPlatformDTO>|null  $platforms
     */
    public function __construct(
        public readonly string $slug,
        public readonly string $name,
        public readonly string $released,
        public readonly int $rawgId,
        public readonly string $backgroundImage,
        public readonly Collection $genres,
        public readonly ?Collection $platforms,
    ) {
    }

    /**
     * @param  array  $response
     * @return RawgGame
     */
    /** @phpstan-ignore-next-line  */
    public static function fromResponse(array $response): RawgGame
    {
        return new self(
            data_get($response, 'slug'),
            data_get($response, 'name'),
            data_get($response, 'released') ?? 'N/A',
            data_get($response, 'id'),
            data_get($response, 'background_image') ?? asset('storage.jpg/defaultImage.jpg'),
            self::getGenres(data_get($response, 'genres')),
            self::getPlatforms(data_get($response, 'platforms', collect([]))),
        );
    }

    /**
     * @param  array  $genres
     * @return Collection<RawgGenreDTO>
     */
    /** @phpstan-ignore-next-line  */
    private static function getGenres(array $genres): Collection
    {
        /** @phpstan-ignore-next-line  */
        $genresDTO = collect();
        foreach ($genres as $genre) {
            $genresDTO->push(RawgGenreDTO::fromResponse($genre));
        }

        return $genresDTO;
    }

    /**
     * @param  array  $platforms
     * @return Collection<RawgPlatformDTO>
     */
    /** @phpstan-ignore-next-line  */
    private static function getPlatforms(array $platforms): Collection
    {
        /** @phpstan-ignore-next-line  */
        $platformsDTO = collect();
        foreach ($platforms as $platform) {
            $platformsDTO->push(RawgPlatformDTO::fromResponse($platform));
        }

        return $platformsDTO;
    }
}
