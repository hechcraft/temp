<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class GameStores extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = [];

    public function store(): HasOne
    {
        return $this->hasOne(Store::class, 'id', 'store_id');
    }
}
