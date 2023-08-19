<?php

namespace App\Http\Controllers;

use App\Http\Requests\PacienteEditRequest;
use App\Models\Paciente;
use Illuminate\Http\Request;
use App\Http\Requests\PacienteStoreRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use App\Models\Medico;
use App\Http\Requests\pacMedStore;
use App\Models\PacienteMedico;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user  = User::where('id', auth()->user()->id)->first();
        $paciente = Paciente::where('user_id', auth()->user()->id)->first();

        return view('paciente.profile.index', compact('user', 'paciente'));
    }

    public function areapaciente()
    {
        $user  = User::where('id', auth()->user()->id)->first();
        $paciente = Paciente::where('user_id', auth()->user()->id)->first();

        return view('paciente.area.index', compact('user', 'paciente'));
    }

    public function buscarMedicos()
    {
        $jaSelecionados = PacienteMedico::where('paciente_id', auth()->user()->id)->get();
        $user  = User::where('id', auth()->user()->id)->first();
        $paciente = Paciente::where('user_id', auth()->user()->id)->first();
        $medicos = Medico::all();
        return view('paciente.buscarMedico.index', compact('user', 'paciente', 'medicos', 'jaSelecionados'));
    }

    public function meusMedicos()
    {
        $user  = User::where('id', auth()->user()->id)->first();
        $paciente = Paciente::where('user_id', auth()->user()->id)->first();
        $medicos = Medico::all();
        $pacMeds = PacienteMedico::where('paciente_id', auth()->user()->id)->get();
        return view('paciente.meusMedicos.index', compact('user', 'paciente', 'medicos', 'pacMeds'));
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

    /**
     * Display the specified resource.
     */
    public function show(Paciente $paciente)
    {
        //
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
