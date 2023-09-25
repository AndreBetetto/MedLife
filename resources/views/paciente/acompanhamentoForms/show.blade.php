<div>
    {{-- The whole world belongs to you. --}}
    Acompanhar resultados de formularios

    Dia selecionado:

    @php
        $qtdDias = $formsDiarios->numDias;
        $diaMaxRespondido = $checklist->count();
        $id_form = $formsDiarios->id;
        $maxDias = $formsDiarios->numDias;
        echo $formsDiarios->numDias;
    @endphp
    @livewire('acompanhamento-dia', [   'qtdDias' => $qtdDias, 
                                        'diaMaxRespondido' => $diaMaxRespondido,
                                        'id_form' => $id_form,
                                        'totalDays' => $maxDias,
                                     ])

    
</div>
