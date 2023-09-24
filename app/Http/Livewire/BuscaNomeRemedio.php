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

    public $retorno;
    public $row;
    public $medico;
    public $medArray = [];
    public $medicamentos = [];
    public $formattedSelectedMedicamentos = '';


    public function mount()
    {
        $input = $this->search;
        $curl = curl_init();

        if($input == ''){
            $input = 'AMOXICILINA';
        }
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://bula.vercel.app/pesquisar?nome='.$input.'&pagina=1",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 8,
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

    public function updateSelectedMed()
    {
        $medArray = $this->medArray;
        $this->$medArray = array_unique($this->$medArray);
    }

    public $search = '';
    public $selectedMedicamentos = [];

    
    public function updatedSearch()
    {
        $input = $this->search;
        $curl = curl_init();

        if (empty($input)) {
            $input = 'AMOXICILINA';
        }

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://bula.vercel.app/pesquisar?nome=" . urlencode($input) . "&pagina=1",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 8,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ));
        
        $response = curl_exec($curl);
        //dd($response);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            // Handle the cURL error
            $this->medicamentos = [];
        } else {
            // Parse the API response and store it in the $medicamentos array
            $this->medicamentos = json_decode($response, true);
        }
    }

    public function addMedicamento($medicamentoId)
    {
        //string to add to selectedMedicamentos
        $str = $medicamentoId;

        dd($str);
        // Add the selected medicine to the $selectedMedicamentos array
        array_push($this->selectedMedicamentos, $str);
    }

    public function removeMedicamento($medicamentoName)
    {
        // Remove the selected medicine from the $selectedMedicamentos array
        $this->selectedMedicamentos = array_diff($this->selectedMedicamentos, [$medicamentoName]);
    }

    public function formatSelectedMedicamentos()
    {
        $formattedIds = '[' . implode(', ', $this->selectedMedicamentos) . ']';
        $this->formattedSelectedMedicamentos = $formattedIds;
    }
    public $stringInput = '';
}
