<?php

namespace App\Livewire\Auth;

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Livewire\Attributes\Validate;

class Login extends Component
{

    public LoginForm $form;
    public function save()
    {
        try {
            $this->validate();
            // $this->validate([
            //     'email' => 'required|string|email',
            //     'password' => 'required|string',
            // ]);

            // // Log login data for debugging
            // logger('Login data:', [
            //     'email' => $this->email,
            //     'password' => $this->password,
            //     'remember' => $this->remember,
            // ]);

            // Attempt login
            if (Auth::attempt([
                'email' => $this->only('email'),
                'password' => $this->only('password'),
            ], $this->only('remember'))) {
                session()->flash('message', 'Login successful for email: ' . $this->email);
                session()->regenerate();

                $user = Auth::user();

                // Redirect based on role
                if ($user->hasRole('admin')) {
                    return redirect()->route('admin.dashboard');
                } elseif ($user->hasRole('user')) {
                    return redirect()->route('user.dashboard');
                }

                return redirect()->intended(route('login'));
            }

            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        } catch (\Exception $e) {
            // Handle the exception and redirect with an error message
            return redirect()->route('login')->with('message', 'The provided credentials are incorrect.');
        }
    }



    public function render()
    {
        return view('livewire.auth.login')
            ->layout('layouts.guest');
    }
}
