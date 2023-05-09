<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;



class GoogleProviderController extends Controller
{
    public function redirect(){
        return Socialite::driver('google')->redirect();
    }

    public function callback(){
        {
            $user = Socialite::driver('google')->user();            
            $existingUser = User::where('email', $user->getEmail())->first();

            if ($existingUser) {
                Auth::login($existingUser);
                return redirect(RouteServiceProvider::HOME);
            } else {
                return view('app.auth.finish_registration', compact('user'));
            }
        }
    }
}
