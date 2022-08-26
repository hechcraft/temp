<?php

namespace App\Helpers\Services;

use App\Games\RawgStoreDTO;
use App\Models\GameStores;
use Illuminate\Support\Collection;

class StoreService
{
    /**
     * @param Collection<RawgStoreDTO> $stores
     * @return string
     */
    public function generateMd5ForRawgStores(Collection $stores): string
    {
        $md5 = '';
        foreach ($stores as $store) {
            $md5 .= $store->url;
        }

        return md5($md5);
    }

    /**
     * @param Collection<GameStores> $stores
     * @return string
     */
    public function generateMd5ForDbStores(Collection $stores): string
    {
        $md5 = '';
        foreach ($stores as $store) {
            $md5 .= $store->store_link;
        }

        return md5($md5);
    }
}
