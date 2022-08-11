<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index(User $user): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('auth', ['user' => $user]);
    }

    public function update(User $user, Request $request)
    {

        $request->validate([
            'name' => ['string', 'max:255'],
            'email' => ['string', 'email', 'max:255'],
            'password' => ['string', 'min:8', 'confirmed'],
        ]);

        $user->update($request->all());

        $user->password = Hash::make($request->password);

        if ($request->hasFile('avatar')){
            $request->validate([
                'avatar' => 'mimes:jpeg,bmp,png',
            ]);

            $request->avatar->store('product', 'public');

            $user->avatar = $request->avatar->hashName();
        }

        $user->save();

        dd($user);
        return redirect()->route('main');
    }
}
