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

    //public $symptoms = [];
    public $sintomasCheck = null;
    public $selectedDay = 1;
    public $id_form = 1;
    public $numberOfDays = 1;
    public $qtdDias = 1;
    public $diaMaxRespondido = 1;
    public $totalDays = 1; // Set the default total number of days
    public $data = [];
    public $sexo = '';
    public $traduzido = false;
    public $traduzDesc = '';
    public bool $loadData = false;
    public bool $erro = false;
    public bool $graphicActive = false;
    public bool $trocaDia = false;

    public function getToken()
    {
        $token = env('APIMEDIC_SAND_KEY');
        return $token;
    }

    public function getFormDia()
    {
        $this->trocaDia = true;
        $this->loadData = true;
        //$this->getSymptomsProperty();
    }

    public function getSexo()
    {
        $outSexo = null;
        $sexo = $this->sexo;
        if ($sexo == 'Masc') {
            $outSexo = 'male';
        } else {
            $outSexo = 'female';
        }
        return $outSexo;
    }

    public function getSymptomsProperty() 
    {
        $symptoms = [];
        $formDia = Checklist::where('forms_id', $this->id_form)->where('numDia', $this->selectedDay)->first();
        $input = $formDia->sintomas;
        $token =$this->getToken();
        //dd($input);
        if($input != '[]')
        {
            $response = Http::get('https://sandbox-healthservice.priaid.ch/symptoms', [
                'symptoms' => $input,
                'token' => $token,
                'language' => 'en-gb'
            ]);
            if ($response->successful()) {
                $symptoms = $response->json();
            } else {
                // Handle the API request failure
                $symptoms = [];
                // You can log an error message or set a default value for $this->symptoms
            }
            $this->erro = false;
        }
        else {
            $symptoms = [];
            $this->erro = true;
        }
        //$this->trocaDia = false;
        //dd($this->symptoms);
        return $symptoms;
    }

    public function getHFtoken()
    {
        $tokenW = env('HuggingFace_write');
        $tokenR = env('HuggingFace_read');
        return $tokenW;
    }
    
    public function traduzEnPt($entrada)
    {
        $input = $entrada;
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://api-inference.huggingface.co/models/VanessaSchenkel/unicamp-finetuned-en-to-pt-dataset-ted');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, '{"inputs":'. $input .'}');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Authorization: '.$this->getHFtoken()
        ));
        if (!$this->traduzido) {
            $result = curl_exec($ch);
            $this->traduzDesc = $result;
            $this->traduzido = true;
        }
        $result = curl_exec($ch);
        curl_close($ch);
    }

    public function render()
    {
        $this->numberOfDays = $this->qtdDias;
        $selectedDay = $this->selectedDay;
        $formId = $this->id_form;
        //dd($formId);
        $checklist = Checklist::where('forms_id',$formId)->where('numDia',$selectedDay)->first();
        //dd($checklist, $formId);
        if($checklist->sintomas)
        {
            $this->sintomasCheck = $checklist->sintomas;
        }
        $dia = $this->selectedDay;
        $dorForms = Checklist::where('forms_id', $this->id_form)->select('numDia', 'nivelDor', 'nivelFebre')->OrderBy('id')->get();
        //dd($dorForms);
        $obs = formDiario::where('id', $this->id_form)->select('observacoes')->first();
        $formDia = Checklist::where('forms_id', $this->id_form)->where('numDia', $this->selectedDay)->first();
        return view('livewire.acompanhamento-dia', compact('checklist', 'dia', 'formDia', 'dorForms', 'obs'));
    }

    public function mount()
    {
        //$this->getSymptoms();
        
    }
    
    public function init()
    {
        $this->getSymptomsProperty();
        //$this->getDiagnostico();
        
    }

    public function generateGraph()
    {
        $this->graphicActive = true;
    }
}
