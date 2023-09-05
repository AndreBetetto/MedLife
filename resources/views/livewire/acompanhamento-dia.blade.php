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
        
    @endphp
    <br><br>
    {{ $selectedDay }}
    <br>
    Nivel da dor: {{ $checklist->nivelDor }}
    Nivel da febre: {{ $checklist->nivelFebre }}
    <br>
    AQUI<br>
    <div >
        <label for="selectedDay">Select day:</label>
        <select
            placeholder="Select one"
            wire:model="selectedDay"
        >
        @for ($i = 1; $i <= $totalDays; $i++)
            @if ($i <= $diaMaxRespondido)
                <option value="{{ $i }} " selected>{{ $i }}</option>
            @else
                <option value="{{ $i }} " disabled>{{ $i }}</option>
            @endif
        @endfor
    </select>
    </div>
    <br>
    {{ dataDay()}}
    {{ $dia }}
    <hr>
    O que aconteceu nesse dia????????<br>
    Nivel da dor: <input type="text" value="{{ $data['nivelDor'] }}" disabled>
    <br>
    Nivel da febre: <input type="text" value="{{ $data['nivelFebre'] }}" disabled>
    <br>
    Sintomas: <input type="text" value="{{ $data['sintomas'] }}" disabled>
    <br>
    Sangramento: <input type="text" value="{{ $data['sangramento'] }}" disabled>
    <br>
    Observacoes: <input type="text" value="{{ $data['observacoes'] }}" disabled>
    <hr>

   

    
    {{-- Sintomas API --}}
    Sintomas: 
        @foreach ($symptoms as $symptom)
            <li>{{ $symptom['Name'] }}</li>
        @endforeach
</div>
