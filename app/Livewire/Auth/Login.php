<?php

namespace App\Livewire\Auth;

use Livewire\Component;

class Login extends Component
{

    public $username, $password, $remember = false;

    public function login()
    {
        $this->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Handle login logic here
    }


    public function render()
    {
        return view('livewire.auth.login')
            ->layout('layouts.guest');
    }
}
