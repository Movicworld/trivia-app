<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class LoginForm extends Form
{
    #[Validate('required|string|email')]
    public $email = '';

    #[Validate('required|string')]
    public $password = '';

    public $remember = false;
}
