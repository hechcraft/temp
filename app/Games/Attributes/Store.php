<?php

namespace App\Games\Attributes;

use App\Models\GameStores;

class Store
{
    public string $model;
    public string $saveKey;
    public string $globalKey;
    public string $getKey;

    public function __construct()
    {
        $this->globalKey = 'stores';
        $this->model = GameStores::class;
        $this->saveKey = 'store_id';
        $this->getKey = 'store.id';
    }
}
