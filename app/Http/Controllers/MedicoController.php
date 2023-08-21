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


class MedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $row = User::where('id', auth()->user()->id)->first();
        return view('medico.registro.index', compact('row'));
    }

    public function areamedico()
    {
        //
        $medico = Medico::where('user_id', auth()->user()->id)->first();
        $row = User::where('id', auth()->user()->id)->first();
        return view('medico.visualizacao.index', compact('row', 'medico'));
    }

    public function laudoView()
    {
        //
        $medico = Medico::where('user_id', auth()->user()->id)->first();
        return view('medico.visualizacao.index', compact('medico'));
    }

    public function criarForms()
    {
        //
        $medico = Medico::where('user_id', auth()->user()->id)->first();
        $row = User::where('id', auth()->user()->id)->first();
        return view('medico.forms_diario.index', compact('row', 'medico'));
    }

    public function meusPacientes()
    {

        $user  = User::where('id', auth()->user()->id)->first();
        $medico = Medico::where('user_id', auth()->user()->id)->first();
        $pacientes = Paciente::all();
        $pacMeds = PacienteMedico::where('paciente_id', auth()->user()->id)->get();
        return view('paciente.meusMedicos.index', compact('user', 'paciente', 'medicos', 'pacMeds', 'specialty'));
    }

    public function addpaciente()
    {
        
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
    public function store(MedicoStoreRequest $request)
    {
        
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
