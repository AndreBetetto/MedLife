<div>
    {{-- The whole world belongs to you. --}}
    @php
        $qtdDias = $formsDiarios->numDias;
        $diaMaxRespondido = $checklist->count();
        $id_form = $formsDiarios->id;
        $maxDias = $formsDiarios->numDias;
    @endphp
    @livewire('acompanhamento-dia', [   'qtdDias' => $qtdDias, 
                                        'diaMaxRespondido' => $diaMaxRespondido,
                                        'id_form' => $id_form,
                                        'totalDays' => $maxDias,
                                     ])
    
</div>
