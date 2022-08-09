<?php

namespace App\Http\Controllers;

use App\Helpers\GameTracking;
use App\Models\Game;
use App\Models\Store;
use App\Models\UserTraking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    public function show($slug)
    {
        $game = Game::firstWhere('slug', $slug);

        $gameId = $game->id;
        $userId = Auth::user()->id ?? null;

        $tracking = '';

        if (isset($userId)) {
            $tracking = new GameTracking($userId, $gameId);
            $tracking = $tracking->issetGameTracking();
        }

        $screenshots = explode(',', $game->images->screenshots);
        array_pop($screenshots);

        return view('game.show', ['screenshots' => $screenshots, 'game' => $game,
            'tracking' => $tracking]);
     }
}
