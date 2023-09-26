<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}

    <br><br>

    <div class="px-4 sm:px-0">
        <h3 class="text-lg font-semibold leading-7 text-gray-900">Relatório</h3>
    </div><br>

    <div class="h-px bg-gray-300"></div>

    <div class="grid grid-cols-2 gap-4 py-10">
    <div>
        <label for="selectedDay" class="font-bold text-gray-700">Selecione o dia &nbsp;</label>
        <select
            placeholder="Select one"
            wire:model="selectedDay"
            class="border rounded border-gray-400 w-3/4">
            @for ($i = 1; $i <= $totalDays; $i++)
                @if ($i <= $diaMaxRespondido)
                    <option value="{{ $i }} " selected>{{ $i }}</option>
                @else
                    <option value="{{ $i }} " disabled>{{ $i }}</option>
                @endif
            @endfor
        </select>
    </div>

    <div>
        <label class="font-bold text-gray-700">Nível da dor</label>
        <input type="text" value="{{ $formDia->nivelDor }}" disabled class="mx-3 border rounded w-3/4 p-2  border-gray-400">
    </div>

    <div>
        <label class="font-bold text-gray-700">Nível da febre</label>
        <input type="text" value="{{ $formDia->nivelFebre }}" disabled class="mx-3 border rounded w-3/4 p-2  border-gray-400">
    </div>

    <div>
        <label class="font-bold text-gray-700">Sintomas</label>
        <input type="text" value="{{ $formDia->sintomas }}" disabled class="mx-8 border rounded w-3/4 p-2  border-gray-400">
    </div>

    <div>
        <label class="font-bold text-gray-700">Sangramento</label>
        <input type="text" value="{{ $formDia->sangramento }}" disabled class="mx-4 border rounded w-3/4 p-2  border-gray-400">
    </div>

    <div>
        <label class="font-bold text-gray-700">Observações</label>
        <input type="text" value="{{ $formDia->observacoes }}" disabled class="mx-2 border rounded w-3/4 p-2  border-gray-400">
    </div>
</div>

    <div class="h-px bg-gray-300"></div>


    
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
            @php
                $issueId = $diagnostico['Issue']['ID'];
                $descricao = $issueInfo[$issueId]['Description'];
                
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
        <br><br><br>
        <button wire:click.prevent="traduzEnPt('{{$descricao}}')">Ver sintomas</button>
        Traduzido: <br>
        {{ $traduzDesc }}
    @endforeach

</div>
