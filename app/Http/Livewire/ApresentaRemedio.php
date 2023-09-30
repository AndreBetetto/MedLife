<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ApresentaRemedio extends Component
{
    public $ids;
    public bool $isLoading = false;
    public $arrayMedicamentos = [];
    public function render()
    {
        return view('livewire.apresenta-remedio');
    }

    public function init()
    {
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
                // Parse the API response and store it in the $medicamentos array
                $arrayMed = json_decode($response, true);
            }
            array_push($this->arrayMedicamentos, $arrayMed);
        }
    }
}
