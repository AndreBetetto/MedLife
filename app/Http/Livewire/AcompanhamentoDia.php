<?php

namespace App\Http\Livewire;

use App\Http\Requests\FormsDiario;
use Livewire\Component;
use App\Models\formDiario as formDiario;
use App\Models\checklist as Checklist;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class AcompanhamentoDia extends Component
{

    public $symptoms = [];
    public $sintomasCheck = null;
    public $selectedDay = 1;
    public $id_form = 1;
    public $numberOfDays = 1;
    public $qtdDias = 1;
    public $diaMaxRespondido = 1;
    public $totalDays = 7; // Set the default total number of days
    public $data = [];
    public $testeurl;

    public function getToken()
    {
        $token = env('APIMEDIC_SAND_KEY');
        return $token;
    }

    public function getSymptoms()
    {
        $formDia = Checklist::where('forms_id', $this->id_form)->where('numDia', $this->selectedDay)->first();
        $input = $formDia->sintomas;
        $token =$this->getToken();
        $response = Http::get('https://sandbox-healthservice.priaid.ch/symptoms?symptoms=['.$input.']', [
            'token' => $token,
            'language' => 'en-gb'
        ]);
        if ($response->successful()) {
            $this->symptoms = $response->json();
        } else {
            // Handle the API request failure
            $this->symptoms = [];
            // You can log an error message or set a default value for $this->symptoms
        }
        $this->testeurl = 'https://sandbox-healthservice.priaid.ch/symptoms?symptoms=['.$input.']&'.$token.'&language=en-gb';
    }


    public function render()
    {
        $this->numberOfDays = $this->qtdDias;
        $selectedDay = $this->selectedDay;
        $formId = $this->id_form;
        $checklist = Checklist::where('forms_id',$formId)->where('numDia',$selectedDay)->first();
        $this->sintomasCheck = $checklist->sintomas;
        $dia = $this->selectedDay;
        $formDia = Checklist::where('forms_id', $this->id_form)->where('numDia', $this->selectedDay)->first();
        return view('livewire.acompanhamento-dia', compact('checklist', 'dia', 'formDia'));
    }

    public function mount()
    {
        $this->getSymptoms();
    }

}