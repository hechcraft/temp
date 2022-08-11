<?php

namespace App\Http\Controllers;

use App\Helpers\GameHelpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class SearchController extends Controller
{
    public function __construct(private GameHelpers $gameHelpers)
    {
        $this->gameHelpers = $gameHelpers;
    }

    public function index(): View
    {
        return view('welcome', ['games' => $this->gameHelpers->gameSortByRelease(), 'user' => Auth::user()]);
    }

    public function search(Request $request)
    {
        $google = 'https://www.google.com/search?q=%s';
        $yandex = 'https://yandex.ru/search/?text=%s';


        return redirect(sprintf($request->toggleValue === '0' ? $google : $yandex, urlencode($request->search)));
    }
}
