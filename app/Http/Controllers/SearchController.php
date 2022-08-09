<?php

namespace App\Http\Controllers;

use App\Helpers\GameHelpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class SearchController extends Controller
{
    public function index(): View
    {
        $helper = new GameHelpers();

        return view('welcome', ['games' => $helper->gameSortByRelease(), 'user' => Auth::user()]);
    }

    public function search(Request $request)
    {
        dd($request->all());
        $google = 'https://www.google.com/search?q=%s';
        $yandex = 'https://yandex.ru/search/?text=%s';

        return redirect(sprintf($request->toggleValue === '0' ? $google : $yandex, urlencode($request->search)));
    }
}
