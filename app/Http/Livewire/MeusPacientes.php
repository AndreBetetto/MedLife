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
    public $arrayVerifica = [];
    public $showOnlyNewUsers = false;

    public function render()
    {
        $medico_id = $this->medico->id;
        $arrayPacientes = [];
        $arrayVerifica = [];
        $arrayInfo = [];
        $pacientes = Paciente::where(DB::raw('lower(nome)'), 'like', '%'.strtolower($this->search).'%')->get();
        foreach($pacientes as $paciente){
            $pacientes = PacienteMedico::where('paciente_id', $paciente->id)->where('medico_id', $medico_id)->first();
            //dd($pacientes);
            if($pacientes != null)
            {
                if(!$this->showOnlyNewUsers){
                    array_push($arrayPacientes, $pacientes);
                    array_push($arrayInfo, $paciente);
                    $formsDiario = formDiario::where('paciente_id', $paciente->id)->get();
                    if($formsDiario != null)
                    {
                        foreach($formsDiario as $index=>$formDiario){
                            if($formDiario->new == true && $formDiario != null){
                                array_push($this->arrayVerifica, $formDiario->paciente_id);
                                //dd($formDiario);
                            }
                        }
                    }
                } else {
                    $formsDiario = formDiario::where('paciente_id', $paciente->id)->get();
                    if($formsDiario != null)
                    {
                        $count = 0;
                        foreach($formsDiario as $index=>$formDiario){
                            $count++;
                            if($formDiario->new == true && $formDiario != null){
                                array_push($this->arrayVerifica, $formDiario->paciente_id);
                                array_push($arrayPacientes, $pacientes);
                                array_push($arrayInfo, $paciente);
                            }
                        }
                        //dd($count);
                    }
                    //dd($this->arrayVerifica, $arrayPacientes, $arrayInfo);
                }
                
                
            }
        }

        
        
        //dd($this->arrayVerifica);
        //dd($arrayInfo);
        $pacientes = $arrayPacientes;
        
        $pacientes = array_unique($pacientes);
        
        return view('livewire.meus-pacientes', compact('pacientes', 'arrayInfo'));
        //dd($this->medico);
    }

    public function toggleShowOnlyNewUsers()
    {
        $this->showOnlyNewUsers = !$this->showOnlyNewUsers;
    }
}
