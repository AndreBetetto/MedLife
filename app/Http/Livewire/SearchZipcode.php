<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class SearchZipcode extends Component
{
    // protected array $rules = [
    //     'cep' => ['required'],
    //     'rua' => ['required'],
    //     'bairro' => ['required'],
    //     'cidade' => ['required'],
    //     'estado' => ['required'],
    // ];

    // protected array $messages = [
    //     'cep.required' => 'O campo CEP é obrigatório',
    //     'rua' => 'O campo ENDEREÇO é obrigatório',
    //     'bairro' => 'O campo BAIRRO é obrigatório',
    //     'cidade' => 'O campo CIDADE é obrigatório',
    //     'estado' => 'O campo ESTADO é obrigatório',
    // ];

    public string $cep = '';
    public string $rua = '';
    public string $bairro = '';
    public string $cidade = '';
    public string $estado = '';

    public function updatedCep(string $value)
    {
        $response = Http::get("https://viacep.com.br/ws/{$value}/json/")->json();

        if(in_array("erro", $response) && $response["erro"]!=false)
        {
            $this->rua = "Seu cep não existe";
            $this->bairro = '';
            $this->cidade = '';
            $this->estado = '';
        }
        else
        {
            $this->cep = $response['cep'];
            $this->rua = $response['logradouro'];
            $this->bairro = $response['bairro'];
            $this->cidade = $response['localidade'];
            $this->estado = $response['uf'];
        }
    }

    // public function save(): void
    // {
    //     $this->validade();

    //     Address::updateOrCreate(
    //     [
    //         'cep' => $this->cep,
    //     ],
    //     [
    //         'rua' => $this->rua,
    //         'bairro' => $this->bairro,
    //         'cidade' => $this->cidade,
    //         'estado' => $this->estado,
    //     ]);

    //     $this->reset();
    // }

    public function render()
    {
        return view('livewire.search-zipcode');
    }
}
