<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegistropacienteController extends Controller
{
    //
    public function index()
    {
        $row = User::where('id', auth()->user()->id)->first();
        return view('livewire.paciente.registro.index', compact('row'));
    }
}
