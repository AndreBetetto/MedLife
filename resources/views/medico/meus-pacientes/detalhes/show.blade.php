<div>
    {{-- The whole world belongs to you. --}}
    Acompanhar resultados de formularios

    Dia selecionado:

    @php
        use Carbon\Carbon;
        $qtdDias = $form->numDias;
        $id_form = $form->id;
        $maxDias = $form->numDias;
        $diaMaxRespondido = $checklist->where('forms_id', $id_form)->count();

        $anoNasc = Carbon::parse($paciente->dataNasc)->format('Y');

    @endphp
    @livewire('acompanhamento-dia-medico', ['qtdDias' => $qtdDias, 'diaMaxRespondido' => $diaMaxRespondido, 'id_form' => $id_form, 'totalDays' => $maxDias, 'sexo' => $paciente->sexo, 'anoNasc' => $anoNasc])

    
</div>
