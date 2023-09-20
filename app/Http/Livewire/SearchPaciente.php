<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Paciente;

class SearchPaciente extends Component
{
    public $search = '';
    public $results = [];

  
    public function render()
    {
        $pacientes = Paciente::whereRaw("LOWER(nome) LIKE ?", ['%' . strtolower($this->search) . '%'])->get();
        return view('livewire.search-paciente', compact("pacientes"));
    }
}
