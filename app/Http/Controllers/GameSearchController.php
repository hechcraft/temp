<?php

namespace App\Http\Controllers;

use App\Games\GameAttributes;
use App\Games\RawgAPI;
use App\Games\SaveGames;
use App\Helpers\GameTracking;
use App\Helpers\PlatformsHelper;
use App\Helpers\Services\GameService;
use App\Helpers\Services\SearchService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class GameSearchController extends Controller
{
    public function __construct(
        private SaveGames       $saveGames,
        private GameService     $gameHelpers,
        private GameTracking    $gameTracking,
        private PlatformsHelper $platformsHelper,
        private SearchService   $searchService,
    )
    {
    }

    public function index(Request $request): Factory|View|Application
    {
        $searchQuery = Str::after(url()->full(), '?search=');

        $search = $this->searchService->gameSearch($request->search);
        foreach ($search as $item) {
            $platformsIcon = $this->platformsHelper->printPlatforms($item->platforms);
        }

        return view('gameSearch.gameSearch',
            ['search' => $search, 'query' => $searchQuery, 'platformsIcon' => $platformsIcon]);
    }

    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'rawgGameId' => 'required|integer',
        ]);

        $currentGame = $this->gameHelpers->gameByRawgId($request->rawgGameId);

        if (!$currentGame) {
            $currentGame = $this->saveGames->storeNewGame($request->rawgGameId);
        }

        $this->gameTracking->addGame(Auth::id(), $currentGame->id);

        return redirect()->route('main')->with('status', 'Game added!');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $this->gameTracking->deleteGame($request->user()->id, $request->gameId);

        return redirect()->route('main');
    }
}
