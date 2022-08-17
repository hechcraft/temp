<?php

namespace App\Games;

use Illuminate\Support\Collection;

class RawgPlatformDTO
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
     * @return Collection<RawgPlatformDTO>
     */
    public static function fromResponse($platform): RawgPlatformDTO
    {
        return new self(
            data_get($platform, 'platform.id'),
            data_get($platform, 'platform.name'),
            data_get($platform, 'platform.slug'),
        );
    }

}
