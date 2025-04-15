<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{

public function redirectToGoogle() {
    return Socialite::driver('google')->redirect();
}

public function handleGoogleCallback() {
    $googleUser = Socialite::driver('google')->stateless()->user();

    $user = User::firstOrCreate(
        ['email' => $googleUser->email],
        ['name' => $googleUser->name, 'google_id' => $googleUser->id]
    );

    Auth::login($user);
    return redirect()->route('dashboard');
}

}
