<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use App\Models\Medico;
use App\Models\patient;
use Carbon\Carbon;


class Show extends Component
{
    public function render()
    {
        $paciente = patient::all();
        $user = User::all();
        $medico = Medico::all();
        return view('livewire.admin.show', compact('user', 'medico', 'paciente'));
    }

    public function destroyUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
    }

    public function destroyMedico($id)
    {
        $medico = Medico::findOrFail($id);
        $medico->delete();
    }

    public function destroyPaciente($id)
    {
        $paciente = patient::findOrFail($id);
        $paciente->delete();
    }

    
}
