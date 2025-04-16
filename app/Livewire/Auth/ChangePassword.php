<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ChangePassword extends Component
{
    public $email;
    public $token;
    public $password;
    public $password_confirmation;

    public function mount($token)
    {
        $this->token = $token;
        $this->email = request()->query('email');
    }


    public function resetPassword()
    {
        $this->validate([
            'password' => 'required|string|min:6|confirmed',
        ]);

        $status = Password::reset(
            [
                'email' => $this->email,
                'password' => $this->password,
                'password_confirmation' => $this->password_confirmation,
                'token' => $this->token,
            ],
            function ($user) {
                $user->forceFill([
                    'password' => Hash::make($this->password),
                    'remember_token' => Str::random(60),
                ])->save();
            }
        );

        if ($status == Password::PASSWORD_RESET) {
            session()->flash('message', 'Password reset successful! Please log in.');
            return redirect()->route('login');
        } else {
            $this->addError('password', __($status));
        }
    }

    public function render()
    {
        return view('livewire.auth.change-password')
            ->layout('layouts.guest');
    }
}
