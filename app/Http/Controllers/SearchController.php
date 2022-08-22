<?php

namespace App\Http\Controllers;

use App\Helpers\Services\GameService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class SearchController extends Controller
{
    public function __construct(private GameService $gameHelpers)
    {
    }

    public function index(): Factory|View
    {
        return view('welcome', ['games' => $this->gameHelpers->gameSortByRelease()]);
    }

    public function search(Request $request): Redirector|RedirectResponse
    {
        $google = 'https://www.google.com/search?q=%s';
        $yandex = 'https://yandex.ru/search/?text=%s';
        /** @phpstan-ignore-next-line  */
        return redirect(sprintf($request->toggleValue === '0' ? $google : $yandex, urlencode($request->search)));
    }
}
