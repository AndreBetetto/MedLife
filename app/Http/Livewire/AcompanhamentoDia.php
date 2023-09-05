<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\formDiario as formDiario;
use App\Models\checklist as Checklist;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class AcompanhamentoDia extends Component
{

    public $symptoms = null;
    public $sintomasCheck = null;
    public $selectedDay = 1;
    public $id_form = 1;
    public $numberOfDays = 1;
    public $qtdDias = 1;
    public $diaMax = 1;
    public $totalDays = 7; // Set the default total number of days

    public function getToken()
    {
        $token = env('APIMEDIC_SAND_KEY');
        return $token;
    }

    public function getSymptoms()
    {
        $input = $this->sintomasCheck;
        $token =$this->getToken();
        $sintomas = '['.$input.']';
        $response = Http::get('https://sandbox-healthservice.priaid.ch/symptoms/', [
            'token' => $token,
            'language' => 'en-gb',
            'symptoms' => $sintomas
        ]);
        if ($response->successful()) {
            $this->symptoms = $response->json();
        } else {
            // Handle the API request failure
            $this->symptoms = [];
            // You can log an error message or set a default value for $this->symptoms
        }
    }


    public function render()
    {
        $this->numberOfDays = $this->qtdDias;
        $selectedDay = $this->selectedDay;
        $formId = $this->id_form;
        $checklist = Checklist::where('forms_id',$formId)->where('numDia',$selectedDay)->first();
        $this->sintomasCheck = $checklist->sintomas;
        return view('livewire.acompanhamento-dia', compact('checklist'));
    }

    public function setDays()
    {
          
    }

    public function mount()
    {
        $this->setDays();
        $this->getSymptoms();
    }

}
