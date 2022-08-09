<?php

namespace App\Http\Controllers;

use App\Games\RawgAPI;
use App\Games\SaveGames;
use App\Helpers\GameHelpers;
use App\Helpers\GameTracking;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class GameSearchController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $rawg = new RawgAPI();

        $searchQuery = Str::after(url()->full(), '?search=');

        return view('gameSearch.gameSearch',
            ['search' => data_get($rawg->gameSearch($request->search), 'results'),
              'query' => $searchQuery]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'rawgGameId' => 'required|integer',
        ]);

        $rawg = new RawgAPI();
        $saveGames = new SaveGames();

        $currentGame = Game::firstWhere('rawg_id', $request->rawgGameId);

        if (!$currentGame) {
            $saveGames->storeGames($rawg->gameSearchById($request->rawgGameId));

            return redirect()->route('main');
        }


        if (Auth::check()) {
            $gameTracking = new GameTracking(Auth::id(), $currentGame->id);
            $gameTracking->addGame();

            return redirect()->route('main');
        }

        return redirect()->route('error');
    }

    public function destroy(Request $request)
    {
        $gameTracking = new GameTracking($request->userId, $request->gameId);

        $gameTracking->deleteGame();

        return redirect()->route('main');
    }
}
