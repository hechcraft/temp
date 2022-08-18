<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *  App\Model\Images
 *
 * @property int $id
 * @property int|null $game_id
 * @property string $url
 * @property string $type
 *
 * @method static Images inRandomOrder()
 * @method static Images where($column, $operator, $value)
 * @method static Images first()
 * @method static Images create($data)
 */


class Images extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = [];
}
