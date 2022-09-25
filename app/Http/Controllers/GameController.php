<?php

namespace App\Http\Controllers;

use App\Helpers\GameTracking;
use App\Models\Game;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    public function show(string $slug, Request $request): Factory|View|Application
    {
        $game = Game::firstWhere('slug', $slug);

        $userTrackedGames = $request->user()->trackedGames;

        $tracking = $userTrackedGames->contains(function ($userTrackedGames) use ($game) {
            if ($userTrackedGames->game_id === $game->id) {
                return true;
            }
        });

        return view('game.show', ['game' => $game, 'tracking' => $tracking]);
    }
}
