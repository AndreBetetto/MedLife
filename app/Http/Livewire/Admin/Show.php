<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use App\Models\Medico;
use App\Models\Paciente;
use Carbon\Carbon;
use Livewire\WithPagination;


class Show extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = '';


    public function render()
    {   
        $users = User::where('name', 'LIKE', '%' . $this->search . '%') ->orWhere('email', 'LIKE', '%' . $this->search . '%') ->paginate(10);
        $medicos = Medico::where('nome', 'LIKE', '%' . $this->search . '%') ->orWhere('crm', 'LIKE', '%' . $this->search . '%') ->paginate(10);
        $pacientes = Paciente::where('nome', 'LIKE', '%' . $this->search . '%') ->orWhere('cpf', 'LIKE', '%' . $this->search . '%')->paginate(10) ;
        $data = Carbon::now()->format('d/m/Y');
        $hora = Carbon::now()->format('H:i:s');
        return view('livewire.admin.show', compact('users', 'medicos', 'pacientes', 'data', 'hora'));
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    
}
