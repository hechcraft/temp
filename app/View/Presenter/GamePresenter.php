<?php

namespace App\View\Presenter;

use Laracasts\Presenter\Presenter;

class GamePresenter extends Presenter
{
    public function gameRelease()
    {
        return $this->released ?? 'N/A';
    }
}
