<?php

namespace App\Http\Livewire\Admin\User;

use Livewire\Component;
use App\Models\User;

class Show extends Component
{
    public function render()
    {
        $users = User::all();
        return view('livewire.admin.user.show', compact('users'));
    }
}
