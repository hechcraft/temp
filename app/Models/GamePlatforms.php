<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GamePlatforms extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = [];

    public function platform(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Platform::class, 'id', 'platform_id');
    }
}
