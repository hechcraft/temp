<?php

namespace App\Http\Controllers;

use App\Models\UserTracking;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrackedGamesController extends Controller
{
    public function index(Request $request): View|Factory|Application
    {
        return view('user.trackedGames', ['games' => $request->user()->trackedGames]);
    }

    public function delete(UserTracking $tracking): RedirectResponse
    {
        $tracking->delete();
        return redirect()->route('tracked.games');
    }
}
