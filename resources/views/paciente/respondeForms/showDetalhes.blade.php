<div>

    <div class="px-4 sm:px-0">
        <h3 class="text-3xl font-semibold leading-7 text-gray-900 py-3">Processos</h3>
    </div>


   <div class="my-4 ml-8">
        <p class="truncate text-base leading-5 text-gray-700"> Médico: {{ Str::title( $medico->nome) }} {{ Str::ucfirst($medico->sobrenome); }}</p>
        <p class="truncate text-base leading-5 text-gray-700"> Paciente: {{ Str::title($paciente->nome) }} {{ Str::ucfirst($paciente->sobrenome); }} </p>
   </div>

    <table>
        @php
            $pacienteId = $paciente->id;
            $qntForms = $formDiarios->where('medico_id', $medico->id)
                                    ->where('paciente_id', $pacienteId)
                                    ->count();
            @endphp

        <div class="not-prose relative rounded-xl overflow-hidden dark:bg-slate-800/25">
            <div class="relative py-3">
                <div class="shadow-sm rounded-t-xl bg-purple-300  overflow-hidden my-1">
                    <div class="grid grid-cols-5 items-center justify-center border-collapse w-full">
                        <span class="font-medium text-slate-700 dark:text-slate-700 text-center my-5">Adicionado em:</span>
                        <span class="font-medium text-slate-700 dark:text-slate-700 text-center">Dias restantes</span>
                        <span class="font-medium text-slate-700 dark:text-slate-700 text-center">Responder</span>
                        <span class="font-medium text-slate-700 dark:text-slate-700 text-center">Status</span>
                        <span class="font-medium text-slate-700 dark:text-slate-700 text-center">Respostas</span>
                    </div>

                    @forelse ($formDiarios as $formDiarios)
                        @php
                            if($checklist->where('forms_id', $formDiarios->id)->last() != null)
                            {
                                $ultimo = $checklist->where('forms_id', $formDiarios->id)->last();
                                $ultimo = $ultimo->numDia;
                            } else {
                                $ultimo = 0;
                            }
                            
                            $qntDias2 = $formDiarios->numDias - $ultimo;
                            //$status = $formDiarios->status;
                            $qntDias = $formDiarios->numDias;
                            $status = $formDiarios->status;
                        @endphp
                        
                        <div class="grid grid-cols-5 bg-white dark:bg-slate-800">
                            <span class="text-base border-b border-l border-slate-100 dark:border-slate-700 p-4 pl-3 py-10 text-slate-500 dark:text-slate-400 my-1/2 text-center">{{ $formDiarios->created_at }}</span>
                            <span class="text-base border-b border-slate-100 dark:border-slate-700 p-4 pl-3 py-10 text-slate-500 dark:text-slate-400 my-1/2 text-center">{{ $qntDias2 }} / {{ $qntDias }}</span>

                    
                            @if ( $status == 'Em andamento' || $status == 'Aguardando' )
                                <span class="text-base border-b border-slate-100 dark:border-slate-700 p-4 pl-3 py-10 text-slate-500 dark:text-slate-400 my-1/2 text-center">
                                    <a href="{{ route('areapaciente.medicoDetalhesForms', ['id' => $formDiarios->id]) }}" class="hover:text-gray-500 hover:font-bold">Responder</a> </td>
                                </span>
                            @else
                                <span class="text-base border-b border-slate-100 dark:border-slate-700 p-4 pl-3 py-10 text-slate-500 dark:text-slate-400 my-1/2 text-center">
                                    Não disponível
                                </span>
                            
                            @endif
                        
                            <span class="text-base border-b border-slate-100 dark:border-slate-700 p-4 pl-3 py-10 text-slate-500 dark:text-slate-400 my-1/2 text-center">{{ $status}}</span>
                            {{-- verify if there is at least one awnser --}}
                            @if ($formDiarios->status == 'Aguardando')
                                <span class="text-base border-b border-slate-100 dark:border-slate-700 p-4 pl-3 py-10 text-slate-500 dark:text-slate-400 my-1/2 text-center">Sem respostas</span>   
                            @else
                                <span class="text-base border-b border-r border-slate-100 dark:border-slate-700 p-4 pl-3 py-10 text-slate-500 dark:text-slate-400 text-center">
                                    <a href="{{ route('areapaciente.acessoForms', ['id' => $formDiarios->id]) }} " class="inline-block rounded bg-purple-300 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-purple-300 transition duration-150 ease-in-out hover:bg-purple-400 hover:shadow-purple-400 focus:outline-none focus:ring-0">Ver respostas</a>
                                </span>
                            @endif
                        </div>
                    @empty
                        <div class="grid grid-cols-1 bg-white dark:bg-slate-800">
                            <p class="text-base border-b border-l border-slate-100 dark:border-slate-700 p-4 pl-3 py-10 text-slate-500 dark:text-slate-400 my-1/2 text-center">Sem formulários adicionados</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>        
    </table>
</div>