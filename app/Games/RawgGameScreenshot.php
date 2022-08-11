<?php

namespace App\Games;

class RawgGameScreenshot
{
    public function __construct(
        public readonly string $screenshot,
    )
    {
    }

    public static function fromRequest(array $rawgResponse): self
    {
        return new self(
            data_get($rawgResponse, 'image')
        );
    }


}
