<div>
    {{-- The whole world belongs to you. --}}
    <div class="px-4 sm:px-0">
        <h3 class="text-xl font-semibold leading-7 text-gray-900 py-3">Resultados dos formulários</h3>
    </div>
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
