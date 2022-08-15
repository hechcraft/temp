<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTraking extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = [];

    public function game()
    {
        return $this->hasOne(Game::class, 'id', 'game_id');
    }
}
