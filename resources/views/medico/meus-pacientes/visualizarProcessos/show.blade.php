<div>
    <div class="px-4 sm:px-0">
        <h3 class="text-3xl font-semibold leading-7 text-gray-900 dark:text-white py-3">Processos</h3>
    </div>

    {{-- 
    <p class="mt-1 truncate text-base leading-5 text-gray-700 dark:text-zinc-300"> Médico: {{ Str:title($medico->nome) }} {{ Str::ucfirst($medico->sobrenome); }} - {{ $medico->id }}</p>
    <p class="mt-1 truncate text-base leading-5 text-gray-700 dark:text-zinc-300 pb-5"> Paciente: {{ Str::title($paciente->nome) }} {{ Str::ucfirst($paciente->sobrenome); }} - {{ $paciente->id }}</p>
    --}}

    <table>
        <div class="not-prose relative mt-5 rounded-xl overflow-hidden dark:bg-slate-800/25">
            
                <div class="shadow-sm rounded-t-xl bg-purple-300  overflow-hidden my-1">
                    <div class="grid grid-cols-4 items-center justify-center border-collapse w-full">
                        <span class="font-medium text-slate-700 dark:text-slate-700 text-center my-5">ID</span>
                        <span class="font-medium text-slate-700 dark:text-slate-700 text-center">Dias restantes</span>
                        <span class="font-medium text-slate-700 dark:text-slate-700 text-center">Status</span>
                        <span class="font-medium text-slate-700 dark:text-slate-700 text-center">Respostas</span>
                    </div>

                    @forelse ($forms as $formDiarios)
                        @php
                            if($checklist->where('forms_id', $formDiarios->id)->last() != null)
                            {
                                $ultimo = $checklist->where('forms_id', $formDiarios->id)->last();
                                $ultimo = $ultimo->numDia;
                            } else {
                                $ultimo = 0;
                            }
                            
                            $qntDias = $formDiarios->numDias - $ultimo;
                            $status = $formDiarios->status;
                        @endphp
                    
                    <div class="grid grid-cols-4 bg-white dark:bg-slate-800">
                        <span class="text-base border-b border-l border-slate-100 dark:border-slate-700 p-4 pl-3 py-10 text-slate-500 dark:text-slate-400 my-1/2 text-center">{{ $formDiarios->id }}</span>
                        <span class="text-base border-b border-slate-100 dark:border-slate-700 p-4 pl-3 py-10 text-slate-500 dark:text-slate-400 my-1/2 text-center">{{ $qntDias }} de {{ $formDiarios->numDias}}</span>
                        <span class="text-base border-b border-slate-100 dark:border-slate-700 p-4 pl-3 py-10 text-slate-500 dark:text-slate-400 my-1/2 text-center">
                            {{ $status}}
                            <br>
                            @if($formDiarios->new == true)
                                <span class="text-xs bg-purple-300 rounded-full px-2 py-1 text-white font-bold">Novo</span>
                            @endif
                        </span>                        
                        @if ($status != 'Aguardando')
                        <span class="text-base border-b border-r border-slate-100 dark:border-slate-700 p-4 pl-3 py-10 text-slate-500 dark:text-slate-400 text-center">
                            <a href="{{ route('areamedico.acessoProcessosForms', ['idPac' => $formDiarios->paciente_id, 'idForm' => $formDiarios->id ]) }}" class="inline-block rounded bg-purple-300 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-purple-300 transition duration-150 ease-in-out hover:bg-purple-400 hover:shadow-purple-400 focus:outline-none focus:ring-0"
                            
                            >Ver respostas</a></span>
                        </span> @else
                        <span class="text-base border-b border-r border-slate-100 dark:border-slate-700 p-4 pl-3 py-10 text-slate-500 dark:text-slate-400 text-center">                           
                            Esperando respostas do paciente</a></span>
                        </span> @endif
                    </div>

                    @empty
                        <div class="grid grid-cols-1 bg-white dark:bg-slate-800">
                            <span class="text-base border-b border-l border-slate-100 dark:border-slate-700 p-4 pl-3 py-10 text-slate-500 dark:text-slate-400 my-1/2 text-center">Sem processos</span>
                        </div>
                    @endforelse
                </div>
        </div>
    </table>

</div>