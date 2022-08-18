<?php

namespace App\Http\Controllers;

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
    ) {
    }

    public function index(Request $request): Factory|View|Application
    {
        /** @phpstan-ignore-next-line  */
        $searchQuery = Str::after(url()->full(), '?search=');
        /** @phpstan-ignore-next-line  */
        $search = $this->searchService->gameSearch($request->search);
        $platformsIcon = array();
        foreach ($search as $item) {
            /** @phpstan-ignore-next-line  */
            $platformsIcon[] = $this->platformsHelper->printPlatforms($item->platforms);
        }

        return view(
            'gameSearch.gameSearch',
            ['search' => $search, 'query' => $searchQuery, 'platformsIcon' => $platformsIcon]
        );
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'rawgGameId' => 'required|integer',
        ]);
        /** @phpstan-ignore-next-line  */
        $currentGame = $this->gameHelpers->gameByRawgId($request->rawgGameId);

        if (!$currentGame) {
            /** @phpstan-ignore-next-line  */
            $currentGame = $this->saveGames->storeNewGame($request->rawgGameId);
        }

        $this->gameTracking->addGame((int) Auth::id(), $currentGame->id);
        /** @phpstan-ignore-next-line  */
        return redirect()->route('main')->with('status', 'Game added!');
    }

    public function destroy(Request $request): RedirectResponse
    {
        /** @phpstan-ignore-next-line  */
        $this->gameTracking->deleteGame($request->user()->id, $request->gameId);
        /** @phpstan-ignore-next-line  */
        return redirect()->route('main');
    }
}
