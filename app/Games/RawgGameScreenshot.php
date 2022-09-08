<?php

namespace App\Games;

class RawgGameScreenshot
{
    public function __construct(
        public readonly string $screenshot,
        public readonly string $type,
    ) {
    }

    public static function fromRequest(string $image, string $type): RawgGameScreenshot
    {
        return new self(
            $image,
            $type
        );
    }
}
