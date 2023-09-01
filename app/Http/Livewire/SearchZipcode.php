<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SearchZipcode extends Component
{
    protected array $rules = [
        'zipcode' => ['required'],
        'city' => ['required'],
        'street' => ['required'],
        'neighborhood' => ['required'],
        'state' => ['required'],
    ];

    protected array $messages = [
        'zipcode.required' => 'O campo CEP é obrigatório.',
        'city.required' => 'O campo ENDEREÇO é obrigatório.',
        'street.required' => 'O campo RUA é obrigatório.',
        'neighborhood.required' => 'O campo BAIRRO é obrigatório.',
        'state.required' => 'O campo ESTADO é obrigatório.',
    ];

    public string $zipcode = '';
    public string $city = '';
    public string $street = '';
    public string $neighborhood = '';
    public string $state = '';

    public array $adresses = [];

    public function updatedZipcode(string $value)
    {
        $response = Http::get("https://viacep.com.br/ws/{$value}/json")->json();

        $this->city = $response['localidade'];
        $this->street = $response['logradouro'];
        $this->neighborhood = $response['bairro'];
        $this->state = $response['uf'];
    }

    public function save(): void
    {
        $this->validate();
        Endereco::updateOrCreate(
        [
            'zipcode' => $this->zipcode,
        ],
        [
            'city' => $this->city,
            'street' => $this->street,
            'neighborhood' => $this->neighborhood,
            'state' => $this->state,
        ]);
        
        $this->render();

        $this->notification()->sucess('Crição/Alteração', 'Transição realizada com sucesso!');

        $this->resetExcept($adresses);
    }

    public function edit(string $id): void
    {
        $adress = Endereco::find($id);
        $this->zipcode = $adress->zipcode;
        $this->city = $adress->city;
        $this->street = $adress->street;
        $this->neighborhood = $adress->neighborhood;
        $this->state = $adress->state;
    }

    public function remove(string $id): void
    {
        $adress = Endereco::find($id);
        $adress?->delete();

        $this->notification()->sucess('Exclusão de Endereço', 'Exclusão feita com sucesso!');
    }

    public function render()
    {
        $this->adresses = Adress::all()->toArray();

        return view('livewire.search-zipcode');
    }
}
