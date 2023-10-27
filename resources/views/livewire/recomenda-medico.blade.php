<div>
{{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    
    <div class="flex flex-col items-center">
    <button class="rounded-md bg-purple-300 px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-blue-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue" wire:click.prevent="fetchAPIdata">
        Carregar lista de sintomas
    </button>
    <div class="w-full">   
        <form wire:submit.prevent="recomenda" class="flex flex-col items-center">
            @if ($dataFetched == true)
                <select id="symptomsSelected[]" wire:model="symptomsSelected" multiple class="w-full mt-2" >
                    @foreach ($symptoms as $symptom)
                        <option value="{{ $symptom['ID'] }}"> {{ __('translations.'.$symptom['Name']) }} </option>
                    @endforeach
                </select>
            @endif
            <div class="mt-7">
                <button  class="rounded-md bg-purple-300 px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-blue-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue" wire:click.prevent="getSpecialization" type="submit">Enviar</button>
            </div>
        </form> 
        @if ($dataFetched == true)
            <p class="font-semibold mb-3 mt-2 ">Resultado:</p>
        @endif
        @forelse ($saida as $out)
        <li class="font-semibold">
            {{ __('translations.'.$out['Name']) }} - {{ $out['Accuracy']}}%
            <button wire:click.prevent='filtrarEsp("{{$out['Name']}}")'
                class=""
                @if (in_array($out['Name'], $filtroEspecialidade))
                    disabled               
                @endif
            >
                Filtrar
            </button>
        </li>
        @empty
        </div>
        @endforelse
    </div>
        <input type="text" wire:model="searchMedic" placeholder="Pesquisar médico" class="w-full mt-5 rounded-md border-gray-300 shadow-sm focus:border-purple-300 focus:ring focus:ring-purple-200 focus:ring-opacity-50">
        <div class="mt-6">
            @if (count($filtroEspecialidade) > 0)
                <p class="font-semibold mb-3 mt-2 ">Filtros aplicados:</p>
                <div class=" h-16 flex flex-row overscroll-x-contain">
                    @foreach ($filtroEspecialidade as $item)
                        @php
                            $item = str_replace('_', ' ', $item);
                            $item = __('translations.'.$item);
                        @endphp
                        <div class=" h-10 font-semibold border border-slate-800 bg-emerald-400 rounded-2xl  p-3 basis-1/5  text-center  border-spacing-1 inline-block align-middle   ">
                            {{ $item }} 
                            <button class=" ml-3 inline-block align-middle" wire:click.prevent='removeEsp("{{$item}}")'>
                                <img src="{{asset('icons/delete.svg')}}" class="h-4 ">
                            </button>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
        <div class="flex flex-col gap-8 mt-2 w-full">
            <table class="">
                <p class="text-xl font-semibold leading-6 text-gray-800 ">Médicos cadastrados</p>
                
                @forelse ($medicos as $medico)
                    @php
                        $medicoId = $medico->id;
                        $isSelected = $jaSelecionados->contains('medico_id', $medicoId);
                        $imgIndex = $medicoId % $fileCount;
                        $imgIndex = $imgIndex == 0 ? $fileCount : $imgIndex;
                        $imgPath = 'profilePics/'.$imgIndex.'.svg';
                    @endphp
                    <div class="flex justify-between items-center h-full">
                        <img class="h-14 w-14 flex-none rounded-full bg-gray-50" src="{{ asset($imgPath) }}" alt="">
                        
                        <div class="min-w-0 flex-auto">
                            <p class="text-base font-semibold leading-6 px-5"> {{ Str::title($medico->nome) }} </p>
                            <p class="mt-1 truncate text-sm leading-5 text-gray-500 px-5">
                                @php
                                    $medico->especialidade = __('translations.'.$medico->especialidade);
                                    $esp = $medico->especialidade;
                                @endphp
                                {{ $esp }} 
                            </p>
                        </div>

                        <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                            <p class="text-sm leading-6 text-gray-900"> {{ $medico->crm }} </p>

                            @if (!$isSelected)
                            <p class="mt-1 text-xs leading-5 text-gray-500">
                                <form action="{{ route('areapaciente.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="medico_id" value="{{ $medicoId }}">
                                    <input type="hidden" name="paciente_id" value="{{ $paciente->id }}">
                                    <button type="submit" class="rounded-md bg-purple-300 px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-blue-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue">
                                        Adicionar
                                    </button>
                                </form> 
                            </p>
                        </div>     
                        @elseif ($isSelected)
                            Já selecionado
                        </div>
                        @endif
                    </div>
                @empty
                    <div>
                        <p>Sem médicos disponíveis</p>
                    </div>
                @endforelse
            </table>
            {{ $medicos->links('pagination::tailwind') }}
        </div>
    </div> 
</div>
