<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\patient;
use Carbon\Carbon;
use App\Models\UserEndereco;
use App\Http\Requests\MedicoStoreRequest;

class MedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $row = User::where('id', auth()->user()->id)->first();
        return view('livewire.medico.registro.index', compact('row'));
    }

    public function visual()
    {
        //
        $medico = Medico::all();
        $row = User::where('id', auth()->user()->id)->first();
        return view('livewire.medico.visualizacao.index', compact('row', 'medico'));
    }

    public function laudoView()
    {
        //
        $medico = Medico::where('user_id', auth()->user()->id)->first();
        return view('livewire.medico.visualizacao.index', compact('medico'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(('livewire.medico.registro.index'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MedicoStoreRequest $request)
    {
        $validatedData = $request->validated();

        // dd($request->all());
        $medico = Medico::create([
            'nome' => $request->nome,
            'sobrenome' => $request->sobrenome,
            'user_id' => auth()->user()->id,
            'dataNasc' => $request->dataNasc,
            'sexo' => $request->sexo,
            'cpf' => $request->cpf,
            'rg' => $request->rg,
            'fone' => $request->fone,
            'estadoCivil' => $request->estadoCivil,
            'especialidade' => $request->especialidade,
            'crm' => $request->crm,
            'primeiraConsulta' => Carbon::now(),
            'ultimaConsulta' => Carbon::now(),
        ]);

        $endereco = UserEndereco::create([
            'user_id' => auth()->user()->id,
            'cep' => $request->cep,
            'logradouro' => $request->logradouro,
            'numero' => $request->numero,
            'complemento' => $request->complemento,
            'bairro' => $request->bairro,
            'cidade' => $request->cidade,
            'estado' => $request->estado,
        ]);

        return redirect()->route('livewire.medico.registro.index');
    }

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
