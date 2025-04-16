<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Password;

class ForgetPassword extends Component
{

    public $email;

    public function sendResetLink()
    {
        $this->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $status = Password::sendResetLink(['email' => $this->email]);

        if ($status === Password::RESET_LINK_SENT) {
            session()->flash('message', 'Password reset link sent!');
        } else {
            session()->flash('error', 'Failed to send reset link.');
        }
    }
    public function render()
    {
        return view('livewire.auth.forget-password')
            ->layout('layouts.guest');
    }
}
