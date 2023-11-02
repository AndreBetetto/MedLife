<?php

namespace App\Http\Livewire;

use Exception;
use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use App\Models\Medico;
use App\Models\Paciente;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class RecomendaMedico extends Component
{
    use WithPagination;

    public $input;
    public $output;
    public $symptoms = [];
    public $symptomsSelected = [];
    public $sym = [];
    public $dataFetched = false;
    public $saida = [];
    public $paciente;
    public $jaSelecionados;
    public $fileCount;
    public $searchMedic = '';
    public $filtroEspecialidade = [];
    private $pagination = 10;

    public function render()
    {
        $medicos = $this->listDoctors();
        return view('livewire.recomenda-medico', [
            'medicos' => $medicos,
        ]);
    }

    public function listDoctors()
    {
        $query = Medico::where(DB::raw('lower(nome)'), 'like', '%' . strtolower($this->searchMedic) . '%')->OrderBy('id');
        if (count($this->filtroEspecialidade) > 0)
        {
            $query->whereIn('especialidade', $this->filtroEspecialidade);
        }

        $medicos = $query->paginate($this->pagination);
        //dd($medicos);
        return $medicos;
    }

    public function updatingSearchMedic(): void
    {
        $this->gotoPage(1);
    }

    public function removeEsp($input)
    {
        //dd($input);
        $this->filtroEspecialidade = array_diff($this->filtroEspecialidade, [$input]);
        //dd($this->filtroEspecialidade);
        $this->listDoctors();
    }

    public function recomenda()
    {
        $this->getSpecialization();
    }

    public function submitSelectedSymptoms()
    {
        //transform array in srting
        $this->symptomsSelected = implode(",", $this->symptomsSelected);
        //format string in []
        $this->symptomsSelected = "[" . $this->symptomsSelected . "]";
        //dd($this->symptomsSelected);
        return $this->symptomsSelected;
    }

    public function getSpecialization()
    {
        $symptoms = $this->submitSelectedSymptoms();
        $sexo = $this->getSexo();
        $idade = $this->getIdade();
        $token = $this->getToken();
        //dd($symptoms, $sexo, $idade, $token);
        $response = Http::get('https://sandbox-healthservice.priaid.ch/diagnosis/specialisations', [
            'symptoms' => $symptoms,
            'gender' => $sexo,
            'year_of_birth' => $idade,
            'token' => $token,
            'language' => 'en-gb',
        ]);
        if ($response->successful()) {
            $this->saida = $response->json();
            //dd($this->saida);
        } else {
            // Handle the API request failure
            $this->saida = [];
            //dd($this->saida);
            // You can log an error message or set a default value for $this->symptoms
        }
        //dd($this->saida);
        //dd($response);
    }

    public function getSexo()
    {
        $paciente = Paciente::where('user_id', Auth::user()->id)->first();
        $outSexo = null;
        $sexo = $paciente->sexo;
        if ($sexo == 'Masc') {
            $outSexo = 'male';
            
        } else {
            $outSexo = 'female';
        }
        return $outSexo;
    }

    public function getIdade()
    {
        $paciente = Paciente::where('user_id', Auth::user()->id)->first();
        //get birth year of patient
        $idade = Carbon::parse($paciente->dataNasc)->format('Y');
        return $idade;
    }

    public function getTokenRead()
    {
        $token = env('HuggingFace_read');
        return $token;
    }

    public function getTokenWrite()
    {
        $token = env('HuggingFace_write');
        return $token;
    }

    public function getToken()
    {
        $token = env('APIMEDIC_SAND_KEY');
        //dd($token);
        return $token;
    }

    public function getSymptoms()
    {
        $token =$this->getToken();
        //dd($token);
        $response = Http::get('https://sandbox-healthservice.priaid.ch/symptoms', [
            'token' => $token,
            'language' => 'en-gb',
        ]);
        //dd($response);
        if ($response->successful()) {
            $this->symptoms = $response->json();
        } else {
            // Handle the API request failure
            $this->symptoms = [];
            // You can log an error message or set a default value for $this->symptoms
        }
    }

    public function fetchAPIdata()
    {
        $this->getSymptoms();
        // Set isLoading to false when the API request is completed
        $this->dataFetched = true;
    }

    public function filtrarEsp($esp)
    {
        //add especialidade to array
        //dd($esp);
        $this->filtroEspecialidade[] = array_push($this->filtroEspecialidade, $esp);
        //remove numbers
        $this->filtroEspecialidade = array_filter($this->filtroEspecialidade, 'is_string');
        $this->listDoctors();
        //dd($this->filtroEspecialidade);
    }


    public function recomendaMedico()
    {

        $preparo = "Retorne em uma palavra a especialidade medica recomendada para consulta, baseado nos seguintes sintomas: ";
        $pos = ". Caso a resposta nao esteja relacionada com sintomas, digite 'erro! Tente novamente'";
        $entrada = $preparo . $this->input . $pos;
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://api-inference.huggingface.co/models/gpt2');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, '{"inputs": "'.$entrada.'"}');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$this->getTokenRead(),
        ));

        $result = curl_exec($ch);

        curl_close($ch);

        $this->output = $result;

    }
}
