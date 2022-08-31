<?php

namespace App\Http\Controllers;

use App\Helpers\GameTracking;
use App\Helpers\Services\GameService;
use Barryvdh\Reflection\DocBlock\Type\Collection;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class SearchController extends Controller
{
    public function __construct(
        private GameService  $gameHelpers,
        private GameTracking $gameTracking,
    ) {
    }

    public function index(): Factory|View
    {
        $trackedGames = collect();

        if (\Auth::check()) {
            $trackedGames = $this->gameTracking->getTrackedUserGamesSortByReleased(\Auth::id());
        }

        return view('welcome', ['games' => $this->gameHelpers->gameSortByRelease(), 'trackedGames' => $trackedGames]);
    }

    public function search(Request $request): Redirector|RedirectResponse
    {
        $google = 'https://www.google.com/search?q=%s';
        $yandex = 'https://yandex.ru/search/?text=%s';
        /** @phpstan-ignore-next-line */
        return redirect(sprintf($request->toggleValue === '0' ? $google : $yandex, urlencode($request->search)));
    }
}
