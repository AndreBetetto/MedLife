<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ApresentaRemedio extends Component
{
    public $ids;
    public $count =0;
    public bool $isLoading = false;
    public $arrayMedicamentos = [];
    public $medNomes = [];
    public $medPrincipioAtivo = [];
    public $medCatRegulatoria = [];

    public function render()
    {
        return view('livewire.apresenta-remedio');
    }

    public function init()
    {
        $this->getMed();
        $this->isLoading = true;
    }

    public function getMed()
    {
        foreach ($this->ids as $med) {
            $curl = curl_init();
            if($med != ''){
                curl_setopt_array($curl, array(
                CURLOPT_URL => "https://bula.vercel.app/medicamento/".$med,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 8,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET"
                ));
            }
            $response = curl_exec($curl);
            $err = curl_error($curl);
                            
            curl_close($curl);
            $arrayMed = [];
            if ($err) {
                // Handle the cURL error
                $arrayMed = [];
            } else {
                // Handle the successful cURL request
                $arrayMed = json_decode($response, true);
                $nome = $arrayMed['nomeComercial'];
                array_push($this->medNomes, $nome);
            }
            

            $this->count++;
        }
        //dd($this->medNomes);
    }
}
