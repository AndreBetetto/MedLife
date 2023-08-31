<?php

namespace App\Http\Livewire;

use Livewire\Component;

class RecomendaMedico extends Component
{
    public $medico = 'a';
    public $input;

    public function render()
    {
        return view('livewire.recomenda-medico');
    }

    public function recomendaMedico()
    {

        $preparo = "Retorne em uma palavra a especialidade medica recomendada para consulta, baseado nos seguintes sintomas: ";
        $pos = ". Caso a resposta nao esteja relacionada com sintomas, digite 'erro! Tente novamente'";
        $entrada = $preparo . $this->input . $pos;

       
    }
}
