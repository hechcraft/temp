<?php

namespace App\Http\Controllers;

use App\Games\GameAttributes;
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
    public function __construct(
        private RawgAPI   $rawgAPI,
        private SaveGames $saveGames,
        private GameHelpers $gameHelpers,
    )
    {
    }

    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $searchQuery = Str::after(url()->full(), '?search=');

        return view('gameSearch.gameSearch',
            ['search' => $this->rawgAPI->gameSearch($request->search), 'query' => $searchQuery]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'rawgGameId' => 'required|integer',
        ]);

        $currentGame = $this->gameHelpers->gameByRawgId($request->rawgGameId);

        if (!$currentGame) {
            $this->saveGames->storeGames(
                $this->rawgAPI->gameSearchById($request->rawgGameId),
                $this->rawgAPI->getGameAtrributes($request->rawgGameId, GameAttributes::Screenshots),
                $this->rawgAPI->getGameAtrributes($request->rawgGameId, GameAttributes::Stores)
            );

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
