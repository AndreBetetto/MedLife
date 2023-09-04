<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AcompanhamentoDia extends Component
{

    public $selectedDay = 1;
    public $numberOfDays = null;
    public $qtdDias = null;

    public function render()
    {
        return view('livewire.acompanhamento-dia');
    }

    public function setDays()
    {
        $this->numberOfDays = $this->qtdDias;
    }

    public function mount()
    {
        $this->setDays();
    }

}
