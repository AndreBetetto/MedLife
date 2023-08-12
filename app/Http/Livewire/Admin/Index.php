<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use App\Models\Medico;
use Carbon\Carbon;
use App\Models\Paciente;

class Index extends Component
{
    public function render()
    {
        $paciente = Paciente::all();
        $medico = Medico::all();
        $user = User::where('id', auth()->user()->id)->first();
        return view('livewire.admin.index', compact('user', 'medico', 'paciente'));
    }
}
