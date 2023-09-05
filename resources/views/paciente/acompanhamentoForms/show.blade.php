<div>
    {{-- The whole world belongs to you. --}}
    Acompanhar resultados de formularios

    Dia selecionado:

    @php
        $qtdDias = $formsDiarios->numDias;
        $diaMax = $checklist->count();
        $id_form = $formsDiarios->id;
        
    @endphp
    @livewire('acompanhamento-dia', [   'qtdDias' => $qtdDias, 
                                        'diaMax' => $diaMax,
                                        'id_form' => $id_form
                                     ])
    
</div>
