<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Medico;
use App\Models\Paciente;
use App\Http\Requests\MedicoStoreRequest;
use App\Http\Requests\PacienteStoreRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;



class AdminController extends Controller
{
    //
    public function index()
    {
        $users = User::all();
        $medicos = Medico::all();
        $pacientes = Paciente::all();
        $language = session('language', 'en');
        app()->setLocale($language);
        return view('admin.user.index', compact('users', 'medicos', 'pacientes'));
    }

    public function crudMedico ()
    {
        $language = session('language', 'en');
        app()->setLocale($language);
        $medicos = Medico::all();
        return view('admin.medico.index', compact('medicos'));
    }

    public function crudPaciente ()
    {
        $language = session('language', 'en');
        app()->setLocale($language);
        $pacientes = Paciente::all();
        return view('admin.paciente.index', compact('pacientes'));
    }

    public function crudPacienteAdd(PacienteStoreRequest $request)
    {
        $data = $request->validated();
        //dd($data);
        Paciente::create($data);
        $language = session('language', 'en');
        app()->setLocale($language);
        redirect()->route('crudPaciente.index');
    }

    public function crudUser ()
    {
        $language = session('language', 'en');
        app()->setLocale($language);
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    public function crudUserAdd(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));
        $language = session('language', 'en');
        app()->setLocale($language);
        
        return redirect()->route('crudUser.index');
    }

    public function crudUserEdit($id)
    {
        //dd($id);
        $language = session('language', 'en');
        app()->setLocale($language);
        $user = User::where('id', $id)->first();
        return view('admin.user.edit.index', compact('user'));
    }

    public function crudUserUpdate(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class]
        ]);
        //dd($request->all());
        $user = User::where('id', $request->id)->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        $language = session('language', 'en');
        app()->setLocale($language);
        return redirect()->route('crudUser.index');
    }

    public function crudMedicoAdd (MedicoStoreRequest $request)
    {
        $language = session('language', 'en');
        app()->setLocale($language);
        $data = $request->validated();
        //dd($data);
        Medico::create($data);

        //Muda o role do usuario para medico
        User::where('id', $data['user_id'])->update(['role' => 'medico']);
        return redirect()->route('crudMedico.index');
    }

    public function crudFuncionarioAdd ()
    {
        return redirect()->route('admin.add.addfuncionario');
    }

}
