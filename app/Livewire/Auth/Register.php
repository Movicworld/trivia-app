<?php

namespace App\Livewire\Auth;

use App\Models\User;
use App\Models\Wallet;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Throwable;

class Register extends Component
{
    public $name, $email, $password, $password_confirmation;

    public function register()
    {
        $this->validate([
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        DB::beginTransaction();
        try {
            $user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
            ]);

            // Assign default role
            $user->assignRole('user');

            // Create wallet for the user
            Wallet::create([
                'user_id' => $user->user_id,
                'balance' => 0,
                'is_active' => true,
                'currency' => 'NGN',
            ]);
            DB::commit();

            Auth::login($user);

            return redirect()->route('user.dashboard');
        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function render()
    {
        return view('livewire.auth.register')->layout('layouts.guest');
    }
}
