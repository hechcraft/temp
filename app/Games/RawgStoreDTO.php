<?php

namespace App\Games;

class RawgStoreDTO
{
    public function __construct(
        public readonly int $id,
        public readonly int $storeId,
        public readonly int $gameId,
        public readonly string $url,
    ) {
    }
    /** @phpstan-ignore-next-line  */
    public static function fromRequest(array $rawgResponse): RawgStoreDTO
    {
        return new self(
            data_get($rawgResponse, 'id'),
            data_get($rawgResponse, 'store_id'),
            data_get($rawgResponse, 'game_id'),
            data_get($rawgResponse, 'url'),
        );
    }
}
