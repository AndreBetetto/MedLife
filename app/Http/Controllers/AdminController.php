<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Medico;
use App\Models\Paciente;

class AdminController extends Controller
{
    //
    public function index()
    {

        return view('livewire.admin.index');
    }
}
