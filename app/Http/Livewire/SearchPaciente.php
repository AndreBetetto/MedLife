<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Paciente;
use App\View\Components;
use Livewire\WithPagination;
use App\Models\User;



class SearchPaciente extends Component
{
    public $search = '';
    public $results = [];
    public $idUserSearch = '';
    public $searchId = '';

    use WithPagination;
  
    public function render()
    {
        $pacientes = Paciente::where(DB::raw('lower(nome)'), 'like', '%'.strtolower($this->search).'%')->paginate(10);
        $userList = User::whereRaw("LOWER(name) LIKE ?", ['%' . strtolower($this->searchId) . '%'])->get();
        return view('livewire.search-paciente', compact("pacientes", "userList"));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
        session()->flash('message', 'User Deleted Successfully.');
    }
}
