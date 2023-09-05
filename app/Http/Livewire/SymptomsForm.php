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
    public $symptomsTorso = [];
    public $symptomsArms = [];
    public $symptomsLegs = [];
    public $symptomsAbdomen = [];
    public $symptomsSkin = [];
    public $symptoms = [];
    public $selectedSymptom = null;

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

    public function getToken()
    {
        $token = env('APIMEDIC_SAND_KEY');
        return $token;
    }

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
        #$this->getSymptomsHead();
        #$this->getSymptomsTorso();
        #$this->getSymptomsArms();
        #$this->getSymptomsLegs();
        #$this->getSymptomsAbdomen();
        #$this->getSymptomsSkin();
    }
}
