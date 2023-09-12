<?php

namespace App\Http\Livewire;

use Livewire\Component;

class BuscaNomeRemedio extends Component
{
    public function render()
    {
        $remedios = $this->search;
        return view('livewire.busca-nome-remedio', compact('remedios'));
    }

    public $row;
    public $medico;
    public $query = '';
    public $retorno;
    public $search;
    public $medArray = [];
    public $medicamentos = [];

    protected $queryString = ['search'];

    public function mount()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://bula.vercel.app/pesquisar?nome=AMOXICILINA&pagina=1",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET"
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            // Handle the cURL error
            $this->medicamentos = [];
        } else {
            // Parse the API response and store it in the $medicamentos array
            $this->medicamentos = json_decode($response, true);
        }
        //dd($this->medicamentos);
    }

    public $med;
    public function updateSelectedMed()
    {
        $medArray = $this->medArray;
        $this->$medArray = array_unique($this->$medArray);
    }
}
