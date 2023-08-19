<?php

namespace App\Http\Livewire\Medico\Registro;

use Livewire\Component;
use App\Models\User;
use App\Models\Medico;
use Carbon\Carbon;

class Show extends Component
{
    //model medico
    public $id_medico;
    public $nome;
    public $cpf;
    public $rg;
    public $data_nasc;
    public $telefone;
    public $crm;
    public $especialidade;
    public $sexo;

    protected $rules = [
        'nome' => 'required',
        'cpf' => 'required',
        'rg' => 'required',
        'data_nasc' => 'required',
        'telefone' => 'required',
        'crm' => 'required',
        'especialidade' => 'required',
        'sexo' => 'required',
    ];
    
    public function submit()
    {
        $data_nasc = Carbon::parse($this->data_nasc)->format('Y-m-d');
        $user = User::where('id', auth()->user()->id)->first();

        $this->validate();
        $medico = medico::create([
            'nome' => $this->nome,
            'cpf' => $this->cpf,
            'rg' => $this->rg,
            'data_nasc' => $data_nasc,
            'telefone' => $this->telefone,
            'crm' => $this->crm,
            'especialidade' => $this->especialidade,
            'sexo' => $this->sexo,
            'id_medico' => $user->id,
        ]);

        $this->reset();
    }
    

    public function render()
    {
        $row = User::where('id', auth()->user()->id)->first();
        return view('livewire.medico.registro.show', compact('row'));
    }
}
