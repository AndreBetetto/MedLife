<?php

namespace App\Http\Controllers;

use App\Http\Requests\PacienteEditRequest;
use App\Models\Paciente;
use App\Http\Requests\PacienteStoreRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use App\Models\Medico;
use App\Http\Requests\pacMedStore;
use App\Models\PacienteMedico;
use App\Models\formDiario as formDiario;
use App\Models\checklist as Checklist;
use App\Http\Requests\FormSave;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getUser()
    {
        $user  = User::where('id', auth()->user()->id)->first();
        return $user;
    }

    public function getPaciente()
    {
        $user = $this->getUser();
        $paciente = Paciente::where('user_id', auth()->user()->id)->first();
        return $paciente;
    }

    public function aareConsulta()
    {
        $user  = $this->getUser();
        $paciente = $this->getPaciente();

        return view('paciente.areaConsulta.detalhes', compact('user', 'paciente'));
    }

    public function index()
    {
        $user  = $this->getUser();
        $paciente = $this->getPaciente();

        return view('paciente.profile.index', compact('user', 'paciente'));
    }

    public function areapaciente()
    {
        $user  = $this->getUser();
        $paciente = $this->getPaciente();

        return view('paciente.area.index', compact('user', 'paciente'));
    }

    public function buscarMedicos()
    {
        $user  = $this->getUser();
        $paciente = $this->getPaciente();
        $medicos = Medico::all();
        $specialty = null;
        $jaSelecionados = $this->getPacMed();

        return view('paciente.buscarMedico.index', compact('user', 'paciente', 'medicos', 'jaSelecionados', 'specialty'));
    }

    public function getPacMed()
    {
        $paciente = $this->getPaciente();
        $pacMeds = PacienteMedico::where('paciente_id', $paciente->id)->get();
        return $pacMeds;
    }

    public function meusMedicos()
    {
        $user  = $this->getUser();
        $paciente = $this->getPaciente();
        $medicos = Medico::all();
        $specialty = null;
        $pacMeds = $this->getPacMed();
        return view('paciente.meusMedicos.index', compact('user', 'paciente', 'medicos', 'pacMeds', 'specialty'));
    }

    public function detalhesMedico($id)
    {
        $medico = Medico::where('id', $id)->first();
        $user = User::where('id', $medico->user_id)->first();
        $paciente = $this->getPaciente();
        $todosPacs = Paciente::all();
        $pacMeds = PacienteMedico::where('medico_id', $medico->id)->where('paciente_id', $paciente->id)->get();
        $formDiarios = formDiario::where('medico_id', $medico->id)->where('paciente_id', $paciente->id)->get();
        return view('paciente.respondeForms.indexDetalhes', compact('medico', 'user', 'paciente', 'formDiarios', 'todosPacs', 'pacMeds'));
    }

    public function detalhesMedicoForms($id)
    {
        $formsDiarios = formDiario::where('id', $id)->first();
        $medico = Medico::where('id', $formsDiarios->medico_id)->first();
        $paciente = Paciente::where('id', $formsDiarios->paciente_id)->first();
        $checklist = Checklist::where('forms_id', $formsDiarios->id)->OrderBy('id') ->get();
        //dd($checklist);
        return view('paciente.respondeForms.index', compact('medico', 'paciente', 'formsDiarios', 'checklist'));
    }

    public function acessoFormulario($id)
    {
        $formsDiarios = formDiario::where('id', $id)->first();
        $medico = Medico::where('id', $formsDiarios->medico_id)->first();
        $paciente = Paciente::where('id', $formsDiarios->paciente_id)->first();
        $checklist = Checklist::where('forms_id', $formsDiarios->id)->get();
        
        return view('paciente.acompanhamentoForms.index', compact('medico', 'paciente', 'formsDiarios', 'checklist'));
    }

    public function detalhesMedicoFormsStore(FormSave $r, $id)
    {
        $data = $r->validated();
        $symH = $data['symHead'] ?? []; //if not set, will set as empty array
        $symT = $data['symTorso'] ?? []; //if not set, will set as empty array
        $symA = $data['symArms'] ?? [];//if not set, will set as empty array
        $symL = $data['symLegs'] ?? [];//if not set, will set as empty array
        $symAb = $data['symAbdomen'] ?? [];//if not set, will set as empty array
        $symS = $data['symSkin'] ?? [];//if not set, will set as empty array
        $combinedArray = array_merge($symH, $symT, $symA, $symL, $symAb, $symS);
        $uniqueArray = array_unique($combinedArray);
        $resultString = '[' . implode(',', $uniqueArray) . ']';
        //dd($resultString);
        $data['sintomas'] = $resultString;
        //dd($data); //para testes
        $numDia = $data['numDia'];
        $formDiario = formDiario::where('id', $id)->first();
        $periodo = $formDiario->numDias;
        $checklist = Checklist::create($data);
        if($numDia == $periodo){
            $formDiario->update(['status' => 'Finalizado']);
            $checklist->update(['status' => 'finalizado']);
        } else {
            $formDiario->update(['status' => 'Em andamento']);
            $checklist->update(['status' => 'em andamento']);
        }
        $formDiario->update(['new' => TRUE]);
        $user  = $this->getUser();
        $paciente = $this->getPaciente();
        $medicos = Medico::all();
        $specialty = null;
        $pacMeds = $this->getPacMed();
        return view('paciente.meusMedicos.index', compact('user', 'paciente', 'medicos', 'pacMeds', 'specialty'));
   
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function pacienteMedicoCreate(pacMedStore $request)
    {
        $data = $request->validated();
        //dd($data); //para testes
        $pacienteMedico = PacienteMedico::create($data);
        return redirect()->route('areapaciente.meusMedicos');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PacienteStoreRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        //dd($data); //para testes
        Paciente::create($data);

        //Muda o role do usuario para paciente
        User::where('id', auth()->user()->id)->update(['role' => 'paciente']);
        return redirect()->route('profile.edit');
    }

    public function testeGPT()
    {
        return view('test');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PacienteEditRequest $paciente)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PacienteEditRequest $request, Paciente $paciente) : RedirectResponse
    {

        $data = $request->validated();
        //dd($data); //para testes
        $paciente = Paciente::where('user_id', auth()->user()->id)->first();
        $paciente->update($data);
        return redirect()->route('profile.edit');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paciente $paciente)
    {
        //
    }
}
