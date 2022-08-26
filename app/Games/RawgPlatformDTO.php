<?php

namespace App\Games;

use App\Models\Platform;

class RawgPlatformDTO
{
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly string $slug,
        public readonly string $icon,
    ) {
    }

    /**
     * @param  array  $platform
     * @return RawgPlatformDTO
     */
    /** @phpstan-ignore-next-line  */
    public static function fromResponse($platform): RawgPlatformDTO
    {
        return new self(
            data_get($platform, 'platform.id'),
            data_get($platform, 'platform.name'),
            data_get($platform, 'platform.slug'),
            self::getPlatformIcon(data_get($platform, 'platform.id'))
        );
    }

    private static function getPlatformIcon(int $platformId): string
    {
        return Platform::find($platformId)->icon;
    }
}
