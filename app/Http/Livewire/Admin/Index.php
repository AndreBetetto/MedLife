<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use App\Models\Medico;
use Carbon\Carbon;

class Index extends Component
{
    public function render()
    {
        $user = User::where('id', auth()->user()->id)->first();
        $medico = Medico::where('id_medico', auth()->user()->id)->first();
        return view('livewire.admin.index', compact('user', 'medico'));
    }
}
