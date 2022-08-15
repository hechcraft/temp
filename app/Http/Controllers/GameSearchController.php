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
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class GameSearchController extends Controller
{
    public function __construct(
        private RawgAPI     $rawgAPI,
        private SaveGames   $saveGames,
        private GameHelpers $gameHelpers,
        private GameTracking $gameTracking,
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

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {

        $request->validate([
            'rawgGameId' => 'required|integer',
        ]);

        $currentGame = $this->gameHelpers->gameByRawgId($request->rawgGameId);

        if (!$currentGame) {
            $currentGame = $this->saveGames->storeGames(
                $this->rawgAPI->gameSearchById($request->rawgGameId),
                $this->rawgAPI->getGameAtrributes($request->rawgGameId, GameAttributes::Screenshots),
                $this->rawgAPI->getGameAtrributes($request->rawgGameId, GameAttributes::Stores)
            );
        }

        $this->gameTracking->addGame(Auth::id(), $currentGame->id);

        return redirect()->route('main')->with('status', 'Game added!');
    }

    public function destroy(Request $request)
    {
        $this->gameTracking->deleteGame($request->userId, $request->gameId);

        return redirect()->route('main');
    }
}
