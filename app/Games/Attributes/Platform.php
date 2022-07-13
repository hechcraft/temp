<?php

namespace App\Games\Attributes;

use App\Models\GamePlatforms;

class Platform
{
    public string $model;
    public string $saveKey;
    public string $getKey;
    public string $globalKey;

    public function __construct()
    {
        $this->globalKey = 'platforms';
        $this->model = GamePlatforms::class;
        $this->saveKey = 'platform_id';
        $this->getKey = 'platform.id';
    }
}
