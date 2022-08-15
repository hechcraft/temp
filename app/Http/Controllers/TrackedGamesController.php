<?php

namespace App\Http\Controllers;

use App\Models\UserTracking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrackedGamesController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        return view('user.trackedGames', ['games' => Auth::user()->trackedGames]);
    }

    public function delete(UserTracking $tracking)
    {
        $tracking->delete();
        return redirect()->route('tracked.games');
    }
}
