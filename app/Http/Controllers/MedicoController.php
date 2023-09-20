<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\patient;
use Carbon\Carbon;
use App\Models\UserEndereco;
use App\Http\Requests\MedicoStoreRequest;
use App\Models\Paciente;
use App\Models\PacienteMedico;
use GuzzleHttp\Client;
use App\Http\Requests\RemedioStore;
use App\Models\medicamentos;
use App\Http\Requests\FormsDiario;
use App\Models\checklist;
use App\Models\formDiario as ModelFormDiario;


class MedicoController extends Controller
{
    public function index()
    {
        $row = User::where('id', auth()->user()->id)->first();
        return view('medico.registro.index', compact('row'));
    }

    public function areamedico()
    {
        $medico = Medico::where('user_id', auth()->user()->id)->first();
        $row = User::where('id', auth()->user()->id)->first();
        return view('medico.visualizacao.index', compact('row', 'medico'));
    }

    public function visual()
    {
        return 0;
    }

    public function laudoView()
    {
        $medico = Medico::where('user_id', auth()->user()->id)->first();
        return view('medico.visualizacao.index', compact('medico'));
    }

    public function criarForms()
    {
        //Sera deletado e implementado em addForm
        $medico = Medico::where('user_id', auth()->user()->id)->first();
        $row = User::where('id', auth()->user()->id)->first();
        return view('medico.forms_diario.index', compact('row', 'medico', 'pegaID'));
    }

    public function meusPacientes()
    {

        $user  = User::where('id', auth()->user()->id)->first();
        $medico = Medico::where('user_id', auth()->user()->id)->first();
        $pacientes = Paciente::all();
        $formsDiario = ModelFormDiario::all();
        $pacMeds = PacienteMedico::where('medico_id', auth()->user()->id)->get();
        return view('medico.meus-pacientes.index', compact('user', 'pacientes', 'medico', 'pacMeds', 'formsDiario'));
    }

    public function pacienteProcessos($idPac)
    {
        $forms = ModelFormDiario::where('paciente_id', $idPac)->get();
        $checklist = checklist::where('paciente_id', $idPac)->get();
        $paciente = Paciente::where('id', $idPac)->first();
        $medico = Medico::where('user_id', auth()->user()->id)->first();
        return view('medico.meus-pacientes.visualizarProcessos.index', compact('forms', 'paciente', 'medico', 'checklist'));
    }

    public function pacienteProcessosForms($idPac, $idForm)
    {
        $forms = ModelFormDiario::where('paciente_id', $idPac)->get();
        $checklist = checklist::where('paciente_id', $idPac)->get();
        $paciente = Paciente::where('id', $idPac)->first();
        $medico = Medico::where('user_id', auth()->user()->id)->first();
        $form = ModelFormDiario::where('id', $idForm)->first();
        return view('medico.meus-pacientes.detalhes.index', compact('forms', 'paciente', 'medico', 'checklist', 'form'));
    }

    public function paginaAddForms($id)
    {
        $medico = Medico::where('user_id', auth()->user()->id)->first();
        $row = Paciente::where('id', $id)->first();
        return view('medico.forms_diario.indexCriarForm', compact('row', 'medico'));
    }

    public function passarParaPaciente(FormsDiario $request)
    {
        $data = $request->validated();
        $data['status'] = 'Aguardando';
        $data['diagnostico'] = '';
        //dd($data); //para testes
        ModelFormDiario::create($data);

        $medico = Medico::where('user_id', auth()->user()->id)->first();
        $row = User::where('id', auth()->user()->id)->first();
        return view('medico.visualizacao.index', compact('row', 'medico'));
       
        // Criacao de um forms que vai passar para o paciente
        //$medico = Medico::where('user_id', auth()->user()->id)->first();
        //$row = Paciente::where('id', $id)->first();
        /*$inputRemedio = "AMOXICILINA";
        //
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://bula.vercel.app/pesquisar?nome=".$inputRemedio."&pagina=1",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET"
        ));

        $link = "https://bula.vercel.app/pesquisar?nome=".$inputRemedio."&pagina=1";

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            $saida = "cURL Error #:" . $err;
        } else {
            $saida =  $response;
        }
        //
        $apiBula = $saida;
        return view('medico.forms_diario.indexCriarForm', compact('row', 'medico', 'apiBula', 'link'));*/

    }

    public function buscaRemedio()
    {
        $inputRemedio = "AMOXICILINA";
        //
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://bula.vercel.app/pesquisar?nome=".$inputRemedio."&pagina=1",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET"
        ));

        $link = "https://bula.vercel.app/pesquisar?nome=".$inputRemedio."&pagina=1";

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            $saida = "cURL Error #:" . $err;
        } else {
            $saida =  $response;
        }
        //
        $apiBula = $saida;
    }

    public function modificarForm()
    {
        
    }

    public function adicionarMedicamento(RemedioStore $request)
    {
        $data = $request->validated();
        //dd($data); //para testes
        medicamentos::create($data);
        return redirect()->route('areamedico.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(('medico.registro.index'));
    }

    /**
     * Store a newly created resource in storage.
     */

    /**
     * Display the specified resource.
     */
    public function show(Medico $medico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medico $medico)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Medico $medico)
    {
        //

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medico $medico)
    {
        //

    }
}
