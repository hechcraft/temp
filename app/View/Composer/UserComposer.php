<?php

namespace App\View\Composer;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserComposer
{
    public function compose(View $view): void
    {
        $view->with('user' , Auth::user());
    }
}
