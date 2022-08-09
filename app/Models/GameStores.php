<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameStores extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = [];

    public function store(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Store::class, 'id', 'store_id');
    }
}
