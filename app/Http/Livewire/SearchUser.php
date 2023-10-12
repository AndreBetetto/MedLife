<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\View\Components;

class SearchUser extends Component
{
    public $search = '';
    public $users;
    public $results = [];

  
    public function render()
    {
        $users = User::whereRaw("LOWER(name) LIKE ?", ['%' . strtolower($this->search) . '%'])->get();
        $UserList = User::all();
        return view('livewire.search-user', compact("users", "UserList"));
    }
}