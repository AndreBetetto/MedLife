<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}


    <br><br>

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
    <hr>
    O que aconteceu nesse dia????????<br>
    Nivel da dor: <input type="text" value="{{ $formDia->nivelDor }}" disabled>
    <br>
    Nivel da febre: <input type="text" value="{{ $formDia->nivelFebre }}" disabled>
    <br>
    Sintomas: <input type="text" value="{{ $formDia->sintomas }}" disabled>
    <br>
    Sangramento: <input type="text" value="{{ $formDia->sangramento }}" disabled>
    <br>
    Observacoes: <input type="text" value="{{ $formDia->observacoes }}" disabled>
    <hr>

    <button wire:click="getSymptoms">Ver sintomas</button>
    <a href="{{ $testeurl }}">Ver sintomas</a>
    {{-- Sintomas API --}}
    Sintomas: 
        @foreach ($symptoms as $symptom)
            <li>{{ $symptom['Name'] }}</li>
        @endforeach
</div>
