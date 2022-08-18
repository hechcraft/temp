<?php

namespace App\View\Presenter;

use Laracasts\Presenter\Presenter;

class GamePresenter extends Presenter
{
    public function gameRelease(): string
    {
        return $this->released ?? 'N/A';
    }
}
