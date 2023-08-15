<?php

namespace App\Http\Livewire\Admin\Medico;

use Livewire\Component;
use App\Models\Medico;

class Show extends Component
{
    public function render()
    {
        $medicos = Medico::all();
        return view('livewire.admin.medico.show', compact('medicos'));
    }
}
