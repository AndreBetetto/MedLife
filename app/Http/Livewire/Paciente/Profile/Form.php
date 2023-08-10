<?php

namespace App\Http\Livewire\Paciente\Profile;

use Livewire\Component;
use App\Models\Paciente;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Endereco;

class Form extends Component
{

    public $nome;
    public $sobrenome;
    public $dataNasc;
    public $cpf;
    public $rg;
    public $sexo;
    public $fone;
    public $estadoCivil;
    public $profissao;

    protected function rules ()
    {
        return [
            'nome' => 'nullable',
            'sobrenome' => 'nullable',
            'dataNasc' => 'nullable',
            'sexo' => 'nullable',
            'cpf' => 'nullable',
            'rg' => 'nullable',
            'fone' => 'nullable',
            'estadoCivil' => 'nullable',
            'profissao' => 'nullable',
        ];
    }

    public function render()
    {
        $user = User::find(Auth::user()->id);
        $endereco = Endereco::where('user_id', Auth::user()->id)->first();
        $paciente = Paciente::where('user_id', Auth::user()->id)->first();
        return view('livewire.paciente.profile.form', compact('user', 'endereco', 'paciente'));
    }

    public function salvarUser()
    {
        Paciente::create(
            [
                'nome' => $this->nome,
                'sobrenome' => $this->sobrenome,
                'dataNasc' => $this->dataNasc,
                'cpf' => $this->cpf,
                'rg' => $this->rg,
                'sexo' => $this->sexo,
                'fone' => $this->fone,
                'estadoCivil' => $this->estadoCivil,
                'profissao' => $this->profissao,
                'user_id' => Auth::user()->id,
            ]
        );
            
    }   

}
