<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Livewire\Redirector;

class Login extends Component
{

    public $email, $password, $remember = false;
    public function login()
    {
        // Log the received data
        Log::info('Login attempt', ['email' => $this->email]);

        $this->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Log login data for debugging
        logger('Login data:', [
            'email' => $this->email,
            'password' => $this->password,
            'remember' => $this->remember,
        ]);

        // Attempt login
        if (Auth::attempt([
            'email' => $this->email,
            'password' => $this->password
        ], $this->remember)) {
            session()->flash('message', 'Login function triggered with email: ' . $this->email);
            session()->regenerate();

            $user = Auth::user();

            // Redirect based on role
            if ($user->hasRole('admin')) {
                return redirect()->intended(route('admin.dashboard'));
            } elseif ($user->hasRole('user')) {
                return redirect()->intended(route('user.dashboard'));
            }

            return redirect()->intended(route('dashboard'));
        }

        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }


    public function render()
    {
        return view('livewire.auth.login')
            ->layout('layouts.guest');
    }
}
