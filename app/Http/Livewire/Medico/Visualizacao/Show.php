<?php

namespace App\Http\Livewire\Medico\Visualizacao;

use Livewire\Component;
use App\Models\User;
use App\Models\Medico;
use Carbon\Carbon;


class Show extends Component
{
    public function render()
    {
        $medico = Medico::all();
        $row = User::where('id', auth()->user()->id)->first();
        return view('livewire.medico.visualizacao.show', compact('row', 'medico'));
    }
}
