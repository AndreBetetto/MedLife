<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Medico;

class SearchMedico extends Component
{
    public $search = '';
    public $results = [];

  
    public function render()
    {
        $medicos = Medico::whereRaw("LOWER(nome) LIKE ?", ['%' . strtolower($this->search) . '%'])->get();
        return view('livewire.search-medico', compact("medicos"));
    }
}
