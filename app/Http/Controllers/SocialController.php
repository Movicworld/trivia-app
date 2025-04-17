<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();

            $user = User::firstOrCreate(
                ['email' => $googleUser->getEmail()],
                [
                    'name' => $googleUser->getName(),
                    'password' => bcrypt(Str::random(16)),
                ]
            );

            $user->assignRole('user');

            Wallet::firstOrCreate([
                'user_id' => $user->user_id,
                'balance' => 0,
                'is_active' => true,
                'currency' => 'NGN',
            ]);
            Auth::login($user);

            return redirect()->route('user.dashboard');


        } catch (\Exception $e) {
            return redirect()->route('login')->with('message', 'Google login failed.');
        }
    }
}
