<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\formDiario as formDiario;
use App\Models\checklist as Checklist;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Illuminate\Support\Carbon;

class AcompanhamentoDiaMedico extends Component
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
    public $diagnosticos = [];
    public $anoNasc = 0;
    public $sexo = '';

    public function getToken()
    {
        $token = env('APIMEDIC_SAND_KEY');
        return $token;
    }

    public function getSexo()
    {
        $outSexo = null;
        $sexo = $this->paciente->sexo;
        if ($sexo == 'Masc') {
            $outSexo = 'male';
        } else {
            $outSexo = 'female';
        }
        return $outSexo;
    }

    public function getDiagnostico()
    {
        $formDia = Checklist::where('forms_id', $this->id_form)->where('numDia', $this->selectedDay)->first();
        $input = '['.$formDia->sintomas.']';
        $token =$this->getToken();

        $response = Http::get('https://sandbox-healthservice.priaid.ch/symptoms', [
            'symptoms' => $input,
            'gender' => $this->getSexo(),
            'year_of_birth' => $this->anoNasc,
            'token' => $token,
            'language' => 'en-gb'
        ]);
        if ($response->successful()) {
            $this->diagnosticos = $response->json();
        } else {
            // Handle the API request failure
            $this->diagnosticos = [];
            // You can log an error message or set a default value for $this->symptoms
        }
    }

    public function getSymptoms()
    {
        $formDia = Checklist::where('forms_id', $this->id_form)->where('numDia', $this->selectedDay)->first();
        $input = '['.$formDia->sintomas.']';
        $token =$this->getToken();

        $response = Http::get('https://sandbox-healthservice.priaid.ch/symptoms', [
            'symptoms' => $input,
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
        return view('livewire.acompanhamento-dia-medico', compact('checklist', 'dia', 'formDia'));
    }

    public function mount()
    {
        //$this->getSymptoms();
    }
}
