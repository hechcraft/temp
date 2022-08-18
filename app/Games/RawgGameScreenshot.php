<?php

namespace App\Games;

class RawgGameScreenshot
{
    public function __construct(
        public readonly string $screenshot,
    ) {
    }

    /** @phpstan-ignore-next-line  */
    public static function fromRequest(array $rawgResponse): self
    {
        return new self(
            data_get($rawgResponse, 'image')
        );
    }
}
