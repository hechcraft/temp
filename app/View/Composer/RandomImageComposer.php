<?php

namespace App\View\Composer;

use App\Models\Images;
use Illuminate\View\View;

class RandomImageComposer
{
    public function compose(View $view): void
    {
        $view->with('image', Images::inRandomOrder()->where('type', '=', 'cover')->first()->url ?? null);
    }
}
