<div class="p-5">
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="px-4 sm:px-0">
        <h3 class="text-4xl font-semibold leading-7 text-gray-900 dark:text-white">Relatório</h3>
    </div>
    <div class="grid grid-cols-1 gap-4 py-10">
        <div class="grid grid-cols-2">
            <div>
                <div class="grid grid-cols-1 mt-4">
                    <span for="selectedDay" class="font-bold text-gray-700 dark:text-zinc-300">Selecione o dia</span>
                    <select
                        placeholder="Selecione o dia"
                        id="selectedDay"
                        wire:model="selectedDay"
                        wire:change="getFormDia"
                        class="mt-1 border rounded border-gray-400 w-3/4 dark:bg-slate-800">
                        @for ($i = 1; $i <= $totalDays; $i++)
                            @if ($i <= $diaMaxRespondido)
                                <option value="{{ $i }} " selected>{{ $i }}</option>
                            @else
                                <option value="{{ $i }} " class="text-red-500" disabled>{{ $i }}</option>
                            @endif
                        @endfor
                    </select>
                </div>

            {{--<textarea id="mytextarea">Hello, World!</textarea>--}}

                <div class="grid grid-cols-1 mt-4">
                    <span class="font-bold text-gray-700 dark:text-zinc-300">Nível da dor</span>
                    <input type="text" id="nivelDor" value="{{ $formDia->nivelDor }}" disabled class="mt-1 border rounded w-3/4 p-2 border-gray-400 dark:bg-slate-800">
                </div>

                <div class="grid grid-cols-1 mt-4">
                    <span class="font-bold text-gray-700 dark:text-zinc-300">Nível da febre</span>
                    <input type="text" id="nivelFebre" value="{{ $formDia->nivelFebre }}" disabled class="mt-1 border rounded w-3/4 p-2 border-gray-400 dark:bg-slate-800">
                </div>

                <div class="grid grid-cols-1 mt-4">
                    <span class="font-bold text-gray-700 dark:text-zinc-300">Sangramento</span>
                    <input type="text" id="sangramento" value="{{ $formDia->sangramento }}" disabled class="mt-1 border rounded w-3/4 p-2 border-gray-400 dark:bg-slate-800 capitalize">
                </div>
            </div>
            <div>
                <div class="mt-4">
                    <label class="font-bold text-gray-700 dark:text-zinc-300">Sintomas</label>
                    <div wire:init="getSymptomsProperty">
                        @foreach ($this->symptoms as $symptom)
                            <li wire:key="{{ $loop->index }}">{{ __('translations.'. $symptom['Name']) }}</li>
                        @endforeach
                        @php
                            $loadData = false;
                            $trocaDia = true;
                        @endphp
                    </div>
                    @if($this->symptoms == null)
                        <div class="text-gray-500">
                            <span>Sem sintomas disponíveis.</span>
                            @php
                                //dd($erro);
                            @endphp
                        </div>
                    @endif
                    
                    <div wire:loading wire:target='selectedDay'> 
                        <span>Carregando dados...</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 w-full mt-5" wire:ignore>
            <span class="font-bold text-gray-700 dark:text-zinc-300 mb-3">Observações</span>
            <textarea id="observacoesPaciente" class="w-full hidden" readonly> {{ $obs->observacoes }} </textarea>
        </div>

        <div class="flex gap-3 mt-10 w-3/5">
            @if($this->symptoms != null)
                <button wire:click="getDiagnostico" class="inline-block rounded bg-purple-400 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-purple-400 transition duration-150 ease-in-out hover:bg-purple-300 hover:shadow-purple-300 focus:outline-none focus:ring-0 w-fit">Analisar diagnóstico</button>
            @endif
            <button wire:click="generateGraph" class="inline-block rounded bg-purple-400 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-purple-400 transition duration-150 ease-in-out hover:bg-purple-300 hover:shadow-purple-300 focus:outline-none focus:ring-0 w-fit">Analisar gráfico</button>
        </div>
    </div>

    {{-- Sintomas API --}}

    <div class="">        
        {{-- Diagnostico API --}}
        <div wire:loading="getDiagnostico" class="w-full flex justify-center"> 
            {{--<span>Gerando possível diagnóstico...</span>--}}
        </div>
        @foreach ($diagnosticos as $diagnostico)
        <div class="mt-5 border-gray-600 border">
            <div class="grid gap-4 p-10">
                <h2 class="text-2xl mb-2">{{ __('translations.'.$diagnostico['Issue']['Name']) }}</h2>
                <div>
                    <span class="font-bold text-gray-700 dark:text-white">Possível diagnóstico:</span> {{ __('translations.'.$diagnostico['Issue']['Name']) }}
                    @php
                        $issueId = $diagnostico['Issue']['ID'];
                        $descricao = $issueInfo[$issueId]['Description'];
                    @endphp
                </div>
                <div>
                    <span class="font-bold text-gray-700 dark:text-white">Descrição:</span> 
                    <p>{{ $issueInfo[$issueId]['Description']}}</p>
                </div>
                <div>
                    <span class="font-bold text-gray-700 dark:text-white">Possíveis sintomas:</span>  
                    <p>{{ $issueInfo[$issueId]['PossibleSymptoms']}}.</p>
                </div>
                <div>
                    <span class="font-bold text-gray-700 dark:text-white">Tratamento:</span> 
                    <p>{{ $issueInfo[$issueId]['TreatmentDescription']}}</p>
                </div>
                <div>
                    <span class="font-bold text-gray-700 dark:text-white">Condição médica:</span> 
                    <p>{{ $issueInfo[$issueId]['MedicalCondition']}}</p>
                </div>
                <div>
                    <span class="font-bold text-gray-700 dark:text-white">Probabilidade:</span> 
                    <p>{{ $diagnostico['Issue']['Accuracy']}} %</p>
                </div>
                <div>
                    <span class="font-bold text-gray-700 dark:text-white">CID:</span> 
                    <p>{{$diagnostico['Issue']['IcdName']}} {{$diagnostico['Issue']['Icd']}}</p>
                    @php
                        $uri1 = 'https://icd.who.int/browse10/2019/en#/';
                        $uri2 = 'https://icd.who.int/browse11/l-m/en';
                    @endphp
                    <a href="https://icd.who.int/browse10/2019/en#/{{$diagnostico['Issue']['Icd']}}"  target="_blank" class="font-semibold hover:font-bold hover:text-purple-600">Acessar site</a>
                </div>
                <div>
                    <span class="font-bold text-gray-700 dark:text-white">Nome científico:</span> 
                    <p>{{$diagnostico['Issue']['ProfName'] }}.</p>
                </div>
                <div>
                    <span class="font-bold text-gray-700 dark:text-white">Especialização:</span>
                    @foreach ($diagnostico['Specialisation'] as $especializacao)
                        <p>- {{ __('translations.'.$especializacao['Name']) }};</p>
                    @endforeach 
                    
                </div>
            </div>
        </div>
       <!-- Traduzido: <br> -->
        
        @endforeach

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

        <div class="mt-10 grid grid-cols-1 place-items-center gap-10" wire:ignore>
            <div class="w-3/4">
                <canvas class="dark:bg-zinc-400" id="painChart" wire:ignore></canvas>
            </div>
            <div class="w-3/4">
                <canvas class="dark:bg-zinc-400" id="feverChart" wire:ignore></canvas>
            </div>
        </div>
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