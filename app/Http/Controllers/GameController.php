<?php

namespace App\Http\Controllers;

use App\Helpers\GameTracking;
use App\Models\Game;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    public function __construct(private GameTracking $gameTracking)
    {
    }

    public function show($slug): Factory|View|Application
    {
        $game = Game::firstWhere('slug', $slug);

        return view('game.show', ['game' => $game,
            'tracking' => $this->gameTracking->tracksGame(Auth::id(), $game->id)]);
     }
}
