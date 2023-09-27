<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class SymptomsForm extends Component
{
    public $paciente;
    public $symptomsHead = [];
    public $selectedSymptomHead = [];
    public $symptomsTorso = [];
    public $selectedSymptomTorso = [];
    public $symptomsArms = [];
    public $selectedSymptomArms = [];
    public $symptomsLegs = [];
    public $selectedSymptomLegs = [];
    public $symptomsAbdomen = [];
    public $selectedSymptomAbdomen = [];
    public $symptomsSkin = [];
    public $selectedSymptomSkin = [];
    public $symptoms = [];
    public $selectedSymptomIds = '';
    public $isLoading = false;
    public $dataFetched = false;
    public $teste;

    // This code removes a symptom from the list of selected symptoms for each symptom type.
    // It is called when a user clicks the "Remove" button on the symptom selection screen.

    public function removeSelectedSymptomHead($symptomId)
    {
        unset($this->selectedSymptomHead[$symptomId]);
    }

    public function removeSelectedSymptomTorso($symptomId)
    {
        unset($this->selectedSymptomTorso[$symptomId]);
    }

    public function removeSelectedSymptomArms($symptomId)
    {
        unset($this->selectedSymptomArms[$symptomId]);
    }

    public function removeSelectedSymptomLegs($symptomId)
    {
        unset($this->selectedSymptomLegs[$symptomId]);
    }

    public function removeSelectedSymptomAbdomen($symptomId)
    {
        unset($this->selectedSymptomAbdomen[$symptomId]);
    }

    public function removeSelectedSymptomSkin($symptomId)
    {
        unset($this->selectedSymptomSkin[$symptomId]);
    }

    public function allSelectedSymptoms()
    {
        
    }

    public function render()
    {
        return view('livewire.symptoms-form', [
            'paciente' => $this->paciente
        ]);
    }

    
    public function getIdade()
    {
        $idade = Carbon::parse($this->paciente->dataNasc)->age;
        return $idade;
    }

    /**
     * The function "getSexo" returns the appropriate gender based on the patient's sex and age.
     * 
     * @return the gender of the patient based on their age and sex. The possible return values are
     * 'boy', 'man', 'girl', or 'woman'.
     */
    public function getSexo()
    {
        $outSexo = null;
        $sexo = $this->paciente->sexo;
        if ($sexo == 'Masc') {
            if($this->getIdade() < 12){
                $outSexo = 'boy';
            } else {
                $outSexo = 'man';
            } 
        } else {
            if($this->getIdade() < 12){
                $outSexo = 'girl';
            } else {
                $outSexo = 'woman';
            } 
        }
        return $outSexo;
    }

    /**
     * The function returns the value of the APIMEDIC_SAND_KEY environment variable.
     * 
     * @return the value of the environment variable "APIMEDIC_SAND_KEY".
     */
    public function getToken()
    {
        $token = env('APIMEDIC_SAND_KEY');
        return $token;
    }

    /**
     * The function `getSymptoms()` retrieves a list of symptoms from an API and stores them in the
     * `->symptoms` variable.
     */
    public function getSymptoms()
    {
        $token =$this->getToken();
        $response = Http::get('https://sandbox-healthservice.priaid.ch/symptoms', [
            'token' => $token,
            'language' => 'en-gb',
        ]);
        if ($response->successful()) {
            $this->symptoms = $response->json();
        } else {
            // Handle the API request failure
            $this->symptoms = [];
            // You can log an error message or set a default value for $this->symptoms
        }
    }

    /**
     * The above code defines several functions in PHP that make API requests to retrieve symptoms
     * related to different body parts.
     */
    public function getSymptomsHead()
    {
        $token =$this->getToken();
        $idLocal = 6;
        $response = Http::get('https://sandbox-healthservice.priaid.ch/symptoms/6/'.$this->getSexo(), [
            'token' => $token,
            'language' => 'en-gb',
        ]);

        if ($response->successful()) {
            $this->symptomsHead = $response->json();
        } else {
            // Handle the API request failure
            $this->symptomsHead = [];
            // You can log an error message or set a default value for $this->symptoms
        }
    }

    public function getSymptomsTorso()
    {
        $token =$this->getToken();
        $idLocal = 15;
        $response = Http::get('https://sandbox-healthservice.priaid.ch/symptoms/15/'.$this->getSexo(), [
            'token' => $token,
            'language' => 'en-gb',
        ]);

        if ($response->successful()) {
            $this->symptomsTorso = $response->json();
        } else {
            // Handle the API request failure
            $this->symptomsTorso = [];
            // You can log an error message or set a default value for $this->symptoms
        }
    }

    public function getSymptomsArms()
    {
        $token =$this->getToken();
        $idLocal = 7;
        $response = Http::get('https://sandbox-healthservice.priaid.ch/symptoms/7/'.$this->getSexo() , [
            'token' => $token,
            'language' => 'en-gb',
        ]);

        if ($response->successful()) {
            $this->symptomsArms = $response->json();
        } else {
            // Handle the API request failure
            $this->symptomsArms = [];
            // You can log an error message or set a default value for $this->symptoms
        }
    }

    public function getSymptomsLegs()
    {
        $token =$this->getToken();
        $idLocal = 10;
        $response = Http::get('https://sandbox-healthservice.priaid.ch/symptoms/10/'.$this->getSexo(), [
            'token' => $token,
            'language' => 'en-gb',
        ]);

        if ($response->successful()) {
            $this->symptomsLegs = $response->json();
        } else {
            // Handle the API request failure
            $this->symptomsLegs = [];
            // You can log an error message or set a default value for $this->symptoms
        }
    }

    public function getSymptomsAbdomen()
    {
        $token =$this->getToken();
        $idLocal = 16;
        $response = Http::get('https://sandbox-healthservice.priaid.ch/symptoms/16/'.$this->getSexo() , [
            'token' => $token,
            'language' => 'en-gb',
            'locationId' => $idLocal,
            'selectorStatus' => $this->getSexo(),
        ]);

        if ($response->successful()) {
            $this->symptomsAbdomen = $response->json();
        } else {
            // Handle the API request failure
            $this->symptomsAbdomen = [];
            // You can log an error message or set a default value for $this->symptoms
        }
    }

    public function getSymptomsSkin()
    {
        $token =$this->getToken();
        $idLocal = 17;
        $response = Http::get('https://sandbox-healthservice.priaid.ch/symptoms/17/'.$this->getSexo() , [
            'token' => $token,
            'language' => 'en-gb',
            'locationId' => $idLocal,
            'selectorStatus' => $this->getSexo(),
        ]);

        if ($response->successful()) {
            $this->symptomsSkin = $response->json();
        } else {
            // Handle the API request failure
            $this->symptomsSkin = [];
            // You can log an error message or set a default value for $this->symptoms
        }
    }


    public function mount()
    {
        //$this->getSymptoms();
        //$this->getSymptomsHead();
        //$this->getSymptomsTorso();
        //$this->getSymptomsArms();
        //$this->getSymptomsLegs();
        //$this->getSymptomsAbdomen();
        //$this->getSymptomsSkin();
    }

    /**
     * The function fetchAPIdata sets the isLoading variable to true to show a loading spinner,
     * performs API requests to fetch data, and then sets isLoading to false when the requests are
     * complete.
     */
    public function showSpinner()
    {
        $this->isLoading = true;
    }

    public function fetchAPIdata()
    {
        // Set isLoading to true to show the loading spinner
        $this->isLoading = true;
        
        // Perform your API requests here
        $this->getSymptoms();
        //$this->getSymptomsHead();
        //$this->getSymptomsTorso();
        //$this->getSymptomsArms();
        //$this->getSymptomsLegs();
        //$this->getSymptomsAbdomen();
        //$this->getSymptomsSkin();
        // Set isLoading to false when the API request is complete
        $this->isLoading = false;
        $this->dataFetched = true;
    }
}
