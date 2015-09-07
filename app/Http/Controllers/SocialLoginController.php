<?php

namespace Nhlpool\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Nhlpool\User;

class SocialLoginController extends Controller
{
    public function login()
    {
        return view('login/select');
    }

    public function doLogin($type)
    {
        return Socialite::with($type)->redirect();
    }

    public function logged_in($type)
    {
        $userData = Socialite::with($type)->user();

        $user = User::firstOrNew([
            'email'    => $userData->email,
            'name'     => $userData->name
        ]);
        $user->save();

        Auth::login($user, true);

        return redirect('/');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
