<div>
    {{-- The whole world belongs to you. --}}
    Acompanhar resultados de formularios

    Dia selecionado:

    @php
        $qtdDias = $formsDiarios->numDias;
        
    @endphp
    @livewire('acompanhamento-dia', ['qtdDias' => $qtdDias, 'check' => $checklist])
    
</div>
