<?php

namespace App\Http\Controllers;

use App\Helpers\GameTracking;
use App\Models\Game;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    public function __construct(private GameTracking $gameTracking)
    {
    }

    public function show($slug)
    {
        $game = Game::firstWhere('slug', $slug);

        $screenshots = explode(',', $game->images->screenshots);
        array_pop($screenshots);

        return view('game.show', ['screenshots' => $screenshots, 'game' => $game,
            'tracking' => $this->gameTracking->issetGameTracking(Auth::id(), $game->id)]);
     }
}
