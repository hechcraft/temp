<?php

namespace App\Games;

class RawgGameScreenshot
{
    public function __construct(
        public readonly string $screenshot,
        public readonly string $type,
    ) {
    }

    /** @phpstan-ignore-next-line  */
    public static function fromRequest(string $image, string $type): self
    {
        return new self(
            $image,
            $type
        );
    }
}
