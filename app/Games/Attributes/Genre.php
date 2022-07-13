<?php

namespace App\Games\Attributes;

use App\Models\GameGenres;

class Genre
{
    public string $model;
    public string $saveKey;
    public string $getKey;
    public string $globalKey;

    public function __construct()
    {
        $this->globalKey = 'genres';
        $this->model = GameGenres::class;
        $this->saveKey = 'genre_id';
        $this->getKey = 'id';
    }
}
