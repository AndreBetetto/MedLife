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

    public $symptoms = null;
    public $sintomasCheck = null;
    public $selectedDay = 1;
    public $id_form = 1;
    public $numberOfDays = 1;
    public $qtdDias = 1;
    public $diaMaxRespondido = 1;
    public $totalDays = 7; // Set the default total number of days
    public $data = [];

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
        $dia = $this->selectedDay;
        return view('livewire.acompanhamento-dia', compact('checklist', 'dia'));
    }

    public function dataDay()
    {
        $formDia = Checklist::where('forms_id', $this->id_form)->where('numDia', $this->selectedDay)->first();
        $data = array(
            "id" => $formDia->id,
            "nivelDor" => $formDia->nivelDor,
            "nivelFebre" => $formDia->nivelFebre,
            "sintomas" => $formDia->sintomas,
            "numDia" => $formDia->numDia,
            "observacoes" => $formDia->observacoes,
            "numDia" => $formDia->numDia,
            "status" => $formDia->status,
            "grupo" => $formDia->grupo,
            "tipo" => $formDia->tipo,
            "sangramento" => $formDia->sangramento,
        );
        $this->data = $data;
    }

    public function mount()
    {
        $this->getSymptoms();
        $this->dataDay();
    }

}
