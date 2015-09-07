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

        $email = $userData->email;
        if (empty($email)) { //Fallback on nickname for twitter
            $email = $userData->nickname;
        }

        //TODO: Save email/nickname in login column
        //TODO: Add displayname and ask for it after login
        //TODO: Ask for email after login
        $user = User::firstOrNew([
            'email'    => $email,
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
