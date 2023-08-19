<?php

namespace App\Http\Livewire\Paciente\Registro;

use Livewire\Component;
use App\Models\User;
use App\Models\patient;
use App\Models\UserEndereco;
use Carbon\Carbon;

class Show extends Component
{
    public $patient_id;
    public $nome;
    public $cpf;
    public $rg;
    public $data_nasc;
    public $endereco;
    public $telefone;
    public $plano_saude;
    public $sexo;
    public $email;

    //user_endereco
    public $cep;
    public $logradouro;
    public $numero;
    public $complemento;
    public $bairro;
    public $cidade;
    public $estado;
    public $user_id;



    public function render()
    {
        $row = User::where('id', auth()->user()->id)->first();
        return view('livewire.paciente.registro.index', compact('row'));
    }

    protected $rules = [
        //'patient_id' => 'required',
        'nome' => 'required',
        'cpf' => 'required',
        'rg' => 'required',
        'data_nasc' => 'required',
        'endereco' => 'required',
        'telefone' => 'required',
        'plano_saude' => 'required',
        'sexo' => 'required',
        //'email' => 'required',

        //Inicio endereco
        'cep' => 'required',
        'logradouro' => 'required',
        'numero' => 'required',
        'complemento' => 'required',
        'bairro' => 'required',
        'cidade' => 'required',
        'estado' => 'required',
        //Fim endereco
    ];

    public function submit()
    {
        $data_nasc = Carbon::parse($this->data_nasc)->format('Y-m-d');
        $user = User::where('id', auth()->user()->id)->first();
        $this->validate();
        $patient = patient::create([
            'patient_id' => $user->id,
            'nome' => $this->nome,
            'cpf' => $this->cpf,
            'rg' => $this->rg,
            'data_nasc' => $data_nasc,
            'endereco' => $this->endereco,
            'telefone' => $this->telefone,
            'plano_saude' => $this->plano_saude,
            'sexo' => $this->sexo,
            'email' => $user->email,
        ]);

        $endereco = UserEndereco::create([
            'cep' => $this->cep,
            'logradouro' => $this->logradouro,
            'numero' => $this->numero,
            'complemento' => $this->complemento,
            'bairro' => $this->bairro,
            'cidade' => $this->cidade,
            'estado' => $this->estado,
            'user_id' => $user->id,
        ]);
        $this->reset();
    }
}

