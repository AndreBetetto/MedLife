<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Paciente;
use App\Models\formDiario;
use App\Models\Medico;
use App\Models\PacienteMedico;
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
        $medico_id = $this->medico->id;
        //search patient
        //dd($medico_id);
        $arrayPacientes = [];
        $pacientes = Paciente::where(DB::raw('lower(nome)'), 'like', '%'.strtolower($this->search).'%')->get();
        foreach($pacientes as $paciente){
            $pacientes = PacienteMedico::where('paciente_id', $paciente->id)->where('medico_id', $medico_id)->first();
            //dd($pacientes);
            if($pacientes != null)
                array_push($arrayPacientes, $pacientes);
        }
        $pacientes = $arrayPacientes;
        dd($pacientes);


        return view('livewire.meus-pacientes', compact('pacientes'));
        //dd($this->medico);
    }

    public function verifyNew($patientId)
    {
        $id = $patientId;

    }
}
