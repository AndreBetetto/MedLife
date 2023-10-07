<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Paciente;
use App\Models\formDiario;
use Illuminate\Support\Facades\DB;

class MeusPacientes extends Component
{

    public $user = null;
    public $medico = null;
    public $formsDiario = null;
    public $pacMeds = null;
    public $search ='';

    public function render()
    {
        $pacientes = Paciente::where(DB::raw('lower(nome)'), 'like', '%'.strtolower($this->search).'%')->get();
        return view('livewire.meus-pacientes', compact('pacientes'));
    }

}
