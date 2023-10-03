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
        <div wire:init="init">
            @if ($loadData)
                @if($erro)
                    <div id="loadesh1" wire:ignore>
                        @foreach ($symptoms as $symptom)
                            <li>{{ __('translations.'. $symptom['Name']) }}</li>
                        @endforeach
                    </div>
                @else
                    <div id="loadesh2" wire:ignore>
                        <p>* Erro ao carregar dados (nao esqueca de trocar a API key) </p>
                    </div>
                @endif
            @else
                Carregando dados...
            @endif
        </div>
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
    
    <br>
    <button wire:click="getDiagnostico" class="inline-block rounded bg-purple-400 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-purple-400 transition duration-150 ease-in-out hover:bg-purple-300 hover:shadow-purple-300 focus:outline-none focus:ring-0">Analisar diagnostico</button>
    {{-- Diagnostico API --}}
    @foreach ($diagnosticos as $diagnostico)
    <br><br>
    <label class="font-bold text-gray-700 ">Diagnóstico:</label> {{ $diagnostico['Issue']['Name'] }}</li>
        
            @php
                $issueId = $diagnostico['Issue']['ID'];
                $descricao = $issueInfo[$issueId]['Description'];
                
            @endphp
        <div class="text-justify">
            <br><br><label class="font-bold text-gray-700">Descrição:</label> {{ $issueInfo[$issueId]['Description']}}<br><br>
            <br><label class="font-bold text-gray-700">Possíveis sintomas:</label>  {{ $issueInfo[$issueId]['PossibleSymptoms']}}<br><br>
            <br><label class="font-bold text-gray-700">Tratamento:</label> {{ $issueInfo[$issueId]['TreatmentDescription']}}<br><br>
            <br><label class="font-bold text-gray-700">Condição médica:</label> {{ $issueInfo[$issueId]['MedicalCondition']}}<br><br>
        
            <br><br><label class="font-bold text-gray-700">Probabilidade:</label> {{ $diagnostico['Issue']['Accuracy'] }}%</li>
            <br><label class="font-bold text-gray-700">ICD:</label> {{$diagnostico['Issue']['IcdName']}} {{$diagnostico['Issue']['Icd']}}. <a href="https://icd.who.int/browse10/2019/en#/{{$diagnostico['Issue']['Icd']}}"  target="_blank" class="font-semibold hover:font-bold hover:text-purple-600">Acessar site</a>
            <br><label class="font-bold text-gray-700">Professional name:</label> {{$diagnostico['Issue']['ProfName'] }} </li>
            <br><label class="font-bold text-gray-700">Especializacao:</label>
            @foreach ($diagnostico['Specialisation'] as $especializacao)
                - {{ $especializacao['Name'] }}
            @endforeach 
        </div>

        <br>
        <button wire:click.prevent="traduzEnPt('{{$descricao}}')" class="font-bold hover:text-purple-600">Ver sintomas</button>
       <!-- Traduzido: <br> -->
        {{ $traduzDesc }}
    @endforeach
    <br><br>
    <button wire:click="generateGraph" class="inline-block rounded bg-purple-400 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-purple-400 transition duration-150 ease-in-out hover:bg-purple-300 hover:shadow-purple-300 focus:outline-none focus:ring-0">Analisar gr'afico</button>
    @if($graphicActive)
        @php
            $labels = [];
            $painLevel = [];
            $bodyTemp = [];
            $hipotermiaRange = [25, 35]; 
            $normalRange = [36, 37.5];
            $feverRange = [37.7, 39.5]; 
            $highFeverRange = [39.6, 41.0]; 
            $hipertemia = [41.1, 60];

            foreach ($dorForms as $dor) {
                array_push($painLevel, $dor->nivelDor);
                array_push($bodyTemp, $dor->nivelFebre);
                //array_push($labels, $dor->numDia);
                //echo $dor->nivelFebre;
            }

            for ($i=0; $i < $totalDays ; $i++) { 
                array_push($labels, 'Dia '.$i+1);
            }

            
        @endphp
        <br><br>
        <div style="width: 65%" >
            <canvas id="painChart" ></canvas>
        </div>

        <br><br>

        <div style="width: 65%" >
            <canvas id="feverChart" ></canvas>
        </div>
        
        <script>
            const ctxPain = document.getElementById('painChart');
            const ctxFever = document.getElementById('feverChart');
          
            new Chart(ctxPain, {
              type: 'line',
              title: 'Nivel da dor do paciente durante os ultimos ' + @json($totalDays) + ' dias',
              data: {
                labels: @json($labels),
                datasets: [{
                  label: '# Nivel da dor',
                  data: @json($painLevel),
                  borderWidth: 3,
                  borderColor: [
                    'rgba(2, 90, 83, 0.4)'
                  ],
                  backgroundColor: [
                    'rgba(2, 90, 83, 0.8)'
                  ]
                }
            ]
              },
              options: {
                scales: {
                  y: {
                    beginAtZero: true,
                    max: 10
                  }
                }
              }
            });

            new Chart(ctxFever, {
                type: 'line',
                data: {
                    labels: @json($labels),
                    datasets: [{
                        label: '# Temperatura corporal',
                        data: @json($bodyTemp),
                        borderWidth: 3,
                        borderColor: [
                            'rgba(211, 134, 0, 0.4)'
                        ],
                        backgroundColor: [
                            'rgba(211, 134, 0, 0.1)'
                        ]
                    }
                ]},
                options: {
                    scales: {
                    y: {
                        beginAtZero: true,
                        max: 50,
                        min: 25
                    }
                    },
                    plugins: {
                        filler: {
                            propagate: true
                        }
                    }
                }
            });
 
        </script>
    @endif

</div>
