<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Laravel\Socialite\Facades\Socialite;

class GoogleLogin extends Component
{
    public function redirectToGoogle()
    {
        return redirect()->to(Socialite::driver('google')->redirect()->getTargetUrl());
    }

    public function render()
    {
        return view('livewire.google-login');
    }
}
