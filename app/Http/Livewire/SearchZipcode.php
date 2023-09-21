<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SearchZipcode extends Component
{
    protected array $rules = [
        'cep' => ['required'],
        'cidade' => ['required'],
        'rua' => ['required'],
        'bairro' => ['required'],
        'estado' => ['required'],
    ];

    protected array $messages = [
        'cep.required' => 'O campo CEP é obrigatório.',
        'cidade.required' => 'O campo ENDEREÇO é obrigatório.',
        'rua.required' => 'O campo RUA é obrigatório.',
        'bairro.required' => 'O campo BAIRRO é obrigatório.',
        'estado.required' => 'O campo ESTADO é obrigatório.',
    ];

    public string $cep = '';
    public string $cidade = '';
    public string $rua = '';
    public string $bairro = '';
    public string $estado = '';

    public array $adresses = [];

    public function updatedZipcode(string $value)
    {
        $response = Http::get("https://viacep.com.br/ws/{$value}/json")->json();

        $this->cidade = $response['localidade'];
        $this->rua = $response['logradouro'];
        $this->bairro = $response['bairro'];
        $this->estado = $response['uf'];
    }

    public function save(): void
    {
        $this->validate();
        Endereco::updateOrCreate(
        [
            'cep' => $this->cep,
        ],
        [
            'cidade' => $this->cidade,
            'rua' => $this->rua,
            'bairro' => $this->bairro,
            'estado' => $this->estado,
        ]);
        
        $this->render();

        $this->notification()->sucess('Crição/Alteração', 'Transição realizada com sucesso!');

        $this->resetExcept($adresses);
    }

    public function edit(string $id): void
    {
        $adress = Endereco::find($id);
        $this->cep = $adress->cep;
        $this->cidade = $adress->cidade;
        $this->rua = $adress->rua;
        $this->bairro = $adress->bairro;
        $this->estado = $adress->estado;
    }

    public function remove(string $id): void
    {
        $adress = Endereco::find($id);
        $adress?->delete();

        $this->notification()->sucess('Exclusão de Endereço', 'Exclusão feita com sucesso!');
    }

    public function render()
    {
        // $this->adresses = Adress::all()->toArray();

        return view('livewire.search-zipcode');
    }
}
