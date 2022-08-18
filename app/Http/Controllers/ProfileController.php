<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index(User $user): RedirectResponse|Factory|View
    {
        if ($user->id === Auth::id()) {
            return view('user.profile');
        }
        /** @phpstan-ignore-next-line  */
        return redirect()->route('main');
    }

    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['string', 'max:255'],
            'email' => ['string', 'email', 'max:255'],
            'password' => ['string', 'min:8', 'confirmed'],
        ]);

        $request->user()->update($request->all());

        /** @phpstan-ignore-next-line  */
        $request->user()->password = Hash::make($request->password);

        if (!is_null($request->file('avatart'))) {
            /** @phpstan-ignore-next-line  */
            $request->user()->avatar = $request->file('avatar')->store('avatar');
        }

        $request->user()->save();
        /** @phpstan-ignore-next-line  */
        return redirect()->route('main');
    }
}
