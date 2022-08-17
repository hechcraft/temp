<?php

namespace App\Http\Controllers;

use App\Helpers\Services\GameService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SearchController extends Controller
{
    public function __construct(private GameService $gameHelpers)
    {
    }

    public function index(): View
    {
        return view('welcome', ['games' => $this->gameHelpers->gameSortByRelease()]);
    }

    public function search(Request $request)
    {
        $google = 'https://www.google.com/search?q=%s';
        $yandex = 'https://yandex.ru/search/?text=%s';


        return redirect(sprintf($request->toggleValue === '0' ? $google : $yandex, urlencode($request->search)));
    }
}
