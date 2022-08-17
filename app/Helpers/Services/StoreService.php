<?php

namespace App\Helpers\Services;

use App\Games\RawgStoreDTO;
use Illuminate\Support\Collection;

class StoreService
{
    public function storeMd5(Collection $stores): string
    {
        $md5 = '';
        foreach ($stores as $store) {
            $md5 .= $store->url ?? $store->store_link;
        }

        return md5($md5);
    }
}
