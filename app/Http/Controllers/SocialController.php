<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function redirectProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
    public function callback($provider)
    {
        $user = Socialite::driver($provider)->user();
       /*
        *  $user->getId();
        $user->getNickname();
        $user->getName();
        $user->getEmail();
        $user->getAvatar();
        * */
        // Check if user logined
        $selectProvider= Provider::where('provider_id', $user->getId())->first();
        if(!$selectProvider) {
            // New User
            //check if email duplicated
            $userGetReal = User::where('email', $user->getEmail())->first();
            if(!$userGetReal) {
                // Set New User
                $userGetReal = new User();
                $userGetReal->name  =  $user->getName();
                $userGetReal->email = $user->getEmail();
                $userGetReal->save();
                // Set New Provider
                $newProvider = new Provider();
                $newProvider->provider_id = $user->getId();
                $newProvider->provider = $provider;
                $newProvider->user_id = $userGetReal->id;
                $newProvider->save();
            }
        }else {
            // User Login
            $userGetReal = User::find($selectProvider->user_id);
        }
        auth()->login($userGetReal);
        return redirect('/');
    }
}
