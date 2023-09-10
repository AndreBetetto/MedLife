<div>
    {{-- The whole world belongs to you. --}}
    Acompanhar resultados de formularios

    Dia selecionado:

    @php
        $qtdDias = $form->numDias;
        $diaMaxRespondido = $checklist->count();
        $id_form = $form->id;
        $maxDias = $form->numDias;
        echo $form->numDias;
    @endphp
    @livewire('acompanhamento-dia-medico', [   'qtdDias' => $qtdDias, 
                                        'diaMaxRespondido' => $diaMaxRespondido,
                                        'id_form' => $id_form,
                                        'totalDays' => $maxDias,
                                     ])

    
</div>
