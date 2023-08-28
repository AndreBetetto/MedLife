<div>
    <br>

    Quais remedios o paceinte deve tomar?
    {{ $row->id }}
    {{ $medico->id }}

    @livewire('busca-nome-remedio', ['medico' => $medico, 'row' => $row])
    
    <br>
</div>