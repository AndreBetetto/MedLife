<div class="p-5">
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="px-4 sm:px-0">
        <h3 class="text-4xl font-semibold leading-7 text-gray-900 dark:text-white">Relatório</h3>
    </div>
    <div class="grid grid-cols-2 gap-4 py-10">
        <div class="grid grid-cols-1">
            <span for="selectedDay" class="font-bold text-gray-700 dark:text-zinc-300">Selecione o dia</span>
            <select
                placeholder="Selecione o dia"
                id="selectedDay"
                wire:model="selectedDay"
                wire:change="getFormDia"
                class="border rounded border-gray-400 w-3/4 dark:bg-slate-800">
                @for ($i = 1; $i <= $totalDays; $i++)
                    @if ($i <= $diaMaxRespondido)
                        <option value="{{ $i }} " selected>{{ $i }}</option>
                    @else
                        <option value="{{ $i }} " disabled>{{ $i }}</option>
                    @endif
                @endfor
            </select>
        </div>

        {{--<textarea id="mytextarea">Hello, World!</textarea>--}}

        <div class="grid grid-cols-1">
            <span class="font-bold text-gray-700 dark:text-zinc-300">Nível da dor</span>
            <input type="text" id="nivelDor" value="{{ $formDia->nivelDor }}" disabled class="border rounded w-3/4 p-2 border-gray-400 dark:bg-slate-800">
        </div>

        <div class="grid grid-cols-1">
            <span class="font-bold text-gray-700 dark:text-zinc-300">Nível da febre</span>
            <input type="text" id="nivelFebre" value="{{ $formDia->nivelFebre }}" disabled class="border rounded w-3/4 p-2 border-gray-400 dark:bg-slate-800">
        </div>

        <div>
            <label class="font-bold text-gray-700 dark:text-zinc-300">Sintomas</label>
            <div wire:init="getSymptomsProperty">
                @foreach ($this->symptoms as $symptom)
                    <li wire:key={{ $loop->index }}>{{ __('translations.'. $symptom['Name']) }}</li>
                @endforeach
                @php
                    $loadData = false;
                    $trocaDia = true;
                @endphp
            </div>
            @if($erro || $this->symptoms == null)
                <div class="text-red-500">
                    <span>Erro ao carregar API. Verifique a API Key.</span>
                </div>
            @endif
            
            <div wire:loading wire:target='selectedDay'> 
                <span>Carregando dados...</span>
            </div>
        </div>

        <div class="grid grid-cols-1">
            <span class="font-bold text-gray-700 dark:text-zinc-300">Sangramento</span>
            <input type="text" id="sangramento" value="{{ $formDia->sangramento }}" disabled class="border rounded w-3/4 p-2 border-gray-400 dark:bg-slate-800 capitalize">
        </div>

        <div class="grid grid-cols-1" wire:ignore>
            <span class="font-bold text-gray-700 dark:text-zinc-300">Observações</span>
            <textarea id="observacoesPaciente" readonly> {{$obs->observacoes}} </textarea>
        </div>

        <div class="grid grid-cols-2 col-end-1 gap-2 mt-10">
            <button wire:click="generateGraph" class="inline-block rounded bg-purple-400 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-purple-400 transition duration-150 ease-in-out hover:bg-purple-300 hover:shadow-purple-300 focus:outline-none focus:ring-0">Analisar gráfico</button>
        </div>
    </div>
    <div>    
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
                //dd($painLevel);
                for ($i=1; $i <= $totalDays ; $i++) { 
                    array_push($labels, 'Dia '.$i);
                }
            @endphp
        

        <div class="mt-10 grid grid-cols-1 place-items-center gap-10" wire:ignore>
            <div class="w-3/4">
                <canvas class="dark:bg-zinc-400" id="painChart" ></canvas>
            </div>
            <div class="w-3/4">
                <canvas class="dark:bg-zinc-400" id="feverChart" wire:ignore></canvas>
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
</div>