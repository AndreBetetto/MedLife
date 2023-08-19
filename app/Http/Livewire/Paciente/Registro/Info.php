<?php

namespace App\Http\Livewire\Paciente\Registro;

use Livewire\Component;
use App\Models\User;
use App\Models\patient;
use Carbon\Carbon;

class Info extends Component
{
    public function render()
    {
        $row = User::where('id', auth()->user()->id)->first();
        return view('livewire.paciente.registro.info', compact('row'));
    }
}
