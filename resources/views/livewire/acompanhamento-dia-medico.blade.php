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
    <br>
    <br>
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

<br>
    <button wire:click="getSymptoms">Ver sintomas</button>
    {{-- Sintomas API --}}
    @foreach ($symptoms as $symptom)
        <li>{{ $symptom['Name'] }}</li>
    @endforeach
        <br>
    <button wire:click="getDiagnostico">Analisar diagnostico</button>
    {{-- Diagnostico API --}}
    @foreach ($diagnosticos as $diagnostico)
        <li>Diagnostico: {{ $diagnostico['Issue']['Name'] }}</li>
        <li>
            <x-button>aa</x-button>
            @php
                $issueId = $diagnostico['Issue']['ID'];
            @endphp
            Descricao: {{ $issueInfo[$issueId]['Description']}}<br><br>
            Possiveis sintomas: {{ $issueInfo[$issueId]['PossibleSymptoms']}}<br><br>
            Tratamento: {{ $issueInfo[$issueId]['TreatmentDescription']}}<br><br>
            Medical Condition: {{ $issueInfo[$issueId]['MedicalCondition']}}<br><br>
        </li>
        <li>Probabilidade: {{ $diagnostico['Issue']['Accuracy'] }}%</li>
        <li>Icd: {{$diagnostico['Issue']['IcdName']}} {{$diagnostico['Issue']['Icd']}} . Link: <a href="https://icd.who.int/browse10/2019/en#/{{$diagnostico['Issue']['Icd']}}">Aqui!</a>  </li>
        <li>Professional name: {{$diagnostico['Issue']['ProfName'] }} </li>
        <li>Especializacao: 
        @foreach ($diagnostico['Specialisation'] as $especializacao)
            - {{ $especializacao['Name'] }}
        @endforeach </li>
    @endforeach
</div>
