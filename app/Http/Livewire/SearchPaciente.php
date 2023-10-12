<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Paciente;
use App\View\Components;


class SearchPaciente extends Component
{
    public $search = '';
    public $results = [];
    public $pacientes;

  
    public function render()
    {
        $pacientes = Paciente::where(DB::raw('lower(nome)'), 'like', '%'.strtolower($this->search).'%')->get();
        return view('livewire.search-paciente', compact("pacientes"));
    }
}
