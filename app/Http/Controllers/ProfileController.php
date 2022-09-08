<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(): RedirectResponse|Factory|View
    {
        return view('user.profile');
    }

    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['string', 'max:255'],
            'email' => ['string', 'email', 'max:255'],
            'password' => ['string', 'min:8', 'confirmed'],
        ]);

        $request->user()->update($request->all());

        /** @phpstan-ignore-next-line */
        $request->user()->password = Hash::make($request->password);

        if (!is_null($request->file('avatar'))) {
            /** @phpstan-ignore-next-line */
            $request->user()->avatar = $request->file('avatar')->store('avatar');
        }

        if ($request['status_search_engine'])
        {
            $request->user()->search_engine_enable = true;
        } else {
            $request->user()->search_engine_enable = false;
        }

        $request->user()->save();
        /** @phpstan-ignore-next-line */
        return redirect()->route('main');
    }
}
