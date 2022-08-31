<?php

namespace App\Http\Controllers;

use App\Games\SaveGames;
use App\Helpers\GameTracking;
use App\Helpers\Services\GameService;
use App\Helpers\Services\SearchService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GameSearchController extends Controller
{
    public function __construct(
        private SaveGames $saveGames,
        private GameService $gameHelpers,
        private GameTracking $gameTracking,
        private SearchService $searchService,
    ) {
    }

    public function index(Request $request): Factory|View|Application|RedirectResponse
    {
        if (is_null($request->get('search'))) {
            return redirect()->route('main');
        }

        /** @phpstan-ignore-next-line  */
        $search = $this->searchService->gameSearch($request->get('search'))->sortByDesc('released');


        dd($search);
        return view(
            'gameSearch.gameSearch',
            ['search' => $search, 'query' => $request->get('search')]
        );
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'rawgGameId' => 'required|integer',
        ]);

        /** @phpstan-ignore-next-line  */
        $currentGame = $this->gameHelpers->gameByRawgId(
            $request->post('rawgGameId')
        );
        if (! $currentGame) {
            /** @phpstan-ignore-next-line  */
            $currentGame = $this->saveGames->storeNewGame(
                $request->post('rawgGameId')
            );
        }

        $this->gameTracking->startTracking((int) Auth::id(), $currentGame->id);
        /** @phpstan-ignore-next-line  */
        return redirect()->route('main')->with('status', 'Game added!');
    }

    public function destroy(Request $request): RedirectResponse
    {
        /** @phpstan-ignore-next-line  */
        $this->gameTracking-> stopTracking($request->user()->id, $request->post('gameId'));
        /** @phpstan-ignore-next-line  */
        return redirect()->route('main');
    }
}
