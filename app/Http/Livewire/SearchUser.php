<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class SearchUser extends Component
{
    public $search = '';
    public $results = [];

  
    public function render()
    {
        $users = User::whereRaw("LOWER(name) LIKE ?", ['%' . strtolower($this->search) . '%'])->get();
        return view('livewire.search-user', compact("users"));
    }
}