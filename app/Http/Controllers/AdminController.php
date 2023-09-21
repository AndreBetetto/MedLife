<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Medico;
use App\Models\Paciente;
use App\Http\Requests\MedicoStoreRequest;
use App\Http\Requests\PacienteStoreRequest;

class AdminController extends Controller
{
    //
    public function index()
    {
        $users = User::all();
        $medicos = Medico::all();
        $pacientes = Paciente::all();
        return view('admin.index', compact('users', 'medicos', 'pacientes'));
    }

    public function crudMedico ()
    {
        $medicos = Medico::all();
        return view('admin.medico.index', compact('medicos'));
    }

    public function crudPaciente ()
    {
        $pacientes = Paciente::all();
        return view('admin.paciente.index', compact('pacientes'));
    }

    public function crudUser ()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    public function crudMedicoAdd (MedicoStoreRequest $request)
    {
        $data = $request->validated();
        //dd($data);
        Medico::create($data);

        //Muda o role do usuario para medico
        User::where('id', $data['user_id'])->update(['role' => 'medico']);
        return redirect()->route('adminmedico.index');
    }

    public function crudFuncionarioAdd (MedicoStoreRequest $request)
    {
        return redirect()->route('adminmedico.index');
    }

}
