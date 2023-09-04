<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}

    <div>
        {{-- TODO: Componente q troca esse text input para um <select></select> --}}
        <div>
            <label for="selectedDay">Search Medicine:</label>
            <input type="text" wire:model="selectedDay">
        </div>
    </div>
    <br><br>
    @php
        $teste = 'andre, luiz';
        echo $teste;
        
        echo json_encode($teste);
    @endphp
    <br><br>
    {{ $selectedDay }}
    <br>
    Nivel da dor: {{ $checklist->nivelDor }}
    Nivel da febre: {{ $checklist->nivelFebre }}
    {{-- Sintomas API --}}
    Sintomas: 
        @foreach ($symptoms as $symptom)
            <li>{{ $symptom['Name'] }}</li>
        @endforeach
</div>
