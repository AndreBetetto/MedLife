<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\View\Components;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class SearchUser extends Component
{
    public $search = '';
    public $results = [];
    public $deleteId = '';
    public $searchId = '';
    

    use WithPagination;
  
    public function render()
    {
        //user where user != admin
        $users = User::where(DB::raw('lower(name)'), 'like', '%'.strtolower($this->search).'%')->orderBy('id')->where('role', '!=', 'admin' )->paginate(15);
        $userList = User::whereRaw("LOWER(name) LIKE ?", ['%' . strtolower($this->searchId) . '%'])->get();
        return view('livewire.search-user', compact("users", "userList"));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    
    public function confirmDelete($id)
    {
        $this->deleteId = $id;
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
        session()->flash('message', 'User Deleted Successfully.');
    }
}