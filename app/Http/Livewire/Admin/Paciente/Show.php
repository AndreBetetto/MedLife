<?php

namespace App\Http\Livewire\Admin\Paciente;

use Livewire\Component;
use App\Models\Paciente;

class Show extends Component
{
    public function render()
    {
        $pacientes = Paciente::all();
        return view('livewire.admin.paciente.show', compact('pacientes'));
    }
}
