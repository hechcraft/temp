<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Store
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $domain
 * @property string|null $icon
 */

class Store extends Model
{
    use HasFactory;

    public $timestamps = false;
}
